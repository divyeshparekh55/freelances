<?php
include_once 'class.pdohelper.php';
include_once 'class.pdowrapper.php';

define("SERVER_NAME","http://".$_SERVER["SERVER_NAME"]);
define("FOLDER_NAME",'freelances');
global $db;
$dbConfig = array("host" => 'localhost', "dbname" => 'textile', "username" => 'root', "password" => '');
$db = new PdoWrapper($dbConfig);


?>