<?php

session_start();

include_once("connect.php");
$con = connect();
$id = $_GET['id'];

echo $id;

// $dd = $_SESSION['dd'];

// echo $dd;
$name = $_SESSION['name'];

// $sql2 = "SELECT * FROM customer_receipt";
// $customer = $con->query($sql2) or die($con->error);
// $row2 = $customer->fetch_assoc();

// $previous = $_POST['previous'];
// $meterCon = $_POST['meterCon'];
// $present = $_POST['meterCon'] + $_POST['previous'];

// $amountDue = $meterCon * 17;

$sql2 = "SELECT * FROM customer_billing WHERE id = '$id'";
$customer = $con->query($sql2) or die($con->error);
$row2 = $customer->fetch_assoc();

if (isset($_POST['submit'])) {

    $receipt_id = $id;
    $amountDue = $row2['amountDue'];
    $paymentMethod = $_POST['paymentMethod'];
    $collectedBy =  $_SESSION['namesss'];

    $sql = "INSERT INTO `customer_receipt`(`receipt_id`, `name`, `amountDue`, `paymentMethod`, `collectedBy`) VALUES ('$receipt_id', '$name', '$amountDue', '$paymentMethod', '$collectedBy')";
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

        <label for="paymentMethod">Payment Method</label>
        <select name="paymentMethod" id="paymentMethod">
            <option value="Walk-in">Walk-in</option>
            <option value="GCash">GCash</option>
        </select>

        <br>
        <button type="submit" name="submit" value="Submit Form" class="btn btn-primary">Confirm Receipt</button>
        <a class="btn btn-warning" href="Admin-member-tbl.php" role="button">Cancel</a>


    </form>

</body>

</html>