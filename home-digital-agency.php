<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

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
                <div class="call-btn"><a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                    <div class="media-body"><a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="btn-title popup-video">Watch Our Story</a> <span class="btn-text">Subscribe Now</span></div>
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
                    <div class="img-shape icon-masking"><span class="mask-icon" data-mask-src="assets/img/normal/about_3_1-shape.png"></span> <img src="assets/img/normal/about_3_1-shape.png" alt="img"></div><img src="assets/img/normal/about_3_1.png" alt="About"> <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i class="fas fa-play"></i></a>
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
                                <img src="assets/img/project/1.png" alt="IT Consultancy project image">
                                <a href="assets/img/project/1.png" class="play-btn style3 popup-image">
                                    <i class="far fa-plus"></i>
                                </a>
                            </div>
                            <div class="project-grid_content">
                                <h3 class="box-title"  style="font-size: 18px;" ><a href="project-details.php">IT Consultancy</a></h3>
                                <p class="project-grid_text">Providing innovative digital solutions and strategic guidance to empower businesses in the ever-evolving tech landscape.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/project/2.png" alt="project image"> <a href="assets/img/project/2.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title"  style="font-size: 18px;"><a href="project-details.php">Developteq: Modern & Tech-Focused Digital Platform</a></h3>
                                <p class="project-grid_text">The "Developteq" project showcases a sophisticated and cutting-edge web design tailored for a modern, technology-centric business. The visual design immediately communicates innovation and a focus on advanced digital solutions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/project/3.png" alt="project image"> <a href="assets/img/project/3.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title"  style="font-size: 18px;"><a href="project-details.php">Portfolio-Style & Simple & Catchy Concepts</a></h3>
                                <p class="project-grid_text">demonstrating versatility in design approaches for different client needs. It features two distinct website styles, "Portfolio-Style" and "Simple & Catchy," each rendered on a desktop monitor and a responsive mobile interface.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/project/4.png" alt="project image"> <a href="assets/img/project/4.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title"  style="font-size: 18px;"><a href="project-details.php">AI Tools & Chat Applications: A Comprehensive Digital Ecosystem </a></h3>
                                <p class="project-grid_text">A dual-focused web design, illustrating a robust platform for both advanced AI tools and interactive AI chat applications. The design is displayed on a sleek desktop monitor and two accompanying mobile devices, emphasizing responsive and integrated digital solutions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="project-grid">
                            <div class="project-grid_img"><img src="assets/img/project/5.png" alt="project image"> <a href="assets/img/project/5.png" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a></div>
                            <div class="project-grid_content">
                                <h3 class="box-title"  style="font-size: 18px;"><a href="project-details.php">Chat AI Intelligence</a></h3>
                                <p class="project-grid_text">A next-generation conversational platform featuring a smart AI companion designed for seamless interaction, deep learning, and instant support.</p>
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
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_1.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_2.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_3.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_4.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_5.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_6.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_1.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_2.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_3.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_4.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_5.png" alt="Brand Logo"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box py-20"><img src="assets/img/brand/brand_2_6.png" alt="Brand Logo"></div>
                        </div>
                    </div>
                </div><button data-slider-prev="#brandSlider1" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#brandSlider1" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container space">
        <div class="title-area text-center">
            <div class="shadow-title">Team</div><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>GREAT TEAM
            </span>
            <h2 class="sec-title">See Our Skilled Expert <span class="text-theme">Team</span></h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_1.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Rayan Athels</a></h3><span class="team-desig">Founder & CEO</span>
                            <div class="box-particle" id="team-p1"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_2.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Alex Furnandes</a></h3><span class="team-desig">Project Manager</span>
                            <div class="box-particle" id="team-p2"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_3.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Mary Crispy</a></h3><span class="team-desig">Cheif Expert</span>
                            <div class="box-particle" id="team-p3"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_4.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Henry Joshep</a></h3><span class="team-desig">Product Manager</span>
                            <div class="box-particle" id="team-p4"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_1.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Rayan Athels</a></h3><span class="team-desig">Founder & CEO</span>
                            <div class="box-particle" id="team-p1"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_2.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Alex Furnandes</a></h3><span class="team-desig">Project Manager</span>
                            <div class="box-particle" id="team-p2"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_3.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Mary Crispy</a></h3><span class="team-desig">Cheif Expert</span>
                            <div class="box-particle" id="team-p3"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="th-team team-grid">
                            <div class="team-img"><img src="assets/img/team/team_3_4.jpg" alt="Team"></div>
                            <div class="team-social">
                                <div class="play-btn"><i class="far fa-plus"></i></div>
                                <div class="th-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a> <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <h3 class="box-title"><a href="team-details.php">Henry Joshep</a></h3><span class="team-desig">Product Manager</span>
                            <div class="box-particle" id="team-p4"></div>
                        </div>
                    </div>
                </div>
            </div><button data-slider-prev="#teamSlider1" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#teamSlider1" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
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
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_1.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">David Farnandes</h3>
                                <p class="testi-grid_desig">CEO at Anaton</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_2.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Jackline Techie</h3>
                                <p class="testi-grid_desig">CEO at Kormola</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_3.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Abraham Khalil</h3>
                                <p class="testi-grid_desig">CEO at Anatora</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_4.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Md Sumon Mia</h3>
                                <p class="testi-grid_desig">CEO at Rimasu</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_1.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">David Farnandes</h3>
                                <p class="testi-grid_desig">CEO at Anaton</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_2.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Jackline Techie</h3>
                                <p class="testi-grid_desig">CEO at Kormola</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_3.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Abraham Khalil</h3>
                                <p class="testi-grid_desig">CEO at Anatora</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-grid">
                            <div class="testi-grid_img"><img src="assets/img/testimonial/testi_3_4.jpg" alt="Avater">
                                <div class="testi-grid_quote"><img src="assets/img/icon/quote_left_3.svg" alt="quote"></div>
                            </div>
                            <div class="testi-grid_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
                            <div class="testi-grid_content">
                                <p class="testi-grid_text">Objectively visualize error-free technology for B2B alignment. Monotonectally harness an expanded array of models via effective collaboration. Globally synergize resource sucking value via cutting-edge.</p>
                                <h3 class="box-title">Md Sumon Mia</h3>
                                <p class="testi-grid_desig">CEO at Rimasu</p>
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
                <div class="swiper-wrapper">
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

        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchAll"
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
                                    <h3 class="box-title" style="font-size:16px;>
                                        <a href="service-details.php?id=${s.id}">
                                            ${truncateText(stripHtml(s.service_title),25)}
                                        </a>
                                    </h3>
                                    <p class="service-grid_text" style="text-align: justify;">
                                        ${truncateText(stripHtml(s.service_description),100)}
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
        $(".project-grid_text").each(function() {

            let fullText = $(this).text().trim(); // Get plain text
            let maxLength = 120; // Set max characters

            if (fullText.length > maxLength) {
                let shortText = fullText.substring(0, maxLength) + "...";
                $(this).text(shortText);
            }
        });
    });
</script>