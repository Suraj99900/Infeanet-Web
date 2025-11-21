<?php
require_once "config.php";
include_once ABS_PATH_TO_PROJECT . "cdn_admin_header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

if (!$oSessionManager->isLoggedIn) {
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
    tinymce.init({
        selector: "#serviceDescription, #updateServiceDescription",
        plugins: 'anchor autolink autosave charmap codesample directionality emoticons fullscreen help image importcss link lists media nonbreaking pagebreak preview quickbars save searchreplace table visualblocks visualchars wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | fullscreen preview | searchreplace | removeformat',
        menubar: 'file edit view insert format tools table help',
        tinycomments_mode: 'embedded',
        tinycomments_author: sUserName,
        height: 800,
        hidden_input: false,
        promotion: false,
    });
</script>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Update Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="serviceManagement.php">Service Management</a></li>
                <li class="breadcrumb-item active">Update Service</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card p-4">

            <form id="updateServiceForm" enctype="multipart/form-data">

                <input type="hidden" id="serviceId" value="<?= $serviceId ?>">

                <div class="mb-3">
                    <label>Service Title</label>
                    <input type="text" id="updateServiceTitle" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Category</label>
                    <input type="text" id="updateServiceCategory" class="form-control">
                </div>

                <!-- NEW: Image Upload -->
                <div class="mb-3">
                    <label>Service Image</label>
                    <input type="file" id="updateServiceImage" class="form-control" accept="image/*">

                    <img id="serviceImagePreview"
                        src=""
                        style="max-width: 220px; margin-top: 10px; display: none; border-radius:10px;">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea id="updateServiceDescription" class="form-control"></textarea>
                </div>


                <div class="mb-3">
                    <label>Status</label>
                    <select id="updateServiceStatus" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="serviceManagement.php" class="btn btn-secondary">Cancel</a>

            </form>

        </div>
    </section>
</main>

<?php include_once "cdn_admin_footer.php"; ?>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const id = document.getElementById("serviceId").value;

        // ---------------------------
        // Fetch Data
        // ---------------------------
        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchById",
                id: id
            },
            dataType: "json",
            success: function(res) {
                if (res.status === "success") {

                    let d = res.data;

                    $("#updateServiceTitle").val(d.service_title);
                    $("#updateServiceCategory").val(d.service_category);
                    $("#updateServiceStatus").val(d.service_status);

                    // Load description
                    let editorCheck = setInterval(() => {
                        let ed = tinymce.get("updateServiceDescription");
                        if (ed) {
                            ed.setContent(d.service_description); // ⭐ THE REAL FIX
                            clearInterval(editorCheck);
                        }
                    }, 200);

                    // Load image preview
                    if (d.service_image) {
                        $("#serviceImagePreview")
                            .attr("src", d.service_image)
                            .show();
                    }

                } else {
                    alert("Unable to fetch service details");
                }
            }
        });

        // ---------------------------
        // Preview Image On Select
        // ---------------------------
        document.getElementById("updateServiceImage").onchange = function(e) {
            let img = document.getElementById("serviceImagePreview");
            img.src = URL.createObjectURL(e.target.files[0]);
            img.style.display = "block";
        };

        // ---------------------------
        // Submit Update Form
        // ---------------------------
        document.getElementById("updateServiceForm").addEventListener("submit", function(e) {
            e.preventDefault();

            let formData = new FormData();
            formData.append("sFlag", "updateService");
            formData.append("id", id);
            formData.append("title", $("#updateServiceTitle").val());
            formData.append("category", $("#updateServiceCategory").val());
            formData.append("description", tinymce.get("updateServiceDescription").getContent());
            formData.append("status", $("#updateServiceStatus").val());

            // Append image
            let file = document.getElementById("updateServiceImage").files[0];
            if (file) {
                formData.append("service_image", file);
            }

            fetch("ajaxFile/serviceAjax.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(res => {
                    alert(res.message);
                    window.location.href = "serviceManagement.php";
                });
        });

    });
</script>