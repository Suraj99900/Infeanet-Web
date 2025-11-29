<?php
require_once "./config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

$iActive = isset($_GET['iActive']) ? $_GET['iActive'] : '';

/**
 * Helper: return 'active' and aria-current when $iActive matches the key
 */
function nav_active($key, $iActive) {
    if ($key === (string)$iActive) {
        return 'nav-link active" aria-current="page';
    }
    return 'nav-link collapsed';
}
?>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- MAIN DASHBOARD -->
        <li class="nav-item">
            <a class="<?= nav_active('dashboard', $iActive) ?>" href="dashboard.php" title="Dashboard">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- HEADING -->
        <li class="nav-heading">Students & Notes</li>

        <!-- VIEW DOCUMENTS -->
        <li class="nav-item">
            <a class="<?= nav_active('view-docs', $iActive) ?>" href="viewAllDocuments.php" title="View uploaded documents">
                <i class="fa-solid fa-folder-open"></i>
                <span>View Documents</span>
            </a>
        </li>

        <!-- ADMIN-ONLY ITEMS -->
        <?php if ($oSessionManager->iUserType == 1) { ?>

            <!-- UPLOAD NOTES -->
            <li class="nav-item">
                <a class="<?= nav_active('upload-notes', $iActive) ?>" href="notesUpload.php" title="Upload notes">
                    <i class="fa-solid fa-file-upload"></i>
                    <span>Upload Notes</span>
                </a>
            </li>

            <!-- SERVICE MANAGEMENT -->
            <li class="nav-item">
                <a class="<?= nav_active('services', $iActive) ?>" href="serviceManagement.php" title="Service management">
                    <i class="fa-solid fa-briefcase"></i>
                    <span>Service Management</span>
                </a>
            </li>

            <!-- BLOG MANAGEMENT -->
            <li class="nav-item">
                <a class="<?= nav_active('blogs', $iActive) ?>" href="adminBlogManagement.php" title="Blog management">
                    <i class="fa-solid fa-blog"></i>
                    <span>Blog Management</span>
                </a>
            </li>

            <!-- COURSE MANAGEMENT -->
            <li class="nav-item">
                <a class="<?= nav_active('courses', $iActive) ?>" href="adminCourseManagement.php" title="Course management">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>Course Management</span>
                </a>
            </li>

            <!-- GALLERY MANAGEMENT -->
            <li class="nav-item">
                <a class="<?= nav_active('gallery', $iActive) ?>" href="galleryManagement.php" title="Gallery management">
                    <i class="fa-solid fa-image"></i>
                    <span>Gallery Management</span>
                </a>
            </li>

            <!-- USER MANAGEMENT -->
            <li class="nav-item">
                <a class="<?= nav_active('users', $iActive) ?>" href="userManagement.php" title="User management">
                    <i class="fa-solid fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>

        <?php } ?>

    </ul>
</aside><!-- End Sidebar -->
