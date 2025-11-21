<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Wishlist</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </div>
</div>
<div class="space">
    <div class="container">
        <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
            <div class="tinv-header">
                <h2 class="mb-30">Wishlist</h2>
            </div>
            <form action="#" method="post" autocomplete="off">
                <table class="tinvwl-table-manage-list">
                    <thead>
                        <tr>
                            <th class="product-cb"><input type="checkbox" class="global-cb"
                                    title="Select all for bulk action"></th>
                            <th class="product-remove"></th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name"><span class="tinvwl-full">Product Name</span><span
                                    class="tinvwl-mobile">Product</span></th>
                            <th class="product-price">Unit Price</th>
                            <th class="product-date">Date Added</th>
                            <th class="product-stock">Stock Status</th>
                            <th class="product-action">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="wishlist_item">
                            <td class="product-cb"><input type="checkbox" name="wishlist_pr[]" value="58"
                                    title="Select for bulk action"></td>
                            <td class="product-remove"><button type="submit" name="tinvwl-remove" value="58"
                                    title="Remove"><i class="fal fa-times"></i></button></td>
                            <td class="product-thumbnail"><a href="shop-details.php"><img
                                        src="assets/img/product/product_thumb_1_1.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                        alt="image"></a></td>
                            <td class="product-name"><a href="shop-details.php">Gaming Computer</a></td>
                            <td class="product-price"><span class="woocommerce-Price-amount amount"><bdi><span
                                            class="woocommerce-Price-currencySymbol">$</span>45.00</bdi></span></td>
                            <td class="product-date"><time class="entry-date"
                                    datetime="2021-11-21 03:54:24">November 21, 2021</time></td>
                            <td class="product-stock">
                                <p class="stock in-stock"><span><i class="fas fa-check"></i></span><span
                                        class="tinvwl-txt">In stock</span></p>
                            </td>
                            <td class="product-action"><button class="button th-btn" name="tinvwl-add-to-cart"
                                    value="58" title="Add to Cart"><i class="fal fa-shopping-cart"></i><span
                                        class="tinvwl-txt">Add to Cart</span></button></td>
                        </tr>
                        <tr class="wishlist_item">
                            <td class="product-cb"><input type="checkbox" name="wishlist_pr[]" value="60"
                                    title="Select for bulk action"></td>
                            <td class="product-remove"><button type="submit" name="tinvwl-remove" value="60"
                                    title="Remove"><i class="fal fa-times"></i></button></td>
                            <td class="product-thumbnail"><a href="shop-details.php"><img
                                        src="assets/img/product/product_thumb_1_2.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                        alt="image"></a></td>
                            <td class="product-name"><a href="shop-details.php">Smartphone Vivo V9</a></td>
                            <td class="product-price"><ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>18.00</bdi></span></ins>
                                <del><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>20.00</bdi></span></del>
                            </td>
                            <td class="product-date"><time class="entry-date"
                                    datetime="2021-11-21 03:54:24">November 21, 2021</time></td>
                            <td class="product-stock">
                                <p class="stock in-stock"><span><i class="fas fa-check"></i></span><span
                                        class="tinvwl-txt">In stock</span></p>
                            </td>
                            <td class="product-action"><button class="button th-btn" name="tinvwl-add-to-cart"
                                    value="60" title="Add to Cart"><i class="fal fa-shopping-cart"></i><span
                                        class="tinvwl-txt">Add to Cart</span></button></td>
                        </tr>
                        <tr class="wishlist_item">
                            <td class="product-cb"><input type="checkbox" name="wishlist_pr[]" value="60"
                                    title="Select for bulk action"></td>
                            <td class="product-remove"><button type="submit" name="tinvwl-remove" value="60"
                                    title="Remove"><i class="fal fa-times"></i></button></td>
                            <td class="product-thumbnail"><a href="shop-details.php"><img
                                        src="assets/img/product/product_thumb_1_3.jpg"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                        alt="image"></a></td>
                            <td class="product-name"><a href="shop-details.php">SanDisk Flash Drive</a></td>
                            <td class="product-price"><ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>18.00</bdi></span></ins>
                                <del><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>20.00</bdi></span></del>
                            </td>
                            <td class="product-date"><time class="entry-date"
                                    datetime="2021-11-21 03:54:24">November 21, 2021</time></td>
                            <td class="product-stock">
                                <p class="stock in-stock"><span><i class="fas fa-check"></i></span><span
                                        class="tinvwl-txt">In stock</span></p>
                            </td>
                            <td class="product-action"><button class="button th-btn" name="tinvwl-add-to-cart"
                                    value="60" title="Add to Cart"><i class="fal fa-shopping-cart"></i><span
                                        class="tinvwl-txt">Add to Cart</span></button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="social-buttons"><span>Share on</span>
                <ul>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=permalink"
                            class="social social-facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li><a href="https://twitter.com/share?url=permalink" class="social social-twitter"
                            title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="http://pinterest.com/pin/create/button/?url=permalink"
                            class="social social-pinterest" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    </li>
                    <li><a href="https://api.whatsapp.com/send?text=permalink" class="social social-whatsapp"
                            title="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a href="http://vecurosoft.com/products/wordpress/foodelio/wishlist/974b61/"
                            class="social social-clipboard" title="Clipboard"><i class="far fa-clipboard"></i></a>
                    </li>
                    <li><a href="mailto:?body=permalink" class="social social-email" title="Email"><i
                                class="far fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
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
<!-- Mirrored from html.themehour.net/webteck/demo/wishlist.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Nov 2025 13:10:32 GMT -->

</html>