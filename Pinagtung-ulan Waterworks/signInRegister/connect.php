<?php

function connect()
{

    $host = "localhost:3308";
    $username = "root";
    $password = "1525";
    $database = "pw_website";

    $con = new mysqli($host, $username, $password, $database);

    if ($con->connect_error) {
        echo $con->connect_error;
    } else {
        return $con;
    }

    echo "Function Connected <br/>";
}
