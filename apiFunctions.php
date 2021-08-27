<?php
require_once 'utils.php';

function login($userName, $password){

  if ($userName === USERNAME && sha1($password) === PASSWORD_HASHED) {
      
    $_SESSION['isLoggedIn'] = true;
    $jsonRes = json_encode(responseMessage(false, LOGIN_SUCCESS));
    echo $jsonRes; 
    exit;

  } else {
    
    $jsonRes = json_encode(responseMessage(true, LOGIN_ERROR));
    echo $jsonRes; 
    exit;
    
  }
  
}

function logout(){

  unset($_SESSION['isLoggedIn']);
    session_unset();

    $jsonRes = json_encode(responseMessage(false, LOGOUT_SUCCESS));
      echo $jsonRes; 
      exit;
}

function readDirectory(){
 
  $jsonFileContents = file_get_contents(DOCS_FILE_STRUCTURE);

  return array(
    'error' => false,
    'msg' => READ_DIR_SUCCESS,
    'data' => json_decode($jsonFileContents, true)
  );
}

function updateDirectory( $newContent=false ){

  checkSession($_SESSION['isLoggedIn']);

  if(is_file(DOCS_FILE_STRUCTURE) && file_put_contents(DOCS_FILE_STRUCTURE, $newContent)){
    return responseMessage(false, UPDATE_DIR_SUCCESS);
  } else {
    return responseMessage(true, UPDATE_DIR_ERROR);
  }

}

function createFile( $fileName=false ){

  checkSession($_SESSION['isLoggedIn']);

  $filePath = createFilePath($fileName); 
  
  if( !is_file($filePath) && copy(TEMPLATE_FILE, $filePath) ) { 
    return responseMessage(false, FILE_CREATED);
  } else { 
    return responseMessage(true, FILE_NOT_CREATED); 
  } 
}

function updateFile( $fileName=false, $newContent=false ){

  checkSession($_SESSION['isLoggedIn']);

  $filePath = createFilePath($fileName); 

  if(is_file($filePath) && file_put_contents($filePath, $newContent)){
    return responseMessage(false, FILE_UPDATED);
  } else {
    return responseMessage(true, FILE_NOT_UPDATED);
  }

}

function deleteFile( $fileName=false ){
  
  checkSession($_SESSION['isLoggedIn']);
  
  $filePath = createFilePath($fileName); 

  if(is_file($filePath) && unlink($filePath) ){
    return responseMessage(false, FILE_DELETED);
  } else {
    return responseMessage(true, FILE_NOT_DELETED);
  }
}

