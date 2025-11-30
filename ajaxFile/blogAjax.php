<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/BlogManage.php";
require_once "../classes/class.Input.php";

$uploadDir = "../uploads/blogs/";

// Ensure folder exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

$sFlag = Input::request("sFlag");


/* ============================================================
   IMAGE UPLOAD FUNCTION
============================================================ */
function uploadBlogImage($uploadDir)
{
    if (!isset($_FILES["blog_image"]) || $_FILES["blog_image"]["error"] !== 0) {
        return null;
    }

    $tmp = $_FILES["blog_image"]["tmp_name"];
    $name = $_FILES["blog_image"]["name"];

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
   ADD BLOG
============================================================ */
if ($sFlag == "addBlog") {

    $author      = Input::request("author_name");
    $title       = Input::request("title");
    $slug        = Input::request("slug");
    $category    = Input::request("category");
    $content     = $_REQUEST["content"];
    $status      = Input::request("status");
    $whatsapp    = Input::request("whatsapp");
    $seoTitle    = Input::request("seo_title");
    $seoKeywords = Input::request("seo_keywords");
    $seoDesc     = Input::request("seo_description");

    if ($title == "" || $slug == "" || $category == "" || $content == "") {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    // Upload image
    $imagePath = uploadBlogImage($uploadDir);

    $blog = new BlogManage();
    $result = $blog->addBlog(
        $author,
        $title,
        $slug,
        $category,
        $content,
        $status,
        $imagePath,
        $whatsapp,
        $seoTitle,
        $seoKeywords,
        $seoDesc
    );

    echo json_encode(
        $result
            ? ["status" => "success", "message" => "Blog added successfully"]
            : ["status" => "error", "message" => "Failed to add blog"]
    );
}



/* ============================================================
   FETCH ALL BLOGS
============================================================ */
if ($sFlag == "fetchAll") {

    $title    = Input::request("title") ?: "";
    $category = Input::request("category") ?: "";
    $status   = Input::request("status") ?: 0;
    $sOrder   = Input::request("order")?:"DESC";
    $iLimit   = Input::request("limit")?:"";

    $blog = new BlogManage();
    $data = $blog->fetchAll($title, $category, $status,$sOrder,$iLimit);

    echo json_encode(["status" => "success", "data" => $data]);
}



/* ============================================================
   FETCH BLOG BY ID
============================================================ */
if ($sFlag == "fetchById") {

    $id = Input::request("id");

    if ($id == "") {
        echo json_encode(["status" => "error", "message" => "Missing blog ID"]);
        return;
    }

    $blog = new BlogManage();
    $data = $blog->fetchById($id);

    echo json_encode($data ?
        ["status" => "success", "data" => $data] :
        ["status" => "error", "message" => "No blog found"]);
}



/* ============================================================
   UPDATE BLOG
============================================================ */
if ($sFlag == "updateBlog") {

    $id          = Input::request("id");
    $title       = Input::request("title");
    $slug        = Input::request("slug");
    $author_name = Input::request("author_name");
    $category    = Input::request("category");
    $content     = $_REQUEST["content"];
    $status      = Input::request("status");
    $whatsapp    = Input::request("whatsapp");
    $seoTitle    = Input::request("seo_title");
    $seoKeywords = Input::request("seo_keywords");
    $seoDesc     = Input::request("seo_description");

    if ($id == "" || $title == "" || $slug == "" || $category == "" || $content == "") {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    // New image uploaded?
    $imagePath = uploadBlogImage($uploadDir);

    $blog = new BlogManage();
    $result = $blog->updateBlog(
        $id,
        $title,
        $author_name,
        $slug,
        $category,
        $content,
        $status,
        $imagePath,
        $whatsapp,
        $seoTitle,
        $seoKeywords,
        $seoDesc
    );

    echo json_encode($result ?
        ["status" => "success", "message" => "Blog updated successfully"] :
        ["status" => "error", "message" => "Failed to update"]);
}



/* ============================================================
   DELETE BLOG
============================================================ */
if ($sFlag == "deleteBlog") {

    $id = Input::request("id");

    if ($id == "") {
        echo json_encode(["status" => "error", "message" => "Missing blog ID"]);
        return;
    }

    $blog = new BlogManage();
    $result = $blog->deleteBlog($id);

    echo json_encode($result ?
        ["status" => "success", "message" => "Blog deleted successfully"] :
        ["status" => "error", "message" => "Failed to delete"]);
}



/* ============================================================
   FETCH ALL CATEGORIES (NEW)
============================================================ */
if ($sFlag == "categories") {

    $blog = new BlogManage();
    $data = $blog->fetchCategories();

    echo json_encode(["status" => "success", "data" => $data]);
}



/* ============================================================
   FETCH RECENT BLOGS (NEW)
============================================================ */
if ($sFlag == "recent") {

    $limit = Input::request("limit") ?: 5; // default latest 5

    $blog = new BlogManage();
    $data = $blog->fetchRecent($limit);

    echo json_encode(["status" => "success", "data" => $data]);
}

/* ============================================================
   GET BLOG BY ID
============================================================ */
if ($sFlag == "getBlogById") {

    $id = Input::request("id");

    if ($id == "") {
        echo json_encode(["status" => "error", "message" => "Missing ID"]);
        return;
    }

    $blog = new BlogManage();
    $data = $blog->fetchById($id);

    if ($data) {
        echo json_encode(["status" => "success", "data" => $data]);
    } else {
        echo json_encode(["status" => "error", "message" => "Not found"]);
    }
}


?>
