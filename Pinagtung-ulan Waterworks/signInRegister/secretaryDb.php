<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['userLogin'])) {
    echo "welcome " . $_SESSION['userLogin'];
} else {
    echo "Welcome Guest";
}

include_once("connect.php");

$con = connect();


echo "Secretary Dashboards";
