<?php
require_once "./config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$iActive = isset($_GET['iActive']) ? $_GET['iActive'] : '';
?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- ========================= -->
        <!-- 1️⃣ MAIN DASHBOARD SECTION -->
        <!-- ========================= -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- ================================= -->
        <!-- 2️⃣ DOCUMENT MANAGEMENT SECTION -->
        <!-- ================================= -->
        <li class="nav-heading">Student and Notes Management</li>

        <!-- View All Uploaded Documents -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="viewAllDocuments.php">
                <i class="fa-solid fa-folder-open"></i>
                <span>View Uploaded Documents</span>
            </a>
        </li>



        <!-- Admin only -->
        <?php if ($oSessionManager->iUserType == 1) { ?>


            <!-- Upload Notes (Folder → Subfolder → File) -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="notesUpload.php">
                    <i class="fa-solid fa-file-circle-plus"></i>
                    <span>Upload Notes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="serviceManagement.php">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Service Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="adminBlogManagement.php">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Blog Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="userManagement.php">
                    <i class="fa-solid fa-user"></i>
                    <span>User Management</span>
                </a>
            </li>

        <?php } ?>

    </ul>

</aside><!-- End Sidebar -->