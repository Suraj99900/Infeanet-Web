<?php
include_once "config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once ABS_PATH_TO_PROJECT . 'CDN_Header.php';
include_once ABS_PATH_TO_PROJECT . 'NavBar.php';

$id = Input::request('id');
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/hum3.png">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" id="serviceTitleBreadcrumb">Service Details</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li id="serviceTitleBreadcrumb2">Service Details</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <!-- LEFT CONTENT -->
            <div class="col-xxl-8 col-lg-8">
                <div class="page-single">

                    <!-- MAIN IMAGE -->
                    <div class="page-img" >
                        <img id="serviceMainImage" style="width: 100% !important;" src="assets/img/service/default.jpg" alt="Service Image">
                    </div>

                    <div class="page-content">
                        
                        <!-- TITLE -->
                        <h2 class="h3 page-title" id="serviceTitle">Loading...</h2>

                        <!-- DESCRIPTION -->
                        <div id="serviceDescription"></div>

                        <!-- INNER IMAGE / VIDEO -->
                        <div class="row" id="serviceInnerSection"></div>

                    </div>
                </div>
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-xxl-4 col-lg-4">
                <aside class="sidebar-area">

                    <!-- ALL SERVICES LIST -->
                    <div class="widget widget_nav_menu">
                        <h3 class="widget_title">All Services</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu" id="sidebarServiceList"></ul>
                        </div>
                    </div>

                    <div class="widget widget_download">
                        <h4 class="widget_title">Download Brochure</h4>
                        <div class="download-widget-wrap">
                            <a href="#" class="th-btn"><i class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF</a>
                            <a href="#" class="th-btn style5"><i class="fa-light fa-file-lines me-2"></i>DOWNLOAD DOC</a>
                        </div>
                    </div>

                </aside>
            </div>

        </div>
    </div>
</section>

<?php include_once ABS_PATH_TO_PROJECT . "CDN_Footer.php"; ?>
<script>
var id = '<?php echo $id ?>';
FetchServiceById(id);
LoadAllSidebarServices();

function FetchServiceById(id) {

    $.ajax({
        url: "ajaxFile/serviceAjax.php",
        method: "GET",
        data: { sFlag: "fetchById", id: id },
        dataType: "json",

        success: function(res) {

            if (res.status !== "success") {
                alert("Unable to fetch service details");
                return;
            }

            let d = res.data;

            // ============ BASIC DETAILS ============
            $("#serviceTitle").text(d.service_title);
            $("#serviceTitleBreadcrumb").text(d.service_title);
            $("#serviceTitleBreadcrumb2").text(d.service_title);
            
            $("#serviceDescription").html(d.service_description);

            if (d.service_image) {
                $("#serviceMainImage").attr("src", d.service_image);
            }

            // ============ INNER IMAGE / VIDEO ============
            let innerHTML = "";
            if (d.inner_image || d.inner_video_url) {

                innerHTML = `
                <div class="col-md-6 mb-30">
                    <div class="th-video">
                        <img class="w-100" src="${d.inner_image}" alt="service">
                        <a href="${d.inner_video_url}" class="play-btn popup-video">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>`;
            }
            $("#serviceInnerSection").html(innerHTML);

            // ============ FEATURES ============
            let featureHTML = "";
            if (d.features && Array.isArray(d.features)) {
                d.features.forEach(f => {
                    featureHTML += `
                    <div class="service-feature">
                        <div class="service-feature_icon">
                            <img src="${f.icon}" alt="icon">
                        </div>
                        <div class="media-body">
                            <h4 class="service-feature_title">${f.title}</h4>
                            <p class="service-feature_text">${f.desc}</p>
                        </div>
                    </div>`;
                });
            }
            $("#serviceFeatures").html(featureHTML);
            $("#faqAccordion").html(faqHTML);
        }
    });
}


function LoadAllSidebarServices() {
    $.ajax({
        url: "ajaxFile/serviceAjax.php",
        method: "GET",
        data: { sFlag: "fetchAll" },
        dataType: "json",
        success: function(res) {

            if (res.status !== "success") return;

            let html = "";
            res.data.forEach(s => {
                html += `<li><a href="service-details.php?id=${s.id}">${s.service_title}</a></li>`;
            });

            $("#sidebarServiceList").html(html);
        }
    });
}
</script>
