<?php


if (!isset($_SESSION)) {
    session_start();
}

include_once("connect.php");
$con = connect();

if (isset($_POST['login'])) {
    $email =  $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employee_user WHERE email = '$email' AND password = '$password'";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if ($total > 0) {
        $_SESSION['namesss'] = $row['firstName'];
        $_SESSION['names'] = $row['lastName'];
        $_SESSION['ID'] = $row['id'];
        $_SESSION['userLogin'] = $row['email'];
        $_SESSION['access'] = $row['access'];

        if ($_SESSION['access'] == "Administrator") {
            echo $_SESSION['userLogin'];
            echo header("Location: adminDb.php");
        } else if ($_SESSION['access'] == "Secretary") {
            echo header("Location: secretaryDb.php");
        } else if ($_SESSION['access'] == "Treasurer") {
            echo header("Location: treasurerDb.php");
        } else if ($_SESSION['access'] == "Cashier") {
            echo header("Location: cashierDb.php");
        }
    } else {
        echo "No Users Found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>

    <link rel="icon" href="img/Blue-PW-Logo-short.svg" type="image/x-icon" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <!-- CSS ONLY -->
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <div class="container">
        <div class="row mx-auto my-5 shadow rowContainer">
            <div class="col-lg-4" id="mainForm">
                <img src="img/PW-Logo-short.svg" alt="No image Available" />

                <h2>Welcome!</h2>
                <p>
                    The water that flows from our waterworks are filled with the
                    strength and determination of Pinagtung-ulan which strives us to do
                    better every single day.
                </p>
            </div>

            <div class="col" id="mainForm2">
                <p class="text-center pb-5">Sign In</p>

                <form method="post">
                    <div class="form-group col-lg-6 mx-auto pb-3">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Email" />
                    </div>
                    <div class="form-group col-lg-6 mx-auto pb-5">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter Password" />
                    </div>

                    <div class="container signIns">
                        <div class="col-12 text-center mb-5">
                            <button type="submit" class="btn" name="login">Sign In</button>
                        </div>
                        <!-- <a id="aRegister" href="register.php">Sign Up<a /> -->
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstraps Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>