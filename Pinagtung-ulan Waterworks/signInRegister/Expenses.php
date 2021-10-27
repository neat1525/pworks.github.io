<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['userLogin'])) {
} else {
    echo header("Location: login.php");
}

include_once("connect.php");

$fName = $_SESSION['namesss'];

$con = connect();

$sql = "SELECT * FROM expenses";
$expenses = $con->query($sql) or die($con->error);
$row = $expenses->fetch_assoc();


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
    <link rel="stylesheet" href="adminDb.css" />
</head>

<body>

    <style>
        .dashboardSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .employeeSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .memberSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .receiptSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .reportSection {
            border-bottom: 2px solid aliceblue;
        }

        .customersServiceSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .newsEventsSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        #tableBody {
            width: 1210px;
        }

        table {
            margin-left: 25px;

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
                            <li><a class="dropdown-item" href="#">Account</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 headerAcInfo">
                    <h1>ADMINISTRATOR</h1>
                    <h6>Welcome <?php echo $fName; ?></h6>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container aaa">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav" id="mainNav">
                    <li class="nav-item">
                        <a class="nav-link dashboardSection" aria-current="page" href="dsds.php" id="Employees">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link employeeSection" aria-current="page" href="adminDb.php" id="Employees">Employees</a>
                    </li>
                    <li>
                        <a class="nav-link memberSection" href="Admin-member-module.php" id="navbarDropdownMenuLink">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link receiptSection" href="Customer-receipt.php">Receipt</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle reportSection active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reports
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="Income.php">Income</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="Expenses.php">Expenses</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle customersServiceSection" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Customer Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="Employee-customer-service.php">complaints</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="Technical-problems.php">Approved Complaints</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link newsEventsSection" href="News-events.php">News and Events</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="d-inline" id="headerTreasurer">Expenses</h1>
            </div>
            <div class="col text-center">
                <a class="btn btn-success" href="Expenses-add.php" role="button">Add Expenses</a>
            </div>
            </td>
            <div id="tableBody">
                <table class="table table-hover mt-4 mb-5">
                    <thead class="">
                        <tr>
                            <th id="boderBot" scope="col">Expenses Type</th>
                            <th id="boderBot" scope="col">Remarks</th>
                            <th id="boderBot" scope="col">Amount</th>
                            <th id="boderBot" scope="col">Posted By</th>
                            <th id="boderBot" scope="col">Date Posted</th>



                    </thead>
                    <tbody>
                        <?php do { ?>
                            <tr>
                                <td> <?php echo $row['type']; ?> </td>
                                <td> <?php echo $row['remarks']; ?> </td>
                                <td> <?php echo $row['amount']; ?> </td>
                                <td> <?php echo $row['postedBy']; ?> </td>
                                <td> <?php echo $row['datePosted']; ?> </td>


                            </tr>

                        <?php } while ($row = $expenses->fetch_assoc()); ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>


    <!-- Bootstraps Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>