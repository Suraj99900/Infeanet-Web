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
}
include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<style>
    .dynamic-width {
        width: 450px;
    }

    .offcanvas-body h6 {
        font-size: 15px;
    }

    .offcanvas .form-control {
        border-radius: 8px;
    }

    .offcanvas .btn-primary {
        border-radius: 8px;
    }

    .offcanvas .btn-secondary {
        border-radius: 8px;
    }
</style>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- User Management -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <!-- Filter Section -->
                            <div class="filter-section mb-4 py-4 px-4">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="filterUserName">User Name</label>
                                        <input type="text" id="filterUserName" class="form-control" placeholder="Search by name">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="filterEmail">Email</label>
                                        <input type="text" id="filterEmail" class="form-control" placeholder="Search by email">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="filterUserType">User Type</label>
                                        <select id="filterUserType" class="form-control">
                                            <option value="">Select User Type</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Student</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button id="searchUser" class="btn btn-primary btn-sm mt-4"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <button id="resetFilters" class="btn btn-secondary btn-sm mt-4"><i class="fa-solid fa-arrows-rotate"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 float-end">
                                    <button id="addUser" data-bs-toggle="offcanvas" data-bs-target="#AddUserOffCanvasId" aria-controls="AddUserOffCanvasId" class="btn btn-primary">Add User</button>
                                    <!-- <button id="exportUserExcel" class="btn btn-success" title="Export to Excel"><i class="fa-solid fa-file-excel"></i></button>
                                    <button id="exportUserPDF" class="btn btn-success" title="Export to PDF"><i class="fa-solid fa-file-pdf"></i></button> -->
                                </div>
                            </div>
                            <!-- End Filter Section -->

                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="col12">
                                        <div class="p-2" style="overflow-x: scroll;">
                                            <table id="userDetailsTable" class="table table-striped table-hover table-bordered display">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th scope="col">Sr. No</th>
                                                        <th scope="col">User ID</th>
                                                        <th scope="col">User Name</th>
                                                        <th scope="col">Semester</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Phone</th>
                                                        <th scope="col">User Type</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="userBodyId">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End User Management -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Add/Update User Off-Canvas -->
<div class="offcanvas offcanvas-end dynamic-width" tabindex="-1" id="AddUserOffCanvasId">
    <div class="offcanvas-header border-bottom">
        <h5 class="fw-bold"><i class="fa-solid fa-user-plus me-2"></i>Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <form id="userForm" class="needs-validation" novalidate>
            <input type="hidden" id="userId" name="userId">

            <!-- User Info Section -->
            <div class="mb-3">
                <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-id-card-clip me-2"></i>User Information</h6>
                <div class="row g-3">

                    <div class="col-sm-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter full name" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Set a password" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phoneNumber" placeholder="Enter phone number" required>
                    </div>

                </div>
            </div>

            <hr>

            <!-- User Role Section -->
            <div class="mb-3">
                <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-user-gear me-2"></i>User Role</h6>
                <div class="row g-3">

                    <div class="col-sm-6">
                        <label class="form-label">User Type</label>
                        <select id="userType" name="userType" class="form-control" required>
                            <option value="">Select User Type</option>
                            <option value="1">Admin</option>
                            <option value="2">Student</option>
                        </select>
                    </div>

                    <!-- Semester (Shown only for Student) -->
                    <div class="col-sm-6 d-none" id="semesterBox">
                        <label class="form-label">Semester</label>
                        <select id="semesterId" name="class_id" class="form-control select2">
                            <option value="">Select Semester</option>
                        </select>
                    </div>

                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                <button type="submit" class="btn btn-primary shadow-sm px-4">Save User</button>
            </div>
        </form>

    </div>
</div>


<!-- Update User Off-Canvas -->
<!-- Update User Off-Canvas -->
<div class="offcanvas offcanvas-end dynamic-width" tabindex="-1" id="UpdateUserOffCanvasId">
    <div class="offcanvas-header border-bottom">
        <h5 class="fw-bold"><i class="fa-solid fa-user-pen me-2"></i>Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <form id="updateUserForm">
            <input type="hidden" id="updateUserId" name="userId">

            <!-- User Info -->
            <div class="mb-3">
                <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-id-card me-2"></i>User Information</h6>

                <div class="row g-3">

                    <div class="col-sm-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="updateUserName" name="username" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="updateEmail" name="email" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Password (optional)</label>
                        <input type="password" class="form-control" id="updatePassword" name="password" placeholder="Leave blank to keep same">
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="updatePhone" name="phoneNumber" required>
                    </div>

                </div>
            </div>

            <hr>

            <!-- Role Section -->
            <div class="mb-3">
                <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-users-gear me-2"></i>User Role</h6>
                <div class="row g-3">

                    <div class="col-sm-6">
                        <label class="form-label">User Type</label>
                        <select id="updateUserType" name="userType" class="form-control" required>
                            <option value="">Select User Type</option>
                            <option value="1">Admin</option>
                            <option value="2">Student</option>
                        </select>
                    </div>

                    <div class="col-sm-6 d-none" id="updateSemesterBox">
                        <label class="form-label">Semester</label>
                        <select id="updateSemesterId" name="class_id" class="form-control select2">
                            <option value="">Select Semester</option>
                        </select>
                    </div>

                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                <button type="submit" class="btn btn-primary shadow-sm px-4">Update User</button>
            </div>

        </form>
    </div>
</div>



<?php include_once "cdn_admin_footer.php"; ?>

<script src="controller/userManagerController.js"></script>