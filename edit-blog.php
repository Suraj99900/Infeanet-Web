<?php
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

if (!$oSessionManager->isLoggedIn) {
    header("Location: pages-login.php", true, 301);
    exit;
} else {
    $iUserID = $oSessionManager->iUserID;
    $sUserName = $oSessionManager->sUserName ?? "Admin";
}

$blogId = $_GET['id'] ?? 0;

include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<script>
    var sUserName = "<?php echo $sUserName; ?>";
    tinymce.init({
        selector: "#blogContent, #updateBlogContent",
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
        <h1>Update Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="adminBlogManagement.php">Blog Management</a></li>
                <li class="breadcrumb-item active">Update Blog</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card p-4">

            <form id="updateBlogForm" enctype="multipart/form-data">

                <input type="hidden" id="blogId" value="<?= $blogId ?>">

                <!-- AUTHOR -->
                <div class="mb-3">
                    <label>Author</label>
                    <input type="text" id="updateBlogAuthor" class="form-control">
                </div>

                <!-- TITLE -->
                <div class="mb-3">
                    <label>Blog Title</label>
                    <input type="text" id="updateBlogTitle" class="form-control">
                </div>

                <!-- SLUG -->
                <div class="mb-3">
                    <label>Blog Slug</label>
                    <input type="text" id="updateBlogSlug" class="form-control">
                </div>

                <!-- CATEGORY -->
                <div class="mb-3">
                    <label>Category</label>
                    <input type="text" id="updateBlogCategory" class="form-control">
                </div>

                <!-- IMAGE -->
                <div class="mb-3">
                    <label>Blog Image</label>
                    <input type="file" id="updateBlogImage" class="form-control" accept="image/*">
                    <img id="blogImagePreview" src="" style="max-width: 220px; margin-top:10px; display:none;border-radius:10px;">
                </div>

                <!-- CONTENT -->
                <div class="mb-3">
                    <label>Blog Content</label>
                    <textarea id="updateBlogContent" class="form-control"></textarea>
                </div>

                <!-- WHATSAPP -->
                <div class="mb-3">
                    <label>WhatsApp Link</label>
                    <input type="text" id="updateBlogWhatsapp" class="form-control">
                </div>

                <!-- SEO TITLE -->
                <div class="mb-3">
                    <label>SEO Title</label>
                    <input type="text" id="updateSEOTitle" class="form-control">
                </div>

                <!-- SEO KEYWORDS -->
                <div class="mb-3">
                    <label>SEO Keywords</label>
                    <input type="text" id="updateSEOKeywords" class="form-control">
                </div>

                <!-- SEO DESCRIPTION -->
                <div class="mb-3">
                    <label>SEO Description</label>
                    <textarea id="updateSEODesc" class="form-control" rows="3"></textarea>
                </div>

                <!-- STATUS -->
                <div class="mb-3">
                    <label>Status</label>
                    <select id="updateBlogStatus" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="blogManagement.php" class="btn btn-secondary">Cancel</a>

            </form>

        </div>
    </section>
</main>

<?php include_once "cdn_admin_footer.php"; ?>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const id = document.getElementById("blogId").value;

    // ---------------------------
    // FETCH BLOG DATA
    // ---------------------------
    $.ajax({
        url: "ajaxFile/blogAjax.php",
        method: "GET",
        data: { sFlag: "fetchById", id: id },
        dataType: "json",
        success: function(res) {

            if (res.status === "success") {

                let b = res.data;

                $("#updateBlogAuthor").val(b.author_name);
                $("#updateBlogTitle").val(b.blog_title);
                $("#updateBlogSlug").val(b.blog_slug);
                $("#updateBlogCategory").val(b.blog_category);
                $("#updateBlogWhatsapp").val(b.whatsapp_link);
                $("#updateSEOTitle").val(b.seo_title);
                $("#updateSEOKeywords").val(b.seo_keywords);
                $("#updateSEODesc").val(b.seo_description);
                $("#updateBlogStatus").val(b.blog_status);

                // Load TinyMCE content
                let editorCheck = setInterval(() => {
                    let ed = tinymce.get("updateBlogContent");
                    if (ed) {
                        ed.setContent(b.blog_content);
                        clearInterval(editorCheck);
                    }
                }, 200);

                // Load Image Preview
                if (b.blog_image) {
                    $("#blogImagePreview").attr("src", b.blog_image).show();
                }

            } else {
                alert("Unable to load blog details");
            }
        }
    });

    // ---------------------------
    // IMAGE PREVIEW
    // ---------------------------
    document.getElementById("updateBlogImage").onchange = function(e) {
        let img = document.getElementById("blogImagePreview");
        img.src = URL.createObjectURL(e.target.files[0]);
        img.style.display = "block";
    };

    // ---------------------------
    // SUBMIT UPDATE FORM
    // ---------------------------
    document.getElementById("updateBlogForm").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData();
        formData.append("sFlag", "updateBlog");
        formData.append("id", id);
        formData.append("author_name", $("#updateBlogAuthor").val());
        formData.append("title", $("#updateBlogTitle").val());
        formData.append("slug", $("#updateBlogSlug").val());
        formData.append("category", $("#updateBlogCategory").val());
        formData.append("content", tinymce.get("updateBlogContent").getContent());
        formData.append("whatsapp", $("#updateBlogWhatsapp").val());
        formData.append("seo_title", $("#updateSEOTitle").val());
        formData.append("seo_keywords", $("#updateSEOKeywords").val());
        formData.append("seo_description", $("#updateSEODesc").val());
        formData.append("status", $("#updateBlogStatus").val());

        // Image
        let file = document.getElementById("updateBlogImage").files[0];
        if (file) formData.append("blog_image", file);

        fetch("ajaxFile/blogAjax.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            alert(res.message);
            if (res.status === "success") {
                window.location.href = "adminBlogManagement.php";
            }
        });
    });

});
</script>
