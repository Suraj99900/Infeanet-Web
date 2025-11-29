<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/adminCourseManage.php";
require_once "../classes/class.Input.php";

$uploadDir = "../uploads/courses/";

// Ensure folder exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

$sFlag = Input::request("sFlag");

/* ============================================================
   IMAGE UPLOAD FUNCTION
============================================================ */
function uploadCourseImage($inputName, $uploadDir)
{
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]["error"] !== 0) {
        return null;
    }

    $tmp = $_FILES[$inputName]["tmp_name"];
    $name = $_FILES[$inputName]["name"];

    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "webp"];

    if (!in_array($ext, $allowed)) {
        echo json_encode(["status" => "error", "message" => "Invalid image format"]);
        exit;
    }

    $unique = time() . "_" . uniqid() . "." . $ext;
    $path = $uploadDir . $unique;

    if (!move_uploaded_file($tmp, $path)) {
        echo json_encode(["status" => "error", "message" => "Image upload failed"]);
        exit;
    }

    return str_replace("../", "", $path);
}

/* ============================================================
   ADD COURSE
============================================================ */
if ($sFlag == "addCourse") {

    // Receive fields from jQuery AJAX
    $title        = Input::request("title");
    $slug         = Input::request("slug");
    $category     = Input::request("category");
    $shortDesc    = Input::request("shortDesc");
    $fullDesc     = $_REQUEST["fullDesc"]; // because TinyMCE sends large HTML
    $status       = Input::request("status");
    $link         = Input::request("courseLink");
    $whatsapp     = Input::request("whatsapp");
    $price        = Input::request("price") ?: 0.00;
    $duration     = Input::request("duration");
    $level        = Input::request("level");
    $requirements = Input::request("requirements");
    $whatYouLearn = Input::request("learn");

    // SEO fields
    $seoTitle     = Input::request("seoTitle");
    $seoKeywords  = Input::request("seoKeywords");
    $seoDesc      = Input::request("seoDescription");
    $author       = Input::request("author");


    // Validate required fields
    if ($title == "" || $slug == "" || $category == "" || $fullDesc == "") {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    // Upload images (field names MUST match AJAX)
    $thumbnailPath = uploadCourseImage("thumb", $uploadDir);
    $bannerPath    = uploadCourseImage("banner", $uploadDir);

    // Insert course into DB
    $course = new CourseManage();
    $result = $course->addCourse(
        $author,
        $title,
        $slug,
        $category,
        $shortDesc,
        $fullDesc,
        $status,
        $thumbnailPath,
        $bannerPath,
        $link,
        $whatsapp,
        $price,
        $duration,
        $level,
        $requirements,
        $whatYouLearn,
        $seoTitle,
        $seoKeywords,
        $seoDesc
    );

    echo json_encode(
        $result
            ? ["status" => "success", "message" => "Course added successfully"]
            : ["status" => "error", "message" => "Failed to add course"]
    );
}


/* ============================================================
   FETCH ALL COURSES
============================================================ */
if ($sFlag == "fetchAll") {

    $title    = Input::request("title") ?: "";
    $category = Input::request("category") ?: "";
    $status   = Input::request("status") ?: 0;

    $course = new CourseManage();
    $data = $course->fetchAll($title, $category, $status);

    echo json_encode(["status" => "success", "data" => $data]);
}

/* ============================================================
   FETCH COURSE BY ID
============================================================ */
if ($sFlag == "fetchById") {

    $id = Input::request("id");

    if ($id == "") {
        echo json_encode(["status" => "error", "message" => "Missing course ID"]);
        return;
    }

    $course = new CourseManage();
    $data = $course->fetchById($id);

    echo json_encode($data ?
        ["status" => "success", "data" => $data] :
        ["status" => "error", "message" => "No course found"]);
}

/* ============================================================
   UPDATE COURSE
============================================================ */
if ($sFlag == "updateCourse") {

    $id           = Input::request("id");
    $title        = Input::request("title");
    $slug         = Input::request("slug");
    $author_name  = Input::request("author_name");
    $category     = Input::request("category");
    $shortDesc    = Input::request("short_desc");
    $fullDesc     = $_REQUEST["full_desc"];
    $status       = Input::request("status");
    $link         = Input::request("course_link");
    $whatsapp     = Input::request("whatsapp");
    $price        = Input::request("price") ?: 0.00;
    $duration     = Input::request("duration");
    $level        = Input::request("level");
    $requirements = Input::request("requirements");
    $whatYouLearn = Input::request("what_you_learn");
    $seoTitle     = Input::request("seo_title");
    $seoKeywords  = Input::request("seo_keywords");
    $seoDesc      = Input::request("seo_description");

    if ($id == "" || $title == "" || $slug == "" || $category == "" || $fullDesc == "") {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    // Upload new images if provided
    $thumbnailPath = uploadCourseImage("course_thumbnail", $uploadDir);
    $bannerPath    = uploadCourseImage("course_banner", $uploadDir);

    $course = new CourseManage();
    $result = $course->updateCourse(
        $id, $title, $author_name, $slug, $category, $shortDesc, $fullDesc, $status,
        $thumbnailPath, $bannerPath, $link, $whatsapp, $price, $duration, $level,
        $requirements, $whatYouLearn, $seoTitle, $seoKeywords, $seoDesc
    );

    echo json_encode($result ?
        ["status" => "success", "message" => "Course updated successfully"] :
        ["status" => "error", "message" => "Failed to update"]);
}

/* ============================================================
   DELETE COURSE
============================================================ */
if ($sFlag == "deleteCourse") {

    $id = Input::request("id");

    if ($id == "") {
        echo json_encode(["status" => "error", "message" => "Missing course ID"]);
        return;
    }

    $course = new CourseManage();
    $result = $course->deleteCourse($id);

    echo json_encode($result ?
        ["status" => "success", "message" => "Course deleted successfully"] :
        ["status" => "error", "message" => "Failed to delete"]);
}

/* ============================================================
   FETCH ALL COURSE CATEGORIES
============================================================ */
if ($sFlag == "categories") {

    $course = new CourseManage();
    $data = $course->fetchCategories();

    echo json_encode(["status" => "success", "data" => $data]);
}

/* ============================================================
   FETCH RECENT COURSES
============================================================ */
if ($sFlag == "recent") {

    $limit = Input::request("limit") ?: 5;

    $course = new CourseManage();
    $data = $course->fetchRecent($limit);

    echo json_encode(["status" => "success", "data" => $data]);
}
?>
