<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.html">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="space" id="contact-sec">
    <div class="container">
        <div class="row gy-4">
            <div class="col-xl-4 col-md-6">
                <div class="contact-info">
                    <div class="contact-info_icon"><i class="fas fa-location-dot"></i></div>
                    <div class="media-body">
                        <h4 class="box-title">Our Office Address</h4><span class="contact-info_text">Dhayari Gao, SHOP NO 4, Garmal, Dhayari Phata<br>Pune, Maharashtra 411041, India</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact-info">
                    <div class="contact-info_icon"><i class="fas fa-phone"></i></div>
                    <div class="media-body">
                        <h4 class="box-title">Call Us Anytime</h4><span class="contact-info_text"><a href="tel:+91 9284187968">+91 9284187968</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact-info">
                    <div class="contact-info_icon"><i class="fas fa-envelope"></i></div>
                    <div class="media-body">
                        <h4 class="box-title">Send An Email</h4><span class="contact-info_text"><a href="mailto:rutujas@infeanet.com">rutujas@infeanet.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-smoke space" data-bg-src="assets/img/bg/contact_bg_1.png" id="contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="title-area mb-35 text-xl-start text-center"><span class="sub-title">
                        <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>contact with us!
                    </span>
                    <h2 class="sec-title">Have Any Questions?</h2>
                    <p class="sec-text">Enthusiastically disintermediate one-to-one leadership via business e-commerce. Dramatically reintermediate compelling process improvements rather than empowered relationships.</p>
                </div>
                <form action="https://html.themehour.net/webteck/demo/mail.php" method="POST" class="contact-form ajax-contact">
                    <div class="row">
                        <div class="form-group col-md-6"><input type="text" class="form-control" name="name" id="name" placeholder="Your Name"> <i class="fal fa-user"></i></div>
                        <div class="form-group col-md-6"><input type="email" class="form-control" name="email" id="email" placeholder="Email Address"> <i class="fal fa-envelope"></i></div>
                        <div class="form-group col-md-6"><select name="subject" id="subject" class="form-select">
                                <option value="" disabled="disabled" selected="selected" hidden>Select Subject</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Brand Marketing">Brand Marketing</option>
                                <option value="UI/UX Designing">UI/UX Designing</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                            </select> <i class="fal fa-chevron-down"></i></div>
                        <div class="form-group col-md-6"><input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number"> <i class="fal fa-phone"></i></div>
                        <div class="form-group col-12"><textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea> <i class="fal fa-comment"></i></div>
                        <div class="form-btn text-xl-start text-center col-12"><button class="th-btn">Send Message<i class="fa-regular fa-arrow-right ms-2"></i></button></div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="map-sec">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.63921533153!2d73.80820437519593!3d18.58898188251279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf9b628d9c65%3A0xfadf07fb0c91e6f8!2sDhayari%20Phata%2C%20Pune%2C%20Maharashtra%20411041%2C%20India!5e0!3m2!1sen!2sin!4v1732974000000!5m2!1sen!2sin" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

    
<?php
include_once ABS_PATH_TO_PROJECT . "CDN_Footer.php";
?>