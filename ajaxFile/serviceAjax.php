<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/ServiceManage.php"; 
require_once "../classes/class.Input.php";

// Folder Path for Service Images
$uploadDir = "../uploads/services/";

// Ensure folder exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

$sFlag = Input::request('sFlag');

/* ============================================================
   FUNCTION: Upload Image
   ============================================================ */
function uploadServiceImage($uploadDir)
{
    if (!isset($_FILES['service_image']) || $_FILES['service_image']['error'] !== 0) {
        return null; // No image uploaded
    }

    $fileTmp  = $_FILES['service_image']['tmp_name'];
    $fileName = $_FILES['service_image']['name'];

    // Generate unique filename
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $uniqueName = time() . "_" . uniqid() . "." . $ext;

    $filePath = $uploadDir . $uniqueName;

    // Validate file type
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array(strtolower($ext), $allowed)) {
        echo json_encode(["status" => "error", "message" => "Invalid file type"]);
        exit;
    }

    // Move file
    if (!move_uploaded_file($fileTmp, $filePath)) {
        echo json_encode(["status" => "error", "message" => "Image upload failed"]);
        exit;
    }

    // RETURN CLEANED PATH FOR DB (remove ../)
    return str_replace("../", "", $filePath);
}

/* ============================================================
   ADD SERVICE
   ============================================================ */
if ($sFlag == 'addService') {

    $title       = Input::request('title');
    $category    = Input::request('category');
    $description = $_REQUEST['description'];
    $status      = Input::request('status');
    $author      = Input::request("author_name");

    if ($title == "" || $category == "" || $description == "") {
        echo json_encode(["status" => "error", "message" => "Missing parameters"]);
        return;
    }

    // Upload Image (optional)
    $imagePath = uploadServiceImage($uploadDir);

    $service = new ServiceManage();
    $result  = $service->addService($author, $title, $category, $description, $status, $imagePath);

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Service added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error"]);
    }
}

/* ============================================================
   FETCH ALL SERVICES
   ============================================================ */
if ($sFlag == 'fetchAll') {

    $category = Input::request('category') ?: "";
    $title = Input::request('title') ?: "";
    $sOrder   = Input::request("order")?:"DESC";
    $iLimit   = Input::request("limit")?:"";
    $iStatus  = Input::request("status")?:"";

    $service = new ServiceManage();
    $data    = $service->fetchAll($title,$category,$iStatus,$sOrder,$iLimit);

    echo json_encode(["status" => "success", "data" => $data]);
}

/* ============================================================
   FETCH BY ID
   ============================================================ */
if ($sFlag == 'fetchById') {

    $id = Input::request('id');

    if ($id == "") {
        echo json_encode(["status" => "error", "message" => "Missing ID"]);
        return;
    }

    $service = new ServiceManage();
    $data = $service->fetchById($id);

    echo json_encode($data ? 
        ["status" => "success", "data" => $data] : 
        ["status" => "error", "message" => "No data found"]);
}

/* ============================================================
   DELETE SERVICE
   ============================================================ */
if ($sFlag == 'deleteService') {

    $id = Input::request('id');

    if ($id == "") {
        echo json_encode(["status" => "error", "message" => "Missing ID"]);
        return;
    }

    $service = new ServiceManage();
    $result = $service->deleteService($id);

    echo json_encode($result ? 
        ["status" => "success", "message" => "Service deleted successfully"] :
        ["status" => "error", "message" => "Failed to delete"]);
}

/* ============================================================
   UPDATE SERVICE
   ============================================================ */
if ($sFlag == 'updateService') {

    $id          = Input::request('id');
    $title       = Input::request('title');
    $category    = Input::request('category');
    $description = $_REQUEST['description'];
    $status      = Input::request('status');
    $author      = Input::request('authorName');

    if ($id == "" || $title == "" || $category == "" || $description == "") {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    // Upload NEW Image (if provided)
    $newImagePath = uploadServiceImage($uploadDir);

    $service = new ServiceManage();
    $result = $service->updateService($id, $title, $category, $description, $status, $newImagePath);

    echo json_encode($result ? 
        ["status" => "success", "message" => "Service updated successfully"] :
        ["status" => "error", "message" => "Failed to update service"]);
}
