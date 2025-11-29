<?php

require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ?? false;

if (!$bIsLogin) {
    header("Location: pages-login.php", true, 301);
    exit;
}

$iUserID = $oSessionManager->iUserID;
$sUserName = $oSessionManager->sUserName ?? "Admin";

include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<script>
    var sUserName = "<?php echo $sUserName; ?>";
</script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Course Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Course Management</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">

                    <!-- FILTER AREA -->
                    <div class="filter-section mb-4 py-4 px-4">

                        <div class="row">

                            <div class="col-sm-4">
                                <label>Course Title</label>
                                <input type="text" id="filterCourseTitle" class="form-control" placeholder="Search course title...">
                            </div>

                            <div class="col-sm-4">
                                <label>Category</label>
                                <input type="text" id="filterCourseCategory" class="form-control" placeholder="Search course category...">
                            </div>

                            <div class="col-sm-4">
                                <button id="searchCourse" class="btn btn-primary btn-sm mt-4">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>

                                <button id="resetCourseFilters" class="btn btn-secondary btn-sm mt-4">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mt-3 float-end">
                            <a id="addCourse" class="btn btn-success" href="adminAddCourse.php">
                                + Add New Course
                            </a>
                        </div>

                    </div>
                    <!-- END FILTER AREA -->

                    <div class="card-body">

                        <div class="row mb-5">
                            <div class="col12">
                                <div class="p-2" style="overflow-x: auto;">

                                    <table id="courseDetailsTable" class="table table-striped table-hover table-bordered display">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Course Title</th>
                                                <th>Category</th>
                                                <th>Instructor</th>
                                                <th>Thumbnail</th>
                                                <th>Course Link</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody id="courseBodyId"></tbody>

                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<?php include_once "cdn_admin_footer.php"; ?>

<!-- Course Manager Controller -->
<script src="controller/courseManagerController.js"></script>

<style>
    /* Make thumbnail image fully cover the box */
    .course-thumb {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>
