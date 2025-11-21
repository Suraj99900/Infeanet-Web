<?php

// Include header section of template
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;

if (!$bIsLogin) {
    header("Location: pages-login.php", true, 301);
    exit;
} else {
    $iUserID = $oSessionManager->iUserID;
    $sUserName = $oSessionManager->sUserName ?? "Admin";
}

$serviceId = $_GET['id'] ?? 0;

include_once "adminNavBar.php";
include_once "leftBar.php";
?>
<script>
    var sUserName = "<?php echo $sUserName; ?>";
</script>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Service Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Service Management</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">

                    <!-- Service Management -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <!-- Filter Section -->
                            <div class="filter-section mb-4 py-4 px-4">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <label>Service Title</label>
                                        <input type="text" id="filterServiceTitle" class="form-control" placeholder="Search service">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Category</label>
                                        <input type="text" id="filterServiceCategory" class="form-control" placeholder="Search category">
                                    </div>

                                    <div class="col-sm-4">
                                        <button id="searchService" class="btn btn-primary btn-sm mt-4"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <button id="resetServiceFilters" class="btn btn-secondary btn-sm mt-4"><i class="fa-solid fa-arrows-rotate"></i></button>
                                    </div>

                                </div>

                                <div class="mt-3 float-end">
                                    <a id="addService" class="btn btn-success" href="addServicePage.php">
                                        Add Service
                                    </a>
                                </div>
                            </div>
                            <!-- End Filter Section -->

                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="col12">
                                        <div class="p-2" style="overflow-x: scroll;">
                                            <table id="serviceDetailsTable" class="table table-striped table-hover table-bordered display">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sr. No</th>
                                                        <th>Service ID</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <!-- <th>Description</th> -->
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="serviceBodyId">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Service Management -->

                </div>
            </div>

        </div>
    </section>

</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>


<?php include_once "cdn_admin_footer.php"; ?>


<script src="controller/serviceManagerController.js"></script>
