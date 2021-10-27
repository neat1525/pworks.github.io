<?php

include_once("connect.php");
$con = connect();

if (isset($_POST['submit'])) {

    function password_generate($chars)
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $chars);
    }
    $password = password_generate(10);

    $birthDate = $_POST['birthDate'];
    $currentDate = date("d-m-Y");
    $age = date_diff(date_create($birthDate), date_create($currentDate));
    $age = $age->format("%y");

    $fName =  $_POST['fName'];
    $lName = $_POST['lName'];
    $gender = $_POST['gender'];
    $sitio = $_POST['sitio'];
    $email1 = $_POST['fName'] . '' . $_POST['lName'] . '' . "@pworks.com";
    $email = strtolower($email1);
    $access = "Customer";
    // $birthDate = $_POST['birthDate'];

    $sql = "INSERT INTO `customer_user`(`firstName`, `lastName`, `gender`, `birthDate`, `age`, `sitio`, `email`, `password` ,`access`) VALUES ('$fName', '$lName', '$gender', '$birthDate', '$age', '$sitio', '$email', '$password', '$access')";
    $con->query($sql) or die($con->error);

    echo header("Location: Admin-member-tbl.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <style>
        body {
            background-color: aliceblue;
        }
    </style>


    <form action="" method="post">

        <input name="fName" type="text" id="fName" placeholder="First Name">
        <input name="lName" type="text" id="lName" placeholder="Last Name">

        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="birthDate">Birthdate</label>
        <input name="birthDate" type="date" id="birthDate" placeholder="">

        <label for="sitio">Sitio</label>
        <select name="sitio" id="sitio">
            <option value="Sentro">Sentro</option>
            <option value="Kanluran">Kanluran</option>
            <option value="Silangan">Silangan</option>
            <option value="Pook">Pook</option>
        </select>


        <br>

        <button type="submit" name="submit" value="Submit Form" class="btn btn-primary">Register</button>
        <a class="btn btn-danger" href="Admin-member-tbl.php" role="button">Cancel</a>


    </form>

</body>

</html>