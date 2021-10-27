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
    $access = $_POST['access'];
    $email1 = $_POST['fName'] . '' . $_POST['lName'] . '' . "@pworks.com";
    $email = strtolower($email1);
    // $birthDate = $_POST['birthDate'];

    $sql = "INSERT INTO `employee_user`(`firstName`, `lastName`, `gender`, `birthDate`, `age`, `access`, `email`, `password` ) VALUES ('$fName', '$lName', '$gender', '$birthDate', '$age', '$access', '$email', '$password')";
    $con->query($sql) or die($con->error);

    echo header("Location: tblSecretary.php");
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

        <label for="access">Access Type</label>
        <select name="access" id="access">
            <option value="Administrator">Administrator</option>
            <option value="Secretary">Secretary</option>
            <option value="Treasurer">Treasurer</option>
            <option value="Cashier">Cashier</option>
            <option value="Archive">Archive</option>
        </select>


        <br>

        <button type="submit" name="submit" value="Submit Form" class="btn btn-primary">Register</button>
        <a class="btn btn-danger" href="tblSecretary.php" role="button">Cancel</a>


    </form>

</body>

</html>