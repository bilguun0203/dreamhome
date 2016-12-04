<?php
session_start();
include_once "func_db.php";

$dbhost = "localhost";
$dbname = "dreamhome";
$dbuser = "root";
$dbpass = "toor";

try {
    $conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "МЭДЭГДЭЛ >> Амжилттай холбогдлоо";
}
catch(PDOException $e)
{
    echo "АЛДАА >> Холболт амжилтгүй: " . $e->getMessage();
}

$db = new func_db($conn);