<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

$teamMembers = [
    [
        "name" => "Shrutika",
        "role" => "Student",
        "image" => "assets/Images/students/shrutika_infeanet.png"
    ],
    [
        "name" => "Priya",
        "role" => "Student",
        "image" => "assets/Images/students/priya_infeanet.png"
    ],
    [
        "name" => "Aditya",
        "role" => "Student",
        "image" => "assets/Images/students/aditya_infeanet.png"
    ],
    [
        "name" => "Aniket",
        "role" => "Student",
        "image" => "assets/Images/students/aniket_infeanet.png"
    ],
    [
        "name" => "Atharva",
        "role" => "Student",
        "image" => "assets/Images/students/atharva_infeanet.png"
    ],
    [
        "name" => "Hiren",
        "role" => "Student",
        "image" => "assets/Images/students/hiren_infeanet.png"
    ],
    [
        "name" => "Dnyanesh",
        "role" => "Student",
        "image" => "assets/Images/students/dnyanesh_infeanet.png"
    ],
    [
        "name" => "Hitesh",
        "role" => "Student",
        "image" => "assets/Images/students/hitesh_infeanet.png"
    ],
    [
        "name" => "Mrunali",
        "role" => "Student",
        "image" => "assets/Images/students/mrunali_infeanet.png"
    ],
    [
        "name" => "Ritu",
        "role" => "Student",
        "image" => "assets/Images/students/ritu_infeanet.png"
    ],
];
?>

<style>
    .trusted-section {
        background: #ffffff;
    }

    /* Slider container */
    .slider-container {
        overflow: hidden;
        width: 100%;
        position: relative;
    }

    /* Track */
    .slider-track {
        display: flex;
        gap: 30px;
        animation: scrollDesktop 20s linear infinite;
    }

    @keyframes scrollDesktop {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    /* For mobile */
    @media (max-width: 768px) {
        .slider-track {
            animation: scrollMobile 16s linear infinite;
        }

        @keyframes scrollMobile {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-40%);
            }
        }
    }

    /* Client card */
    .client-card {
        flex: 0 0 180px;
        /* Card width */
        height: 160px;
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 25px;
        transition: 0.25s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .client-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
        border-color: #7a5af8;
    }

    /* Logo styling */
    .client-card img {
        max-width: 100%;
        max-height: 90%;
        object-fit: contain;
        filter: grayscale(0%);
        transition: filter 0.25s ease, transform 0.25s ease;
    }

    .client-card:hover img {
        filter: grayscale(0);
        transform: scale(1.05);
    }

    p,
    li {
        color: rgba(0, 0, 0, 0.76);
    }


    /* Top floating icon wrapper */
    .service-top-icon {
        position: relative;
        top: 35px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 100px;
        z-index: 20;
    }

    /* Glow background circle */
    .service-top-icon .icon-circle {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: radial-gradient(rgba(116, 50, 255, 0.4), rgba(116, 50, 255, 0));
        animation: pulseGlow 2s infinite ease-in-out;
        z-index: 1;
    }

    /* Actual icon image */
    .service-top-icon img {
        position: absolute;
        width: 88px;
        height: 88px;
        padding: 5px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        object-fit: contain;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        animation: floatUp 3s infinite ease-in-out;
    }

    /* Floating animation */
    @keyframes floatUp {
        0% {
            transform: translate(-50%, -50%) translateY(0);
        }

        50% {
            transform: translate(-50%, -50%) translateY(-8px);
        }

        100% {
            transform: translate(-50%, -50%) translateY(0);
        }
    }

    /* Glow pulse animation */
    @keyframes pulseGlow {
        0% {
            transform: scale(1);
            opacity: 0.7;
        }

        50% {
            transform: scale(1.15);
            opacity: 1;
        }

        100% {
            transform: scale(1);
            opacity: 0.7;
        }
    }

    .team-img {
        width: 100%;
        height: 400px;
        /* SAME HEIGHT FOR ALL */
        overflow: hidden;
        border-radius: 10px;
    }

    .team-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* MAGIC LINE */
        display: block;
    }

    .blog-img {
        height: 220px;
        overflow: hidden;
    }

    .blog-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .blog-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-card .box-title {
        min-height: 100px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-card .blog-text {
        min-height: 72px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-bottom {
        margin-top: auto;
    }

    /* Card base */
    .service-grid {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* Content wrapper */
    .service-grid_content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 25px;
    }

    /* Icon area – same size */
    .service-top-icon {
        height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* Title – clamp to 2 lines */
    .service-grid .box-title {
        min-height: 66px;
        display: -webkit-box;
        text-align: center;
        align-content: center;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Description – clamp to 4 lines */
    .service-grid_text {
        min-height: 100px;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-align: justify;
    }

    /* Button always at bottom */
    .service-grid .th-btn {
        margin-top: auto;
    }

    /* Background shape stays fixed */
    .service-grid .bg-shape {
        position: absolute;
        bottom: 0;
        right: 0;
    }
</style>


<div class="th-hero-wrapper hero-4" id="hero">
    <div class="body-particle" id="body-particle"></div>
    <div class="hero-img tilt-active"><img src="assets/img/hero/hero_img_4_1.png" alt="Hero Image"></div>
    <div class="container">
        <div class="hero-style4">
            <div class="ripple-shape"><span class="ripple-1"></span><span class="ripple-2"></span><span class="ripple-3"></span><span class="ripple-4"></span><span class="ripple-5"></span><span class="ripple-6"></span></div><span class="hero-subtitle">Best Marketing Service</span>
            <h1 class="hero-title">Make The Easiest</h1>
            <h1 class="hero-title">Solution For You</h1>
            <p class="hero-text">Energistically harness ubiquitous imperatives without state of the art collaboration and idea-sharing. Monotonectally parallel task cross-unit experiences and front-end.</p>
            <div class="btn-group"><a href="about.php" class="th-btn">ABOUT US<i class="fa-regular fa-arrow-right ms-2"></i></a>
                <div class="call-btn"><a href="https://www.youtube.com/watch?v=_57DbJTADCE" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                    <div class="media-body"><a href="https://www.youtube.com/watch?v=_57DbJTADCE" class="btn-title popup-video">Watch Our Story</a> <span class="btn-text">Subscribe Now</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle-1"></div>
    <div class="triangle-2"></div>
    <div class="hero-shape2"><img src="assets/img/hero/hero_shape_2_2.png" alt="shape"></div>
    <div class="hero-shape3"><img src="assets/img/hero/hero_shape_2_3.png" alt="shape"></div>
</div>
<div class="overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box4 tilt-active">
                    <div class="img-shape icon-masking"><span class="mask-icon" data-mask-src="assets/img/normal/about_3_1-shape.png"></span> <img src="assets/img/normal/about_3_1-shape.png" alt="img"></div><img src="assets/img/normal/about_3_1.png" alt="About"> <a href="https://www.youtube.com/watch?v=_57DbJTADCE" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="title-area mb-35 text-center text-xl-start">
                    <div class="shadow-title">ABOUT US</div><span class="sub-title">
                        <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>About INFEANET IT SOLUTIONS
                    </span>
                    <h2 class="sec-title">Empowering Students with 9 Years of <span class="text-theme">Excellence</span></h2>
                </div>
                <p class="mt-n2 mb-30" style="text-align: justify;">For nearly a decade, we’ve been dedicated to bridging the gap between academic learning and real-world industry skills. Our mission is to train and mentor college students through industry-focused technical programs that strengthen their foundation, boost confidence, and prepare them for future opportunities. With strong partnerships across reputed Pune colleges, we continue to create a lasting impact in shaping tomorrow’s tech leaders..</p>
                <div class="achivement-tab filter-menu-active indicator-active"><button data-filter=".cat1" class="active" type="button">Award Winning</button> <button data-filter=".cat2" type="button">Technology Index</button></div>
                <div class="achivement-box-area filter-active-cat1">
                    <div class="filter-item w-100 cat1">
                        <div class="achivement-box">
                            <div class="achivement-box_img"><img src="assets/img/normal/about_3_1_1.jpg" alt="About"></div>
                            <div class="media-body">
                                <h3 class="box-title">An Award-Winning Company.</h3>
                                <p class="achivement-box_text">Monotonically matrix extensible applications and go forward communities. Synergistically extend client-based manufactured.</p><a href="about.php" class="th-btn">About More</a>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item w-100 cat2">
                        <div class="achivement-box">
                            <div class="achivement-box_img"><img src="assets/img/normal/about_3_1_2.jpg" alt="About"></div>
                            <div class="media-body">
                                <h3 class="box-title">Having 25+ Years Of Experience.</h3>
                                <p class="achivement-box_text">Monotonically matrix extensible applications and go forward communities. Synergistically extend client-based manufactured.</p><a href="about.php" class="th-btn">About More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-list mt-4">
                    <ul style="list-style: none; padding-left: 0;">
                        <li style="margin-bottom: 12px; display: flex; align-items: center;text-align: justify;">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Offering hands-on training in cutting-edge technologies aligned with industry trends
                        </li>

                        <li style="margin-bottom: 12px; display: flex; align-items: center;text-align: justify;">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Providing personalized learning experiences through expert-led sessions
                        </li>

                        <li style="margin-bottom: 12px; display: flex; align-items: center;text-align: justify;">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Collaborating with colleges and organizations to deliver career-oriented programs
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<section class="trusted-section py-5 my-5">
    <div class="container text-center">

        <!-- Heading -->
        <h2 class="fw-bold mb-2 text-dark">
            Trusted by Reputed Institutes & Colleges
        </h2>

        <p class="text-muted mb-5">
            Partnering with institutions to make students industry-ready.
        </p>

        <!-- Slider Wrapper -->
        <div class="slider-container">
            <div class="slider-track" id="sliderTrack">

                <!-- Logos (Duplicate for infinite scrolling) -->
                <!-- Add logos below -->
                <div class="client-card"><img src="assets/Images/trinity-logo.png" alt="Logo 1"></div>
                <div class="client-card"><img src="assets/Images/Sinhgad-logo.png" alt="Logo 2"></div>
                <div class="client-card"><img src="assets/Images/zeal-logo.png" alt="Logo 3"></div>
                <div class="client-card"><img src="assets/Images/mit-images.png" alt="Logo 4"></div>
                <div class="client-card"><img src="assets/Images/vit_images.png" alt="Logo 5"></div>

                <!-- Duplicate for infinite scrolling -->
                <div class="client-card"><img src="assets/Images/trinity-logo.png" alt="Logo 1"></div>
                <div class="client-card"><img src="assets/Images/Sinhgad-logo.png" alt="Logo 2"></div>
                <div class="client-card"><img src="assets/Images/zeal-logo.png" alt="Logo 3"></div>
                <div class="client-card"><img src="assets/Images/mit-images.png" alt="Logo 4"></div>
                <div class="client-card"><img src="assets/Images/vit_images.png" alt="Logo 5"></div>

            </div>
        </div>

    </div>
</section>


<section class="bg-top-center z-index-common space-top" id="service-sec" data-bg-src="assets/img/bg/service_bg_2.jpg">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg-6 col-sm-9 pe-xl-5">
                <div class="title-area text-center text-lg-start">
                    <div class="shadow-title color2">SERVICES</div><span class="sub-title">
                        <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>WHAT WE DO
                    </span>
                    <h2 class="sec-title text-white">We Train Students for <span class="text-theme">Industry‑Ready Projects</span></h2>
                </div>
            </div>
            <div class="col-auto">
                <div class="sec-btn"><a href="service.php" class="th-btn style3">VIEW ALL SERVICES<i class="fa-regular fa-arrow-right ms-2"></i></a></div>
            </div>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow"
                id="serviceSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":1},"768":{"slidesPerView":2},"992":{"slidesPerView":3},"1200":{"slidesPerView":4}}}'>

                <div class="swiper-wrapper" id="dynamicServiceSlider">
                    <!-- Dynamic Slides Will Load Here -->
                </div>

            </div>
        </div>
    </div>
</section>
<div class="why-sec-v2" data-bg-src="assets/img/bg/why_bg_2.jpg">
    <div class="container space">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box5"><img class="tilt-active" src="assets/img/normal/why_2_1.png" alt="Why">
                    <div class="year-counter">
                        <h3 class="year-counter_number"><span class="counter-number">10</span>k+</h3>
                        <p class="year-counter_text">Clients Active</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="title-area mb-35">
                    <div class="shadow-title color3">Choose US</div><span class="sub-title">
                        <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>WHY CHOOSE US
                    </span>
                    <h2 class="sec-title">Strengthening Futures We Provide <span class="text-theme">Industry‑Ready Training</span></h2>
                </div>
                <p class="mt-n2 mb-30" style="text-align: justify;">We’re committed to transforming college education by offering practical, career-focused training programs that prepare students for the evolving tech industry. Our blend of expert mentorship, hands-on learning, and institutional partnerships ensures every learner gains the confidence and competence to excel.</p>
                <div class="feature-circle-wrap">
                    <div class="feature-circle">
                        <div class="progressbar" data-path-color="#684DF4">
                            <div class="circle" data-percent="90">
                                <div class="circle-num"></div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="feature-circle_title">Business Grow</h3>
                            <p class="feature-circle_text">Efficiently transition top-line ideas before market.</p>
                        </div>
                    </div>
                    <div class="feature-circle">
                        <div class="progressbar" data-path-color="#684DF4">
                            <div class="circle" data-percent="95">
                                <div class="circle-num"></div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="feature-circle_title">Quality Products</h3>
                            <p class="feature-circle_text">Efficiently transition top-line ideas before market.</p>
                        </div>
                    </div>
                </div><a href="about.php" class="th-btn">LEARN MORE<i class="fa-regular fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>
<section class="space" id="project-sec">
    <div class="container">
        <div class="title-area text-center">
            <div class="shadow-title">PROJECTS</div><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>LATEST PROJECTS
            </span>
            <h2 class="sec-title">Our Recent Latest <span class="text-theme">Projects</span></h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="projectSlider2" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img">
                                <img src="assets/img/icon/image.png" alt="SmartFee – School Fee Management System">
                                <a href="assets/img/icon/image.png" class="play-btn style3 popup-image">
                                    <i class="far fa-plus"></i>
                                </a>
                            </div>
                            <div class="project-grid_content">
                                <h3 class="box-title" style="font-size: 18px;"><a href="">SmartFee – School Fee Management System</a></h3>
                                <p class="project-grid_text" style="text-align: justify;">A secure web platform built for a private school to manage online fee payments, receipts, student records, and admin reports, reducing manual work and payment delays.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/icon/image1.png" alt="project image"> <a href="assets/img/icon/image1.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title" style="font-size: 18px;"><a href="">VyaparSetu – MSME Business Website & Lead System</a></h3>
                                <p class="project-grid_text" style="text-align: justify;">Developed a responsive business website for a local manufacturing MSME with inquiry forms, WhatsApp integration, and SEO optimization to improve online visibility and lead generation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/icon/image2.png" alt="project image"> <a href="assets/img/icon/image2.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title" style="font-size: 18px;"><a href="">EduTrack – Coaching Institute Management Portal</a></h3>
                                <p class="project-grid_text" style="text-align: justify;">A custom web solution for a coaching institute (Classes 7–12) to manage student admissions, batch scheduling, attendance, and performance tracking from a single dashboard.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/icon/image4.png" alt="project image"> <a href="assets/img/icon/image4.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title" style="font-size: 18px;"><a href="">AgroMart Connect – Farmer-to-Retail Digital Platform</a></h3>
                                <p class="project-grid_text" style="text-align: justify;">Designed a simple digital platform connecting local farmers with retailers, featuring product listings, inquiry management, and mobile-friendly access for rural users.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/icon/image5.png" alt="project image"> <a href="assets/img/icon/image5.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title" style="font-size: 18px;"><a href="">HireRight India – Resume Screening & Job Portal Module</a></h3>
                                <p class="project-grid_text" style="text-align: justify;">Designed a simple digital AI-assisted job portal module for a recruitment firm to streamline resume screening, job postings, and candidate shortlisting, improving hiring efficiency.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><button data-slider-prev="#projectSlider2" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#projectSlider2" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</section>
<div class="bg-theme space-extra" data-bg-src="assets/img/bg/counter_bg_1.png">
    <div class="container py-2">
        <div class="row gy-40 justify-content-between">
            <div class="col-6 col-lg-auto">
                <div class="counter-card">
                    <div class="counter-card_icon"><img src="assets/img/icon/counter_1_1.svg" alt="Icon"></div>
                    <div class="media-body">
                        <h2 class="counter-card_number"><span class="counter-number">986</span>+</h2>
                        <p class="counter-card_text">Finished Projects</p>
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
</div>
<section class="bg-smoke" id="process-sec" data-bg-src="assets/img/bg/process_bg_1.png">
    <div class="container space">
        <div class="title-area text-center">
            <div class="shadow-title">PROCESS</div><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>WORK PROCESS
            </span>
            <h2 class="sec-title">How to work <span class="text-theme">it!</span></h2>
        </div>
        <div class="process-card-area">
            <div class="process-line"><img src="assets/img/bg/process_line.svg" alt="line"></div>
            <div class="row gy-40">
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">01</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_1.svg" alt="icon"></div>
                        <h2 class="box-title">Select a project</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective innovation.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">02</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_2.svg" alt="icon"></div>
                        <h2 class="box-title">Project analysis</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective innovation.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">03</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_3.svg" alt="icon"></div>
                        <h2 class="box-title">Plan Execute</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective innovation.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 process-card-wrap">
                    <div class="process-card">
                        <div class="process-card_number">04</div>
                        <div class="process-card_icon"><img src="assets/img/icon/process_card_4.svg" alt="icon"></div>
                        <h2 class="box-title">Deliver result</h2>
                        <p class="process-card_text">Continua scale empowered metrics with cost effective innovation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="" id="team-sec">
    <div class="brand-sec1" data-pos-for="#process-sec" data-sec-pos="top-half">
        <div class="container py-5">
            <div class="slider-area text-center">
                <div class="swiper th-slider" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_1.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_2.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_3.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_4.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_5.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_6.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>

                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_1.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_2.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_3.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_4.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_5.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/sister_6.png" alt="Brand Logo" style="width: 90px; height: 60px;"></div>
                        </div>
                    </div>
                </div><button data-slider-prev="#brandSlider1" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#brandSlider1" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container space">
        <div class="title-area text-center">
            <div class="shadow-title">Team</div><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>GREAT Stars
            </span>
            <h2 class="sec-title">Our Bright <span class="text-theme">Stars</span></h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="teamSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":2},"768":{"slidesPerView":2},"992":{"slidesPerView":3},"1200":{"slidesPerView":3}}}'>

                <div class="swiper-wrapper">

                    <?php foreach ($teamMembers as $index => $member): ?>
                        <div class="swiper-slide">
                            <div class="th-team team-grid">

                                <div class="team-img">
                                    <img src="<?= $member['image']; ?>" alt="<?= $member['name']; ?>">
                                </div>

                                <div class="team-social">
                                    <!-- <div class="play-btn"><i class="far fa-plus"></i></div> -->
                                </div>

                                <h3 class="box-title">
                                    <a href="team-details.php"><?= $member['name']; ?></a>
                                </h3>

                                <span class="team-desig"><?= $member['role']; ?></span>

                                <!-- Particle ID -->
                                <div class="box-particle" id="team-<?= $index + 1; ?>"></div>

                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>

            <button data-slider-prev="#teamSlider1" class="slider-arrow style3 slider-prev">
                <i class="far fa-arrow-left"></i>
            </button>
            <button data-slider-next="#teamSlider1" class="slider-arrow style3 slider-next">
                <i class="far fa-arrow-right"></i>
            </button>
        </div>

    </div>
    <div class="shape-mockup" data-top="0" data-right="0"><img src="assets/img/shape/tech_shape_1.png" alt="shape"></div>
    <div class="shape-mockup" data-top="0%" data-left="0%"><img src="assets/img/shape/square_1.png" alt="shape"></div>
</section>
<section class="bg-top-center space" data-bg-src="assets/img/bg/testi_bg_3.jpg">
    <div class="container">
        <div class="title-area text-center">
            <div class="shadow-title color2">TESTIMONIALS</div><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>CUSTOMER FEEDBACK
            </span>
            <h2 class="sec-title text-white">What Happy Clients Says<br><span class="text-theme">About Us?</span></h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="testiSlider3" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-grid testi-equal">
                            <div class="testi-grid_img"><img src="assets/img/icon/logo5.jpeg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Infeanet revolutionized our group's digital identity. The custom web platform they built handles our complex operations with ease, while their digital marketing has significantly boosted our brand's authority across the region.</p>
                                <h3 class="box-title">Girish Nagane</h3>
                                <p class="testi-grid_desig">P.N. Nagane Group</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid testi-equal">
                            <div class="testi-grid_img"><img src="assets/img/icon/logo6.jpeg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">With a legacy dating back to 1995, we needed a partner who respected our history while modernizing our reach. Infeanet delivered a brilliant web app that bridges the gap between our tradition and today’s digital market.</p>
                                <h3 class="box-title">Mr. Pandurang Shinde</h3>
                                <p class="testi-grid_desig">PHS</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid testi-equal">
                            <div class="testi-grid_img"><img src="assets/img/icon/logo7.jpeg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Our mission to 'Conserve Water' needed a strong digital voice. Infeanet built a powerful platform for Pixel Polyplast that effectively showcases our solutions and drives high-quality B2B leads through smart digital marketing.</p>
                                <h3 class="box-title">Saurabh Sathe</h3>
                                <p class="testi-grid_desig">Pixel Polyplast</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid testi-equal">
                            <div class="testi-grid_img"><img src="assets/img/icon/logo4.jpeg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text pb-4">As an NABL accredited laboratory, precision is everything. 1 Infeanet developed a high-performance web app that perfectly manages our testing data. Their technical expertise is truly top-tier.</p>
                                <h3 class="box-title">Mr. Rajaram</h3>
                                <p class="testi-grid_desig">Strong Tech</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid testi-equal">
                            <div class="testi-grid_img"><img src="assets/img/icon/logo2.jpeg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Being a design studio, our standards for UI/UX were incredibly high. Infeanet exceeded them by building a stunning, high-converting portfolio site and implementing a marketing strategy that keeps our project pipeline full.</p>
                                <h3 class="box-title">Mrs. Prajakta Patil</h3>
                                <p class="testi-grid_desig">Ink Mint Studio</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid testi-equal">
                            <div class="testi-grid_img"><img src="assets/img/icon/logo11.png" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text pb-4">Infeanet provided us with a robust digital solution that simplified our complex product catalog. Their marketing insights helped us reach industrial clients we previously couldn't find online.</p>
                                <h3 class="box-title ">Mr. Saurav</h3>
                                <p class="testi-grid_desig">Ether Chemicals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><button data-slider-prev="#testiSlider3" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#testiSlider3" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</section>
<section class="space-bottom" id="contact-sec">
    <div class="container">
        <div class="cta-box">
            <div class="row">
                <div class="col-lg-5">
                    <div class="cta-box_img"><img src="assets/img/normal/customer_support.jpg" alt="Image"></div>
                </div>
                <div class="col-lg-7">
                    <div class="cta-box_content">
                        <div class="cta-box_icon"><img src="assets/img/icon/call_1.svg" alt="Icon"></div>
                        <div class="title-area mb-35">
                            <div class="shadow-title">CONSULTATION</div><span class="sub-title">
                                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>LET’S CONSULTATION
                            </span>
                            <h2 class="sec-title">Let’s Talk About Business Solutions <span class="text-theme">With Us</span></h2>
                        </div><a href="contact.php" class="th-btn">CONTACT US<i class="fa-regular fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-top-right bg-smoke overflow-hidden space" id="blog-sec" data-bg-src="assets/img/bg/blog_bg_1.png">
    <div class="container">
        <div class="title-area text-center">
            <div class="shadow-title color3">Update</div><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>NEWS & ARTICLES
            </span>
            <h2 class="sec-title">Get Every Single Update <span class="text-theme">Blog</span></h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="blogSlider2" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper" id="idBlogContent">
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_1.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>15 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>2 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">Unsatiable entreaties may collecting Power.</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_2.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>16 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>3 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">Regional Manager & limited time management.</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_3.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>17 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>2 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">What’s the Holding Back the It Solution Industry?</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_4.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>19 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>4 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">Latin derived from Cicero's 1st-century BC</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_1.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>15 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>2 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">Unsatiable entreaties may collecting Power.</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_2.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>16 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>3 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">Regional Manager & limited time management.</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_3.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>17 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>2 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">What’s the Holding Back the It Solution Industry?</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card">
                            <div class="blog-img"><img src="assets/img/blog/blog_1_4.jpg" alt="blog image"></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a href="blog.php"><i class="fal fa-calendar-days"></i>19 Jan, 2025</a> <a href="blog.php"><i class="fal fa-comments"></i>4 Comments</a></div>
                                <h3 class="box-title"><a href="blog-details.php">Latin derived from Cicero's 1st-century BC</a></h3>
                                <p class="blog-text">Progressively plagiarize quality metrics for impactful data. Assertively. Holisticly leverage existing magnetic.</p>
                                <div class="blog-bottom"><a href="blog.php" class="author"><img src="assets/img/blog/author-1-1.png" alt="avater"> By Themeholy</a> <a href="blog-details.php" class="line-btn">Read More<i class="fas fa-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><button data-slider-prev="#blogSlider2" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#blogSlider2" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="shape-mockup" data-bottom="0" data-left="0">
        <div class="particle-2 small" id="particle-4"></div>
    </div>
</section>

<?php
include_once ABS_PATH_TO_PROJECT . "CDN_Footer.php";
?>

<script>
    $(document).ready(function() {

        function getAllLatestBlog() {
            $.ajax({
                url: "ajaxFile/blogAjax.php",
                method: "GET",
                data: {
                    sFlag: "fetchAll",
                    order: "DESC",
                    limit: 5,
                    status: 1,
                },
                dataType: "json",
                success: function(res) {
                    if (res.status === "success") {

                        let html = "";
                        let sFooterBlogLink = "";

                        $.each(res.data, function(i, r) {
                            let shortDesc = r['blog_content'] ?
                                r['blog_content'].replace(/<[^>]+>/g, '').substring(0, 160) + "..." :
                                "";

                            html += `<div class="swiper-slide">
                                        <div class="blog-card">
                                            <div class="blog-img"><img src="${r['blog_image']}" alt="blog image"></div>
                                            <div class="blog-content">
                                                <div class="blog-meta">
                                                    <a href="blog-details.php?id=${r['id']}">
                                                        <i class="fal fa-calendar-days"></i>
                                                            ${r['added_on']}
                                                    </a> 
                                                </div>
                                                <h3 class="box-title" style="text-align: justify;">
                                                    <a href="blog-details.php?id=${r['id']}">${r['blog_title']}</a>
                                                </h3>
                                                <p class="blog-text" style="text-align: justify;">
                                                    ${shortDesc}
                                                </p>
                                                <div class="blog-bottom">
                                                    <a href="blog-details.php?id=${r['id']}" class="author">
                                                        <img src="assets/img/blog/author-1-1.png" alt="avater"> By ${r['author_name']}
                                                    </a> 
                                                    <a href="blog-details.php?id=${r['id']}" class="line-btn">
                                                        Read More
                                                        <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                        });

                        $("#idBlogContent").html(html);
                    }
                }
            });
        }
        getAllLatestBlog();
        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchAll",
                order: "DESC",
                limit: 5,
                status: 1,
            },
            dataType: "json",

            success: function(res) {
                if (res.status === "success") {

                    let html = "";
                    res.data.forEach(s => {

                        html += `
                        <div class="swiper-slide">
                            <div class="service-grid">
                                <div class="service-top-icon">
                                    <span class="icon-circle"></span>
                                    <img src="${s.service_image}" alt="Service Icon">
                                </div>

                                <div class="service-grid_content">
                                    <h3 class="box-title">
                                        <a href="service-details.php?id=${s.id}">
                                            ${stripHtml(s.service_title)}
                                        </a>
                                    </h3>
                                    <p class="service-grid_text" style=" text-align: justify;">
                                        ${truncateText(stripHtml(s.service_description),150)}
                                    </p>
                                    <a href="service-details.php?id=${s.id}" class="th-btn">
                                        Read More <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                    <div class="bg-shape">
                                        <img src="assets/img/bg/service_grid_bg.png" alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    });

                    $("#dynamicServiceSlider").html(html);

                    // Reinitialize Swiper after dynamic load
                    new Swiper("#serviceSlider1", {
                        slidesPerView: 4,
                        spaceBetween: 30,
                        loop: true,
                        autoplay: {
                            delay: 2000
                        },
                        breakpoints: {
                            0: {
                                slidesPerView: 1
                            },
                            576: {
                                slidesPerView: 1
                            },
                            768: {
                                slidesPerView: 2
                            },
                            992: {
                                slidesPerView: 3
                            },
                            1200: {
                                slidesPerView: 4
                            }
                        }
                    });
                }
            }
        });

    });

    function stripHtml(html) {
        return $("<div>").html(html).text();
    }

    function truncateText(text, maxLength) {
        return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
    }

    $(document).ready(function() {
        // $(".project-grid_text").each(function() {

        //     let fullText = $(this).text().trim(); // Get plain text
        //     let maxLength = 120; // Set max characters

        //     if (fullText.length > maxLength) {
        //         let shortText = fullText.substring(0, maxLength) + "...";
        //         $(this).text(shortText);
        //     }
        // });
    });
</script>