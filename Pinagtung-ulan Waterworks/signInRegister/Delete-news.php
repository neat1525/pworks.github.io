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

$con = connect();

$fName = $_SESSION['namesss'];

$id = $_GET['id'];;
$sql = "DELETE FROM news_events WHERE id = '$id'";
$con->query($sql) or die($con->error);

echo header("Location: News-events.php");
