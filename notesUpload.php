<?php
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

if (!$oSessionManager->isLoggedIn) {
    header("Location: pages-login.php");
    exit;
}

include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Upload Notes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Upload Notes</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="card p-4">

            <div class="d-flex justify-content-between mb-3">
                <h5>Notes Upload</h5>
                <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#AddNotesCanvas">
                    <i class="fa-solid fa-file-circle-plus"></i> Upload Notes
                </button>
            </div>

            <table id="notesTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>ISBN</th>
                        <th>Semester</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Added On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="notesBody"></tbody>
            </table>

        </div>
    </section>

</main>

<!-- Add Notes Offcanvas -->
<div class="offcanvas offcanvas-end dynamic-width" tabindex="-1" id="AddNotesCanvas">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Upload Notes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <form id="notesUploadForm" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Name / Subject</label>
                <input type="text" class="form-control" name="name" placeholder="Enter subject name" required>
            </div>

            <div class="mb-3">
                <label>ISBN</label>
                <input type="text" class="form-control" name="isbn" placeholder="Book ISBN (optional)">
            </div>

            <div class="mb-3">
                <label>Semester</label>
                <select class="form-control" name="semester" id="semesterSelect" required></select>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Enter short description" required></textarea>
            </div>

            <div class="mb-3">
                <label>Upload File</label>
                <input type="file" class="form-control" name="file" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Upload</button>

        </form>

    </div>
</div>


<?php include_once "cdn_admin_footer.php"; ?>
<script src="controller/notesUploadController.js"></script>
