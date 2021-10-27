<?php

session_start();

include_once("connect.php");
$con = connect();
$billing_id = $_SESSION['id'];

echo $billing_id;

// $dd = $_SESSION['dd'];

// echo $dd;

$sql2 = "SELECT * FROM customer_billing";
$customer = $con->query($sql2) or die($con->error);
$row2 = $customer->fetch_assoc();
$total = $customer->num_rows;

if (isset($_POST['submit'])) {

    $sql2 = "SELECT * FROM customer_billing WHERE  id = $total";
    $customer = $con->query($sql2) or die($con->error);
    $row2 = $customer->fetch_assoc();

    $fName = $_SESSION['namesss'];

    $previous = $_POST['previous'];
    $meterCon = $_POST['meterCon'];
    $present = $_POST['meterCon'] + $_POST['previous'];

    $amountDue = $meterCon * 17;

    $sql = "INSERT INTO `customer_billing`(`billing_id`, `previous`, `present`, `meterCon`, `amountDue`, `postedBy`) VALUES ('$billing_id', '$previous', '$present', '$meterCon', '$amountDue', '$fName')";
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

    <form action="" method="post">

        <input name="previous" type="number" id="meterCon" placeholder="Previous" max="10000" min="0">
        <input name="meterCon" type="number" id="meterCon" placeholder="0" max="1000" min="0">

        <br>
        <button type="submit" name="submit" value="Submit Form" class="btn btn-primary">Add Billing</button>
        <a class="btn btn-danger" href="Admin-member-tbl.php" role="button">Cancel</a>


    </form>

</body>

</html>