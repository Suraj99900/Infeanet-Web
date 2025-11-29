<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>
<style>
    .fade-up {
        opacity: 0;
        transform: translateY(25px);
        animation: fadeUp 0.5s ease forwards;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Skeleton Loader */
    .blog-skeleton {
        background: #f6f6f6;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 25px;
        animation: pulse 1.5s infinite;
    }

    .skeleton-img {
        height: 180px;
        background: #e3e3e3;
        border-radius: 10px;
    }

    .skeleton-title {
        height: 22px;
        width: 70%;
        background: #e0e0e0;
        margin-top: 15px;
    }

    .skeleton-text {
        height: 16px;
        width: 100%;
        margin-top: 10px;
        background: #e0e0e0;
    }

    @keyframes pulse {
        0% {
            opacity: 0.6;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0.6;
        }
    }

    /* Blog Card UI */
    .blog-card {
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: 0.3s;
    }

    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .blog-card-img img {
        width: 100%;
        border-bottom: 1px solid #f1f1f1;
    }

    .blog-card-content {
        padding: 20px;
    }

    .blog-meta {
        color: #777;
        margin-bottom: 10px;
    }

    .blog-title a {
        font-size: 22px;
        font-weight: bold;
    }

    .blog-readmore {
        margin-top: 15px;
        display: inline-block;
        font-weight: 600;
        color: var(--th-primary);
    }

    .fadeIn {
        opacity: 0;
        animation: fadeInSmooth 0.5s forwards;
    }

    .delay-0 {
        animation-delay: .1s;
    }

    .delay-1 {
        animation-delay: .2s;
    }

    .delay-2 {
        animation-delay: .3s;
    }

    .delay-3 {
        animation-delay: .4s;
    }

    @keyframes fadeInSmooth {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Blog Post</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Blog Post</li>
            </ul>
        </div>
    </div>
</div>
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <!-- LEFT SIDE BLOG LIST -->
            <div class="col-xxl-8 col-lg-7">

                <!-- Dynamic Blogs Will Load Here -->
                <div id="blogContainer"></div>

                <div class="th-pagination text-center">
                    <ul id="paginationArea"></ul>
                </div>
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">

                    <div class="widget widget_search">
                        <form class="search-form">
                            <input type="text" placeholder="Enter Keyword">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    <div class="widget widget_categories">
                        <h3 class="widget_title">Categories</h3>
                        <ul id="categoryList"></ul>
                    </div>

                    <div class="widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap" id="recentPosts"></div>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</section>
<?php
include_once ABS_PATH_TO_PROJECT . 'CDN_Footer.php';
?>

<script src="controller/blog.js"></script>