<?php

include_once("connect.php");
$con = connect();

if (isset($_POST['submit'])) {

    $fName =  $_POST['fName'];
    $lName = $_POST['lName'];
    $gender = $_POST['gender'];
    $access = $_POST['access'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];

    if ($password == $rePassword) {

        $sql = "INSERT INTO `employee_user`(`firstName`, `lastName`, `gender`, `access`, `email`, `password`) VALUES ('$fName', '$lName', '$gender', '$access', '$email', '$password')";
        $con->query($sql) or die($con->error);

        echo header("Location: login.php");
    } else {
        echo "inccorect reEnter Password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>

    <link rel="icon" href="img/Blue-PW-Logo-short.svg" type="image/x-icon" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <!-- CSS ONLY -->
    <link rel="stylesheet" href="register.css" />
</head>

<body>
    <div class="container">
        <div class="row mx-auto my-5 shadow rowContainer">
            <div class="col-lg-2" id="mainForm">
                <img src="img/PW-Logo-short.svg" alt="No image Available" />

            </div>

            <div class="col" id="mainForm2">
                <p class="text-center pb-5">Sign Up</p>

                <form action="" method="post">

                    <form class="text-center" action="" method="post">

                        <input name="fName" type="text" id="fName" placeholder="First Name">
                        <input name="lName" type="text" id="lName" placeholder="Last Name">
                        <select name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        <select name="access" id="access">
                            <option value="Administrator">Administrator</option>
                            <option value="Secretary">Secretary</option>
                            <option value="Treasurer">Treasurer</option>
                            <option value="Cashier">Cashier</option>
                        </select>

                        <input name="email" type="email" id="email" placeholder="Email">
                        <input name="password" type="password" id="password" placeholder="Password">
                        <input name="rePassword" type="password" id="rePassword" placeholder="Password (Re-enter)">

                        <br>
                        <button type="submit" name="submit" value="Register Form" class="btn btn-primary">LogIn</button>
                    </form>


                </form>

            </div>
        </div>
    </div>

    <!-- Bootstraps Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>