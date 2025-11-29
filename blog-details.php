<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

$blogId = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

<style>
    /* Perfect responsive image */
    #blogImage {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 12px;
    }

    .recent-post img {
        width: 100px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    .recent-post {
        display: flex;
        gap: 12px;
        margin-bottom: 15px;
        align-items: center;
    }

    .widget_categories li a {
        font-size: 15px;
        padding: 6px 0;
        display: block;
        color: #444;
        transition: 0.3s;
    }

    .widget_categories li a:hover {
        color: #0057ff;
        padding-left: 5px;
    }

    .blog-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    #whatsappLink {
        font-size: 16px;
        background: #25D366;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        color: #fff;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }

    #whatsappLink:hover {
        background: #1ebc59;
    }
</style>


<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" id="BlogTitleId">Blog Details</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
</div>

<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row">

            <!-- LEFT SECTION (BLOG CONTENT) -->
            <div class="col-xxl-8 col-lg-7">
                <div class="th-blog blog-single">

                    <img id="blogImage" src="assets/img/blog/default.jpg" alt="Blog Image">

                    <div class="blog-content mt-4">

                        <div class="blog-meta mb-2">
                            <span class="author"><img src="assets/img/blog/author-1-1.png"> <span id="blogAuthor"></span></span>
                            <span class="ms-3"><i class="fa-light fa-calendar-days"></i> <span id="blogDate"></span></span>
                            <span class="ms-3">Category: <strong id="blogCategory"></strong></span>
                        </div>

                        <h2 id="blogTitle" class="blog-title"></h2>

                        <!-- Hidden SEO values -->
                        <div style="display:none;">
                            <span id="blogSlug"></span>
                            <span id="seoTitle"></span>
                            <span id="seoKeywords"></span>
                            <span id="seoDescription"></span>
                        </div>

                        <div id="blogContent" class="mt-3"></div>

                        <!-- WhatsApp Button -->
                        <div class="mt-4">
                            <a href="#" id="whatsappLink" target="_blank">
                                <i class="fab fa-whatsapp"></i> Contact on WhatsApp
                            </a>
                        </div>
                    </div>

                </div>
            </div>



            <!-- RIGHT SIDEBAR -->
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">

                    <!-- CATEGORIES -->
                    <div class="widget widget_categories">
                        <h3 class="widget_title">Categories</h3>
                        <ul id="categoryList"></ul>
                    </div>

                    <!-- RECENT POSTS -->
                    <div class="widget mt-4">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div id="recentPosts"></div>
                    </div>

                </aside>
            </div>

        </div>
    </div>
</section>

<?php include_once ABS_PATH_TO_PROJECT . 'CDN_Footer.php'; ?>
<script src="controller/blog.js"></script>

<script>
$(document).ready(function () {

    let blogId = "<?= $blogId ?>";

    /* ---------------------------------------------------
       1. LOAD BLOG DETAILS
    ---------------------------------------------------- */
    $.ajax({
        url: "ajaxFile/blogAjax.php",
        type: "POST",
        data: { sFlag: "getBlogById", id: blogId },
        dataType: "json",
        success: function (res) {

            if (res.status === "success") {
                let b = res.data;

                $("#BlogTitleId").text(b.blog_title);
                $("#blogTitle").text(b.blog_title);

                $("#blogAuthor").text(b.author_name ?? "Admin");
                $("#blogCategory").text(b.blog_category);
                $("#blogDate").text(b.added_on);
                $("#blogContent").html(b.blog_content);

                $("#blogSlug").text(b.blog_slug);
                $("#seoTitle").text(b.seo_title);
                $("#seoKeywords").text(b.seo_keywords);
                $("#seoDescription").text(b.seo_description);

                $("#blogImage").attr("src", b.blog_image || "assets/img/blog/default.jpg");

                // WhatsApp Link
                if (b.whatsapp_link) {
                    $("#whatsappLink").attr("href", b.whatsapp_link);
                }
            }
        }
    });


    /* ---------------------------------------------------
        2. LOAD CATEGORIES
    ---------------------------------------------------- */
    $.ajax({
        url: "ajaxFile/blogAjax.php",
        type: "POST",
        data: { sFlag: "categories" },
        dataType: "json",
        success: function (res) {
            if (res.status === "success") {
                let html = "";
                $.each(res.data, function (i, cat) {
                    html += `<li><a href="blog.php?category=${cat.blog_category}">${cat.blog_category}</a></li>`;
                });
                $("#categoryList").html(html);
            }
        }
    });


    /* ---------------------------------------------------
        3. LOAD RECENT POSTS
    ---------------------------------------------------- */
    $.ajax({
        url: "ajaxFile/blogAjax.php",
        type: "POST",
        data: { sFlag: "recent", limit: 5 },
        dataType: "json",
        success: function (res) {

            if (res.status === "success") {

                let html = "";

                $.each(res.data, function (i, r) {
                    let img = r.blog_image || "assets/img/blog/default.jpg";

                    html += `
                        <div class="recent-post">
                            <img src="${img}">
                            <div>
                                <h6 class="post-title" style="font-size:15px; margin-bottom:5px;">
                                    <a href="blog-details.php?id=${r.id}" class="text-inherit">${r.blog_title}</a>
                                </h6>
                                <div class="recent-post-meta">
                                    <i class="fal fa-calendar-days"></i> ${r.added_on}
                                </div>
                            </div>
                        </div>`;
                });

                $("#recentPosts").html(html);
            }
        }
    });

});
</script>
