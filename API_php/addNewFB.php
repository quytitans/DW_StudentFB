<?php
header("Access-Control-Allow-Origin: *");
//get json data
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$email = $data['email'];
$telephone = $data['telephone'];
$fbcontent = $data['fbcontent'];
$status = 1; //1 unread, 2 read
$createdAt = date("Y-m-d");

//cau hinh db
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "hanoistreet";
//tao ket noi
$conn = new mysqli($serverName, $userName, $password, $dbName);
//check connection
if ($conn->connect_errno) {
    die("Connection failed" . $conn->connect_error);
}
//insert
$sql = "INSERT INTO studentFB (name, email, telephone, fbcontent, status, createdAt) 
VALUES ('". $name ."','" . $email . "','" . $telephone . "','" . $fbcontent . "'," . $status . ",'" . $createdAt . ")";
$result = $conn->query($sql);
if ($result) {
    $data = [
        'status' => 200,
        'message' => 'Save Success!!!',
    ];
    echo json_encode($data);
} else {
    $data = [
        'status' => 500,
        'message' => 'Save Fail!!!',
    ];
    echo json_encode($data);
}
$conn->close();
