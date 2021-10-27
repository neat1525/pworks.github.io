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

if (isset($_POST['submit'])) {

    $spouse = $_POST['spouse'];
    $civilStat = $_POST['civilStat'];

    $gender = $_POST['gender'];
    $birthPlace = $_POST['birthPlace'];

    $birthDate = $_POST['birthDate'];
    $currentDate = date("d-m-Y");
    $age = date_diff(date_create($birthDate), date_create($currentDate));
    $age = $age->format("%y");
    // $birthDate = $_POST['birthDate'];
    // $age = $_POST['age'];

    $contactNum = $_POST['contactNum'];

    $highEd = $_POST['highEd'];
    $houseMem = $_POST['houseMem'];
    $waterSor = $_POST['waterSor'];
    $password = $_POST['password'];

    // $sql = "UPDATE `student_list` SET `firstName`='[$fName]',`lastName`='[$lName]',`gender`='[$gender]' WHERE id = '$id";

    $sql = "UPDATE customer_user SET spouse = '$spouse', 
    civilStat = '$civilStat', gender = '$gender', birthPlace = '$birthPlace', birthDate = '$birthDate', age = '$age', 
    contactNum = '$contactNum', highEd = '$highEd', houseMem = '$houseMem', waterSor = '$waterSor', password = '$password' WHERE id = '$ID'";
    $con->query($sql) or die($con->error);

    echo header("Location: Customer-bio.php");
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

        .customerSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        .newsSection:hover {
            border-bottom: 2px solid aliceblue;
        }

        #input {
            margin-left: 25px;
            background-color: aliceblue;
            border: none;
            font-size: 1.5rem;
            color: rgba(96, 169, 255, 1);
        }

        h2 {
            font-size: 1.5rem;
        }

        .head {
            margin-bottom: 50px;

        }

        #updateBtn {
            background: rgb(43, 205, 207);
            background: linear-gradient(278deg, rgba(43, 205, 207, 1) 0%, #0099ff 100%);
            margin-top: -72px;
            margin-left: 1010px;
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
                    <h1><?php echo $fName . ' ' . $lName; ?></h1>
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
                    <a class="nav-link customerSection" aria-current="page" href="Customer-service.php" id="Employees">Customer Service</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link newsSection" aria-current="page" href="Customer-news.php" id="Employees">News and Events</a>
                </li>

            </ul>
        </div>

    </nav>

    <div class="container mt-5">
        <form action="" method="post">
            <div class="head">
                <h1 class="mb-5 d-inline" id="profile">Edit Profile</h1>
                <button type="submit" id="updateBtn" name="submit" value="Update Form" class="btn btn-primary">Update</button>
            </div>
            <div class="row mb-4">

                <div class="col">
                    <label for="">Sitio</label> <br>
                    <h2 class="" id="details"> <?php echo $row['sitio']; ?> </h2>

                </div>

                <div class="col">
                    <label for="">Spouse</label> <br>
                    <input name="spouse" type="text" id="input" value="<?php echo $row['spouse']; ?>">

                </div>

                <div class="col">
                    <label for="">Civil Status</label> <br>
                    <select name="civilStat" id="input">
                        <option value="Single" <?php echo ($row['civilStat'] == "Single") ? 'selected' : ''; ?>>Single</option>
                        <option value="Married" <?php echo ($row['civilStat'] == "Married") ? 'selected' : ''; ?>>Married</option>
                    </select>
                </div>

                <div class="col">
                    <label for="">Gender</label> <br>
                    <select name="gender" id="input">
                        <option value="Male" <?php echo ($row['gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($row['gender'] == "Female") ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">

                <div class="col">
                    <label for="">Birth Place</label> <br>
                    <input name="birthPlace" type="text" id="input" value="<?php echo $row['birthPlace']; ?>">

                </div>

                <div class="col">
                    <label for="">Birth Date</label> <br>
                    <input name="birthDate" type="date" id="input" value="<?php echo $row['birthDate']; ?>">

                </div>

                <div class="col">
                    <label for="">Age</label>
                    <h2 class="" id="details"> <?php echo $row['age']; ?> </h2>
                </div>

                <div class="col">
                    <label for="">Contact Number</label>
                    <input name="contactNum" type="number" min="0" id="input" value="<?php echo $row['contactNum']; ?>">

                </div>
            </div>

            <div class="row mb-4">

                <div class="col">
                    <label for="">Educational Attainment</label> <br>
                    <select name="highEd" id="input">
                        <option value="Elementary" <?php echo ($row['highEd'] == "Elementary") ? 'selected' : ''; ?>>Elementary</option>
                        <option value="High School" <?php echo ($row['highEd'] == "High School") ? 'selected' : ''; ?>>High School</option>
                        <option value="Senior High School" <?php echo ($row['highEd'] == "Senior High School") ? 'selected' : ''; ?>>Senior High School</option>
                        <option value="College" <?php echo ($row['highEd'] == "College") ? 'selected' : ''; ?>>College</option>
                    </select>
                </div>

                <div class="col">
                    <label for="">House Member(s)</label> <br>
                    <select name="houseMem" id="input">
                        <option value="0" <?php echo ($row['houseMem'] == "0") ? 'selected' : ''; ?>>0</option>
                        <option value="1" <?php echo ($row['houseMem'] == "1") ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo ($row['houseMem'] == "2") ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo ($row['houseMem'] == "3") ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?php echo ($row['houseMem'] == "4") ? 'selected' : ''; ?>>4</option>
                        <option value="5" <?php echo ($row['houseMem'] == "5") ? 'selected' : ''; ?>>5</option>
                        <option value="6" <?php echo ($row['houseMem'] == "6") ? 'selected' : ''; ?>>6</option>
                        <option value="7" <?php echo ($row['houseMem'] == "7") ? 'selected' : ''; ?>>7</option>
                        <option value="8" <?php echo ($row['houseMem'] == "8") ? 'selected' : ''; ?>>8</option>
                        <option value="9" <?php echo ($row['houseMem'] == "9") ? 'selected' : ''; ?>>9</option>
                        <option value="10" <?php echo ($row['houseMem'] == "10") ? 'selected' : ''; ?>>10</option>
                    </select>

                </div>

                <div class="col">
                    <label for="">Water Source</label> <br>
                    <select name="waterSor" id="input">
                        <option value="Artesian Well" <?php echo ($row['waterSor'] == "Artesian Well") ? 'selected' : ''; ?>>Artesian Well</option>
                        <option value="Hand Pump" <?php echo ($row['waterSor'] == "Hand Pump") ? 'selected' : ''; ?>>Hand Pump</option>
                        <option value="Dug Well" <?php echo ($row['waterSor'] == "Dug Well") ? 'selected' : ''; ?>>Dug Well</option>
                        <option value="Spring" <?php echo ($row['waterSor'] == "Spring") ? 'selected' : ''; ?>>Spring</option>
                    </select>
                </div>

                <div class="col">
                    <label for="">Password</label> <br>
                    <input name="password" type="text" id="input" value="<?php echo $row['password']; ?>">

                </div>
            </div>
        </form>
    </div>

    <!-- Bootstraps Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>