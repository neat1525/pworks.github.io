<?php

session_start();

include_once("connect.php");
$con = connect();
$id = $_GET['id'];
$id2 = $id;


$sql = "SELECT * FROM customer_user WHERE id = '$id'";
$student = $con->query($sql) or die($con->error);
$row = $student->fetch_assoc();

$_SESSION['name'] = $row['firstName'] . ' ' . $row['lastName'];

$sql2 = "SELECT * FROM customer_billing WHERE billing_id = '$id2'";
$billing = $con->query($sql2) or die($con->error);
$row2 = $billing->fetch_assoc();
$total = $billing->num_rows;

$_SESSION['id'] = $row['id'];

if ($total > 0) {
} else {
    echo header("Location: Customer-add-billing.php");
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
        /* #btnAddBill {
            margin-top: -50px;
            margin-left: 1054px;
        } */

        table {
            height: 200px;
        }

        #sitioHeader {
            margin-top: -25px;
            margin-bottom: 25px;
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

    <div class="">
        <h1 class="d-inline" id="nameHeader">
            <?php echo $row['firstName'] . ' ' . $row['lastName']; ?>
        </h1>
        <a class="btn btn-success" id="btn" href="Customer-add-billing.php" target="" role="button">Add New Billing</a>
        <h1 id="sitioHeader">
            <?php echo $row['sitio']; ?>
        </h1>
    </div>
    <div class="container-fluid">
        <table class="table table-hover">
            <thead class="sticky-top">
                <tr>
                    <th id="boderBot" scope="col">Previous</th>
                    <th id="boderBot" scope="col">Present</th>
                    <th id="boderBot" scope="col">Water Consumption</th>
                    <th id="boderBot" scope="col">Amount Due</th>
                    <th id="boderBot" scope="col">Date Posted</th>
                    <th id="boderBot" scope="col">Posted By</th>
                    <th id="boderBot" scope="col">Function</th>

            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td> <?php echo $row2['previous']; ?> </td>
                        <td> <?php echo $row2['present']; ?> </td>
                        <td> <?php echo $row2['meterCon']; ?> </td>
                        <td> <?php echo $row2['amountDue']; ?> </td>
                        <td> <?php echo $row2['datePosted']; ?> </td>
                        <td> <?php echo $row2['postedBy']; ?> </td>
                        <td>
                            <a class="btn btn-primary" href="Customer-add-receipt.php?id=<?php echo $row2['id']; ?>" role="button">Add Receipt</a>
                        </td>

                    </tr>

                <?php } while ($row2 = $billing->fetch_assoc()); ?>
            </tbody>
        </table>

    </div>

</body>

</html>