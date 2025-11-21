<?php
header("Content-Type: application/json");

require_once "../classes/StaffUploadManager.php";
require_once "../classes/class.Input.php";

$sFlag = Input::request("sFlag");

$staff = new StaffUpload();

/* ---------------------- ADD NOTES ---------------------- */
if ($sFlag == "addNotes") {

    $name = Input::request("name");
    $isbn = Input::request("isbn");
    $semester = Input::request("semester");
    $description = Input::request("description");
    $submission_date = Input::request("submission_date");

    // Check required fields
    if ($name == "" || $semester == "" || $description == "") {
        echo json_encode(["error" => "Missing fields", "status" => 500]);
        exit;
    }

    // Check file
    if (!isset($_FILES['file']) || empty($_FILES['file']['name'])) {
        echo json_encode(["error" => "File missing", "status" => 500]);
        exit;
    }

    // File data
    $file = $_FILES["file"];

    // Create date folder: YYYY-MM-DD
    $todayFolder = date("Y-m-d");
    $uploadFolder = "../uploads/notes/" . $todayFolder . "/";

    // Create folder if not exists
    if (!is_dir($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    // Create timestamped file name
    $timestamp = time();
    $cleanName = preg_replace('/[^A-Za-z0-9_\.-]/', '_', basename($file["name"]));
    $fileName = $timestamp . "_" . $cleanName;

    // Full path
    $uploadPath = $uploadFolder . $fileName;

    // Move file
    if (!move_uploaded_file($file["tmp_name"], $uploadPath)) {
        echo json_encode(["error" => "File upload failed", "status" => 500]);
        exit;
    }

    // Database path (public path)
    $dbFilePath = "uploads/notes/" . $todayFolder . "/" . $fileName;

    // Prepare insert data
    $data = [
        "name"            => $name,
        "isbn"            => $isbn,
        "semester"        => $semester,
        "description"     => $description,
        "submission_date" => $submission_date ?: NULL,
        "file_name"       => $fileName,
        "file_path"       => $dbFilePath,
        "file_type"       => 1,
        "user_name"       => "system"
    ];

    $result = $staff->addUpload($data);

    echo json_encode(["status" => 200, "message" => "Notes uploaded successfully"]);
    exit;
}



/* ---------------------- FETCH ALL ---------------------- */
if ($sFlag == "fetch") {

    $result = $staff->getAllUploads();

    echo json_encode([
        "status" => 200,
        "data"   => $result,
        "recordsTotal" => count($result)
    ]);

    exit;
}

if($sFlag == "fetchByClass") {

    $classId = Input::request("class_id") ? Input::request("class_id") : 0;

    $result = $staff->getAllUploads($classId);

    echo json_encode([
        "status" => 200,
        "data"   => $result,
        "recordsTotal" => count($result)
    ]);

    exit;
}

/* ---------------------- DELETE ---------------------- */
if ($sFlag == "delete") {

    $id = Input::request("id");

    if (!$id) {
        echo json_encode(["error" => "ID missing", "status" => 500]);
        exit;
    }

    $staff->deleteUpload($id);

    echo json_encode(["status" => 200, "message" => "Deleted successfully"]);
    exit;
}
