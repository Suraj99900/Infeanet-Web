$(document).ready(function () {

    // INITIAL FETCH
    fetchAllBlogs();

    // ===========================================
    // FETCH ALL BLOGS
    // ===========================================
    function fetchAllBlogs() {

        $.ajax({
            url: "ajaxFile/blogAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchAll",
                title: $("#filterBlogTitle").val(),
                category: $("#filterBlogCategory").val(),
                status: $("#filterBlogStatus").val()
            },
            dataType: "json",

            success: function (res) {
                if (res.status === "success") {
                    renderBlogTable(res.data);
                } else {
                    responsePop("Error", res.message, "error", "OK");
                }
            }
        });
    }


    // ===========================================
    // RENDER BLOG TABLE
    // ===========================================
    function renderBlogTable(blogs) {

        let tbody = $("#blogBodyId");
        tbody.empty();

        if (!blogs || blogs.length === 0) {
            tbody.append(`
                <tr>
                    <td colspan="6" class="text-center">No Blogs Found</td>
                </tr>
            `);
            return;
        }

        blogs.forEach((blog, index) => {

            let statusBadge = blog.status == "1"
                ? `<span class="badge bg-success">Active</span>`
                : `<span class="badge bg-danger">Inactive</span>`;

            let tr = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${blog.id}</td>
                    <td>${blog.title}</td>
                    <td>${blog.category}</td>
                    <td>${statusBadge}</td>

                    <td>

                        <a href="editBlogPage.php?id=${blog.id}" 
                           class="btn btn-sm btn-primary me-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <button class="btn btn-sm btn-danger deleteBlogBtn"
                                data-id="${blog.id}">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                    </td>
                </tr>
            `;

            tbody.append(tr);
        });
    }


    // ===========================================
    // DELETE BLOG
    // ===========================================
    $(document).on("click", ".deleteBlogBtn", function () {
        let id = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "ajaxFile/blogAjax.php",
                    method: "POST",
                    data: {
                        sFlag: "deleteBlog",
                        id: id
                    },
                    dataType: "json",

                    success: function (res) {
                        if (res.status === "success") {
                            responsePop("Success", res.message, "success", "OK");
                            fetchAllBlogs();
                        } else {
                            responsePop("Error", res.message, "error", "OK");
                        }
                    }
                });

            }
        });
    });


    // ===========================================
    // SEARCH CLICK
    // ===========================================
    $("#searchBlog").click(function () {
        fetchAllBlogs();
    });


    // ===========================================
    // RESET FILTERS
    // ===========================================
    $("#resetBlogFilters").click(function () {
        $("#filterBlogTitle").val("");
        $("#filterBlogCategory").val("");
        $("#filterBlogStatus").val("");

        fetchAllBlogs();
    });


}); // end document ready
