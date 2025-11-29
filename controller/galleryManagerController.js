/**
 * galleryManagerController.js
 * Requires: jQuery, Bootstrap 5 (offcanvas), SweetAlert2 (Swal)
 *
 * Save as: controller/galleryManagerController.js
 *
 * Purpose: Manage gallery list, add, update, delete via AJAX to ajaxFile/galleryAjax.php
 */

(function ($) {
    "use strict";

    const AJAX_URL = "ajaxFile/galleryAjax.php";

    // ------------------ Helpers ------------------
    function isSuccess(res) {
        // server may return boolean true or string 'success'
        return !!res && (res.status === true || String(res.status).toLowerCase() === "success" || String(res.status).toLowerCase() === "ok" || res.status > 0);
    }

    function showAlert(type, title, text, timer = 1800) {
        // type: 'success' | 'error' | 'info' | 'warning' | 'question'
        Swal.fire({
            icon: type,
            title: title || (type === 'success' ? 'Success' : (type === 'error' ? 'Error' : 'Info')),
            text: text || "",
            timer: timer,
            showConfirmButton: false,
            toast: false
        });
    }

    function safeParseJSON(resp) {
        if (!resp) return null;
        if (typeof resp === "object") return resp;
        try { return JSON.parse(resp); } catch (e) { return null; }
    }

    function escapeHtml(s) {
        if (!s && s !== 0) return "";
        return String(s).replace(/[&<>"']/g, m => ({ "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" })[m]);
    }

    function buildImageUrl(path) {
        if (!path) return "assets/img/product/product_1_1.jpg";
        return path.startsWith("http") ? path : path;
    }

    // ------------------ Render ------------------
    function renderTableRows(rows) {
        const $body = $("#galleryBody");
        $body.empty();

        if (!Array.isArray(rows) || rows.length === 0) {
            $body.append(`<tr><td colspan="6" class="text-center small text-muted">No images found.</td></tr>`);
            return;
        }

        rows.forEach((row, idx) => {
            const id = row.id || row.gallery_id;
            const title = row.image_name || row.title || "";
            const category = row.image_tagline || row.cat || "";
            const imgPath = row.image_path || row.path || "";
            const status = Number((typeof row.status !== "undefined") ? row.status : (row.course_status || 1));

            const imageUrl = buildImageUrl(imgPath);
            const statusLabel = status === 1
                ? `<span class="badge bg-success">Active</span>`
                : `<span class="badge bg-secondary">Inactive</span>`;

            const $tr = $(`
            <tr data-id="${escapeHtml(id)}">
              <td>${idx + 1}</td>
              <td><img src="${escapeHtml(imageUrl)}" style="width:84px;height:56px;object-fit:cover;border-radius:4px;"></td>
              <td><div class="fw-bold">${escapeHtml(title)}</div></td>
              <td>${escapeHtml(category)}</td>
              <td class="text-center">${statusLabel}</td>
              <td>
                <button class="btn btn-sm btn-outline-primary editGalleryBtn" data-id="${escapeHtml(id)}">
                    <i class="fa fa-pen"></i></button>
                <button class="btn btn-sm btn-outline-warning toggleStatusBtn" data-id="${escapeHtml(id)}" data-status="${status}">
                    ${status === 1 ? "Disable" : "Enable"}</button>
                <button class="btn btn-sm btn-outline-danger deleteGalleryBtn" data-id="${escapeHtml(id)}">
                    <i class="fa fa-trash"></i></button>
              </td>
            </tr>
            `);

            $body.append($tr);
        });
    }

    // ------------------ AJAX functions ------------------
    function loadGallery(filters = {}) {
        $.ajax({
            url: AJAX_URL,
            method: "POST",
            data: { sFlag: "fetchAll", ...filters },
            dataType: "json"
        })
            .done(res => {
                if (isSuccess(res) && Array.isArray(res.data)) {
                    renderTableRows(res.data);
                } else {
                    renderTableRows([]);
                    showAlert("info", "No data", res?.message || "No images available");
                }
            })
            .fail(() => {
                showAlert("error", "Server error", "Error loading gallery");
            });
    }

    function fetchGalleryById(id, cb) {
        $.ajax({
            url: AJAX_URL,
            method: "POST",
            data: { sFlag: "fetchById", id: id },
            dataType: "json"
        })
            .done(res => {
                if (isSuccess(res) && res.data) cb(null, res.data);
                else cb(res?.message || "Record not found");
            })
            .fail(() => cb("Server error"));
    }

    function addGallery(formData, cb) {
        formData.append("sFlag", "addGallery");
        $.ajax({
            url: AJAX_URL,
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        })
            .done(res => cb(null, res))
            .fail(() => cb("Server error"));
    }

    function updateGallery(formData, cb) {
        formData.append("sFlag", "updateImage"); // matches your ajaxFile (updateImage)
        $.ajax({
            url: AJAX_URL,
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json"
        })
            .done(res => cb(null, res))
            .fail(() => cb("Server error"));
    }

    function deleteGallery(id, cb) {
        $.ajax({
            url: AJAX_URL,
            method: "POST",
            data: { sFlag: "deleteImage", id: id },
            dataType: "json"
        })
            .done(res => cb(null, res))
            .fail(() => cb("Server error"));
    }

    function toggleGalleryStatus(id, newStatus, cb) {
        // Your galleryAjax expects maybe 'updateImage' or a custom flag; we assume a toggle endpoint 'toggleStatus'
        // If your PHP uses 'toggleStatus' or updateImage, adjust accordingly. Here we call 'toggleStatus'.
        $.ajax({
            url: AJAX_URL,
            method: "POST",
            data: { sFlag: "toggleStatus", id: id, status: newStatus },
            dataType: "json"
        })
            .done(res => cb(null, res))
            .fail(() => cb("Server error"));
    }

    // ------------------ DOM & events ------------------
    $(function () {
        // Offcanvas instances (ensure elements exist)
        let addOffcanvas = null, updateOffcanvas = null;
        if (document.querySelector("#AddGalleryCanvas")) addOffcanvas = new bootstrap.Offcanvas("#AddGalleryCanvas");
        if (document.querySelector("#UpdateGalleryCanvas")) updateOffcanvas = new bootstrap.Offcanvas("#UpdateGalleryCanvas");

        // initial load
        loadGallery();

        // Filters
        $("#searchGallery").on("click", function () {
            loadGallery({
                title: $("#filterTitle").val().trim(),
                category: $("#filterCategory").val()
            });
        });

        $("#resetFilters").on("click", function () {
            $("#filterTitle").val("");
            $("#filterCategory").val("");
            loadGallery();
        });

        // Add preview
        $(document).on("change", "#gImage", function () {
            const file = this.files && this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                $("#gImagePreview").remove();
                if ($("#AddGalleryCanvas .offcanvas-body").length) {
                    $("#AddGalleryCanvas .offcanvas-body").prepend(`<div id="gImagePreview" class="mb-2"><img src="${escapeHtml(e.target.result)}" style="max-width:100%;border-radius:6px;"></div>`);
                }
            };
            reader.readAsDataURL(file);
        });

        // Add submit
        $("#addGalleryForm").on("submit", function (e) {
            e.preventDefault();
            const fd = new FormData(this);

            // Basic validation
            const title = $("#gTitle").val().trim();
            const file = $("#gImage")[0].files[0];
            if (!title) { showAlert("error", "Validation", "Title is required"); return; }
            if (!file) { showAlert("error", "Validation", "Please select an image"); return; }

            addGallery(fd, (err, res) => {
                if (err) {
                    showAlert("error", "Server error", err);
                    return;
                }

                if (isSuccess(res)) {
                    showAlert("success", "Added", res.message || "Image added successfully");
                    if (addOffcanvas) addOffcanvas.hide();
                    $("#addGalleryForm")[0].reset();
                    $("#gImagePreview").remove();
                    loadGallery();
                } else {
                    showAlert("error", "Error", res?.message || "Failed to add image");
                }
            });
        });

        // Edit button - open offcanvas and populate
        $(document).on("click", ".editGalleryBtn", function () {
            const id = $(this).data("id");
            if (!id) { showAlert("error", "Invalid", "Invalid id"); return; }

            fetchGalleryById(id, (err, data) => {
                if (err) { showAlert("error", "Error", err); return; }

                $("#updateGalleryId").val(data.id || data.gallery_id || "");
                $("#updateGTitle").val(data.image_name || data.title || "");
                $("#updateGCategory").val(data.image_tagline || "");

                $("#updateGPreview").remove();
                if ($("#UpdateGalleryCanvas .offcanvas-body").length) {
                    $("#UpdateGalleryCanvas .offcanvas-body").prepend(`<div id="updateGPreview" class="mb-2"><img src="${escapeHtml(buildImageUrl(data.image_path || data.path || ''))}" style="max-width:100%;border-radius:6px;"></div>`);
                }

                if (updateOffcanvas) updateOffcanvas.show();
            });
        });

        // Update preview
        $(document).on("change", "#updateGImage", function () {
            const file = this.files && this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                $("#updateGPreview").remove();
                if ($("#UpdateGalleryCanvas .offcanvas-body").length) {
                    $("#UpdateGalleryCanvas .offcanvas-body").prepend(`<div id="updateGPreview" class="mb-2"><img src="${escapeHtml(e.target.result)}" style="max-width:100%;border-radius:6px;"></div>`);
                }
            };
            reader.readAsDataURL(file);
        });

        // Update submit
        $("#updateGalleryForm").on("submit", function (e) {
            e.preventDefault();
            const id = $("#updateGalleryId").val();
            if (!id) { showAlert("error", "Invalid", "Invalid record"); return; }

            const fd = new FormData(this);
            fd.append("id", id);
            // server expects updateImage flag; updateGallery() appends correct flag 'updateImage'
            updateGallery(fd, (err, res) => {
                if (err) { showAlert("error", "Server error", err); return; }

                if (isSuccess(res)) {
                    showAlert("success", "Updated", res.message || "Image updated successfully");
                    if (updateOffcanvas) updateOffcanvas.hide();
                    $("#updateGPreview").remove();
                    loadGallery();
                } else {
                    showAlert("error", "Error", res?.message || "Failed to update image");
                }
            });
        });

        // Delete
        $(document).on("click", ".deleteGalleryBtn", function () {
            const id = $(this).data("id");
            if (!id) { showAlert("error", "Invalid", "Invalid id"); return; }

            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the image.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteGallery(id, (err, res) => {
                        if (err) { showAlert("error", "Server error", err); return; }
                        if (isSuccess(res)) {
                            showAlert("success", "Deleted", res.message || "Image deleted");
                            loadGallery();
                        } else {
                            showAlert("error", "Error", res?.message || "Delete failed");
                        }
                    });
                }
            });
        });

        // Toggle status (enable/disable)
        $(document).on("click", ".toggleStatusBtn", function () {
            const id = $(this).data("id");
            const current = Number($(this).data("status"));
            const newStatus = current === 1 ? 0 : 1;
            if (!id) { showAlert("error", "Invalid", "Invalid id"); return; }

            toggleGalleryStatus(id, newStatus, (err, res) => {
                if (err) { showAlert("error", "Server error", err); return; }

                if (isSuccess(res)) {
                    showAlert("success", "Updated", res.message || "Status updated");
                    loadGallery();
                } else {
                    showAlert("error", "Error", res?.message || "Failed to update status");
                }
            });
        });

    });


    function loadAllGallery() {
        $.ajax({
            url: "ajaxFile/galleryAjax.php",
            type: "POST",
            data: { sFlag: "fetchAll" },
            success: function (response) {

                $("#galleryLoader").hide();
                let container = $("#galleryList");
                container.empty();

                if (response.status != true) {
                    container.html(`<p class="text-danger text-center">Failed to load gallery.</p>`);
                    return;
                }

                let gallery = response.data;

                if (gallery.length === 0) {
                    container.html(`<p class="text-center">No images uploaded yet.</p>`);
                    return;
                }

                gallery.forEach(img => {
                    let imgCard = `
                        <div class="col-md-6 col-xl-4">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="${img.image_path}" alt="${img.image_name}">
                                    <a href="${img.image_path}" class="play-btn style3 popup-image">
                                        <i class="far fa-plus"></i>
                                    </a>
                                </div>
                                <h6 class="text-center mt-2">${img.image_name}</h6>
                                <p class="text-center text-muted">${img.tagline || ""}</p>
                            </div>
                        </div>
                    `;
                    container.append(imgCard);
                });
            },
            error: function () {
                $("#galleryLoader").hide();
                $("#galleryList").html(`<p class="text-danger text-center">Server error.</p>`);
            }
        });
    }

    // Load gallery on page load
    loadAllGallery();

})(jQuery);
