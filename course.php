<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Courses</h1>
            <ul class="breadcumb-menu" aria-label="Breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li aria-current="page">Courses</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row flex-row-reverse">
            <!-- Main content -->
            <main class="col-xl-9 col-lg-8" id="mainContent" tabindex="-1">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                    <p id="resultCount" class="woocommerce-result-count mb-0" aria-live="polite">Loading courses...</p>

                    <div class="d-flex gap-2">
                        <label for="sortOrder" class="visually-hidden">Sort courses</label>
                        <select id="sortOrder" class="form-select form-select-sm" aria-label="Sort courses">
                            <option value="date">Sort by latest</option>
                            <option value="price">Price: low to high</option>
                            <option value="price-desc">Price: high to low</option>
                            <option value="rating">Top rated</option>
                        </select>
                    </div>
                </div>

                <!-- Courses Grid -->
                <div id="coursesGrid" class="row gy-4" aria-live="polite"></div>

                <!-- Pagination -->
                <nav id="coursesPagination" class="th-pagination text-center pt-50" aria-label="Courses pagination" style="display:none;"></nav>
            </main>

            <!-- Sidebar -->
            <aside class="col-xl-3 col-lg-4 sidebar-area sidebar-shop" aria-label="Shop filters">
                <div class="widget widget_search mb-4">
                    <form id="searchForm" class="search-form" role="search" onsubmit="return false;">
                        <label for="searchInput" class="visually-hidden">Search courses</label>
                        <div class="input-group">
                            <input id="searchInput" type="search" class="form-control form-control-sm" placeholder="Search courses" aria-label="Search courses">
                            <button id="searchClear" type="button" class="btn btn-outline-secondary btn-sm" title="Clear search" aria-label="Clear search">&times;</button>
                        </div>
                    </form>
                </div>

                <div class="widget widget_price_filter mb-4">
                    <h5 class="widget_title">Filter By Price</h5>
                    <div class="mb-2">
                        <input id="minPrice" type="number" step="0.01" min="0" class="form-control form-control-sm mb-2" placeholder="Min $">
                        <input id="maxPrice" type="number" step="0.01" min="0" class="form-control form-control-sm mb-2" placeholder="Max $">
                        <button id="applyPriceFilter" class="btn btn-sm btn-primary w-100 mb-1">Apply</button>
                        <button id="resetFilters" class="btn btn-sm btn-outline-secondary w-100">Reset</button>
                    </div>
                </div>

                <div class="widget widget_categories mb-4">
                    <h5 class="widget_title">Categories</h5>
                    <div id="categoryList" class="d-flex flex-wrap gap-2"></div>
                </div>

                <div class="widget widget_misc small text-muted">
                    <p class="mb-1">Tip: Click a category to filter. Use the quick view to preview without leaving page.</p>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Quick view modal -->
<div class="modal fade" id="courseQuickView" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="quickTitle" class="modal-title">Course preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-5">
                        <img id="quickThumb" alt="" class="img-fluid rounded" style="height:220px;object-fit:cover;width:100%">
                    </div>
                    <div class="col-md-7">
                        <div id="quickMeta" class="mb-2 small text-muted"></div>
                        <div id="quickRating" class="mb-2"></div>
                        <p id="quickDesc" class="small"></p>
                        <div class="d-flex gap-2 mt-3">
                            <div id="quickPrice" class="fw-bold fs-5"></div>
                            <button id="quickViewDetails" class="btn btn-primary btn-sm">Go to details</button>
                            <!-- <button id="quickWishlist" class="btn btn-outline-secondary btn-sm">Wishlist</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ABS_PATH_TO_PROJECT . 'CDN_Footer.php'; ?>

<script>
    /* ============================
   Styles injected for this page
   ============================ */
    (function() {
        const css = `
        .course-card{transition: transform .28s cubic-bezier(.2,.9,.3,1), box-shadow .28s, opacity .3s; transform: translateY(14px); opacity:0; border-radius:10px; overflow:hidden;}
        .course-card.visible{transform:none; opacity:1; box-shadow:0 10px 30px rgba(18,38,63,0.08);}
        .course-card:hover{transform:translateY(-6px) scale(1.01); box-shadow:0 18px 35px rgba(18,38,63,0.12);}
        .course-thumb{width:100%; height:180px; object-fit:cover; border-radius:6px;}
        .course-badges{position:absolute; top:12px; left:12px; display:flex; gap:6px; z-index:5;}
        .badge-course{background:rgba(0,0,0,0.6); color:#fff; padding:4px 8px; border-radius:6px; font-weight:600; font-size:0.75rem;}
        .price-chip{background:#fff; padding:6px 10px; border-radius:8px; font-weight:700; box-shadow:0 4px 12px rgba(0,0,0,0.06);}
        .course-footer .btn{font-size:0.82rem; padding:0.35rem 0.6rem;}
        .rating-stars{color:#f8b84a; font-weight:700;}
        .category-pill{cursor:pointer}
        .category-pill.active{background:#0d6efd; color:#fff}
        .skeleton{background:linear-gradient(90deg,#f0f0f0 25%, #e9e9e9 50%, #f0f0f0 75%); background-size:200% 100%;}
        .visually-hidden{position:absolute!important;height:1px;width:1px;overflow:hidden;clip:rect(1px,1px,1px,1px);white-space:nowrap;border:0;padding:0;margin:-1px;}
        .meta-muted{color:#6c757d; font-size:0.85rem}
    `;
        const st = document.createElement('style');
        st.appendChild(document.createTextNode(css));
        document.head.appendChild(st);
    })();

    /* ============================
       Core page JS
       ============================ */
    $(function() {
        const ajaxUrl = 'ajaxFile/courseAjax.php';
        const $grid = $('#coursesGrid'),
            $resultCount = $('#resultCount'),
            $pagination = $('#coursesPagination');
        const $categoryList = $('#categoryList');
        const $quickModal = new bootstrap.Modal(document.getElementById('courseQuickView'), {});
        let allCourses = [],
            filteredCourses = [],
            pageSize = 9,
            currentPage = 1,
            categories = [];

        // helpers
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

        function parsePrice(v) {
            if (v === undefined || v === null || v === '') return 0;
            const n = parseFloat(String(v).replace(/[^0-9.-]+/g, ''));
            return isNaN(n) ? 0 : n;
        }

        function formatPrice(v) {
            const n = parsePrice(v);
            return n === 0 ? 'Free' : ('₹' + n.toFixed(2));
        }

        function renderStars(score) {
            score = Math.round((score || 0) * 2) / 2;
            let html = '';
            for (let i = 1; i <= 5; i++) {
                if (score >= i) html += '★';
                else if (score + 0.5 >= i) html += '☆';
                else html += '☆';
            }
            return `<span class="rating-stars" aria-hidden="true">${html}</span>`;
        }

        // wishlist in localStorage (simple)
        function wishlistGet() {
            try {
                return JSON.parse(localStorage.getItem('wishlist_v1') || '[]');
            } catch (e) {
                return [];
            }
        }

        function wishlistAdd(id) {
            const list = wishlistGet();
            if (!list.includes(id)) {
                list.push(id);
                localStorage.setItem('wishlist_v1', JSON.stringify(list));
            }
            updateWishlistButtons();
        }

        function wishlistRemove(id) {
            const list = wishlistGet().filter(x => x !== id);
            localStorage.setItem('wishlist_v1', JSON.stringify(list));
            updateWishlistButtons();
        }

        function wishlistHas(id) {
            return wishlistGet().includes(id);
        }

        function updateWishlistButtons() {
            $('.wishlist-toggle').each(function() {
                const id = $(this).data('id');
                $(this).toggleClass('active', wishlistHas(id));
            });
            // quick button
            const qId = $('#quickViewDetails').data('id');
            if (qId) $('#quickWishlist').toggleClass('active', wishlistHas(qId));
        }

        // skeleton loader
        function showSkeletons(count = 6) {
            $grid.empty();
            for (let i = 0; i < count; i++) {
                $grid.append(`<div class="col-xl-4 col-sm-6"><div class="card p-3 h-100 shadow-sm"><div class="mb-3 skeleton" style="height:180px;border-radius:6px"></div><div class="card-body p-0"><h5 class="card-title skeleton" style="width:70%;height:18px;margin-bottom:8px;"></h5><div class="text-muted small skeleton" style="width:50%;height:14px;margin-bottom:8px;"></div><p class="card-text small skeleton" style="height:36px;overflow:hidden;"></p></div><div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center p-0 mt-3"><div class="skeleton" style="width:60px;height:18px;"></div><div class="skeleton" style="width:80px;height:30px;border-radius:6px;"></div></div></div></div>`);
            }
        }

        // fetch
        function fetchCourses() {
            showSkeletons(6);
            $.ajax({
                url: ajaxUrl,
                method: 'POST',
                dataType: 'json',
                data: {
                    sFlag: 'fetchAll',
                    title: '',
                    category: '',
                    status: 1
                },
                success: function(res) {
                    if (res && res.status === 'success' && Array.isArray(res.data)) {
                        // normalize
                        allCourses = res.data.map(c => ({
                            id: c.id || c.course_id || c.courseId || '',
                            title: c.course_title || c.title || 'Untitled',
                            thumb: c.course_thumbnail || c.thumbnail || 'assets/img/product/product_1_1.jpg',
                            category: c.course_category || (c.category || ''),
                            author: c.author_name || c.author || '',
                            price: c.course_price !== undefined ? c.course_price : (c.price !== undefined ? c.price : 0),
                            short: c.course_short_desc || c.short_desc || c.description || '',
                            rating: (c.rating !== undefined ? parseFloat(c.rating) : (c.avg_rating !== undefined ? parseFloat(c.avg_rating) : 0)),
                            students: c.enroll_count || c.students || c.enrollments || 0,
                            created_at: c.created_at || c.date || c.created || null,
                            duration: c.duration || c.hours || ''
                        }));
                        buildCategories();
                        applyFiltersSortPaginate();
                    } else {
                        showNoCourses('No courses found');
                    }
                },
                error: function(xhr) {
                    console.error('AJAX error', xhr);
                    showNoCourses('Error loading courses');
                }
            });
        }

        // categories from data
        function buildCategories() {
            const set = new Set();
            allCourses.forEach(c => {
                if (!c.category) return;
                c.category.split(',').map(x => x.trim()).filter(Boolean).forEach(x => set.add(x));
            });
            categories = Array.from(set).sort();
            $categoryList.empty();
            $categoryList.append(`<button class="btn btn-sm btn-outline-secondary category-pill" data-cat="">All</button>`);
            categories.forEach(cat => {
                $categoryList.append(`<button class="btn btn-sm btn-outline-secondary category-pill" data-cat="${escapeHtml(cat)}">${escapeHtml(cat)}</button>`);
            });
            // click
            $(document).on('click', '.category-pill', function() {
                $('.category-pill').removeClass('active');
                $(this).addClass('active');
                currentPage = 1;
                applyFiltersSortPaginate();
            });
            // make "All" active initially
            $categoryList.find('[data-cat=""]').addClass('active');
        }

        // filtering/sorting/pagination
        function applyFiltersSortPaginate() {
            const search = ($('#searchInput').val() || '').trim().toLowerCase();
            const sortVal = $('#sortOrder').val();
            const min = ($('#minPrice').val() || '').trim();
            const max = ($('#maxPrice').val() || '').trim();
            const minPrice = min === '' ? null : parseFloat(min);
            const maxPrice = max === '' ? null : parseFloat(max);
            const activeCat = $categoryList.find('.category-pill.active').data('cat') || '';

            filteredCourses = allCourses.filter(c => {
                // search
                const hay = (c.title + ' ' + c.short + ' ' + c.category + ' ' + c.author).toLowerCase();
                if (search && hay.indexOf(search) === -1) return false;
                // category
                if (activeCat && activeCat !== '') {
                    // category may be comma separated
                    const cats = String(c.category || '').split(',').map(x => x.trim().toLowerCase());
                    if (!cats.includes(String(activeCat).toLowerCase())) return false;
                }
                // price
                const p = parsePrice(c.price);
                if (minPrice !== null && !isNaN(minPrice) && p < minPrice) return false;
                if (maxPrice !== null && !isNaN(maxPrice) && p > maxPrice) return false;
                return true;
            });

            // sort
            if (sortVal === 'price') filteredCourses.sort((a, b) => parsePrice(a.price) - parsePrice(b.price));
            else if (sortVal === 'price-desc') filteredCourses.sort((a, b) => parsePrice(b.price) - parsePrice(a.price));
            else if (sortVal === 'rating') filteredCourses.sort((a, b) => (b.rating || 0) - (a.rating || 0));
            else filteredCourses.sort((a, b) => new Date(b.created_at || 0) - new Date(a.created_at || 0));

            // pagination
            currentPage = Math.max(1, currentPage);
            const totalPages = Math.max(1, Math.ceil(filteredCourses.length / pageSize));
            if (currentPage > totalPages) currentPage = totalPages;

            renderCoursesPage(currentPage);
            renderPagination(totalPages);
        }

        // render a page
        function renderCoursesPage(page) {
            $grid.empty();
            const total = filteredCourses.length;
            if (total === 0) {
                showNoCourses('No courses match your filters');
                return;
            }
            const start = (page - 1) * pageSize;
            const items = filteredCourses.slice(start, start + pageSize);
            $resultCount.text(`Showing ${start + 1}-${Math.min(start + pageSize, total)} of ${total} results`);
            items.forEach((c, idx) => {
                const priceLabel = formatPrice(c.price);
                const ratingHtml = renderStars(c.rating);
                const students = c.students || 0;
                const duration = c.duration ? ` • ${escapeHtml(c.duration)}` : '';
                const catBadge = c.category ? `<span class="badge bg-light text-dark small">${escapeHtml(c.category.split(',')[0])}</span>` : '';

                const $card = $(`
                <div class="col-xl-4 col-sm-6">
                  <div class="position-relative">
                    <div class="card course-card p-3 h-100">
                        <div class="course-badges">${catBadge}</div>
                        <div class="mb-3" style="position:relative">
                            <img class="course-thumb" loading="lazy" src="${escapeHtml(c.thumb)}" alt="${escapeHtml(c.title)}" onerror="this.onerror=null;this.src='assets/img/product/product_1_1.jpg'">
                        </div>
                        <div class="card-body p-0">
                            <h5 class="card-title mb-1"><a href="course-details.php?course_id=${encodeURIComponent(c.id)}" class="text-decoration-none text-dark">${escapeHtml(c.title)}</a></h5>
                            <div class="meta-muted small mb-2">${escapeHtml(c.author)} • ${students} students${duration}</div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="small">${ratingHtml} <span class="text-muted small ms-1">${(c.rating||0).toFixed(1)}</span></div>
                                <div class="price-chip">${escapeHtml(priceLabel)}</div>
                            </div>
                            <p class="card-text small text-muted mb-2" style="max-height:3.6em;overflow:hidden;">${escapeHtml(c.short)}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center p-0 mt-3 course-footer">
                            <div>
                                <button class="btn btn-sm btn-outline-secondary wishlist-toggle" data-id="${escapeHtml(c.id)}" title="Toggle wishlist" aria-pressed="false">♡</button>
                                <button class="btn btn-sm btn-outline-primary ms-2 quick-view" data-id="${escapeHtml(c.id)}">Quick View</button>
                            </div>
                           
                        </div>
                    </div>
                  </div>
                </div>
            `);

                $grid.append($card);
                setTimeout(() => {
                    $card.find('.course-card').addClass('visible');
                }, idx * 40);
            });

            // bind local interactions
            $('.wishlist-toggle').off('click').on('click', function() {
                const id = $(this).data('id');
                if (wishlistHas(id)) wishlistRemove(id);
                else wishlistAdd(id);
                updateWishlistButtons();
            });
            $('.quick-view').off('click').on('click', function() {
                const id = $(this).data('id');
                openQuickView(id);
            });
            $('.add-cart').off('click').on('click', function() {
                const id = $(this).data('id');
                // stub for add to cart - replace with real cart integration
                alert('Add to cart: ' + id);
            });

            updateWishlistButtons();
            $pagination.show();
        }

        function renderPagination(totalPages) {
            $pagination.empty();
            if (totalPages <= 1) {
                $pagination.hide();
                return;
            }
            const $ul = $('<ul class="pagination justify-content-center"></ul>');
            const createItem = (p, label, active = false, disabled = false) => {
                const li = $(`<li class="page-item ${active ? 'active' : ''} ${disabled ? 'disabled' : ''}"><button class="page-link">${label}</button></li>`);
                if (!disabled) li.on('click', function() {
                    currentPage = p;
                    applyFiltersSortPaginate();
                    $('html,body').animate({
                        scrollTop: $('#mainContent').offset().top - 80
                    }, 200);
                });
                return li;
            };

            $ul.append(createItem(Math.max(1, currentPage - 1), '‹', false, currentPage === 1));

            const delta = 2;
            const left = Math.max(1, currentPage - delta);
            const right = Math.min(totalPages, currentPage + delta);

            if (left > 1) {
                $ul.append(createItem(1, '1'));
                if (left > 2) $ul.append('<li class="page-item disabled"><span class="page-link">…</span></li>');
            }

            for (let p = left; p <= right; p++) $ul.append(createItem(p, p, p === currentPage));

            if (right < totalPages) {
                if (right < totalPages - 1) $ul.append('<li class="page-item disabled"><span class="page-link">…</span></li>');
                $ul.append(createItem(totalPages, totalPages));
            }

            $ul.append(createItem(Math.min(totalPages, currentPage + 1), '›', false, currentPage === totalPages));

            $pagination.append($ul).show();
        }

        function showNoCourses(msg) {
            $resultCount.text(msg);
            $grid.html('<div class="col-12 text-center py-4">No courses available</div>');
            $pagination.hide();
        }

        // quick view open
        function openQuickView(id) {
            const item = allCourses.find(x => String(x.id) === String(id));
            if (!item) return;
            $('#quickTitle').text(item.title);
            $('#quickThumb').attr('src', item.thumb).attr('alt', item.title);
            $('#quickMeta').text(`${item.author} • ${item.category || 'Uncategorized'} • ${item.students || 0} students`);
            $('#quickDesc').text(item.short);
            $('#quickRating').html(renderStars(item.rating) + ' ' + (item.rating ? (item.rating.toFixed(1)) : '0.0'));
            $('#quickPrice').text(formatPrice(item.price));
            $('#quickViewDetails').attr('onclick', `location.href='course-details.php?course_id=${encodeURIComponent(item.id)}'`).data('id', item.id);
            $('#quickWishlist').off('click').on('click', function() {
                if (wishlistHas(item.id)) wishlistRemove(item.id);
                else wishlistAdd(item.id);
                updateWishlistButtons();
            });
            $('#quickViewDetails').data('id', item.id);
            $quickModal.show();
            updateWishlistButtons();
        }

        // events
        $('#sortOrder').on('change', () => {
            currentPage = 1;
            applyFiltersSortPaginate();
        });
        $('#applyPriceFilter').on('click', () => {
            currentPage = 1;
            applyFiltersSortPaginate();
        });
        $('#resetFilters').on('click', () => {
            $('#minPrice,#maxPrice,#searchInput').val('');
            $('#categoryList .category-pill').removeClass('active');
            $('#categoryList .category-pill[data-cat=""]').addClass('active');
            $('#sortOrder').val('date');
            currentPage = 1;
            applyFiltersSortPaginate();
        });
        let debounceTimer;
        $('#searchInput').on('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                currentPage = 1;
                applyFiltersSortPaginate();
            }, 350);
        });
        $('#searchClear').on('click', function() {
            $('#searchInput').val('');
            currentPage = 1;
            applyFiltersSortPaginate();
        });

        // initial load
        fetchCourses();
    });
</script>