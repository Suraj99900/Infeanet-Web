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
    function renderBlogTable(blogs) {
        let tbody = $("#blogBodyId");
        tbody.empty();
        console.log(blogs);
        if (blogs.length === 0) {
            tbody.html(`<tr><td colspan="7" class="text-center">No blogs found.</td></tr>`);
            return;
        }

        blogs.forEach((blog, index) => {
            let count = index + 1;

            let row = `
                <tr>
                    <td>${count}</td>
                    <td>${blog.blog_title}</td>
                    <td>${blog.blog_category}</td>
                    <td>${blog.author_name}</td>
                    <td><img src="${blog.blog_image}" width="60"></td>
                    <td>${truncateText(stripHtml(blog.blog_content), 80)}</td>
                    <td>
                        <a href="edit-blog.php?id=${blog.id}" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-sm btn-danger deleteBlog" data-id="${blog.id}">Delete</button>
                    </td>
                </tr>
            `;

            tbody.append(row);
        });
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
