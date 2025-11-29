$(document).ready(function () {

    /* =============================================================
       SKELETON LOADER HTML
    ============================================================= */
    const blogSkeleton = `
        <div class="blog-skeleton">
            <div class="skeleton-img"></div>
            <div class="skeleton-title"></div>
            <div class="skeleton-text"></div>
        </div>
    `;

    function showSkeleton() {
        let skeletons = "";
        for (let i = 0; i < 4; i++) skeletons += blogSkeleton;
        $("#blogContainer").html(skeletons);
    }

    /* =============================================================
       LOAD BLOGS
    ============================================================= */
    function loadBlogs(page = 1) {

        $.ajax({
            url: "ajaxFile/blogAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchAll",
                title: $("#filterBlogTitle").val(),
                category: $("#filterBlogCategory").val(),
                status: 1,
                page: page
            },
            dataType: "json",

            beforeSend: function () {
                showSkeleton();
            },

            success: function (response) {

                $("#blogContainer").empty();
                $("#paginationArea").empty();

                if (response.status === "success") {

                    response.data.forEach(function (b, index) {

                        let shortDesc = b.blog_content
                            ? b.blog_content.replace(/<[^>]+>/g, '').substring(0, 160) + "..."
                            : "";

                        let blogHTML = `
                            <article class="blog-card fadeIn delay-${index}">
                                <div class="blog-card-img">
                                    <a href="blog-details.php?id=${b.id}">
                                        <img src="${b.blog_image}" alt="${b.blog_title}">
                                    </a>
                                </div>

                                <div class="blog-card-content">
                                    <div class="blog-meta">
                                        <span><i class="fa-light fa-user"></i> ${b.author_name}</span>
                                        <span><i class="fa-light fa-calendar-days"></i> ${b.added_on}</span>
                                    </div>

                                    <h3 class="blog-title">
                                        <a href="blog-details.php?id=${b.id}">${b.blog_title}</a>
                                    </h3>

                                    <p class="blog-desc">${shortDesc}</p>

                                    <a href="blog-details.php?id=${b.id}" class="blog-readmore">
                                        Read More <i class="fa-regular fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        `;
                        
                        $("#blogContainer").append(blogHTML);
                    });

                    /* Pagination */
                    for (let i = 1; i <= response.totalPages; i++) {
                        $("#paginationArea").append(`
                            <li class="${i === page ? 'active' : ''}">
                                <a href="#" class="pageLink" data-page="${i}">${i}</a>
                            </li>
                        `);
                    }
                }
            }
        });
    }

    /* =============================================================
       PAGINATION
    ============================================================= */
    $(document).on("click", ".pageLink", function (e) {
        e.preventDefault();
        loadBlogs($(this).data("page"));
    });

    /* =============================================================
       LOAD CATEGORIES (DYNAMIC)
    ============================================================= */
    function loadCategories() {
        $.ajax({
            url: "ajaxFile/blogAjax.php",
            method: "GET",
            data: { sFlag: "categories" },
            dataType: "json",

            beforeSend: function () {
                $("#categoryList").html("<li>Loading...</li>");
            },

            success: function (res) {
                $("#categoryList").empty();

                res.data.forEach(function (cat) {
                    $("#categoryList").append(`
                        <li class="fadeIn">
                            <a href="#" class="categoryFilter" data-cat="${cat.blog_category}">
                                <i class="fa-solid fa-folder"></i> 
                                ${cat.blog_category} <span>(${cat.total})</span>
                            </a>
                        </li>
                    `);
                });
            }
        });
    }

    /* Category filter */
    $(document).on("click", ".categoryFilter", function (e) {
        e.preventDefault();
        $("#filterBlogCategory").val($(this).data("cat"));
        loadBlogs();
    });

    /* =============================================================
       LOAD RECENT POSTS
    ============================================================= */
    function loadRecentPosts() {
        $.ajax({
            url: "ajaxFile/blogAjax.php",
            method: "GET",
            data: { sFlag: "recent" },
            dataType: "json",

            beforeSend: function () {
                $("#recentPosts").html("<p>Loading...</p>");
            },

            success: function (res) {

                $("#recentPosts").empty();

                res.data.forEach(function (rp, index) {
                    $("#recentPosts").append(`
                        <div class="recent-post fadeIn delay-${index}">
                            <div class="media-img">
                                <a href="blog-details.php?id=${rp.id}">
                                    <img src="${rp.blog_image}" alt="${rp.blog_title}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="post-title">
                                    <a href="blog-details.php?id=${rp.id}">${rp.blog_title}</a>
                                </h4>
                                <div class="post-meta">
                                    <i class="fa-light fa-calendar-days"></i> ${rp.added_on}
                                </div>
                            </div>
                        </div>
                    `);
                });
            }
        });
    }

    /* =============================================================
       INITIAL LOAD
    ============================================================= */
    loadBlogs();
    loadCategories();
    loadRecentPosts();
});
