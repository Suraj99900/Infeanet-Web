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

    // Init TinyMCE for Blog Content
    tinymce.init({
        selector: '#BlogContentEditor',
        plugins: 'anchor autolink autosave charmap codesample directionality emoticons fullscreen help image importcss link lists media nonbreaking pagebreak preview quickbars save searchreplace table visualblocks visualchars wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | fullscreen preview | searchreplace | removeformat',
        menubar: 'file edit view insert format tools table help',
        tinycomments_mode: 'embedded',
        tinycomments_author: sUserName,
        height: 600,
        hidden_input: false,
        promotion: false,
    });
</script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="adminBlogManagement.php">Blog Management</a></li>
                <li class="breadcrumb-item active">Add Blog</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-4">
                    <h4>Create New Blog</h4>
                    <hr>

                    <form id="addBlogForm">

                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" id="BlogAuthorId" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Blog Title</label>
                            <input type="text" id="BlogTitleId" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Blog Slug</label>
                            <input type="text" id="BlogSlugId" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" id="BlogCategoryId" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Blog Image</label>
                            <input type="file" id="BlogImageId" name="blog_image"
                                class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Blog Content</label>
                            <textarea id="BlogContentEditor"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Whatsapp Link</label>
                            <input type="text" id="BlogWhatsappId" class="form-control">
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
                            <select id="BlogStatusId" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <button type="button" id="idAddBlogSubmit" class="btn btn-primary">Save Blog</button>
                            <a href="blogManagement.php" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </section>


</main>

<?php include_once "cdn_admin_footer.php"; ?>

<script src="controller/blogManagerController.js"></script>