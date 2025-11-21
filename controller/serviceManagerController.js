$(document).ready(function () {

    // -------------------------------
    // INIT: Load All Services
    // -------------------------------
    fetchAllServices();


    // -------------------------------
    // TinyMCE INIT
    // -------------------------------
    tinymce.init({
        selector: "#serviceDescription, #updateServiceDescription",
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


    // -------------------------------
    // Search & Filter
    // -------------------------------
    $("#searchService").on("click", fetchAllServices);

    $("#resetServiceFilters").on("click", function () {
        $("#filterServiceTitle").val("");
        $("#filterServiceCategory").val("");
        fetchAllServices();
    });


    // -------------------------------
    // ADD SERVICE
    // -------------------------------
    $("#idAddServiceSubmit").on("click", (e) => {
        e.preventDefault();

        let description = tinymce.get("ServiceDescriptionEditor").getContent();

        let formData = new FormData();
        formData.append("sFlag", "addService");
        formData.append("title", $("#ServiceTitleId").val());
        formData.append("category", $("#ServiceCategoryId").val());
        formData.append("description", description);
        formData.append("status", $("#ServiceStatusId").val());
        formData.append("author_name", sUserName);

        // ⭐ append image if selected
        let file = $("#ServiceImageId")[0].files[0];
        if (file) {
            formData.append("service_image", file);
        }

        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    responsePop("Success", res.message, "success", "ok");
                    fetchAllServices();
                    window.location = "serviceManagement.php";
                } else {
                    responsePop("Error", res.message, "error", "ok");
                }
            }
        });
    });


    // -------------------------------
    // FETCH ALL SERVICES
    // -------------------------------
    function fetchAllServices() {

        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchAll",
                title: $("#filterServiceTitle").val(),
                category: $("#filterServiceCategory").val()
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    populateServiceDataTable("serviceDetailsTable", res.data);
                } else {
                    responsePop("Error", res.message, "error", "ok");
                }
            }
        });
    }


    // -------------------------------
    // POPULATE DATATABLE
    // -------------------------------
    function populateServiceDataTable(tableId, data) {

        $(`#${tableId}`).DataTable({
            data: data,
            destroy: true,
            columns: [
                {
                    data: null,
                    render: (d, t, r, meta) => meta.row + 1
                },
                { data: "service_id" },
                { data: "service_title" },
                { data: "service_category" },
                // {
                //     data: "service_description",
                //     render: (d) => `<div style="max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${d}</div>`
                // },
                {
                    data: "service_status",
                    render: (d) =>
                        d == 1
                            ? `<span class="badge bg-success">Active</span>`
                            : `<span class="badge bg-danger">Inactive</span>`
                },
                {
                    data: "id",
                    render: (id) => `
                        <button class="btn btn-sm btn-warning editService" data-id="${id}"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger deleteService" data-id="${id}"><i class="fa fa-trash"></i></button>
                    `
                }
            ]
        });
    }


    // -------------------------------
    // FETCH SINGLE SERVICE (FOR UPDATE)
    // -------------------------------
    function fetchServiceById(serviceId) {

        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "GET",
            data: { sFlag: "fetchById", id: serviceId },
            dataType: "json",
            success: function (res) {

                if (res.status === "success") {

                    let d = res.data;

                    $("#updateServiceId").val(d.service_id);
                    $("#updateServiceTitle").val(d.service_title);
                    $("#updateServiceCategory").val(d.service_category);
                    $("#updateServiceStatus").val(d.service_status);

                    // Set content only when editor exists
                    setTimeout(() => {
                        if (tinymce.get("updateServiceDescription")) {
                            tinymce.get("updateServiceDescription").setContent(d.service_description);
                        }
                    }, 200);

                    // Open offcanvas
                    window.location = "updateServicePage.php?id=" + d.id;

                } else {
                    responsePop("Error", "Unable to fetch service", "error", "ok");
                }
            }
        });
    }


    // -------------------------------
    // UPDATE SERVICE
    // -------------------------------
    $("#updateServiceForm").submit(function (e) {
        e.preventDefault();

        let description = tinymce.get("updateServiceDescription").getContent();

        let formData = new FormData();
        formData.append("sFlag", "updateService");
        formData.append("id", $("#updateServiceId").val());
        formData.append("title", $("#updateServiceTitle").val());
        formData.append("category", $("#updateServiceCategory").val());
        formData.append("description", description);
        formData.append("status", $("#updateServiceStatus").val());

        // ⭐ append image if user selected one
        let updateFile = $("#updateServiceImageId")[0].files[0];
        if (updateFile) {
            formData.append("service_image", updateFile);
        }

        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {

                    responsePop("Updated", res.message, "success", "ok");
                    fetchAllServices();

                    bootstrap.Offcanvas.getInstance("#UpdateServiceCanvas").hide();
                } else {
                    responsePop("Error", res.message, "error", "ok");
                }
            }
        });
    });


    // -------------------------------
    // EDIT BUTTON CLICK
    // -------------------------------
    $(document).on("click", ".editService", function () {
        let id = $(this).data("id");
        fetchServiceById(id);
    });


    // -------------------------------
    // DELETE SERVICE
    // -------------------------------
    $(document).on("click", ".deleteService", function () {
        let id = $(this).data("id");

        if (!confirm("Are you sure?")) return;

        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "POST",
            data: { sFlag: "deleteService", id: id },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    responsePop("Deleted", res.message, "success", "ok");
                    fetchAllServices();
                } else {
                    responsePop("Error", res.message, "error", "ok");
                }
            }
        });
    });

});
