<?php
// thong tin ket noi
$DB_HOST= "127.0.0.1";
$DB_USER= "root";
$DB_PASS = "";
$DB_NAME = "demo";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
	echo "Connection failed!";
}
