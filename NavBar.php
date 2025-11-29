<?php
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
if (session_status() == PHP_SESSION_NONE) {
    $bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;
} else {
    $bIsLogin = false;
}
?>

<body>
    <div class="cursor"></div>
    <div class="cursor2"></div>
    <div class="color-scheme-wrap active"><button class="switchIcon"><i class="fa-solid fa-palette"></i></button>
        <h4 class="color-scheme-wrap-title"><i class="far fa-palette me-2"></i>Style Swicher</h4>
        <div class="color-switch-btns"><button data-color="#3E66F3"><i class="fa-solid fa-droplet"></i></button> <button data-color="#684DF4"><i class="fa-solid fa-droplet"></i></button> <button data-color="#008080"><i class="fa-solid fa-droplet"></i></button> <button data-color="#323F7C"><i class="fa-solid fa-droplet"></i></button> <button data-color="#FC3737"><i class="fa-solid fa-droplet"></i></button> <button data-color="#8a2be2"><i class="fa-solid fa-droplet"></i></button></div>
        <!-- <a href="https://themeforest.net/user/themeholy" class="th-btn text-center w-100"><i class="fa fa-shopping-cart me-2"></i> Purchase</a> -->
    </div>
    <!-- <div id="preloader" class="preloader"><button class="th-btn th-radius preloaderCls">Cancel Preloader</button>
        <div id="loader" class="th-preloader">
            <div class="animation-preloader">
                <div class="txt-loading"><span preloader-text="I" class="characters">I</span> <span preloader-text="N" class="characters">N</span> <span preloader-text="F" class="characters">F</span> <span preloader-text="E" class="characters">E</span> <span preloader-text="A" class="characters">A</span> <span preloader-text="N" class="characters">N</span> <span preloader-text="E" class="characters">E</span><span preloader-text="T" class="characters">T</span></div>
            </div>
        </div>
    </div> -->
    <div class="sidemenu-wrapper">
        <div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                </div>
            </div>
        </div>
    </div>
    <div class="popup-search-box d-none d-lg-block"><button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#"><input type="text" placeholder="What are you looking for?"> <button type="submit"><i class="fal fa-search"></i></button></form>
    </div>
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo" style="width: 50%;margin: auto;height: auto; background-color: white;"><a class="icon-masking" href="index.php"><span data-mask-src="assets/img/icon/logo.svg" class="mask-icon"></span><img src="assets/img/icon/logo.svg" alt="Webteck"></a></div>
            <div class="th-mobile-menu">
                <ul>
                    <li><a href="index.php">Home</a>
                    </li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="service.php">Services</a>
                        <!-- <ul class="sub-menu">
                            <li><a href="service.php">Services</a></li>
                            <li><a href="service-details.php">Services Details</a></li>
                        </ul> -->
                    </li>
                    <!-- <li><a href="course.php">Course</a>
                    </li> -->
                    <li class="menu-item-has-children"><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="course.php">Course</a>
                            </li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="faq.php">Faq Page</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.php">Blog</a>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php
                    if (!$bIsLogin) { ?>
                        <li><a href="pages-login.php">Login</a></li>
                        <li><a href="pages-register.php">Register</a></li>
                    <?php } else { ?>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="logOut.php">Logout</a></li>
                    <?php } ?>


                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout2">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-map-location"></i>Narhe Road, Pune, Maharashtra 411041, IN</li>
                                <li><i class="fas fa-phone"></i><a href="tel:+91 9823209060">+91 9823209060</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:info@infeanet.com">info@infeanet.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-social"><span class="social-title">Follow Us On : </span><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/in/rutuja-sathe-52139511a/?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin-in"></i></a> <a href="https://www.instagram.com/infeanet?igsh=MWlqc2x1b2JtOTMzOA%3D%3D"><i class="fab fa-instagram"></i></a> <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo" style="width: 15vw;"><a class="icon-masking" href="index.php"><span data-mask-src="assets/img/icon/logo.svg" class="mask-icon"></span><img src="assets/img/icon/logo.svg" alt="Webteck"></a></div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li><a href="index.php">Home</a>

                                    </li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="service.php">Services</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a href="service.php">Services</a></li>
                                            <li><a href="service-details.php">Services Details</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Students</a>
                                        <ul class="sub-menu">
                                            <li><a href="course.php">Course</a>
                                            </li>
                                            <li><a href="gallery.php">Gallery</a></li>
                                            <li><a href="faq.php">Faq Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.php">Blog</a>

                                    </li>
                                    <li><a href="career.php">career</a></li>
                                    <li><a href="contact.php">Contact</a></li>

                                </ul>
                            </nav>
                            <div class="header-button">
                                <!-- <button type="button" class="icon-btn sideMenuToggler d-inline-block d-lg-none">
                                    <i class="far fa-shopping-cart"></i> 
                                    <span class="badge">5</span>
                                </button>  -->
                                <button type="button" class="th-menu-toggle d-inline-block d-lg-none">
                                    <i class="far fa-bars"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <div class="header-button">
                                <button type="button" class="icon-btn searchBoxToggler">
                                    <i class="far fa-search"></i>
                                </button>
                                <!-- <button type="button" class="icon-btn sideMenuToggler">
                                    <i class="far fa-shopping-cart"></i>
                                    <span class="badge">5</span>
                                </button> -->
                                <?php if (!$bIsLogin) { ?>
                                    <a href="pages-login.php" class="btn btn" style="background-color: var(--theme-color); color:white;">Login</a>
                                    <a href="pages-register.php" class="btn btn" style="background-color: var(--theme-color); color:white;">Register</a>
                                <?php } else { ?>
                                    <a href="dashboard.php" class="btn btn" style="background-color: var(--theme-color); color:white;">Dashboard</a>
                                    <a href="logOut.php" class="btn btn" style="background-color: var(--theme-color); color:white;">Logout</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>