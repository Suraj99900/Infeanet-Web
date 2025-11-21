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
// Check if class_id exists in session
$iClassId = $oSessionManager->iClassId ?? 0;

include_once "adminNavBar.php";
include_once "leftBar.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>All Documents</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Documents</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="card p-4">

            <div class="d-flex justify-content-between mb-3">
                <h5>Documents List</h5>
                <!-- Optional: Add Filter button or refresh -->
            </div>

            <table id="documentsTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Class</th>
                        <th>Uploaded On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="idDocumentsBody">
                </tbody>
            </table>

        </div>
    </section>

</main>

<?php 
include_once "cdn_admin_footer.php"; 
?>
<script>
$(document).ready(function() {

    // Function to fetch documents
    function fetchDocuments() {
        $.ajax({
            url: "ajaxFile/staffUpload_ajax.php",  // PHP script to fetch documents
            type: "POST",
            data: {
                class_id: '<?php echo $iClassId ?>',  // classId will be passed from PHP
                sFlag: 'fetchByClass',
            },
            dataType: "json",
            success: function(response) {
                const tbody = $("#idDocumentsBody");
                tbody.empty();

                if (response.data.length > 0) {
                    var iIndex = 1;
                    response.data.forEach(function(doc) {
                        
                        let row = `
                            <tr>
                                <td>${iIndex}</td>
                                <td>${doc.name}</td>
                                <td>${doc.description}</td>
                                <td>${doc.semester}</td>
                                <td>${doc.added_on}</td>
                                <td>
                                    <a href="${doc.file_path}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-download"></i> Download
                                    </a>
                                </td>
                            </tr>
                        `;
                        tbody.append(row);
                        iIndex++;
                    });
                } else {
                    tbody.append(`<tr><td colspan="6" class="text-center">No documents found.</td></tr>`);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " " + error);
            }
        });
    }

    // Get class_id from PHP session
    let classId = typeof window.iClassId !== "undefined" ? window.iClassId : 0;

    // Fetch documents on page load
    
    fetchDocuments();
});

</script>
<!-- <script src="controller/viewAllDocumentsController.js"></script> -->
