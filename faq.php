<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Frequently Asked Questions</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Frequently Asked Questions</li>
            </ul>
        </div>
    </div>
</div>

<div class="space">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title">
                <div class="icon-masking me-2">
                    <span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span>
                    <img src="assets/img/theme-img/title_shape_2.svg" alt="shape">
                </div>
                FAQ
            </span>
            <h2 class="sec-title">Talk To About Any <span class="text-theme">Question?</span></h2>
            <p class="small text-muted">Below you'll find answers for Business Clients, Students & Interns, and detailed service questions.</p>
        </div>

        <div class="row gy-4">
            <!-- LEFT: Business Clients + Services -->
            <div class="col-xl-6">
                <!-- Category 1: Business Clients -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-3">📌 Category 1: <strong>For Business Clients</strong></h4>
                        <div class="accordion" id="faqBusinessAccordion">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="biz-heading-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biz-collapse-1" aria-expanded="false" aria-controls="biz-collapse-1">
                                        1. What services does Infeanet Technology provide?
                                    </button>
                                </h2>
                                <div id="biz-collapse-1" class="accordion-collapse collapse" aria-labelledby="biz-heading-1" data-bs-parent="#faqBusinessAccordion">
                                    <div class="accordion-body">
                                        We offer complete digital and IT solutions including Web Development, Artificial Intelligence & Machine Learning, UI/UX Design, Cloud & DevOps services, Business Analysis, and Digital Marketing (SEO).
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="biz-heading-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biz-collapse-2" aria-expanded="false" aria-controls="biz-collapse-2">
                                        2. How do you ensure high-quality project delivery?
                                    </button>
                                </h2>
                                <div id="biz-collapse-2" class="accordion-collapse collapse" aria-labelledby="biz-heading-2" data-bs-parent="#faqBusinessAccordion">
                                    <div class="accordion-body">
                                        Our 4-stage workflow — Select Project → Analyze → Plan & Execute → Deliver — ensures clarity, transparency, and timely results with zero compromise on quality.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="biz-heading-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biz-collapse-3" aria-expanded="false" aria-controls="biz-collapse-3">
                                        3. Which technologies do your teams work with?
                                    </button>
                                </h2>
                                <div id="biz-collapse-3" class="accordion-collapse collapse" aria-labelledby="biz-heading-3" data-bs-parent="#faqBusinessAccordion">
                                    <div class="accordion-body">
                                        We use modern and scalable technologies including cloud platforms (AWS, Azure, GCP), full-stack web technologies (React, Node.js, PHP, Python), and advanced AI/ML frameworks like TensorFlow, Scikit-Learn, and PyTorch.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="biz-heading-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biz-collapse-4" aria-expanded="false" aria-controls="biz-collapse-4">
                                        4. Do you provide AI and automation-based business solutions?
                                    </button>
                                </h2>
                                <div id="biz-collapse-4" class="accordion-collapse collapse" aria-labelledby="biz-heading-4" data-bs-parent="#faqBusinessAccordion">
                                    <div class="accordion-body">
                                        Yes. We build smart automation tools, predictive analytics systems, chatbots, recommendation engines, and AI-powered dashboards tailored to your business needs.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="biz-heading-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biz-collapse-5" aria-expanded="false" aria-controls="biz-collapse-5">
                                        5. How do you communicate progress during the project?
                                    </button>
                                </h2>
                                <div id="biz-collapse-5" class="accordion-collapse collapse" aria-labelledby="biz-heading-5" data-bs-parent="#faqBusinessAccordion">
                                    <div class="accordion-body">
                                        We maintain regular updates through emails, review meetings, and a shared progress dashboard to keep clients involved at every step.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Service-specific Q&A -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-3">Services — Quick Questions</h4>

                        <div class="accordion" id="servicesAccordion">

                            <!-- Web Development -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="svc-heading-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#svc-collapse-1" aria-expanded="false" aria-controls="svc-collapse-1">
                                        🖥️ Web Development — Do you build both static and dynamic websites?
                                    </button>
                                </h2>
                                <div id="svc-collapse-1" class="accordion-collapse collapse" aria-labelledby="svc-heading-1" data-bs-parent="#servicesAccordion">
                                    <div class="accordion-body">
                                        Yes — we develop everything from business landing pages to full-featured web portals and e-commerce platforms. We also modernize existing sites, improve performance, and optimize for SEO and mobile responsiveness.
                                    </div>
                                </div>
                            </div>

                            <!-- AI & ML -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="svc-heading-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#svc-collapse-2" aria-expanded="false" aria-controls="svc-collapse-2">
                                        🤖 AI & ML — What types of AI/ML solutions do you offer?
                                    </button>
                                </h2>
                                <div id="svc-collapse-2" class="accordion-collapse collapse" aria-labelledby="svc-heading-2" data-bs-parent="#servicesAccordion">
                                    <div class="accordion-body">
                                        We develop predictive analytics models, automation tools, chatbots, recommendation systems, and data-driven decision platforms. Yes — AI can be customized to your specific business workflow and goals.
                                    </div>
                                </div>
                            </div>

                            <!-- UI/UX -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="svc-heading-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#svc-collapse-3" aria-expanded="false" aria-controls="svc-collapse-3">
                                        🎨 UI/UX Design — How do you ensure the best user experience?
                                    </button>
                                </h2>
                                <div id="svc-collapse-3" class="accordion-collapse collapse" aria-labelledby="svc-heading-3" data-bs-parent="#servicesAccordion">
                                    <div class="accordion-body">
                                        We conduct user research, create interactive prototypes, and follow usability standards to deliver visually appealing and intuitive designs for both web and mobile.
                                    </div>
                                </div>
                            </div>

                            <!-- SEO -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="svc-heading-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#svc-collapse-4" aria-expanded="false" aria-controls="svc-collapse-4">
                                        📈 Digital Marketing (SEO) — Will SEO help my business get more leads?
                                    </button>
                                </h2>
                                <div id="svc-collapse-4" class="accordion-collapse collapse" aria-labelledby="svc-heading-4" data-bs-parent="#servicesAccordion">
                                    <div class="accordion-body">
                                        Absolutely — our SEO strategies improve search visibility, drive organic traffic, and convert visitors into customers. We offer ongoing monthly support.
                                    </div>
                                </div>
                            </div>

                            <!-- Business Analysis -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="svc-heading-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#svc-collapse-5" aria-expanded="false" aria-controls="svc-collapse-5">
                                        🧩 Business Analysis — How does this help my project?
                                    </button>
                                </h2>
                                <div id="svc-collapse-5" class="accordion-collapse collapse" aria-labelledby="svc-heading-5" data-bs-parent="#servicesAccordion">
                                    <div class="accordion-body">
                                        Our analysts translate business needs into clear technical requirements, reducing risk and improving efficiency. We provide documentation, user flows and wireframes.
                                    </div>
                                </div>
                            </div>

                            <!-- Cloud & DevOps -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="svc-heading-6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#svc-collapse-6" aria-expanded="false" aria-controls="svc-collapse-6">
                                        ☁️ Cloud Services & DevOps — Do you migrate systems to cloud?
                                    </button>
                                </h2>
                                <div id="svc-collapse-6" class="accordion-collapse collapse" aria-labelledby="svc-heading-6" data-bs-parent="#servicesAccordion">
                                    <div class="accordion-body">
                                        Yes — we assist in cloud migration (AWS, Azure, GCP) and implement CI/CD pipelines, automated deployments and monitoring for reliability and scalability.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT: Students & Interns + Contact CTA -->
            <div class="col-xl-6">
                <!-- Category 2: Students & Interns -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-3">🎓 Category 2: <strong>For Students & Interns</strong></h4>
                        <div class="accordion" id="faqStudentAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="stu-heading-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stu-collapse-1" aria-expanded="false" aria-controls="stu-collapse-1">
                                        6. What kind of training programs do you offer?
                                    </button>
                                </h2>
                                <div id="stu-collapse-1" class="accordion-collapse collapse" aria-labelledby="stu-heading-1" data-bs-parent="#faqStudentAccordion">
                                    <div class="accordion-body">
                                        Practical, industry-ready training in Web Development, AI/ML, UI/UX, and Cloud/DevOps — focused on real skills companies want.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="stu-heading-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stu-collapse-2" aria-expanded="false" aria-controls="stu-collapse-2">
                                        7. Will I get to work on live projects?
                                    </button>
                                </h2>
                                <div id="stu-collapse-2" class="accordion-collapse collapse" aria-labelledby="stu-heading-2" data-bs-parent="#faqStudentAccordion">
                                    <div class="accordion-body">
                                        Yes — students contribute to real client projects to learn complete project execution from planning to deployment.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="stu-heading-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stu-collapse-3" aria-expanded="false" aria-controls="stu-collapse-3">
                                        8. Is this training suitable for beginners?
                                    </button>
                                </h2>
                                <div id="stu-collapse-3" class="accordion-collapse collapse" aria-labelledby="stu-heading-3" data-bs-parent="#faqStudentAccordion">
                                    <div class="accordion-body">
                                        Absolutely — mentors guide you step-by-step from basics to professional tasks.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="stu-heading-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stu-collapse-4" aria-expanded="false" aria-controls="stu-collapse-4">
                                        9. Will I receive certification after completion?
                                    </button>
                                </h2>
                                <div id="stu-collapse-4" class="accordion-collapse collapse" aria-labelledby="stu-heading-4" data-bs-parent="#faqStudentAccordion">
                                    <div class="accordion-body">
                                        Yes — every student receives an Internship & Project Experience Certificate to strengthen resumes and placements.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="stu-heading-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stu-collapse-5" aria-expanded="false" aria-controls="stu-collapse-5">
                                        10. How does Infeanet Technology help with career growth?
                                    </button>
                                </h2>
                                <div id="stu-collapse-5" class="accordion-collapse collapse" aria-labelledby="stu-heading-5" data-bs-parent="#faqStudentAccordion">
                                    <div class="accordion-body">
                                        We develop your technical & soft skills and give exposure to corporate workflows to prepare you for industry roles.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA / Contact -->
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="mb-2">Want to talk with us?</h5>
                        <p class="small text-muted mb-3">Request a consultation or training information — we’ll get back to you.</p>
                        <a href="contact.php" class="btn btn-primary mb-2">Contact Us</a>
                        <a href="#contact-sec" class="btn btn-outline-secondary mb-2">Request a Quote</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- Contact / Quote section (kept as in original file) -->
<!-- <div class="space" id="contact-sec" data-bg-src="assets/img/bg/form_bg_1.jpg">
    <div class="container">
        <div class="title-area text-center"><span class="sub-title">
                <div class="icon-masking me-2"><span class="mask-icon" data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img src="assets/img/theme-img/title_shape_2.svg" alt="shape"></div>GET A QUOTE
            </span>
            <h2 class="sec-title">Request A Free <span class="text-theme">Consultation</span></h2>
        </div>
        <form action="https://html.themehour.net/webteck/demo/mail.php" method="POST" class="quote-form ajax-contact">
            <div class="row">
                <div class="form-group col-md-6"><input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name"> <i class="fal fa-user"></i></div>
                <div class="form-group col-md-6"><input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email"> <i class="fal fa-envelope"></i></div>
                <div class="form-group col-md-6"><input type="tel" class="form-control" name="number" id="number" placeholder="Phone number"> <i class="fal fa-phone"></i></div>
                <div class="form-group col-md-6"><select name="subject" id="subject" class="form-select">
                        <option value="" disabled="disabled" selected="selected" hidden>Select Subject</option>
                        <option value="IT Consult">IT Consult</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Branding Solution">Branding Solution</option>
                        <option value="Product Marketing">Product Marketing</option>
                    </select> <i class="fal fa-file-lines"></i></div>
                <div class="form-group col-12"><textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Write Your Message"></textarea> <i class="fal fa-pencil"></i></div>
                <div class="form-btn text-center col-12"><button class="th-btn">Send Message<i class="fa-regular fa-arrow-right ms-2"></i></button></div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
        </form>
    </div>
</div> -->

<?php include_once "CDN_Footer.php"; ?>
