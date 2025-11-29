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

// Navbar + Sidebar
include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<script>
    var sUserName = "<?php echo $sUserName; ?>";

    // Init TinyMCE for Course Full Description
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
    });
</script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New Course</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="adminCourseManagement.php">Course Management</a></li>
                <li class="breadcrumb-item active">Add Course</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-4">
                    <h4>Create New Course</h4>
                    <hr>

                    <form id="addCourseForm">

                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" id="CourseAuthorId" class="form-control" value="<?php echo $sUserName; ?>" readonly>
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

                        <!-- Short Description -->
                        <div class="mb-3">
                            <label class="form-label">Short Description (150–200 chars)</label>
                            <textarea id="CourseShortDescId" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Full Description -->
                        <div class="mb-3">
                            <label class="form-label">Full Course Description</label>
                            <textarea id="CourseFullDesc"></textarea>
                        </div>

                        <!-- Images -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Thumbnail Image</label>
                                <input type="file" id="CourseThumbId" class="form-control" accept="image/*">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Banner Image (optional)</label>
                                <input type="file" id="CourseBannerId" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="mb-3">
                            <label class="form-label">Course Link (Website / YouTube / LMS)</label>
                            <input type="text" id="CourseLinkId" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">WhatsApp Link</label>
                            <input type="text" id="CourseWhatsappId" class="form-control">
                        </div>

                        <!-- Price, Duration, Level -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" id="CoursePriceId" class="form-control" step="0.01">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Duration</label>
                                <input type="text" id="CourseDurationId" class="form-control" placeholder="e.g. 2 Months">
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

                        <!-- Requirements -->
                        <div class="mb-3">
                            <label class="form-label">Requirements (HTML / JSON)</label>
                            <textarea id="CourseRequirementsId" class="form-control" rows="4"></textarea>
                        </div>

                        <!-- What You Learn -->
                        <div class="mb-3">
                            <label class="form-label">What You Will Learn (Bullet Points)</label>
                            <textarea id="CourseLearnId" class="form-control" rows="4"></textarea>
                        </div>

                        <!-- SEO -->
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

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select id="CourseStatusId" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="mt-3">
                            <button type="button" id="idAddCourseSubmit" class="btn btn-primary">Save Course</button>
                            <a href="adminCourseManagement.php" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </section>

</main>

<?php include_once "cdn_admin_footer.php"; ?>

<!-- Course Manager Controller -->
<script src="controller/courseManagerController.js"></script>
