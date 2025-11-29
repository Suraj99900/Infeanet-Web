<?php
/* course-details.php (AJAX-driven)
   Expects ajaxFile/courseAjax.php?sFlag=fetchById to return JSON object like:
   { "status":"success", "data": { id, course_title, course_full_desc, course_thumbnail, whatsapp_link, course_link, what_you_learn, requirements, course_duration, course_level, course_price, course_category, author_name, added_on, ... } }
*/

include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

function h($s)
{
    return htmlspecialchars($s ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
$courseId = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
?>
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" id="pageTitle">Loading course...</h1>
            <ul class="breadcumb-menu" aria-label="Breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="course.php">Course</a></li>
                <li aria-current="page" id="pageCrumb">...</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container" id="courseContainer">
        <!-- Loader -->
        <div id="courseLoader" class="text-center py-5">
            <div class="spinner-border text-primary" role="status" aria-hidden="true"></div>
            <div class="mt-2">Fetching course details…</div>
        </div>

        <!-- AJAX-injected content -->
        <div id="courseContent" style="display:none;"></div>
    </div>
</section>

<?php include_once ABS_PATH_TO_PROJECT . 'CDN_Footer.php'; ?>

<script>
    (function() {
        const COURSE_ID = <?= json_encode($courseId) ?>;
        const AJAX_URL = 'ajaxFile/courseAjax.php';

        // Helpers
        function escapeHtml(s) {
            if (s === undefined || s === null) return '';
            return String(s).replace(/[&<>"']/g, m => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": "&#39;"
            } [m]));
        }

        function nlToList(text) {
            if (!text) return '';
            const items = String(text).split(/\r?\n/).map(s => s.trim()).filter(Boolean);
            if (items.length === 0) return '';
            return '<ul class="small mb-0">' + items.map(i => '<li>' + escapeHtml(i) + '</li>').join('') + '</ul>';
        }

        function safeUrl(raw) {
            if (!raw) return '';
            raw = String(raw).trim();
            if (/^https?:\/\//i.test(raw)) return raw;
            if (raw.indexOf('chat.whatsapp.com') !== -1) return raw.startsWith('http') ? raw : 'https://' + raw;
            const digits = raw.replace(/[^\d+]/g, '');
            if (/^\+?\d{8,15}$/.test(digits)) return 'https://wa.me/' + digits.replace('+', '');
            return (raw.indexOf('.') !== -1 ? (raw.startsWith('http') ? raw : 'https://' + raw) : '');
        }

        // Render the page using the API data
        function renderCourse(c) {
            if (!c || typeof c !== 'object') {
                renderNotFound('Course data invalid');
                return;
            }

            document.getElementById('pageTitle').textContent = c.course_title || 'Course';
            document.getElementById('pageCrumb').textContent = c.course_title || '';

            // Build HTML (left + right)
            const html = `
      <div class="row">
        <div class="col-lg-8 mb-4">
          <div class="card p-3 shadow-sm">
            <div class="row g-3">
              <div class="col-md-5">
                <img src="${escapeHtml(c.course_thumbnail || 'assets/img/product/product_1_1.jpg')}" alt="${escapeHtml(c.course_title||'')}" class="img-fluid rounded" style="height:260px;object-fit:cover;">
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <small class="text-muted">${escapeHtml(c.course_category || '')}</small>
                  <small class="text-muted">${escapeHtml(c.course_duration || '')}${c.course_duration ? ' hrs' : ''}</small>
                </div>
              </div>

              <div class="col-md-7">
                <h2 class="h4">${escapeHtml(c.course_title || 'Untitled Course')}</h2>
                <div class="mb-2 text-muted small">
                  By <strong>${escapeHtml(c.author_name || '')}</strong>
                  ${(c.added_on) ? '&nbsp; • &nbsp; <small class="text-muted">'+ escapeHtml(new Date(c.added_on).toLocaleDateString()) +'</small>' : ''}
                </div>

                <p class="small text-muted" id="shortDesc">${escapeHtml(c.course_short_desc || '')}</p>

                <!-- WhatsApp & Course Link (per request: no buy/enroll/cart) -->
                <div class="mt-3">
                  ${(c.whatsapp_link) ? `<a id="joinWhatsApp" class="btn btn-success btn-sm me-2" target="_blank" rel="noopener noreferrer">Join WhatsApp Group</a>` : ''}
                  ${(c.course_link) ? `<a id="courseLinkBtn" class="btn btn-outline-secondary btn-sm" target="_blank" rel="noopener noreferrer">Open Course Link</a>` : ''}
                </div>

                <div class="mt-3 small">
                  <strong>Level:</strong> ${escapeHtml(c.course_level || '')}
                  ${c.course_price ? ' • <strong>Price:</strong> ' + escapeHtml(c.course_price) : ''}
                </div>
              </div>
            </div>

            <hr class="my-3">

            <div class="mb-3">
              <h5>About this course</h5>
              <div class="small text-muted" id="longDesc">${c.course_full_desc || c.course_short_desc || ''}</div>
            </div>

            <div class="mb-3">
              <h5>What you'll learn</h5>
              <div id="learnArea">${nlToList(c.what_you_learn)}</div>
            </div>

            <div class="mb-3">
              <h5>Requirements</h5>
              <div id="reqArea">${nlToList(c.requirements)}</div>
            </div>

          </div>
        </div>

        <aside class="col-lg-4">
          <div class="card p-3 mb-3 shadow-sm">
            <h5>Instructor</h5>
            <div class="d-flex gap-3 align-items-center">
              <img src="assets/img/blog/blog.png" alt="${escapeHtml(c.author_name||'')}" style="width:64px;height:64px;object-fit:cover;border-radius:8px;">
              <div>
                <strong>${escapeHtml(c.author_name || '')}</strong>
                <div class="small text-muted">${escapeHtml(c.course_level || '')}</div>
              </div>
            </div>
          </div>

          <div class="card p-3 mb-3 shadow-sm">
            <h5>Related courses</h5>
            <div id="relatedArea" class="small"></div>
          </div>

          <div class="card p-3 shadow-sm">
            <h6>Share</h6>
            <div class="d-flex gap-2">
              <a class="btn btn-outline-secondary btn-sm" id="shareFb" target="_blank">Facebook</a>
              <a class="btn btn-outline-secondary btn-sm" id="shareTw" target="_blank">Twitter</a>
              <button class="btn btn-outline-secondary btn-sm" id="copyLink">Copy link</button>
            </div>
          </div>
        </aside>
      </div>
    `;

            const container = document.getElementById('courseContent');
            container.innerHTML = html;
            document.getElementById('courseLoader').style.display = 'none';
            container.style.display = '';

            // Attach WhatsApp/course links
            const wl = c.whatsapp_link || c.whatsapp || '';
            const resolvedWhats = safeUrl(wl);
            if (resolvedWhats && document.getElementById('joinWhatsApp')) {
                document.getElementById('joinWhatsApp').href = resolvedWhats;
            }
            const cl = c.course_link || '';
            if (cl && document.getElementById('courseLinkBtn')) {
                const u = safeUrl(cl) || cl;
                document.getElementById('courseLinkBtn').href = u;
            }

            // Fill longDesc as HTML (server sends HTML in course_full_desc). Sanitize server-side if needed.
            const longDescEl = document.getElementById('longDesc');
            if (longDescEl) longDescEl.innerHTML = c.course_full_desc || c.course_short_desc || '';

            // Share links
            const pageUrl = window.location.href;
            const fb = document.getElementById('shareFb');
            if (fb) fb.href = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(pageUrl);
            const tw = document.getElementById('shareTw');
            if (tw) tw.href = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(pageUrl);
            const cp = document.getElementById('copyLink');
            if (cp) cp.addEventListener('click', () => {
                navigator.clipboard?.writeText(pageUrl).then(() => alert('Link copied')).catch(() => prompt('Copy link', pageUrl));
            });

            // Fetch related courses
            let catToken = '';
            if (c.course_category) catToken = String(c.course_category).split(',')[0].trim();
            fetchRelated(catToken, c.id);
        }

        function renderNotFound(msg) {
            document.getElementById('courseLoader').style.display = 'none';
            const container = document.getElementById('courseContent');
            container.style.display = '';
            container.innerHTML = `<div class="row"><div class="col-12 text-center py-5"><h3>${escapeHtml(msg || 'Course not found')}</h3><p class="small text-muted">The course you requested does not exist or is not available.</p><a class="btn btn-primary" href="course.php">Back to Courses</a></div></div>`;
        }

        function fetchRelated(categoryToken, excludeId) {
            if (!categoryToken) {
                document.getElementById('relatedArea').innerHTML = '<p class="small text-muted">No related courses found.</p>';
                return;
            }
            $.post(AJAX_URL, {
                    sFlag: 'fetchAll',
                    title: '',
                    category: categoryToken,
                    status: 1
                })
                .done(function(resp) {
                    const j = (typeof resp === 'string') ? JSON.parse(resp) : resp;
                    if (j && j.status === 'success' && Array.isArray(j.data)) {
                        const filtered = j.data.filter(x => String(x.id) !== String(excludeId)).slice(0, 4);
                        if (filtered.length === 0) {
                            document.getElementById('relatedArea').innerHTML = '<p class="small text-muted">No related courses found.</p>';
                            return;
                        }
                        let html = '';
                        filtered.forEach(r => {
                            html += `<div class="d-flex gap-2 align-items-center mb-2">
              <img src="${escapeHtml(r.course_thumbnail || 'assets/img/product/product_1_1.jpg')}" alt="${escapeHtml(r.course_title)}" style="width:64px;height:48px;object-fit:cover;border-radius:6px;">
              <div class="small">
                <a href="course-details.php?course_id=${encodeURIComponent(r.id)}">${escapeHtml(r.course_title)}</a><br>
                <span class="text-muted">${parseFloat(r.course_price) === 0 ? 'Free' : ('₹' + parseFloat(r.course_price).toFixed(2))}</span>
              </div>
            </div>`;
                        });
                        document.getElementById('relatedArea').innerHTML = html;
                    } else {
                        document.getElementById('relatedArea').innerHTML = '<p class="small text-muted">No related courses found.</p>';
                    }
                })
                .fail(function() {
                    document.getElementById('relatedArea').innerHTML = '<p class="small text-muted">No related courses found.</p>';
                });
        }

        // Fetch course via AJAX
        function fetchCourse() {
            if (!COURSE_ID || COURSE_ID <= 0) {
                renderNotFound('Invalid course id');
                return;
            }
            $.post(AJAX_URL, {
                    sFlag: 'fetchById',
                    id: COURSE_ID
                })
                .done(function(resp) {
                    const j = (typeof resp === 'string') ? JSON.parse(resp) : resp;
                    if (j && j.status === 'success' && j.data) {
                        const courseObj = j.data; // your API returns object in data
                        renderCourse(courseObj);
                    } else {
                        renderNotFound(j?.message || 'Course not found');
                    }
                })
                .fail(function() {
                    renderNotFound('Error loading course');
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchCourse();
        });
    })();
</script>