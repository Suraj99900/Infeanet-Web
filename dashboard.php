<?php
// Include necessary files
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

// ✅ Secure access check
if (!$oSessionManager->isLoggedIn) {
    header("Location: pages-login.php", true, 301);
    exit;
}

// Extract session data
$userID       = $oSessionManager->iUserID;
$userName     = $oSessionManager->sUserName;
$userEmail    = $oSessionManager->sUserEmail;
$userUniqueId = $oSessionManager->sUserUniqueId;
$userType     = $oSessionManager->iUserType;
$userSemester = $oSessionManager->sSemester;
$classId      = $oSessionManager->iClassId;

include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<style>
    .card {
        margin: 10px;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card h4 { font-size: 1.5rem; margin-bottom: 10px; }
    .card .count { font-size: 3rem; font-weight: bold; }
    .container-box {
        box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);
        background-color: #fff;
        border-radius: 2%;
        padding: 20px;
    }
    .user-box {
        border-radius: 12px;
        background: #eef4ff;
        border-left: 6px solid #4154f1;
        padding: 15px;
        margin-bottom: 20px;
    }
    .user-box strong { font-size: 1.2rem; }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <!-- ✅ User Info Panel -->
    <div class="user-box d-flex justify-content-between align-items-center">
        <div>
            <strong>Welcome, <?php echo ucfirst($userName); ?> 👋</strong><br>
            <small>User ID: <?php echo $userUniqueId; ?></small><br>
            <small>Email: <?php echo $userEmail; ?></small><br>
            <small>Semester: <?php echo $userSemester; ?></small>
            <small>Class ID: <?php echo $classId; ?></small>
        </div>
        <div>
            <span class="badge bg-info p-2">
                <?php echo ($userType == 1) ? "Admin" : "Student"; ?>
            </span>
        </div>
    </div>

    <!-- ✅ Dashboard Cards -->
    <!-- <section class="section dashboard">
        <div class="container-box">
            <div class="row">
               
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card" style="background-color: #4CAF50;">
                        <h4>Total Documents</h4>
                        <div class="count" id="totalDocuments">0</div>
                        <div class="label">Documents available for your class/semester</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card" style="background-color: #2196F3;">
                        <h4>Uploaded Notes</h4>
                        <div class="count" id="uploadedNotes">0</div>
                        <div class="label">Notes uploaded by you</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card" style="background-color: #FF9800;">
                        <h4>Pending Tasks</h4>
                        <div class="count" id="pendingTasks">0</div>
                        <div class="label">Tasks or assignments pending</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card" style="background-color: #FF5722;">
                        <h4>Completed Tasks</h4>
                        <div class="count" id="completedTasks">0</div>
                        <div class="label">Tasks or assignments completed</div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

</main>

<?php include_once "cdn_admin_footer.php"; ?>

<script>
    // Pass PHP session data to JS
    var sessionData = {
        userID: "<?php echo $userID; ?>",
        userName: "<?php echo $userName; ?>",
        userEmail: "<?php echo $userEmail; ?>",
        userUniqueId: "<?php echo $userUniqueId; ?>",
        userType: "<?php echo $userType; ?>",
        userSemester: "<?php echo $userSemester; ?>",
        classId: "<?php echo $classId; ?>"
    };

    console.log(sessionData); // Debug: Remove in production
</script>

<script src="controller/dashboardController.js"></script>
