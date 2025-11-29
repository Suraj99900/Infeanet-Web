<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';
?>

<style>
    /* Gallery Styling */
    .gallery-card {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 8px 22px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        background: #fff;
    }

    .gallery-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    .gallery-img {
        position: relative;
        overflow: hidden;
    }

    .gallery-img img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        border-radius: 12px;
        transition: all 0.4s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.1);
        filter: brightness(80%);
    }

    /* Overlay Button */
    .gallery-overlay-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.3);
        background: rgba(255, 255, 255, 0.9);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .gallery-card:hover .gallery-overlay-btn {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    .gallery-overlay-btn i {
        font-size: 24px;
        color: #111;
    }

    .gallery-title {
        text-align: center;
        font-size: 16px;
        margin-top: 12px;
        font-weight: 600;
    }

    .gallery-tagline {
        text-align: center;
        font-size: 13px;
        color: #555;
        margin-top: -4px;
        margin-bottom: 10px;
    }

</style>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Gallery</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</div>

<div class="space-top space-extra-bottom">
    <div class="container">

        <!-- Gallery Loader -->
        <div class="text-center py-5" id="galleryLoader">
            <div class="spinner-border text-primary"></div>
            <p class="mt-2">Loading gallery...</p>
        </div>

        <!-- Gallery Grid -->
        <div class="row gy-4" id="galleryList"></div>

    </div>
</div>

<?php include_once "CDN_Footer.php"; ?>

<script src="controller/galleryManagerController.js"></script>
