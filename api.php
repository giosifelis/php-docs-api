<?php
session_start();

require 'config.php';
include_once './apiFunctions.php';
include_once './utils.php';

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

header('Content-Type: application/json');

$apiInput = json_decode(file_get_contents("php://input"));

$action = $apiInput->action;
$filePath = $apiInput->path;
$oldFileName = $apiInput->oldFileName;
$fileName = $apiInput->fileName;
$newContent = $apiInput->newContent;
$userName = $apiInput->userName;
$password = $apiInput->password;

  if ($action === LOGIN) {

    login($userName, $password);

  } elseif($action === LOGOUT) {

    logout();

  } elseif ($action === READ_DIR) {

    $data = readDirectory();
		apiResponse($data);

	} elseif ($action === UPDATE_DIR) {
    // checkSession($_SESSION['isLoggedIn']);
    $data = updateDirectory($newContent);
		apiResponse($data);

	} elseif ($action === CREATE_FILE) {
    
    // checkSession($_SESSION['isLoggedIn']);

    $data = createFile($fileName);
    apiResponse($data);
     
	} elseif ($action === UPDATE_FILE) {
    
    // checkSession($_SESSION['isLoggedIn']);

    $data = updateFile($fileName , $newContent);
    apiResponse($data);
     
	} elseif ($action === DELETE_FILE) {
  
   // checkSession($_SESSION['isLoggedIn']);

    $data = deleteFile($fileName);
    apiResponse($data);   

	} else {
    
  //  checkSession($_SESSION['isLoggedIn']);

    $jsonRes = json_encode( responseMessage(true, FAILED_PARAMS));
      echo $jsonRes; 
      exit;
 
    }

