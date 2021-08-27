<?php

define('FILES_FOLDER', './files/');
define('DOCS_FILE_STRUCTURE', 'docsFileStructure.json');
define('TEMPLATE_FILE', './templates/index.md');
define('FILE_EXTENSION', 'md');

// ----- MESSAGES -----
define('FILE_CREATED', 'File Created');
define('FILE_NOT_CREATED', 'Failed creating file');
define('FILE_UPDATED', 'File Updated');
define('FILE_NOT_UPDATED', 'Failed updating file');
define('FILE_DELETED', 'File Deleted');
define('FILE_NOT_DELETED', 'Failed deleting file');
define('FILE_FOUND', 'File Found');
define('FILE_NOT_FOUND', 'Failed finding file');

define('RENAMED', 'File or Folder Renamed');
define('NOT_RENAMED', 'File or Folder Not Renamed');

define('READ_DIR_SUCCESS', "Success opening folder");
define('READ_DIR_ERROR', "Failed opening folder");
define('UPDATE_DIR_SUCCESS', "Directory Updated");
define('UPDATE_DIR_ERROR', "Failed updating directory");

define('FAILED_PARAMS', "Params or Values are not correct");

// ----- LOGIN -----
define('USERNAME', "admin");
define('PASSWORD_HASHED', "8cb2237d0679ca88db6464eac60da96345513964"); //pass: 12345 use this site to create the sha1 https://passwordsgenerator.net/sha1-hash-generator/
define('LOGIN_SUCCESS', "Login Success");
define('LOGIN_ERROR', "Login Failed");
define('LOGOUT_SUCCESS', "User has been logged out");

// ----- API Actions -----
define('LOGIN', 'login');
define('LOGOUT', 'logout');

define('READ_DIR', 'readDir');
define('UPDATE_DIR', 'updateDir');

define('CREATE_FILE', 'createFile');
define('UPDATE_FILE', 'updateFile');
define('DELETE_FILE', 'deleteFile');




