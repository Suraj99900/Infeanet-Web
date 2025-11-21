<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/UserManage.php";
include_once "../classes/clientCode.php";
include_once "../classes/sessionManager.php";
include_once "../classes/class.Input.php";
include_once "../classes/function.php";

$sFlag = Input::request('sFlag');

if ($sFlag == 'addUser') {

    $sName        = Input::request('username') ?: '';
    $sEmail       = Input::request('email') ?: '';
    $sPhoneNumber = Input::request('phoneNumber') ?: '';
    $sPassword    = Input::request('password') ?: '';
    $iUserType    = Input::request('userType') ?: '';
    $iSecretCode  = Input::request('keyId') ?: '';
    $iSemesterId  = Input::request('class_id') ?: null; // NEW

    $bDirect = (Input::request('bDirect') == "1" || Input::request('bDirect') == 1) ? 1 : 0;

    // Check client code
    if (!$bDirect) {
        $oClient = new clientCode();
        $oClientResult = $oClient->getClientCodeByByCode($iSecretCode);
        if (!$oClientResult) {
            echo json_encode(["error" => "Wrong Code", "status" => 500]);
            return false;
        }
    }

    // Basic validation
    if ($sName == '' || $sEmail == '' || $sPassword == '' || $sPhoneNumber == '') {
        echo json_encode(["error" => "Missing Parameters", "status" => 500]);
        return false;
    }

    // Student must select semester
    if ($iUserType == 2 && empty($iSemesterId)) {
        echo json_encode(["error" => "Please select a semester for student", "status" => 400]);
        return false;
    }

    $userManage = new UserManage();
    $oResult = $userManage->addUser($sName, $sPassword, $iUserType, $sEmail, $sPhoneNumber, $iSemesterId);

    if (!$oResult) {
        echo json_encode(["message" => "Error", "status" => 500]);
    } else {
        echo json_encode(["message" => "User created successfully", "status" => 200]);
    }
}

if ($sFlag == 'updateUser') {

    $id           = Input::request('userId');
    $name         = Input::request('username') ?: '';
    $sPhoneNumber = Input::request('phoneNumber') ?: '';
    $sEmail       = Input::request('email') ?: '';
    $sType        = Input::request('userType') ?: '';
    $sPassword    = Input::request('password') ?: '';
    $iSemesterId  = Input::request('class_id') ?: null; // NEW

    if ($id == '' || $sPhoneNumber == '' || $sType == '') {
        echo json_encode(["error" => "Missing Parameters", "status" => 500]);
        return false;
    }

    // Student must have semester
    if ($sType == 2 && empty($iSemesterId)) {
        echo json_encode(["error" => "Please select a semester for student", "status" => 400]);
        return false;
    }

    $userManage = new UserManage();
    $userManage->updateUser($id, $name, $sPhoneNumber, $sType, $sEmail, $sPassword, $iSemesterId);

    echo json_encode(["message" => "User updated successfully", "status" => 200]);
}

if ($sFlag == 'delete') {
    $id = Input::request('user_id');
    if ($id == '') {
        echo json_encode(array("error" => "Missing ID parameter", "status" => 500));
        return false;
    }
    $userManage = new UserManage();
    $userManage->deleteUser($id);
    echo json_encode(array("message" => "User deleted successfully", "status" => 200));
}
if ($sFlag == 'fetch') {
    $sName = Input::request('userName') ? Input::request('userName') : '';
    $iUserType = Input::request('userType') ? Input::request('userType') : '';
    $sEmail = Input::request('email') ? Input::request('email') : '';

    $userManage = new UserManage();
    $users = $userManage->fetchAll($sName, $iUserType, $sEmail);
    $response['status'] = 'success';
    $response['recordsTotal'] = count($users); // Total number of records
    $response['recordsFiltered'] = count($users); // Number of records after filtering (if applicable)
    $response['data'] = $users;
    echo json_encode($response);
}
if ($sFlag == 'fetchById') {
    $id = Input::request('id');
    if ($id == '') {
        echo json_encode(array("error" => "Missing ID parameter", "status" => 500));
        return false;
    }
    $userManage = new UserManage($id);
    $oResult = $userManage->fetchById($id);
    echo json_encode(array('data' => $oResult, "status" => 200));
}
if ($sFlag == "login") {
    $sUserId = Input::request('user_id') ? Input::request('user_id') : '';
    $password = Input::request('password') ? Input::request('password') : '';

    $userManage = new UserManage();

    $oResult = $userManage->login($sUserId, $password);
    if ($oResult != false) {
        echo json_encode(array($oResult, "status" => 200));
    } else {
        echo json_encode(array($oResult, "status" => 500, 'message' => "Wrong username and password."));
    }
}

if ($sFlag == 'userSymptoms') {
    $name = Input::request('name') ? Input::request('name') : '';
    $aNameData = fetchSymptoms($name);

    echo json_encode(array($aNameData, "status" => 200));
}
