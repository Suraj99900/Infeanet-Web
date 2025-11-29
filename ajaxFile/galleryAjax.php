<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/GalleryManage.php";
require_once "../classes/class.Input.php";

$uploadDir = "../uploads/gallery/";

// Ensure folder exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

$sFlag = Input::request("sFlag");


/* ============================================================
   FILE UPLOAD HANDLER
============================================================ */
function uploadGalleryFile($inputName, $uploadDir)
{
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]["error"] !== 0) {
        return null;
    }

    $tmp  = $_FILES[$inputName]["tmp_name"];
    $name = $_FILES[$inputName]["name"];

    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "webp"];

    if (!in_array($ext, $allowed)) {
        return [
            "error" => true,
            "message" => "Only JPG, JPEG, PNG, WEBP allowed"
        ];
    }

    $unique = time() . "_" . uniqid() . "." . $ext;
    $path = $uploadDir . $unique;

    if (!move_uploaded_file($tmp, $path)) {
        return [
            "error" => true,
            "message" => "File upload failed"
        ];
    }

    return [
        "error" => false,
        "path" => str_replace("../", "", $path)
    ];
}


/* ============================================================
   ADD IMAGE (sFlag = addGallery)
============================================================ */
if ($sFlag == "addGallery") {

    $imageName = Input::request("title");
    $tagline   = Input::request("category");
    $status    = Input::request("status") ?: 1;

    if ($imageName == "") {
        echo json_encode(["status" => false, "message" => "Image name is required"]);
        return;
    }

    $upload = uploadGalleryFile("image", $uploadDir);
    if ($upload["error"] ?? false) {
        echo json_encode(["status" => false, "message" => $upload["message"]]);
        return;
    }

    $gallery = new GalleryManage();
    $result = $gallery->addImage($imageName, $tagline, $upload["path"], $status);

    echo json_encode([
        "status" => $result,
        "message" => $result ? "Image added successfully" : "Failed to add image"
    ]);
    return;
}


/* ============================================================
   FETCH ALL IMAGES (sFlag = fetchAllGallery)
============================================================ */
if ($sFlag == "fetchAll") {

    $name   = Input::request("title") ?: "";
    $status = Input::request("status") ?: "";
    $category = Input::request("category") ?: "";

    $gallery = new GalleryManage();
    $data = $gallery->fetchAll($name, $status,$category);

    echo json_encode(["status" => true, "data" => $data]);
    return;
}


/* ============================================================
   FETCH ONE (sFlag = fetchGalleryById)
============================================================ */
if ($sFlag == "fetchById") {

    $id = Input::request("id");
    if (!$id) {
        echo json_encode(["status" => false, "message" => "Missing ID"]);
        return;
    }

    $gallery = new GalleryManage();
    $data = $gallery->fetchById($id);

    echo json_encode([
        "status" => $data ? true : false,
        "data"   => $data,
        "message" => $data ? "" : "Image not found"
    ]);
    return;
}


/* ============================================================
   UPDATE IMAGE (sFlag = updateImage)
============================================================ */
if ($sFlag == "updateImage") {

    $id        = Input::request("id");
    $imageName = Input::request("title");
    $tagline   = Input::request("category");
    $status    = Input::request("status") ?: 1;

    if (!$id || !$imageName) {
        echo json_encode(["status" => false, "message" => "Missing required fields"]);
        return;
    }

    // Optional new file upload
    $upload = uploadGalleryFile("image", $uploadDir);
    $imagePath = (!$upload || ($upload["error"] ?? false)) ? null : $upload["path"];

    $gallery = new GalleryManage();
    $result = $gallery->updateImage($id, $imageName, $tagline, $imagePath, $status);

    echo json_encode([
        "status"  => $result,
        "message" => $result ? "Image updated successfully" : "Failed to update"
    ]);
    return;
}


/* ============================================================
   DELETE IMAGE (sFlag = deleteImage)
============================================================ */
if ($sFlag == "deleteImage") {

    $id = Input::request("id");
    if (!$id) {
        echo json_encode(["status" => false, "message" => "Missing ID"]);
        return;
    }

    $gallery = new GalleryManage();
    $result = $gallery->deleteImage($id);

    echo json_encode([
        "status" => $result,
        "message" => $result ? "Image deleted successfully" : "Failed to delete image"
    ]);
    return;
}

if($sFlag == "toggleStatus") {
    $id = Input::request("id");
    $newStatus = Input::request("status");

    $oGallery = new GalleryManage();
    $oResult = $oGallery->toggleStatus($id, $newStatus);
    
    if(!$oResult) {
        echo json_encode(["status" => false, "message" => "Failed to update status"]);
        return;
    }
    echo json_encode(["status" => true, "data" => $data]);
    return;
}
?>
