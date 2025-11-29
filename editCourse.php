<?php
// Include header
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;

if (!$bIsLogin) {
    header("Location: pages-login.php", true, 301);
    exit;
} else {
    $iUserID   = $oSessionManager->iUserID;
    $sUserName = $oSessionManager->sUserName ?? "Admin";
}

// ----- FETCH COURSE ID FROM QUERY STRING -----
// Will be fetched via AJAX on page load
$iCourseID = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Navbar + Sidebar
include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<script>
    // Get course ID from query string
    var courseId = new URLSearchParams(window.location.search).get('id') || 0;
    var sUserName = "<?php echo $sUserName; ?>";
    tinymce.init({
        selector: '#CourseFullDesc',
        plugins: 'anchor autolink autosave charmap codesample directionality emoticons fullscreen help image importcss link lists media nonbreaking pagebreak preview quickbars save searchreplace table visualblocks visualchars wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | fullscreen preview | searchreplace | removeformat',
        menubar: 'file edit view insert format tools table help',
        tinycomments_mode: 'embedded',
        tinycomments_author: sUserName,
        height: 500,
        hidden_input: false,
        promotion: false,

        // 🔥 This makes sure editor is ready before content is set
        init_instance_callback: function(editor) {
            // Store globally so AJAX can use it
            window.mceEditor = editor;
        }
    });
    $(document).ready(function() {

        // ============================================================
        // FETCH COURSE DATA BY ID ON PAGE LOAD
        // ============================================================
        function fetchCourseData() {
            if (!courseId || courseId === 0) {
                alert("Invalid course ID");
                window.location.href = "adminCourseManagement.php";
                return;
            }

            $("#loadingSpinner").show();

            $.ajax({
                url: "ajaxFile/courseAjax.php",
                type: "POST",
                data: {
                    sFlag: "fetchById",
                    id: courseId
                },
                dataType: "json",
                success: function(res) {
                    $("#loadingSpinner").hide();

                    if (res.status === "success") {
                        let data = res.data;

                        // Populate form fields
                        $("#CourseId").val(data.id);
                        $("#CourseAuthorId").val(data.author_name || "Admin");
                        $("#CourseTitleId").val(data.course_title || "");
                        $("#CourseSlugId").val(data.course_slug || "");
                        $("#CourseCategoryId").val(data.course_category || "");
                        $("#CourseShortDescId").val(data.course_short_desc || "");
                        $("#CourseLinkId").val(data.course_link || "");
                        $("#CourseWhatsappId").val(data.whatsapp_link || "");
                        $("#CoursePriceId").val(data.course_price || "");
                        $("#CourseDurationId").val(data.course_duration || "");
                        $("#CourseLevelId").val(data.course_level || "");
                        $("#CourseRequirementsId").val(data.requirements || "");
                        $("#CourseLearnId").val(data.what_you_learn || "");
                        $("#SEO_TitleId").val(data.seo_title || "");
                        $("#SEO_KeywordsId").val(data.seo_keywords || "");
                        $("#SEO_DescId").val(data.seo_description || "");
                        $("#CourseStatusId").val(data.course_status || "1");

                        // Wait until TinyMCE editor is ready
                        if (window.mceEditor) {
                            window.mceEditor.setContent(data.course_full_desc || "");
                        } else {
                            // If editor not loaded yet, set after a delay
                            setTimeout(() => {
                                tinymce.get("CourseFullDesc").setContent(data.course_full_desc || "");
                            }, 300);
                        }


                        // Show image previews
                        if (data.course_thumbnail) {
                            $("#thumbPreview").attr("src", data.course_thumbnail).show();
                        }
                        if (data.course_banner) {
                            $("#bannerPreview").attr("src", data.course_banner).show();
                        }

                    } else {
                        alert("Course not found: " + res.message);
                        window.location.href = "adminCourseManagement.php";
                    }
                },
                error: function(xhr) {
                    $("#loadingSpinner").hide();
                    alert("Error fetching course details");
                    console.log(xhr.responseText);
                }
            });
        }

        // Load course data on page load
        fetchCourseData();

        // ============================================================
        // UPDATE COURSE VIA AJAX
        // ============================================================
        $("#idUpdateCourseSubmit").on("click", function(e) {
            e.preventDefault();

            // Validate
            let title = $("#CourseTitleId").val().trim();
            let slug = $("#CourseSlugId").val().trim();

            if (title === "" || slug === "") {
                alert("Course Title and Slug are required!");
                return;
            }

            // Capture TinyMCE content
            let fullDesc = tinymce.get("CourseFullDesc").getContent();

            // Create FormData
            let formData = new FormData();

            formData.append("sFlag", "updateCourse");
            formData.append("id", $("#CourseId").val());
            formData.append("author_name", $("#CourseAuthorId").val());
            formData.append("title", title);
            formData.append("slug", slug);
            formData.append("category", $("#CourseCategoryId").val());
            formData.append("short_desc", $("#CourseShortDescId").val());
            formData.append("full_desc", fullDesc);
            formData.append("course_link", $("#CourseLinkId").val());
            formData.append("whatsapp", $("#CourseWhatsappId").val());
            formData.append("price", $("#CoursePriceId").val());
            formData.append("duration", $("#CourseDurationId").val());
            formData.append("level", $("#CourseLevelId").val());
            formData.append("requirements", $("#CourseRequirementsId").val());
            formData.append("what_you_learn", $("#CourseLearnId").val());
            formData.append("seo_title", $("#SEO_TitleId").val());
            formData.append("seo_keywords", $("#SEO_KeywordsId").val());
            formData.append("seo_description", $("#SEO_DescId").val());
            formData.append("status", $("#CourseStatusId").val());

            // Add images if provided
            let thumb = $("#CourseThumbId")[0].files[0];
            let banner = $("#CourseBannerId")[0].files[0];

            if (thumb) formData.append("course_thumbnail", thumb);
            if (banner) formData.append("course_banner", banner);

            $.ajax({
                url: "ajaxFile/courseAjax.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function() {
                    $("#idUpdateCourseSubmit").prop("disabled", true).text("Updating...");
                },
                success: function(res) {
                    $("#idUpdateCourseSubmit").prop("disabled", false).text("Update Course");

                    if (res.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message,
                            timer: 1800,
                            showConfirmButton: false
                        });

                        setTimeout(() => {
                            window.location.href = "adminCourseManagement.php";
                        }, 1800);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message || "Failed to update course"
                        });
                    }
                },
                error: function(xhr) {
                    $("#idUpdateCourseSubmit").prop("disabled", false).text("Update Course");
                    alert("Request failed!");
                    console.log(xhr.responseText);
                }
            });
        });

    });
</script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Course</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="adminCourseManagement.php">Course Management</a></li>
                <li class="breadcrumb-item active">Update Course</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-4">
                    <h4>Edit Course Details</h4>
                    <hr>

                    <form id="updateCourseForm">

                        <input type="hidden" id="CourseId" value="">
                        <div id="loadingSpinner" style="display:none;">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" id="CourseAuthorId" class="form-control" readonly>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Course Title</label>
                                <input type="text" id="CourseTitleId" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Course Slug</label>
                                <input type="text" id="CourseSlugId" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" id="CourseCategoryId" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea id="CourseShortDescId" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Full Course Description</label>
                            <textarea id="CourseFullDesc"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Thumbnail Image</label>
                                <input type="file" id="CourseThumbId" class="form-control" accept="image/*">
                                <img id="thumbPreview" src="" width="120" class="mt-2" style="display:none;">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Banner Image</label>
                                <input type="file" id="CourseBannerId" class="form-control" accept="image/*">
                                <img id="bannerPreview" src="" width="120" class="mt-2" style="display:none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Course Link</label>
                            <input type="text" id="CourseLinkId" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">WhatsApp Link</label>
                            <input type="text" id="CourseWhatsappId" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" id="CoursePriceId" class="form-control" step="0.01">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Duration</label>
                                <input type="text" id="CourseDurationId" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Level</label>
                                <select id="CourseLevelId" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Requirements</label>
                            <textarea id="CourseRequirementsId" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">What You Will Learn</label>
                            <textarea id="CourseLearnId" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SEO Title</label>
                            <input type="text" id="SEO_TitleId" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SEO Keywords</label>
                            <input type="text" id="SEO_KeywordsId" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SEO Description</label>
                            <textarea id="SEO_DescId" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select id="CourseStatusId" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <button type="button" id="idUpdateCourseSubmit" class="btn btn-primary">Update Course</button>
                            <a href="adminCourseManagement.php" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </section>

</main>

<?php include_once "cdn_admin_footer.php"; ?>

<!-- AJAX handlers for Update Course are embedded above in the page-specific script -->
<!-- Commented out courseManagerController.js to avoid conflicting handlers -->
<!-- <script src="controller/courseManagerController.js"></script> -->