<?php

function db_connection()
{
$host="localhost:3307";
$h_username="root";
$h_password="";
$dbName="photographyWebsite";

$conn = mysqli_connect($host,$h_username,$h_password,$dbName);
return $conn;
}

?>