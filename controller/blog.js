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
                bFlag: "fetchAll",
                title: $("#filterBlogTitle").val(),
                category: $("#filterBlogCategory").val()
            },
            dataType: "json",
            success: function (res) {
                if (res.status === true) {
                    renderBlogCards(res.data);
                } else {
                    responsePop("Error", res.message, "error", "ok");
                }
            }
        });
    }

    // -------------------------------
    // RENDER BLOG CARDS
    // -------------------------------
    function renderBlogCards(blogs) {
        let container = $("#blogContainer");
        container.empty();

        if (blogs.length === 0) {
            container.html(`<p class="text-center">No blogs found.</p>`);
            return;
        }

        blogs.forEach((blog, index) => {
            let count = (index + 1).toString().padStart(2, "0");

            let card = `
                <div class="col-md-6 col-xl-4">
                    <div class="blog-card">
                        
                        <div class="blog-image-wrapper">
                            <img src="${blog.blog_image}" class="blog-thumb" alt="Blog Image">
                            <span class="blog-number">${count}</span>
                        </div>

                        <h3 class="blog-title">
                            <a href="blog-details.php?id=${blog.id}">
                                ${truncateText(stripHtml(blog.blog_title), 60)}
                            </a>
                        </h3>

                        <p class="blog-text" style="text-align: justify;">
                            ${truncateText(stripHtml(blog.blog_description), 150)}
                        </p>

                        <div class="blog-meta">
                            <span><i class="fa-regular fa-user"></i> ${blog.author_name}</span>
                            <span><i class="fa-regular fa-calendar"></i> ${blog.added_on}</span>
                        </div>

                        <a href="blog-details.php?id=${blog.id}" class="th-btn">
                            Read More <i class="fa-regular fa-arrow-right ms-2"></i>
                        </a>

                        <div class="blog-bg-shape">
                            <img src="assets/img/bg/blog_card_bg.png" alt="bg">
                        </div>

                    </div>
                </div>
            `;

            container.append(card);
        });
    }

    // -------------------------------
    // HELPER FUNCTIONS
    // -------------------------------
    function stripHtml(html) {
        return $("<div>").html(html).text();
    }

    function truncateText(text, maxLength) {
        return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
    }

});
