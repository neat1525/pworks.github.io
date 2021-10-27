<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("connect.php");

$con = connect();


$sql = "SELECT * FROM customer_user";
$customer = $con->query($sql) or die($con->error);
$row = $customer->fetch_assoc();

// $sql = "SELECT * FROM employee_user";
// $employee = $con->query($sql) or die($con->error);
// $row = $employee->fetch_assoc();

// do {

//     echo $row['firstName'] . " " . $row['lastName'] . "<br/>";
// } while ($row = $student->fetch_assoc());
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasurer Table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <style>
        body {
            background-color: aliceblue;
        }

        #boderBot {
            color: aliceblue;
            font-weight: 300;
            border-bottom: 2px solid aliceblue;
        }

        thead {
            background: rgb(43, 205, 207);
            background: linear-gradient(278deg,
                    rgba(43, 205, 207, 1) 0%,
                    rgba(96, 169, 255, 1) 100%);
        }
    </style>

    <div class="container-fluid">
        <table class="table table-hover ">
            <thead class="sticky-top">
                <tr>
                    <th id="boderBot" scope="col">Functions</th>
                    <th id="boderBot" scope="col">FirstName</th>
                    <th id="boderBot" scope="col">LastName</th>
                    <th id="boderBot" scope="col">Sitio</th>
                    <th id="boderBot" scope="col">Spouse</th>
                    <th id="boderBot" scope="col">CivilStatus</th>

                    <th id="boderBot" scope="col">Gender</th>
                    <th id="boderBot" scope="col">BirthPlace</th>
                    <th id="boderBot" scope="col">BirthDate</th>
                    <th id="boderBot" scope="col">Age</th>
                    <th id="boderBot" scope="col">ContactNo.</th>

                    <th id="boderBot" scope="col">Edu.Attainment</th>
                    <th id="boderBot" scope="col">HouseMember</th>
                    <th id="boderBot" scope="col">WaterSource</th>
                    <th id="boderBot" scope="col">Email</th>

                    <th id="boderBot" scope="col">Password</th>
                    <th id="boderBot" scope="col">DateCreated</th>

                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>

                        <td>
                            <form class="d-flex" action="delete.php" method="post">
                                <a class="btn btn-warning" href="customerBilling.php?id=<?php echo $row['id']; ?>" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                        <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                    </svg></a>
                                <a class="btn btn-primary ml-2" href="Admin-edit-member.php?id=<?php echo $row['id']; ?>" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a>

                            </form>
                        </td>

                        <td> <?php echo $row['firstName']; ?> </td>
                        <td> <?php echo $row['lastName']; ?> </td>
                        <td> <?php echo $row['sitio']; ?> </td>
                        <td> <?php echo $row['spouse']; ?> </td>
                        <td> <?php echo $row['civilStat']; ?> </td>

                        <td> <?php echo $row['gender']; ?> </td>
                        <td> <?php echo $row['birthPlace']; ?> </td>
                        <td> <?php echo $row['birthDate']; ?> </td>
                        <td> <?php echo $row['age']; ?> </td>
                        <td> <?php echo $row['contactNum']; ?> </td>

                        <td> <?php echo $row['highEd']; ?> </td>
                        <td> <?php echo $row['houseMem']; ?> </td>
                        <td> <?php echo $row['waterSor']; ?> </td>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['password']; ?> </td>

                        <td> <?php echo $row['addedAt']; ?> </td>

                    </tr>
                <?php } while ($row = $customer->fetch_assoc()); ?>
            </tbody>
        </table>

    </div>

</body>

</html>