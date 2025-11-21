<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Checkout</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>
<div class="th-checkout-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="woocommerce-form-login-toggle">
            <div class="woocommerce-info">Returning customer? <a href="#" class="showlogin">Click here to login</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="#" class="woocommerce-form-login">
                    <div class="form-group"><label>Username or email *</label> <input type="text"
                            class="form-control" placeholder="Username or email"></div>
                    <div class="form-group"><label>Password *</label> <input type="text" class="form-control"
                            placeholder="Password"></div>
                    <div class="form-group">
                        <div class="custom-checkbox"><input type="checkbox" id="remembermylogin"> <label
                                for="remembermylogin">Remember Me</label></div>
                    </div>
                    <div class="form-group"><button type="submit" class="th-btn">Login</button>
                        <p class="fs-xs mt-2 mb-0"><a class="text-reset" href="#">Lost your password?</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="woocommerce-form-coupon-toggle">
            <div class="woocommerce-info">Have a coupon? <a href="#" class="showcoupon">Click here to enter your
                    code</a></div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="#" class="woocommerce-form-coupon">
                    <div class="form-group"><label>Coupon code</label> <input type="text" class="form-control"
                            placeholder="Write your coupon code"></div>
                    <div class="form-group"><button type="submit" class="th-btn">Apply coupon</button></div>
                </form>
            </div>
        </div>
        <form action="#" class="woocommerce-checkout mt-40">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="h4">Billing Details</h2>
                    <div class="row">
                        <div class="col-12 form-group"><select class="form-select">
                                <option>United Kingdom (UK)</option>
                                <option>United State (US)</option>
                                <option>Equatorial Guinea (GQ)</option>
                                <option>Australia (AU)</option>
                                <option>Germany (DE)</option>
                            </select></div>
                        <div class="col-md-6 form-group"><input type="text" class="form-control"
                                placeholder="First Name"></div>
                        <div class="col-md-6 form-group"><input type="text" class="form-control"
                                placeholder="Last Name"></div>
                        <div class="col-12 form-group"><input type="text" class="form-control"
                                placeholder="Your Company Name"></div>
                        <div class="col-12 form-group"><input type="text" class="form-control"
                                placeholder="Street Address"> <input type="text" class="form-control"
                                placeholder="Apartment, suite, unit etc. (optional)"></div>
                        <div class="col-12 form-group"><input type="text" class="form-control"
                                placeholder="Town / City"></div>
                        <div class="col-md-6 form-group"><input type="text" class="form-control"
                                placeholder="Country"></div>
                        <div class="col-md-6 form-group"><input type="text" class="form-control"
                                placeholder="Postcode / Zip"></div>
                        <div class="col-12 form-group"><input type="text" class="form-control"
                                placeholder="Email Address"> <input type="text" class="form-control"
                                placeholder="Phone number"></div>
                        <div class="col-12 form-group"><input type="checkbox" id="accountNewCreate"> <label
                                for="accountNewCreate">Creat An Account?</label></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p id="ship-to-different-address"><input id="ship-to-different-address-checkbox" type="checkbox"
                            name="ship_to_different_address" value="1" checked="checked"> <label
                            for="ship-to-different-address-checkbox">Ship to a different address? <span
                                class="checkmark"></span></label></p>
                    <div class="shipping_address">
                        <div class="row">
                            <div class="col-12 form-group"><select class="form-select">
                                    <option>United Kingdom (UK)</option>
                                    <option>United State (US)</option>
                                    <option>Equatorial Guinea (GQ)</option>
                                    <option>Australia (AU)</option>
                                    <option>Germany (DE)</option>
                                </select></div>
                            <div class="col-md-6 form-group"><input type="text" class="form-control"
                                    placeholder="First Name"></div>
                            <div class="col-md-6 form-group"><input type="text" class="form-control"
                                    placeholder="Last Name"></div>
                            <div class="col-12 form-group"><input type="text" class="form-control"
                                    placeholder="Your Company Name"></div>
                            <div class="col-12 form-group"><input type="text" class="form-control"
                                    placeholder="Street Address"> <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit etc. (optional)"></div>
                            <div class="col-12 form-group"><input type="text" class="form-control"
                                    placeholder="Town / City"></div>
                            <div class="col-md-6 form-group"><input type="text" class="form-control"
                                    placeholder="Country"></div>
                            <div class="col-md-6 form-group"><input type="text" class="form-control"
                                    placeholder="Postcode / Zip"></div>
                            <div class="col-12 form-group"><input type="text" class="form-control"
                                    placeholder="Email Address"> <input type="text" class="form-control"
                                    placeholder="Phone number"></div>
                        </div>
                    </div>
                    <div class="col-12 form-group"><textarea cols="20" rows="5" class="form-control"
                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea></div>
                </div>
            </div>
        </form>
        <h4 class="mt-4 pt-lg-2">Your Order</h4>
        <form action="#" class="woocommerce-cart-form">
            <table class="cart_table mb-20">
                <thead>
                    <tr>
                        <th class="cart-col-image">Image</th>
                        <th class="cart-col-productname">Product Name</th>
                        <th class="cart-col-price">Price</th>
                        <th class="cart-col-quantity">Quantity</th>
                        <th class="cart-col-total">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cart_item">
                        <td data-title="Product"><a class="cart-productimage" href="shop-details.php"><img
                                    width="91" height="91" src="assets/img/product/product_thumb_1_1.jpg"
                                    alt="Image"></a></td>
                        <td data-title="Name"><a class="cart-productname" href="shop-details.php">Gaming
                                Computer</a></td>
                        <td data-title="Price"><span class="amount"><bdi><span>$</span>18</bdi></span></td>
                        <td data-title="Quantity"><strong class="product-quantity">01</strong></td>
                        <td data-title="Total"><span class="amount"><bdi><span>$</span>18</bdi></span></td>
                    </tr>
                </tbody>
                <tfoot class="checkout-ordertable">
                    <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td data-title="Subtotal" colspan="4"><span
                                class="woocommerce-Price-amount amount"><bdi><span
                                        class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></td>
                    </tr>
                    <tr class="woocommerce-shipping-totals shipping">
                        <th>Shipping</th>
                        <td data-title="Shipping" colspan="4">Enter your address to view shipping options.</td>
                    </tr>
                    <tr class="order-total">
                        <th>Total</th>
                        <td data-title="Total" colspan="4"><strong><span
                                    class="woocommerce-Price-amount amount"><bdi><span
                                            class="woocommerce-Price-currencySymbol">$</span>281.05</bdi></span></strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <div class="mt-lg-3 mb-30">
            <div class="woocommerce-checkout-payment">
                <ul class="wc_payment_methods payment_methods methods">
                    <li class="wc_payment_method payment_method_bacs"><input id="payment_method_bacs" type="radio"
                            class="input-radio" name="payment_method" value="bacs" checked="checked"> <label
                            for="payment_method_bacs">Direct bank transfer</label>
                        <div class="payment_box payment_method_bacs">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the
                                payment reference. Your order will not be shipped until the funds have cleared in
                                our account.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_cheque"><input id="payment_method_cheque"
                            type="radio" class="input-radio" name="payment_method" value="cheque"> <label
                            for="payment_method_cheque">Cheque Payment</label>
                        <div class="payment_box payment_method_cheque">
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                Store Postcode.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_cod"><input id="payment_method_cod" type="radio"
                            class="input-radio" name="payment_method"> <label for="payment_method_cod">Credit
                            Cart</label>
                        <div class="payment_box payment_method_cod">
                            <p>Pay with cash upon delivery.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_paypal"><input id="payment_method_paypal"
                            type="radio" class="input-radio" name="payment_method" value="paypal"> <label
                            for="payment_method_paypal">Paypal</label>
                        <div class="payment_box payment_method_paypal">
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                            </p>
                        </div>
                    </li>
                </ul>
                <div class="form-row place-order"><button type="submit" class="th-btn">Place order</button></div>
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
<!-- Mirrored from html.themehour.net/webteck/demo/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Nov 2025 13:05:20 GMT -->

</html>