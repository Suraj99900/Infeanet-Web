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
    $sUserName = $oSessionManager->sUserName ?? "Admin";
}

// Navbar + Left Sidebar
include_once "adminNavBar.php";
include_once "leftBar.php";

?>

<script>
    var sUserName = "<?php echo $sUserName; ?>";

    tinymce.init({
        selector: '#ServiceDescriptionEditor',
        plugins: 'anchor autolink autosave charmap codesample directionality emoticons fullscreen help image importcss link lists media nonbreaking pagebreak preview quickbars save searchreplace table visualblocks visualchars wordcount',

        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | ' +
            'link image media table | align lineheight | numlist bullist indent outdent | ' +
            'emoticons charmap | fullscreen preview | searchreplace | removeformat',

        menubar: 'file edit view insert format tools table help',
        tinycomments_mode: 'embedded',
        tinycomments_author: sUserName,
        mergetags_list: [{
                value: sUserName
            },
            {
                value: 'jaiswaljesus384@gmail.com',
                title: 'jaiswaljesus384@gmail.com'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        height: 800,
        hidden_input: false,
        promotion: false,
    });
</script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="serviceManagement.php">Service Management</a></li>
                <li class="breadcrumb-item active">Add Service</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">

            <div class="col-lg-12">
                <div class="card p-4">

                    <h4>Create New Service</h4>
                    <hr>

                    <form id="addServiceForm">

                        <div class="mb-3">
                            <label class="form-label">Service Title</label>
                            <input type="text" id="ServiceTitleId" class="form-control" required placeholder="Enter service title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service Category</label>
                            <input type="text" id="ServiceCategoryId" class="form-control" placeholder="Enter category">
                        </div>

                        <!-- ⭐ ADDED IMAGE UPLOAD FIELD -->
                        <div class="mb-3">
                            <label class="form-label">Service Image</label>
                            <input type="file" id="ServiceImageId" name="service_image"
                                class="form-control" accept="image/*">
                            <small class="text-muted">Upload JPG, PNG, or WEBP (optional)</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service Description</label>
                            <textarea id="ServiceDescriptionEditor"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select id="ServiceStatusId" class="form-control">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <button type="button" id="idAddServiceSubmit" class="btn btn-primary">Save Service</button>
                            <a href="serviceManagement.php" class="btn btn-secondary">Cancel</a>
                        </div>

                        <input type="hidden" id="csrfid" value="<?php echo bin2hex(random_bytes(16)); ?>">

                    </form>

                </div>
            </div>

        </div>

    </section>

</main>


<?php include_once "cdn_admin_footer.php"; ?>

<script src="controller/serviceManagerController.js"></script>