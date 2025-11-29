<?php

require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;

if (!$bIsLogin) {
    header("Location: pages-login.php", true, 301);
    exit;
}

include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Gallery Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">

                    <!-- Filter Section -->
                    <div class="filter-section mb-4 py-4 px-4">
                        <div class="row">

                            <div class="col-sm-4">
                                <label>Title</label>
                                <input type="text" id="filterTitle" class="form-control" placeholder="Search title">
                            </div>

                            <div class="col-sm-4">
                                <label>Category</label>
                                <select id="filterCategory" class="form-control">
                                    <option value="">All Categories</option>
                                    <option value="Event">Event</option>
                                    <option value="Seminar">Seminar</option>
                                    <option value="Workshop">Workshop</option>
                                </select>
                            </div>

                            <div class="col-sm-4 mt-4">
                                <button id="searchGallery" class="btn btn-primary btn-sm mt-1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <button id="resetFilters" class="btn btn-secondary btn-sm mt-1">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mt-3 float-end">
                            <button id="addGalleryBtn" class="btn btn-primary"
                                data-bs-toggle="offcanvas" data-bs-target="#AddGalleryCanvas">
                                Add Image
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col12">
                                <div class="p-2" style="overflow-x: scroll;">
                                    <table id="galleryTable" class="table table-striped table-hover table-bordered display">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="galleryBody"></tbody>
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

<!-- Add Gallery Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="AddGalleryCanvas">
    <div class="offcanvas-header">
        <h5>Add Gallery Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <form id="addGalleryForm" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Title</label>
                <input type="text" id="gTitle" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Category</label>
                <select id="gCategory" name="category" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Event">Event</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Workshop">Workshop</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Upload Image</label>
                <input type="file" id="gImage" name="image" class="form-control" required>
            </div>

            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>

<!-- Update Gallery Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="UpdateGalleryCanvas">
    <div class="offcanvas-header">
        <h5>Update Gallery Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <form id="updateGalleryForm" enctype="multipart/form-data">

            <input type="hidden" id="updateGalleryId" name="id">

            <div class="mb-3">
                <label>Title</label>
                <input type="text" id="updateGTitle" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label>Category</label>
                <select id="updateGCategory" name="category" class="form-control">
                    <option value="">Select</option>
                    <option value="Event">Event</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Workshop">Workshop</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Replace Image (optional)</label>
                <input type="file" id="updateGImage" name="image" class="form-control">
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
        </form>

    </div>
</div>

<?php include_once "cdn_admin_footer.php"; ?>

<script src="controller/galleryManagerController.js"></script>
