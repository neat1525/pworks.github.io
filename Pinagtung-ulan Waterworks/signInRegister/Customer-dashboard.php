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
$lName = $_SESSION['names'];
$ID = $_SESSION['ID'];

$con = connect();

$sql = "SELECT * FROM customer_user WHERE id = '$ID'";
$employee = $con->query($sql) or die($con->error);
$row = $employee->fetch_assoc();

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
        .dashboardSection {
            border-bottom: 2px solid aliceblue;
        }

        .customerSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .newsSection:hover {
            border-bottom: 2px solid aliceblue;
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
                            <li><a class="dropdown-item" href="logout-customer.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 headerAcInfo">
                    <h1><?php echo $fName . ' ' . $lName; ?></h1>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">

        <div class="container">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active dashboardSection" aria-current="page" href="Customer-dashboard.php" id="Employees">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link customerSection" aria-current="page" href="Customer-service.php" id="Employees">Customer Service</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link newsSection" aria-current="page" href="Customer-news.php" id="Employees">News and Events</a>
                </li>

            </ul>
        </div>

        <!-- <div class="container aaa">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active employeeSection" aria-current="page" href="#" id="Employees">Employees</a>
                    </li>
                    <li>
                        <a class="nav-link" href="Admin-member-module.php" id="navbarDropdownMenuLink">Members</a>
                    </li>
                    <li class="nav-item incomeReportsSection">
                        <a class="nav-link" href="Customer-receipt.php">Receipt</a>
                    </li>
                    <li class="nav-item dropdown financeSection">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <li class="nav-item customersServiceSection">
                        <a class="nav-link" href="Employee-customer-service.php">Customers Service</a>
                    </li>
                    <li class="nav-item technicalProblemsSection">
                        <a class="nav-link" href="#">Technical Problems</a>
                    </li>
                    <li class="nav-item newsEventsSection">
                        <a class="nav-link" href="#">News and Events</a>
                    </li>
                </ul>
            </div>
        </div> -->
    </nav>

    <div class="container mt-5">
        <h1 class="mb-5" id="profile">Profile</h1>
        <div class="row mb-4">

            <div class="col">
                <label for="">Sitio</label>
                <h2 class="" id="details"> <?php echo $row['sitio']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Spouse</label>
                <h2 class="" id="details"> <?php echo $row['spouse']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Civil Status</label>
                <h2 class="" id="details"> <?php echo $row['civilStat']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Gender</label>
                <h2 class="" id="details"> <?php echo $row['gender']; ?> </h2>
            </div>
        </div>

        <div class="row mb-4">

            <div class="col">
                <label for="">Birth Place</label>
                <h2 class="" id="details"> <?php echo $row['birthPlace']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Birth Date</label>
                <h2 class="" id="details"> <?php echo $row['birthDate']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Age</label>
                <h2 class="" id="details"> <?php echo $row['age']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Contact Number</label>
                <h2 class="" id="details"> <?php echo $row['contactNum']; ?> </h2>
            </div>
        </div>

        <div class="row mb-4">

            <div class="col">
                <label for="">Education Attainment</label>
                <h2 class="" id="details"> <?php echo $row['highEd']; ?> </h2>
            </div>

            <div class="col">
                <label for="">House Member(s)</label>
                <h2 class="" id="details"> <?php echo $row['houseMem']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Water Source</label>
                <h2 class="" id="details"> <?php echo $row['waterSor']; ?> </h2>
            </div>

            <div class="col">
                <label for="">Email</label>
                <h2 class="" id="details"> <?php echo $row['email']; ?> </h2>
            </div>
        </div>

    </div>

    <!-- Bootstraps Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>