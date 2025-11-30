$(document).ready(function () {

    loadSemesters();
    loadNotes();

    // Load semester dropdown
    function loadSemesters() {
        $.post("ajaxFile/ajaxSemester.php", { sFlag: "fetchAll" }, function (resp) {
            if (resp.status === 200) {
                let html = `<option value="">Select Semester</option>`;
                resp.data.forEach(row => {
                    html += `<option value="${row.id}">${row.semester}</option>`;
                });
                $("#semesterSelect").html(html);
            }
        }, "json");
    }

    // Notes Upload Submit
    $("#notesUploadForm").submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("sFlag", "addNotes");

        $.ajax({
            url: "ajaxFile/staffUpload_ajax.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (resp) {
                if (resp.status === 200) {
                    alert("Notes Uploaded Successfully!");
                    $("#notesUploadForm")[0].reset();
                    loadNotes();
                } else {
                    alert(resp.error);
                }
            }
        });
    });

    let notesTable;
    notesTable = $("#notesTable").DataTable({
        destroy: true,
        responsive: true,
        autoWidth: false,
        columnDefs: [
            { orderable: false, targets: [5, 7] } // disable sorting on File & Action
        ]
    });
    // Load Notes Table
    function loadNotes() {
        $.post("ajaxFile/staffUpload_ajax.php", { sFlag: "fetch" }, function (resp) {
            const table = $("#notesTable").DataTable();
            table.clear();

            if (!resp.data || resp.data.length === 0) {
                table.row.add([
                    "",
                    `<span class="text-muted small">No notes found</span>`,
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                ]);
                table.draw();
                return;
            }

            resp.data.forEach((row, index) => {
                const fileLink = `<a href="${row.file_path}" target="_blank"><i class="fa fa-file"></i> View</a>`;

                const actions = `
                <button class="btn btn-outline-danger btn-sm delete" data-id="${row.id}" title="Delete">
                    <i class="fa fa-trash"></i>
                </button>
            `;

                table.row.add([
                    row.id,
                    row.name,
                    row.isbn,
                    row.semester,
                    row.description,
                    fileLink,
                    row.added_on,
                    actions
                ]);
            });

            table.draw();
        }, "json");
    }


    // Delete document
    $(document).on("click", ".delete", function () {
        let id = $(this).data("id");

        if (!confirm("Are you sure you want to delete this?")) return;

        $.post("ajaxFile/staffUpload_ajax.php", { sFlag: "delete", id: id }, function (resp) {
            if (resp.status === 200) {
                alert("Deleted Successfully");
                loadNotes();
            }
        }, "json");
    });

});
