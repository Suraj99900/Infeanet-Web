$(document).ready(function () {

    const ajaxUrl = "ajaxFile/courseAjax.php";

    /* ============================================================
       ADD COURSE
    ============================================================ */
    $("#addCourseForm").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("sFlag", "addCourse");

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert("Error while adding course");
            }
        });
    });

    /* ============================================================
       FETCH ALL COURSES
    ============================================================ */
    // function fetchAllCourses(title = "", category = "", status = 1) {
    //     $.ajax({
    //         url: ajaxUrl,
    //         type: "POST",
    //         data: {
    //             sFlag: "fetchAll",
    //             title: title,
    //             category: category,
    //             status: status
    //         },
    //         dataType: "json",
    //         success: function (res) {
    //             if (res.status === "success") {
    //                 renderCoursesTable(res.data);
    //             } else {
    //                 alert("No courses found");
    //             }
    //         },
    //         error: function () {
    //             alert("Error fetching courses");
    //         }
    //     });
    // }



    // Initial fetch
    // fetchAllCourses();

    /* ============================================================
       FETCH COURSE BY ID FOR EDIT
    ============================================================ */
    $(document).on("click", ".editCourseBtn", function () {
        let id = $(this).data("id");

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {
                sFlag: "fetchById",
                id: id
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    populateEditForm(res.data);
                    $("#editCourseModal").modal("show");
                } else {
                    alert("Course not found");
                }
            },
            error: function () {
                alert("Error fetching course details");
            }
        });
    });

    function populateEditForm(data) {
        $("#editCourseForm input[name='id']").val(data.id);
        $("#editCourseForm input[name='title']").val(data.course_title);
        $("#editCourseForm input[name='slug']").val(data.course_slug);
        $("#editCourseForm input[name='category']").val(data.course_category);
        $("#editCourseForm textarea[name='short_desc']").val(data.course_short_desc);
        $("#editCourseForm textarea[name='full_desc']").val(data.course_full_desc);
        $("#editCourseForm input[name='status']").val(data.course_status);
        $("#editCourseForm input[name='course_link']").val(data.course_link);
        $("#editCourseForm input[name='whatsapp']").val(data.whatsapp_link);
        $("#editCourseForm input[name='price']").val(data.course_price);
        $("#editCourseForm input[name='duration']").val(data.course_duration);
        $("#editCourseForm input[name='level']").val(data.course_level);
        $("#editCourseForm textarea[name='requirements']").val(data.requirements);
        $("#editCourseForm textarea[name='what_you_learn']").val(data.what_you_learn);
        $("#editCourseForm input[name='seo_title']").val(data.seo_title);
        $("#editCourseForm input[name='seo_keywords']").val(data.seo_keywords);
        $("#editCourseForm textarea[name='seo_description']").val(data.seo_description);
    }

    /* ============================================================
       UPDATE COURSE
    ============================================================ */
    $("#editCourseForm").on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("sFlag", "updateCourse");

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert("Error updating course");
            }
        });
    });

    /* ============================================================
       DELETE COURSE
    ============================================================ */
    $(document).on("click", ".deleteCourseBtn", function () {
        if (!confirm("Are you sure to delete this course?")) return;

        let id = $(this).data("id");

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {
                sFlag: "deleteCourse",
                id: id
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    alert(res.message);
                    fetchAllCourses();
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert("Error deleting course");
            }
        });
    });

    /* ============================================================
       FETCH CATEGORIES
    ============================================================ */
    function fetchCategories() {
        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: { sFlag: "categories" },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    let html = '<option value="">All Categories</option>';
                    res.data.forEach(cat => {
                        html += `<option value="${cat.blog_category}">${cat.blog_category} (${cat.total})</option>`;
                    });
                    $("#filterCategory").html(html);
                }
            }
        });
    }

    fetchCategories();

});


$(document).ready(function () {

    const ajaxUrl = "ajaxFile/courseAjax.php";

    // Current filters
    let filterTitle = "";
    let filterCategory = "";

    /* ============================================================
       FETCH ALL COURSES
    ============================================================ */
    function fetchAllCourses() {
        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {
                sFlag: "fetchAll",
                title: filterTitle,
                category: filterCategory,
                status: 1
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    renderCoursesTable(res.data);
                } else {
                    $("#courseBodyId").html('<tr><td colspan="8">No courses found</td></tr>');
                }
            },
            error: function () {
                alert("Error fetching courses");
            }
        });
    }

    /* ============================================================
       RENDER COURSES TABLE
    ============================================================ */
    function renderCoursesTable(data) {
        let html = "";
        if (data.length === 0) {
            html = '<tr><td colspan="8" class="text-center">No courses found</td></tr>';
        } else {
            data.forEach((course, index) => {
                html += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${course.course_title}</td>
                        <td>${course.course_category}</td>
                        <td>${course.author_name}</td>
                        <td><img src="${course.course_thumbnail}" class="course-thumb" /></td>
                        <td><a href="${course.course_link}" target="_blank">Link</a></td>
                        <td>${course.course_short_desc || ""}</td>
                        <td>
                            <a class="btn btn-sm btn-primary editCourseBtns" href="editCourse.php?id=${course.id}" data-id="${course.id}">Edit</a>
                            <button class="btn btn-sm btn-danger deleteCourseBtn" data-id="${course.id}">Delete</button>
                        </td>
                    </tr>
                `;
            });
        }
        $("#courseBodyId").html(html);
    }

    // Initial fetch
    fetchAllCourses();

    /* ============================================================
       SEARCH / FILTER BUTTONS
    ============================================================ */
    $("#searchCourse").click(function () {
        filterTitle = $("#filterCourseTitle").val();
        filterCategory = $("#filterCourseCategory").val();
        fetchAllCourses();
    });

    $("#resetCourseFilters").click(function () {
        $("#filterCourseTitle").val("");
        $("#filterCourseCategory").val("");
        filterTitle = "";
        filterCategory = "";
        fetchAllCourses();
    });

    /* ============================================================
       DELETE COURSE
    ============================================================ */
    $(document).on("click", ".deleteCourseBtn", function () {
        if (!confirm("Are you sure to delete this course?")) return;

        let id = $(this).data("id");

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {
                sFlag: "deleteCourse",
                id: id
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    alert(res.message);
                    fetchAllCourses();
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert("Error deleting course");
            }
        });
    });


    $("#idAddCourseSubmit").click(function (e) {
        e.preventDefault();

        // Validate
        let title = $("#CourseTitleId").val().trim();
        let slug = $("#CourseSlugId").val().trim();

        if (title === "" || slug === "") {
            alert("Course Title and Slug are required!");
            return;
        }

        // Capture TinyMCE description
        let fullDesc = tinymce.get("CourseFullDesc").getContent();

        // Create form data
        let formData = new FormData();

        formData.append("sFlag", "addCourse");
        formData.append("author", $("#CourseAuthorId").val());
        formData.append("title", title);
        formData.append("slug", slug);
        formData.append("category", $("#CourseCategoryId").val());
        formData.append("shortDesc", $("#CourseShortDescId").val());
        formData.append("fullDesc", fullDesc);

        formData.append("courseLink", $("#CourseLinkId").val());
        formData.append("whatsapp", $("#CourseWhatsappId").val());
        formData.append("price", $("#CoursePriceId").val());
        formData.append("duration", $("#CourseDurationId").val());
        formData.append("level", $("#CourseLevelId").val());
        formData.append("requirements", $("#CourseRequirementsId").val());
        formData.append("learn", $("#CourseLearnId").val());

        // SEO fields
        formData.append("seoTitle", $("#SEO_TitleId").val());
        formData.append("seoKeywords", $("#SEO_KeywordsId").val());
        formData.append("seoDescription", $("#SEO_DescId").val());

        // Status
        formData.append("status", $("#CourseStatusId").val());

        // IMAGES
        let thumb = $("#CourseThumbId")[0].files[0];
        let banner = $("#CourseBannerId")[0].files[0];

        if (thumb) formData.append("thumb", thumb);
        if (banner) formData.append("banner", banner);

        // AJAX Call
        $.ajax({
            url: "ajaxFile/courseAjax.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            beforeSend: function () {
                $("#idAddCourseSubmit").prop("disabled", true).text("Saving...");
            },
            success: function (response) {
                console.log("Add Course Raw Response:", response);

                let res = {};

                // Try to parse JSON safely
                try {
                    res = typeof response === "object" ? response : JSON.parse(response);
                } catch (e) {
                    console.error("Invalid JSON from server:", response);
                    alert("Server returned invalid response!");
                    return;
                }

                // Validate response format
                if (!res.status) {
                    alert("Unexpected response format!");
                    console.log("Response:", res);
                    return;
                }

                // Handle success
                if (res.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message,
                        timer: 1800,
                        showConfirmButton: false
                    });

                    setTimeout(() => {
                        window.location.href = "adminCourseManagement.php";
                    }, 1800);

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: res.message || "Something went wrong!"
                    });
                }
            },
            error: function (xhr) {
                alert("Request failed!");
                console.log(xhr.responseText);
            },

            complete: function () {
                $("#idAddCourseSubmit").prop("disabled", false).text("Save Course");
            }
        });

    });


});

