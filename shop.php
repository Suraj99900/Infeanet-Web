<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Shop</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.html">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </div>
</div>
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-xl-9 col-lg-8">
                <div class="th-sort-bar">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md">
                            <p class="woocommerce-result-count">Showing 1–9 of 16 results</p>
                        </div>
                        <div class="col-md-auto">
                            <form class="woocommerce-ordering" method="get"><select name="orderby" class="orderby"
                                    aria-label="Shop order">
                                    <option value="menu_order" selected="selected">Default Sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select></form>
                        </div>
                    </div>
                </div>
                <div class="row gy-40">
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_1.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">Gaming Computer</a></h3><span
                                    class="price">$370.85</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_2.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">Smartphone Vivo V9</a></h3>
                                <span class="price">$390.85</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_3.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">SanDisk Flash Drive</a></h3>
                                <span class="price">$360.85</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_4.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">Smart Power Bank</a></h3><span
                                    class="price">$380.85<del>$650.99</del></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_5.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">Apple Smartwatch</a></h3><span
                                    class="price">$320.85</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_6.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">Computer Gamer Mouse</a></h3>
                                <span class="price">$300.85</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_7.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">Bluetooth Loudspeaker</a></h3>
                                <span class="price">$320.85</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_8.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">G-Technology G-Drive</a></h3>
                                <span class="price">$300.85</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img"><img src="assets/img/product/product_1_9.jpg"
                                    alt="Product Image">
                                <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                            class="far fa-eye"></i></a> <a href="cart.php" class="icon-btn"><i
                                            class="far fa-cart-plus"></i></a> <a href="wishlist.php"
                                        class="icon-btn"><i class="far fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated
                                        <strong class="rating">5.00</strong> out of 5 based on <span
                                            class="rating">1</span> customer rating</span></div>
                                <h3 class="product-title"><a href="shop-details.php">Ultraviolet Battery</a></h3>
                                <span class="price">$320.85</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="th-pagination text-center pt-50">
                    <ul>
                        <li><a href="blog.php">1</a></li>
                        <li><a href="blog.php">2</a></li>
                        <li><a href="blog.php">3</a></li>
                        <li><a href="blog.php"><i class="far fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <aside class="sidebar-area sidebar-shop">
                    <div class="widget widget_search">
                        <form class="search-form"><input type="text" placeholder="Enter Keyword"> <button
                                type="submit"><i class="far fa-search"></i></button></form>
                    </div>
                    <div class="widget widget_categories">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            <li><a href="blog.php">IT Solution</a></li>
                            <li><a href="blog.php">SEO Marketing</a></li>
                            <li><a href="blog.php">Web Development</a></li>
                            <li><a href="blog.php">Cloud Solution</a></li>
                            <li><a href="blog.php">Network Marketing</a></li>
                            <li><a href="blog.php">UI/UX Design</a></li>
                        </ul>
                    </div>
                    <div class="widget widget_price_filter">
                        <h4 class="widget_title">Filter By Price</h4>
                        <div class="price_slider_wrapper">
                            <div class="price_label">Price: <span class="from">$0</span> — <span
                                    class="to">$70</span></div>
                            <div class="price_slider"></div><button type="submit" class="button">Filter</button>
                        </div>
                    </div>
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget_title">Tags</h3>
                        <div class="tagcloud"><a href="blog.php">Bride</a> <a href="blog.php">Celebration</a> <a
                                href="blog.php">Groom</a> <a href="blog.php">Wedding</a> <a
                                href="blog.php">Photo</a> <a href="blog.php">Dress</a></div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<footer class="footer-wrapper footer-layout1">
    <div class="footer-top">
        <div class="logo-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <div class="footer-logo"><a class="icon-masking" href="index.html"><span
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
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="team.html">Meet Our Team</a></li>
                                <li><a href="project.html">Our Projects</a></li>
                                <li><a href="faq.html">Help & FAQs</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">IT SERVICES</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="service-details.html">Web Development</a></li>
                                <li><a href="service-details.html">Business Development</a></li>
                                <li><a href="service-details.html">Product Management</a></li>
                                <li><a href="service-details.html">UI/UX Design</a></li>
                                <li><a href="service-details.html">Cloud services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">
                            <div class="recent-post">
                                <div class="media-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/recent-post-2-1.jpg" alt="Blog Image"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit"
                                            href="blog-details.html">Unsatiable entreaties may collecting Power.</a>
                                    </h4>
                                    <div class="recent-post-meta"><a href="blog.php"><i
                                                class="fal fa-calendar-days"></i>21 June, 2025</a></div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/recent-post-2-2.jpg" alt="Blog Image"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Regional
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
                            <li><a href="about.html">Terms & Condition</a></li>
                            <li><a href="about.html">Careers</a></li>
                            <li><a href="about.html">Privacy Policy</a></li>
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
<!-- Mirrored from html.themehour.net/webteck/demo/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Nov 2025 13:10:31 GMT -->

</html>