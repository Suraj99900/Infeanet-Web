$(document).ready(function () {


    fetchAllBlogs();

    // -------------------------------
    // FETCH ALL BLOGS
    // -------------------------------
    function fetchAllBlogs() {

        $.ajax({
            url: "ajaxFile/blogAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchAll",
                title: $("#filterBlogTitle").val(),
                category: $("#filterBlogCategory").val(),
                status: 1
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    renderBlogTable(res.data);
                } else {
                    responsePop("Error", res.message, "error", "ok");
                }
            }
        });
    }

    // -------------------------------
    // RENDER BLOG TABLE
    // -------------------------------
    let blogTable;
    blogTable = $("#blogTable").DataTable({
        destroy: true,
        responsive: true,
        autoWidth: false,
        columnDefs: [
            { orderable: false, targets: [4, 6] } // disable sort on image & action
        ]
    });

    function renderBlogTable(blogs) {
        const table = $("#blogTable").DataTable();
        table.clear(); // clear existing rows

        if (!Array.isArray(blogs) || blogs.length === 0) {
            table.row.add([
                "",
                `<span class="text-muted small">No blogs found.</span>`,
                "",
                "",
                "",
                "",
                ""
            ]);
            table.draw();
            return;
        }

        blogs.forEach((blog, index) => {
            const imgHtml = `<img src="${blog.blog_image}" width="70" style="border-radius:4px;object-fit:cover;">`;
            const shortContent = truncateText(stripHtml(blog.blog_content), 80);

            const actions = `
            <a class="btn btn-outline-primary btn-sm editBlogBtn" href="edit-blog.php?id=${blog.id}" data-id="${blog.id}" title="Edit">
                <i class="fa fa-pen"></i>
            </a>
            <a class="btn btn-outline-danger btn-sm deleteBlogBtn" data-id="${blog.id}" title="Delete">
                <i class="fa fa-trash"></i>
            </a>
        `;

            table.row.add([
                index + 1,
                blog.blog_title || "",
                blog.blog_category || "",
                blog.author_name || "",
                imgHtml,
                shortContent,
                actions
            ]);
        });

        table.draw();
    }

    // Remove HTML tags
    function stripHtml(html) {
        return $("<div>").html(html).text();
    }

    // Limit text
    function truncateText(text, maxLength) {
        return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
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


    $('#idAddBlogSubmit').on('click', function () {

        let form = $('#addBlogForm')[0];
        let formData = new FormData(form);

        // APPEND ALL REQUIRED FIELDS
        formData.append('sFlag', 'addBlog');
        formData.append('author_name', $('#BlogAuthorId').val());
        formData.append('title', $('#BlogTitleId').val());
        formData.append('slug', $('#BlogSlugId').val());
        formData.append('category', $('#BlogCategoryId').val());
        formData.append('content', tinymce.get("BlogContentEditor").getContent());
        formData.append('whatsapp', $('#BlogWhatsappId').val());
        formData.append('seo_title', $('#SEO_TitleId').val());
        formData.append('seo_keywords', $('#SEO_KeywordsId').val());
        formData.append('seo_description', $('#SEO_DescId').val());
        formData.append('status', $('#BlogStatusId').val());

        // IMAGE
        let imageFile = $('#BlogImageId')[0].files[0];
        if (imageFile) {
            formData.append("blog_image", imageFile);
        }

        $.ajax({
            url: "ajaxFile/blogAjax.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",

            success: function (res) {
                if (res.status === "success") {
                    responsePop("Success", res.message, "success", "OK")
                    window.location.href = 'adminBlogManagement.php';
                } else {
                    responsePop("Error", res.message, "error", "OK");
                }
            }
        });
    });

}); // end document ready
