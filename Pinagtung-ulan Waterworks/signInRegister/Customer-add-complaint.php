<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['userLogin'])) {
} else {
    echo header("Location: login.php");
}

include_once("connect.php");

$ID = $_SESSION['ID'];

$con = connect();

$sql = "SELECT * FROM customer_user WHERE id = '$ID'";
$customer_user = $con->query($sql) or die($con->error);
$row = $customer_user->fetch_assoc();

if (isset($_POST['submit'])) {

    $name = $row['firstName'] . ' ' . $row['lastName'];
    $complaint =  $_POST['complaint'];
    $contactNum = $row['contactNum'];
    $approved = "Pending";

    $sql = "INSERT INTO `complaints`(`complaint_id`, `name`, `complaint`, `contactNum`, `approved`) VALUES ('$ID','$name', '$complaint', '$contactNum', '$approved')";
    $con->query($sql) or die($con->error);

    echo header("Location: Customer-service.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employees | Waterworks</title>

    <link rel="icon" href="emage/Blue-PW-Logo-short.svg" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- CSS ONLY -->
    <link rel="stylesheet" href="Customer-account.css" />
</head>

<body>

    <style>
        .dashboardSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .customerSection {
            border-bottom: 2px solid aliceblue;
        }

        .newsSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        #addBtn {
            background: rgb(43, 205, 207);
            background: linear-gradient(278deg, rgba(43, 205, 207, 1) 0%, #0099ff 100%);

        }

        #complaint {
            margin-left: 25px;
            background-color: aliceblue;
            border: 2px solid rgba(96, 169, 255, 1);
            font-size: 1.5rem;
            color: #777675;
        }
    </style>

    <header class="pageHeader">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <img src="img/PW-Logo-short.svg" alt="" />
                </div>
                <div class="col-2 drpdwn">
                    <div class="dropdown">
                        <a class="
                  btn btn-dark
                  bg-transparent
                  border-0
                  mt-4
                  dropdown-toggle
                " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="Customer-bio.php">Account</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 headerAcInfo">
                    <h1><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></h1>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">

        <div class="container">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link dashboardSection" aria-current="page" href="Customer-dashboard.php" id="Employees">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active customerSection" aria-current="page" href="Customer-service.php" id="Employees">Customer Service</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link newsSection" aria-current="page" href="Customer-news.php" id="Employees">News and Events</a>
                </li>

            </ul>
        </div>

    </nav>

    <div class="container mt-5">
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <h1 class="mb-5" id="profile">Complaint Form</h1>
                </div>
                <div class="col text-center">
                    <button type="submit" id="addBtn" name="submit" value="Update Form" class="btn btn-primary">Add Complaint</button>
                    <a class="btn btn-danger" id="cancelBtn" href="Customer-service.php" role="button">Cancel</a>
                </div>
            </div>
            <textarea name="complaint" id="complaint" cols="92" rows="5" placeholder="Enter your complaint here..."></textarea>
        </form>
    </div>

    <!-- Bootstraps Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>