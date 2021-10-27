<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['userLogin'])) {
    echo "welcome " . $_SESSION['userLogin'];
} else {
    echo header("Location: login.php");
}

$id = $_GET['id'];

echo $id;

include_once("connect.php");

$fName = $_SESSION['namesss'];

$con = connect();

$sql = "SELECT * FROM complaints WHERE complaint_id = '$id'";
$complaints = $con->query($sql) or die($con->error);
$row = $complaints->fetch_assoc();

// $sql = "UPDATE `student_list` SET `firstName`='[$fName]',`lastName`='[$lName]',`gender`='[$gender]' WHERE id = '$id";

$sql = "UPDATE complaints SET approved = 'Approved'  WHERE id = '$id'";
$con->query($sql) or die($con->error);

echo header("Location: Employee-customer-service.php");
