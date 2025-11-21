<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Services</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</div>
<section class="space" id="service-sec">
    <div class="container">
        <div class="row gy-4" id="serviceContainer" style="text-align: justify;"></div>
    </div>
</section>
<!-- <section class="position-relative space">
    <div class="th-bg-img" data-bg-src="assets/img/bg/cta_bg_2.jpg"><img src="assets/img/bg/bg_overlay_1.png"
            alt="overlay"></div>
    <div class="container z-index-common">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                <div class="title-area mb-35"><span class="sub-title">
                        <div class="icon-masking me-2"><span class="mask-icon"
                                data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img
                                src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>CONTACT US
                    </span>
                    <h2 class="sec-title text-white">Need Any Kind Of IT Solution For <span
                            class="text-theme fw-normal">Your Business?</span></h2>
                </div><a href="contact.html" class="th-btn style3">Get In Touch</a>
            </div>
        </div>
    </div>
</section>
<section class="bg-smoke" id="process-sec" data-bg-src="assets/img/bg/process_bg_1.png">
    <div class="container space">
        <div class="title-area text-center"><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon"
                        data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img
                        src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>WORK PROCESS
            </span>
            <h2 class="sec-title">How to work <span class="text-theme">it!</span></h2>
        </div>
        <div class="process-card-area">
            <div class="process-line"><img src="assets/img/bg/process_line.svg" alt="line"></div>
            <div class="row gy-40">
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">01</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_1.svg" alt="icon">
                        </div>
                        <h2 class="box-title">Select a project</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective
                            innovation.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">02</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_2.svg" alt="icon">
                        </div>
                        <h2 class="box-title">Project analysis</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective
                            innovation.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">03</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_3.svg" alt="icon">
                        </div>
                        <h2 class="box-title">Plan Execute</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective
                            innovation.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">04</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_4.svg" alt="icon">
                        </div>
                        <h2 class="box-title">Deliver result</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective
                            innovation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-auto space" data-bg-src="assets/img/bg/testi_bg_2.png">
    <div class="container">
        <div class="title-area text-center"><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon"
                        data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img
                        src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>CUSTOMER FEEDBACK
            </span>
            <h2 class="sec-title">What Happy Clients Says<br><span class="text-theme fw-normal">About Us?</span>
            </h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="testiSlider2"
                data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"2"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-box">
                            <div class="testi-box_img"><img src="assets/img/testimonial/testi_2_1.jpg" alt="Avater">
                                <div class="testi-box_quote"><img src="assets/img/icon/quote_left_2.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-box_content">
                                <p class="testi-box_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration.</p>
                                <div class="testi-box_review"><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                                </div>
                                <h3 class="box-title">David Farnandes</h3>
                                <p class="testi-box_desig">CEO at Anaton</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-box">
                            <div class="testi-box_img"><img src="assets/img/testimonial/testi_2_2.jpg" alt="Avater">
                                <div class="testi-box_quote"><img src="assets/img/icon/quote_left_2.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-box_content">
                                <p class="testi-box_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration.</p>
                                <div class="testi-box_review"><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                                </div>
                                <h3 class="box-title">Jackline Techie</h3>
                                <p class="testi-box_desig">CEO at Kormola</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-box">
                            <div class="testi-box_img"><img src="assets/img/testimonial/testi_2_3.jpg" alt="Avater">
                                <div class="testi-box_quote"><img src="assets/img/icon/quote_left_2.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-box_content">
                                <p class="testi-box_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration.</p>
                                <div class="testi-box_review"><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                                </div>
                                <h3 class="box-title">Abraham Khalil</h3>
                                <p class="testi-box_desig">CEO at Rimasu</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-box">
                            <div class="testi-box_img"><img src="assets/img/testimonial/testi_2_1.jpg" alt="Avater">
                                <div class="testi-box_quote"><img src="assets/img/icon/quote_left_2.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-box_content">
                                <p class="testi-box_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration.</p>
                                <div class="testi-box_review"><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                                </div>
                                <h3 class="box-title">David Farnandes</h3>
                                <p class="testi-box_desig">CEO at Anaton</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-box">
                            <div class="testi-box_img"><img src="assets/img/testimonial/testi_2_2.jpg" alt="Avater">
                                <div class="testi-box_quote"><img src="assets/img/icon/quote_left_2.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-box_content">
                                <p class="testi-box_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration.</p>
                                <div class="testi-box_review"><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                                </div>
                                <h3 class="box-title">Jackline Techie</h3>
                                <p class="testi-box_desig">CEO at Kormola</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-box">
                            <div class="testi-box_img"><img src="assets/img/testimonial/testi_2_3.jpg" alt="Avater">
                                <div class="testi-box_quote"><img src="assets/img/icon/quote_left_2.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-box_content">
                                <p class="testi-box_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration.</p>
                                <div class="testi-box_review"><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                        class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i>
                                </div>
                                <h3 class="box-title">Abraham Khalil</h3>
                                <p class="testi-box_desig">CEO at Rimasu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><button data-slider-prev="#testiSlider2" class="slider-arrow style3 slider-prev"><i
                    class="far fa-arrow-left"></i></button> <button data-slider-next="#testiSlider2"
                class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="shape-mockup moving d-none d-xl-block" data-bottom="0%" data-left="10%"><img
            src="assets/img/shape/line_1.png" alt="shape"></div>
    <div class="shape-mockup jump d-none d-xl-block" data-top="20%" data-right="2%"><img
            src="assets/img/shape/line_2.png" alt="shape"></div>
</section> -->
<?php
include_once ABS_PATH_TO_PROJECT . "CDN_Footer.php";
?>

<script src="controller/service.js"></script>