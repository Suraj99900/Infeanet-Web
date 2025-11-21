<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/StudentSemesterManager.php";
include_once "../classes/class.Input.php";

$sFlag = Input::request('sFlag');

// -------------------------
// ADD SEMESTER
// -------------------------
if ($sFlag == "addSemester") {

    $semesterName = Input::request('semester') ? trim(Input::request('semester')) : '';

    if ($semesterName == '') {
        echo json_encode(["error" => "Semester name is required", "status" => 500]);
        exit;
    }

    $oSemester = new StudentSemesterManager();
    $insertId = $oSemester->addSemester($semesterName);

    if ($insertId) {
        echo json_encode(["message" => "Semester added successfully", "id" => $insertId, "status" => 200]);
    } else {
        echo json_encode(["error" => "Failed to add semester", "status" => 500]);
    }
    exit;
}

// -------------------------
// UPDATE SEMESTER
// -------------------------
if ($sFlag == "updateSemester") {

    $id = Input::request('id');
    $semesterName = Input::request('semester') ? trim(Input::request('semester')) : '';

    if ($id == "" || $semesterName == "") {
        echo json_encode(["error" => "Missing parameters", "status" => 500]);
        exit;
    }

    $oSemester = new StudentSemesterManager();
    $result = $oSemester->updateSemester($id, $semesterName);

    if ($result) {
        echo json_encode(["message" => "Semester updated successfully", "status" => 200]);
    } else {
        echo json_encode(["error" => "Update failed", "status" => 500]);
    }
    exit;
}

// -------------------------
// DELETE SEMESTER (SOFT DELETE)
// -------------------------
if ($sFlag == "deleteSemester") {

    $id = Input::request('id');

    if ($id == "") {
        echo json_encode(["error" => "Missing ID parameter", "status" => 500]);
        exit;
    }

    $oSemester = new StudentSemesterManager();
    $result = $oSemester->deleteSemester($id);

    if ($result) {
        echo json_encode(["message" => "Semester deleted successfully", "status" => 200]);
    } else {
        echo json_encode(["error" => "Delete failed", "status" => 500]);
    }
    exit;
}

// -------------------------
// FETCH ALL SEMESTERS
// -------------------------
if ($sFlag == "fetchAll") {

    $oSemester = new StudentSemesterManager();
    $results = $oSemester->getAllSemesters(true); // fetch active & inactive

    echo json_encode([
        "status" => 200,
        "recordsTotal" => count($results),
        "recordsFiltered" => count($results),
        "data" => $results
    ]);
    exit;
}

// -------------------------
// FETCH BY ID
// -------------------------
if ($sFlag == "fetchById") {

    $id = Input::request('id');

    if ($id == "") {
        echo json_encode(["error" => "Missing ID parameter", "status" => 500]);
        exit;
    }

    $oSemester = new StudentSemesterManager();
    $data = $oSemester->getSemesterById($id);

    echo json_encode(["status" => 200, "data" => $data]);
    exit;
}

// -------------------------
// INVALID FLAG
// -------------------------
echo json_encode(["error" => "Invalid request", "status" => 400]);
exit;

?>
