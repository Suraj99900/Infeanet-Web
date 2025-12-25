<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

?>

<style>
    .founder-section {
        background: linear-gradient(120deg, #ffffff 0%, #eef2ff 60%, #ffffff 100%);
        border-radius: 25px;
    }

    .gradient-text {
        background: linear-gradient(90deg, #6D28D9, #4F46E5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 2.2rem;
    }

    .sub-text {
        color: #555;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .about-text {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #444;
    }

    .read-more-btn {
        font-weight: 600;
        font-size: 1rem;
        color: #4F46E5;
        text-decoration: none;
    }

    .read-more-btn:hover {
        color: #6D28D9;
    }

    .email-btn {
        background-color: #4F46E5;
        color: #fff;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 600;
        border: none;
    }

    .email-btn:hover {
        background-color: #4338CA;
        box-shadow: 0px 6px 20px rgba(79, 70, 229, 0.4);
    }

    .connect-btn {
        border: 2px solid #6D28D9;
        color: #6D28D9;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 600;
    }

    .connect-btn:hover {
        border-color: #4F46E5;
        color: #4F46E5 !important;
        box-shadow: 0px 6px 20px rgba(109, 40, 217, 0.3);
    }

    .image-card {
        width: 100%;
        max-width: 380px;
        height: auto;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0px 10px 35px rgba(0, 0, 0, 0.15);
        margin: auto;
        transition: transform .4s ease;
    }

    .image-card:hover {
        transform: scale(1.05);
    }

    .founder-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .founder-img:hover {
        transform: scale(1.1);
    }

    .highlight-section {
        background: linear-gradient(180deg, #ffffff 0%, rgba(122, 90, 248, 0.05) 100%);
    }

    .student-card {
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        height: 380px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        transition: 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .student-card:hover {
        transform: scale(1.03) translateY(-6px);
    }

    .student-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* bottom gradient overlay */
    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 45%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0), rgba(3, 7, 18, 0.7));
    }

    .student-info {
        position: absolute;
        bottom: 0;
        padding: 18px;
        width: 100%;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        border: 2px solid #fff;
        object-fit: cover;
    }

    .placed-badge {
        background: linear-gradient(90deg, #00bcd4, #7a5af8);
        color: #fff;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 10px;
        margin-left: auto;
    }

    /* CTA button */
    .btn-gradient {
        background: linear-gradient(90deg, #7a5af8, #5f41e5);
        color: #fff;
        border-radius: 10px;
        box-shadow: 0px 12px 32px rgba(122, 90, 248, 0.25);
    }

    .swiper-slide {
        padding: 10px;
    }

    .student-card {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        height: 320px;
        background: #222;
        transition: 0.3s;
    }

    .student-card img.student-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .student-info {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 15px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .student-info .avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 2px solid #fff;
        object-fit: cover;
    }

    .placed-badge {
        background: #28a745;
        font-size: 10px;
        padding: 3px 6px;
        border-radius: 4px;
    }

    /* Responsive Height Adjustments */
    @media (max-width: 768px) {
        .student-card {
            height: 260px;
        }

        .student-info .avatar {
            width: 38px;
            height: 38px;
        }
    }

    @media (max-width: 480px) {
        .student-card {
            height: 230px;
        }

        .student-info {
            padding: 10px;
        }

        .student-info .avatar {
            width: 32px;
            height: 32px;
        }
    }
</style>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/hum3.png">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box1">
                    <div class="img1"><img src="assets/img/normal/about_1_1.png" alt="About"></div>
                    <div class="shape1"><img src="assets/img/normal/about_shape_1.png" alt="shape"></div>
                    <div class="year-counter">
                        <h3 class="year-counter_number"><span class="counter-number">11</span></h3>
                        <p class="year-counter_text">Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xxl-4 ms-xl-3">
                    <div class="title-area mb-35"><span class="sub-title">
                            <div class="icon-masking me-2"><span class="mask-icon"
                                    data-mask-src="assets/img/theme-img/title_shape_1.svg"></span> <img
                                    src="assets/img/theme-img/title_shape_1.svg" alt="shape"></div>About Us
                        </span>
                        <h2 class="sec-title">We Are Increasing Business Success With <span class="text-theme">IT
                                Solution</span></h2>
                    </div>
                    <p class="mt-n2 mb-25" style="text-align: justify;">Collaboratively envisioneer user friendly supply chains and cross unit
                        imperative. Authoritativel fabricate competitive resource and holistic synergy. Uniquely
                        generate efficient schemas before future.</p>
                    <div class="about-feature-wrap">
                        <div class="about-feature">
                            <div class="about-feature_icon"><img src="assets/img/icon/about_feature_1_1.svg"
                                    alt="Icon"></div>
                            <div class="media-body">
                                <h3 class="about-feature_title">Certified Company</h3>
                                <p class="about-feature_text">Best Provide Skills Services</p>
                            </div>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature_icon"><img src="assets/img/icon/about_feature_1_2.svg"
                                    alt="Icon"></div>
                            <div class="media-body">
                                <h3 class="about-feature_title">Expart Team</h3>
                                <p class="about-feature_text">100% Expert Team</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group"><a href="about.php" class="th-btn">DISCOVER MORE<i
                                class="fa-regular fa-arrow-right ms-2"></i></a>
                        <div class="call-btn">
                            <div class="play-btn"><i class="fas fa-phone"></i></div>
                            <div class="media-body"><span class="btn-text">Call Us On:</span> <a
                                    href="tel:+91 9284187968" class="btn-title">+91 9284187968</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 my-5 founder-section">
    <div class="row align-items-center g-5">

        <!-- LEFT CONTENT -->
        <div class="col-lg-6">
            <h2 class="fw-bold gradient-text mb-2">
                Rutuja Sathe
                <span class="d-block sub-text">Founder & Director – Infeanet</span>
            </h2>

            <p id="founderText" class="about-text" style="text-align: justify;"></p>

            <button class="btn btn-link read-more-btn px-0" onclick="toggleFounderText()">
                Read More ▼
            </button>

            <!-- ACTION BUTTONS -->
            <div class="d-flex flex-column flex-sm-row gap-3 mt-4">

                <a href="mailto:rutujas@infeanet.com"
                    class="btn email-btn">
                    <i class="bi bi-envelope-fill me-2"></i> rutujas@infeanet.com
                </a>

                <a href="contact.php"
                    class="btn connect-btn">
                    <i class="bi bi-people-fill me-2"></i> Connect With Us
                </a>

            </div>
        </div>

        <!-- RIGHT IMAGE -->
        <div class="col-lg-6 text-center">
            <div class="image-card">
                <img src="assets/Images/sathe.png" alt="Rutuja Sathe" class="founder-img">
            </div>
        </div>
    </div>
</div>

<!-- <section class="team-sec space">
    <div class="container z-index-common">
        <div class="title-area text-center"><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon"
                        data-mask-src="assets/img/theme-img/title_shape_1.svg"></span> <img
                        src="assets/img/theme-img/title_shape_1.svg" alt="shape"></div>TEAM MEMBER
            </span>
            <h2 class="sec-title">See Our Skilled Expert <span class="text-theme">Team</span></h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="teamSlider2"
                data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_1.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p1"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Rayan Athels</a></h3><span
                                    class="team-desig">Founder & CEO</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_2.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p2"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Alex Furnandes</a></h3><span
                                    class="team-desig">Project Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_3.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p3"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Mary Crispy</a></h3><span
                                    class="team-desig">Cheif Expert</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_4.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p4"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Henry Joshep</a></h3><span
                                    class="team-desig">Product Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_5.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p5"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Sanjida Carlose</a></h3><span
                                    class="team-desig">IT Consultant</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_6.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p6"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Marian Widjya</a></h3><span
                                    class="team-desig">Head Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_7.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p7"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Peter Parker</a></h3><span
                                    class="team-desig">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-card">
                            <div class="team-img"><img src="assets/img/team/team_1_8.jpg" alt="Team"></div>
                            <div class="team-content">
                                <div class="box-particle" id="team-p8"></div>
                                <div class="team-social"><a target="_blank" href="https://facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a target="_blank"
                                        href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                <h3 class="box-title"><a href="team-details.php">Grayson Gabriel</a></h3><span
                                    class="team-desig">UI/UX Designer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><button data-slider-prev="#teamSlider2" class="slider-arrow style3 slider-prev"><i
                    class="far fa-arrow-left"></i></button> <button data-slider-next="#teamSlider2"
                class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="shape-mockup" data-bottom="0" data-left="0">
        <div class="particle-2" id="particle-2"></div>
    </div>
</section> -->

<!-- <div class="bg-theme space-extra" data-bg-src="assets/img/bg/counter_bg_1.png">
    <div class="container py-2">
        <div class="row gy-40 justify-content-between">
            <div class="col-6 col-lg-auto">
                <div class="counter-card">
                    <div class="counter-card_icon"><img src="assets/img/icon/counter_1_1.svg" alt="Icon"></div>
                    <div class="media-body">
                        <h2 class="counter-card_number"><span class="counter-number">986</span>+</h2>
                        <p class="counter-card_text">Finished Project</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-auto">
                <div class="counter-card">
                    <div class="counter-card_icon"><img src="assets/img/icon/counter_1_2.svg" alt="Icon"></div>
                    <div class="media-body">
                        <h2 class="counter-card_number"><span class="counter-number">896</span>+</h2>
                        <p class="counter-card_text">Happy Clients</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-auto">
                <div class="counter-card">
                    <div class="counter-card_icon"><img src="assets/img/icon/counter_1_3.svg" alt="Icon"></div>
                    <div class="media-body">
                        <h2 class="counter-card_number"><span class="counter-number">396</span>+</h2>
                        <p class="counter-card_text">Skilled Experts</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-auto">
                <div class="counter-card">
                    <div class="counter-card_icon"><img src="assets/img/icon/counter_1_4.svg" alt="Icon"></div>
                    <div class="media-body">
                        <h2 class="counter-card_number"><span class="counter-number">496</span>+</h2>
                        <p class="counter-card_text">Honorable Awards</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="space" data-bg-src="assets/img/bg/why_bg_1.png">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-xxl-7 col-xl-6 mb-30 mb-xl-0">
                <div class="img-box2">
                    <div class="img1"><img src="assets/img/normal/why_1_1.jpg" alt="Why"></div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-6">
                <div class="title-area mb-35"><span class="sub-title">
                        <div class="icon-masking me-2"><span class="mask-icon"
                                data-mask-src="assets/img/theme-img/title_shape_1.svg"></span> <img
                                src="assets/img/theme-img/title_shape_1.svg" alt="shape"></div>WHY CHOOSE US
                    </span>
                    <h2 class="sec-title">We Deal With The Aspects Professional <span class="text-theme">IT
                            Services</span></h2>
                </div>
                <p class="mt-n2 mb-30">Collaboratively envisioneer user friendly supply chains and cross unit
                    imperative. Authoritativel fabricate competitive resource and holistic.</p>
                <div class="two-column">
                    <div class="checklist style2">
                        <ul>
                            <li><i class="far fa-check"></i> Training and placement with various courses</li>
                            <li><i class="far fa-check"></i> Web Development</li>
                            <li><i class="far fa-check"></i> Android Development</li>
                        </ul>
                    </div>
                    <div class="checklist style2">
                        <ul>
                            <li><i class="far fa-check"></i> Software Development</li>
                            <li><i class="far fa-check"></i> UI/UX Design</li>
                            <li><i class="far fa-check"></i> Digital Marketing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <section class="bg-top-center space" data-bg-src="assets/img/bg/testi_bg_3.jpg">
    <div class="container">
        <div class="title-area text-center">
            <div class="shadow-title color2">TESTIMONIALS</div><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon"
                        data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img
                        src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>CUSTOMER FEEDBACK
            </span>
            <h2 class="sec-title text-white">What Happy Clients Says<br><span class="text-theme">About Us?</span>
            </h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="testiSlider3"
                data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_1.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">David Farnandes</h3>
                                <p class="testi-grid_desig">CEO at Anaton</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_2.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Jackline Techie</h3>
                                <p class="testi-grid_desig">CEO at Kormola</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_3.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Abraham Khalil</h3>
                                <p class="testi-grid_desig">CEO at Anatora</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_4.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Md Sumon Mia</h3>
                                <p class="testi-grid_desig">CEO at Rimasu</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_1.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">David Farnandes</h3>
                                <p class="testi-grid_desig">CEO at Anaton</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_2.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Jackline Techie</h3>
                                <p class="testi-grid_desig">CEO at Kormola</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_3.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Abraham Khalil</h3>
                                <p class="testi-grid_desig">CEO at Anatora</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_4.jpg"
                                    alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg"
                                        alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i
                                    class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B
                                    alignment. Monotonectally harness an expanded array of models via effective
                                    collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Md Sumon Mia</h3>
                                <p class="testi-grid_desig">CEO at Rimasu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><button data-slider-prev="#testiSlider3" class="slider-arrow style3 slider-prev"><i
                    class="far fa-arrow-left"></i></button> <button data-slider-next="#testiSlider3"
                class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</section> -->


<section class="highlight-section py-5">
    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase text-secondary opacity-75">SUCCESS STORIES</h6>

            <h2 class="fw-bold display-6">Our Bright Stars</h2>

            <p class="text-muted mx-auto" style="max-width: 800px;">
                Real students, real results — projects, placements and career growth from our hands-on programs.
            </p>
        </div>

        <!-- SWIPER WRAPPER -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <!-- ONE STUDENT CARD -->
                <div class="swiper-slide">
                    <div class="student-card">
                        <img src="assets/Images/students/shrutika_infeanet.png" class="student-img">

                        <!-- <div class="overlay"></div> -->

                        <div class="student-info">
                            <img src="assets/Images/students/shrutika_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Shrutika</h5>
                                <p class="text-white-50 mb-0 small">Data Scientist</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Priya -->
                    <div class="student-card">
                        <img src="assets/Images/students/priya_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/priya_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Priya</h5>
                                <p class="text-white-50 mb-0 small">Frontend Dev</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Shrutika -->
                    <div class="student-card">
                        <img src="assets/Images/students/shrutika_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/shrutika_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Shrutika</h5>
                                <p class="text-white-50 mb-0 small">Data Scientist</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Aditya -->
                    <div class="student-card">
                        <img src="assets/Images/students/aditya_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/aditya_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Aditya</h5>
                                <p class="text-white-50 mb-0 small">Backend Engineer</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Aniket -->
                    <div class="student-card">
                        <img src="assets/Images/students/aniket_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/aniket_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Aniket</h5>
                                <p class="text-white-50 mb-0 small">Mobile Dev</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Atharva -->
                    <div class="student-card">
                        <img src="assets/Images/students/atharva_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/atharva_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Atharva</h5>
                                <p class="text-white-50 mb-0 small">DevOps</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <!-- Dnyanesh -->
                    <div class="student-card">
                        <img src="assets/Images/students/dnyanesh_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/dnyanesh_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Dnyanesh</h5>
                                <p class="text-white-50 mb-0 small">Full-Stack</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Hiren -->
                    <div class="student-card">
                        <img src="assets/Images/students/hiren_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/hiren_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Hiren</h5>
                                <p class="text-white-50 mb-0 small">Security Analyst</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Hitesh -->
                    <div class="student-card">
                        <img src="assets/Images/students/hitesh_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/hitesh_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Hitesh</h5>
                                <p class="text-white-50 mb-0 small">AI Engineer</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Mrunali -->
                    <div class="student-card">
                        <img src="assets/Images/students/mrunali_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/mrunali_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Mrunali</h5>
                                <p class="text-white-50 mb-0 small">UI/UX Designer</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- Ritu -->
                    <div class="student-card">
                        <img src="assets/Images/students/ritu_infeanet.png" class="student-img">
                        <div class="student-info">
                            <img src="assets/Images/students/ritu_infeanet.png" class="avatar">
                            <div>
                                <h5 class="text-white fw-bold mb-0">Ritu</h5>
                                <p class="text-white-50 mb-0 small">Quality Engineer</p>
                            </div>
                            <span class="badge placed-badge">Placed</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DUPLICATE FOR OTHER STUDENTS -->

        </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-4">
        <button class="btn btn-gradient px-4 py-2 fw-bold">
            See All Success Stories
        </button>
    </div>

    </div>
</section>


<?php
include_once ABS_PATH_TO_PROJECT . "CDN_Footer.php";
?>

<script>
    const fullFounderText = `Rutuja Sathe is the visionary Founder and Director of Infeanet Digital Solutions & Web Media, a leading firm established in 2016 and headquartered in Pune. Under her leadership, Infeanet has grown into a trusted name in digital marketing, web development, branding, and IT training. With a strong focus on innovation, quality, and client success, she has guided Infeanet to deliver customized digital solutions while also nurturing the next generation of professionals through internships, workshops, and hands-on training programs. As a mentor and industry speaker, Rutuja Sathe has been invited for expert talks, guest lectures, and academic collaborations with reputed institutions. Her passion for technology, combined with her commitment to skill development, has made her a respected figure among students, professionals, and business partners alike. At Infeanet, she continues to drive forward a culture of creativity, excellence, and continuous learning, empowering clients and trainees to succeed in today’s competitive digital landscape.`;

    const previewFounderText = fullFounderText.split(" ").slice(0, 55).join(" ") + "...";

    let founderExpanded = false;

    document.getElementById("founderText").innerText = previewFounderText;

    function toggleFounderText() {
        founderExpanded = !founderExpanded;

        document.getElementById("founderText").innerText =
            founderExpanded ? fullFounderText : previewFounderText;

        document.querySelector(".read-more-btn").innerText =
            founderExpanded ? "Show Less ▲" : "Read More ▼";
    }

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 25,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2200,
            disableOnInteraction: false
        },
        speed: 800,
        breakpoints: {
            1200: {
                slidesPerView: 3
            },
            900: {
                slidesPerView: 2
            },
            600: {
                slidesPerView: 1
            }
        }
    });
</script>