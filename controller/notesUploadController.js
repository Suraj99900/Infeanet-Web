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


    // Load Notes Table
    function loadNotes() {
        $.post("ajaxFile/staffUpload_ajax.php", { sFlag: "fetch" }, function (resp) {
            let html = "";

            resp.data.forEach((row, index) => {
                html += `
                    <tr>
                        <td>${row.id}</td>
                        <td>${row.name}</td>
                        <td>${row.isbn}</td>
                        <td>${row.semester}</td>
                        <td>${row.description}</td>
                        <td><a href="${row.file_path}" target="_blank">View</a></td>
                        <td>${row.added_on}</td>
                        <td>
                            <button class="btn btn-danger btn-sm delete" data-id="${row.id}">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;
            });

            $("#notesBody").html(html);
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
