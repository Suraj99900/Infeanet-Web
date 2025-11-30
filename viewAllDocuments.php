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
$(document).ready(function () {

    // Initialize DataTable
    let documentsTable = $("#documentsTable").DataTable({
        destroy: true,
        responsive: true,
        autoWidth: false,
        columnDefs: [
            { orderable: false, targets: [5] } // Disable sorting on Actions column
        ]
    });

    // Fetch documents
    function fetchDocuments() {
        $.ajax({
            url: "ajaxFile/staffUpload_ajax.php",
            type: "POST",
            data: {
                class_id: '<?php echo $iClassId ?>',
                sFlag: 'fetchByClass',
            },
            dataType: "json",
            success: function (response) {

                documentsTable.clear(); // Clear table before adding new rows

                if (response.data.length > 0) {
                    response.data.forEach(function (doc, index) {

                        const downloadBtn = `
                            <a href="${doc.file_path}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        `;

                        documentsTable.row.add([
                            index + 1,
                            doc.name,
                            doc.description,
                            doc.semester,
                            doc.added_on,
                            downloadBtn
                        ]);
                    });
                } else {
                    documentsTable.row.add([
                        "",
                        `<span class="text-muted">No documents found.</span>`,
                        "",
                        "",
                        "",
                        ""
                    ]);
                }

                documentsTable.draw();
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        });
    }

    fetchDocuments();
});


</script>
<!-- <script src="controller/viewAllDocumentsController.js"></script> -->
