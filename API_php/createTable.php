<?php
header("Access-Control-Allow-Origin: *");
//cau hinh db
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "studentfeedback";
//tao ket noi
$conn = new mysqli($serverName, $userName, $password, $dbName);
//check connection
if ($conn->connect_errno) {
    die("Connection failed" . $conn->connect_error);
}
$sql = "CREATE TABLE feedback (
    name VARCHAR(50),
    email VARCHAR(50),
    telephone VARCHAR(20),
    fbcontent VARCHAR(255),
    createdAt date DEFAULT CURRENT_DATE(),
    status int DEFAULT -1
    )";

$result = $conn->query($sql);

if($result){
    echo "Done";
}else{
    echo "Please Try Again";
}
$conn->close();
