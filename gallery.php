<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>
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
        <div class="row gy-4">
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_1.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_1.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_2.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_2.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_3.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_3.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_4.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_4.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_7.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_7.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_5.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_5.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_6.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_6.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_8.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_8.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="gallery-card">
                    <div class="gallery-img"><img src="assets/img/gallery/gallery_1_9.jpg" alt="gallery image"> <a href="assets/img/gallery/gallery_1_9.jpg" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                </div>
            </div>
        </div>
        <div class="th-pagination mt-5 text-center">
            <ul>
                <li><a href="blog.php">1</a></li>
                <li><a href="blog.php">2</a></li>
                <li><a href="blog.php">3</a></li>
                <li><a href="blog.php"><i class="far fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<?php include_once "CDN_Footer.php" ?>