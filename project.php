<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Our Projects</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Our Projects</li>
            </ul>
        </div>
    </div>
</div>
<section class="space">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_1.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p1"></div>
                            <h3 class="box-title"><a href="project-details.php">IT Consultency</a></h3>
                            <p class="project-subtitle">Technology</p><a href="assets/img/project/project_1_1.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_2.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p2"></div>
                            <h3 class="box-title"><a href="project-details.php">Web Development</a></h3>
                            <p class="project-subtitle">Technology</p><a href="assets/img/project/project_1_2.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_3.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p3"></div>
                            <h3 class="box-title"><a href="project-details.php">Website Design</a></h3>
                            <p class="project-subtitle">Technology</p><a href="assets/img/project/project_1_3.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_4.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p4"></div>
                            <h3 class="box-title"><a href="project-details.php">SEO Optimization</a></h3>
                            <p class="project-subtitle">Marketing</p><a href="assets/img/project/project_1_4.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_5.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p5"></div>
                            <h3 class="box-title"><a href="project-details.php">Digital Marketing</a></h3>
                            <p class="project-subtitle">Marketing</p><a href="assets/img/project/project_1_5.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_6.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p6"></div>
                            <h3 class="box-title"><a href="project-details.php">Business Analysis</a></h3>
                            <p class="project-subtitle">Business</p><a href="assets/img/project/project_1_6.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_7.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p7"></div>
                            <h3 class="box-title"><a href="project-details.php">Software Service</a></h3>
                            <p class="project-subtitle">Technology</p><a href="assets/img/project/project_1_7.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_8.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p8"></div>
                            <h3 class="box-title"><a href="project-details.php">Data Recovery</a></h3>
                            <p class="project-subtitle">Technology</p><a href="assets/img/project/project_1_8.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-img"><img src="assets/img/project/project_1_9.jpg" alt="project image">
                    </div>
                    <div class="project-content-wrap">
                        <div class="project-content">
                            <div class="box-particle" id="project-p9"></div>
                            <h3 class="box-title"><a href="project-details.php">Cloud Computing</a></h3>
                            <p class="project-subtitle">Technology</p><a href="assets/img/project/project_1_9.jpg"
                                class="icon-btn popup-image"><i class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-mockup" data-top="0%" data-right="0%"><img src="assets/img/shape/tech_shape_1.png"
            alt="shape"></div>
    <div class="shape-mockup" data-bottom="0%" data-left="0%"><img src="assets/img/shape/tech_shape_2.png"
            alt="shape"></div>
</section>
<footer class="footer-wrapper footer-layout1">
    <div class="footer-top">
        <div class="logo-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <div class="footer-logo"><a class="icon-masking" href="index.php"><span
                                data-mask-src="assets/img/logo-white.svg" class="mask-icon"></span><img
                                src="assets/img/logo-white.svg" alt="Webteck"></a></div>
                </div>
                <div class="col-xl-9">
                    <div class="footer-contact-wrap">
                        <div class="footer-contact">
                            <div class="footer-contact_icon"><i class="fas fa-phone"></i></div>
                            <div class="media-body"><span class="footer-contact_text">Quick Call Us:</span> <a
                                    href="tel:+19088000393" class="footer-contact_link">+190-8800-0393</a></div>
                        </div>
                        <div class="footer-contact">
                            <div class="footer-contact_icon"><i class="fas fa-envelope"></i></div>
                            <div class="media-body"><span class="footer-contact_text">Mail Us On:</span> <a
                                    href="mailto:info@webteck.com" class="footer-contact_link">info@webteck.com</a>
                            </div>
                        </div>
                        <div class="footer-contact">
                            <div class="footer-contact_icon"><i class="fas fa-location-dot"></i></div>
                            <div class="media-body"><span class="footer-contact_text">Visit Location:</span> <a
                                    href="https://www.google.com/maps" class="footer-contact_link">54 Flemington,
                                    USA</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xxl-3 col-xl-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">About Company</h3>
                        <div class="th-widget-about">
                            <p class="about-text">Professionally redefine transparent ROI through low-risk
                                high-yield imperatives. Progressively create empowered. cost effective users via
                                team driven.</p>
                            <div class="th-social"><a href="https://www.facebook.com/"><i
                                        class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i
                                        class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin-in"></i></a> <a href="https://www.whatsapp.com/"><i
                                        class="fab fa-whatsapp"></i></a> <a href="https://www.youtube.com/"><i
                                        class="fab fa-youtube"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Quick Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="team.php">Meet Our Team</a></li>
                                <li><a href="project.php">Our Projects</a></li>
                                <li><a href="faq.php">Help & FAQs</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">IT SERVICES</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="service-details.php">Web Development</a></li>
                                <li><a href="service-details.php">Business Development</a></li>
                                <li><a href="service-details.php">Product Management</a></li>
                                <li><a href="service-details.php">UI/UX Design</a></li>
                                <li><a href="service-details.php">Cloud services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">
                            <div class="recent-post">
                                <div class="media-img"><a href="blog-details.php"><img
                                            src="assets/img/blog/recent-post-2-1.jpg" alt="Blog Image"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.php">Unsatiable entreaties may collecting Power.</a>
                                    </h4>
                                    <div class="recent-post-meta"><a href="blog.php"><i
                                                class="fal fa-calendar-days"></i>21 June, 2025</a></div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img"><a href="blog-details.php"><img
                                            src="assets/img/blog/recent-post-2-2.jpg" alt="Blog Image"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit" href="blog-details.php">Regional
                                            Manager limited time management.</a></h4>
                                    <div class="recent-post-meta"><a href="blog.php"><i
                                                class="fal fa-calendar-days"></i>22 June, 2025</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap bg-title">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2025 <a
                            href="https://themeforest.net/user/themeholy">Themeholy</a>. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 text-end d-none d-lg-block">
                    <div class="footer-links">
                        <ul>
                            <li><a href="about.php">Terms & Condition</a></li>
                            <li><a href="about.php">Careers</a></li>
                            <li><a href="about.php">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-left"><img src="assets/img/shape/footer_shape_2.svg" alt="shape"></div>
    <div class="shape-right">
        <div class="particle-1" id="particle-5"></div>
    </div>
</footer>
<div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg></div>
<script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/circle-progress.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script src="assets/js/gsap.min.js"></script>
<script src="assets/js/ScrollTrigger.min.js"></script>
<script src="assets/js/smooth-scroll.js"></script>
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/particles-config.js"></script>
<script src="assets/js/imageRevealHover.js"></script>
<script src="assets/js/main.js"></script>
</body>
<!-- Mirrored from html.themehour.net/webteck/demo/project.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Nov 2025 13:10:32 GMT -->

</html>