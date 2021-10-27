<?php

include_once("connect.php");
$con = connect();
$id = $_GET['id'];

echo $id;


$sql = "SELECT * FROM employee_user WHERE id = '$id'";
$student = $con->query($sql) or die($con->error);
$row = $student->fetch_assoc();

if (isset($_POST['submit'])) {

    $email =  $_POST['email'];
    $password = $_POST['password'];
    $access = $_POST['access'];

    // $sql = "UPDATE `student_list` SET `firstName`='[$fName]',`lastName`='[$lName]',`gender`='[$gender]' WHERE id = '$id";

    $sql = "UPDATE employee_user SET email = '$email', password = '$password', access = '$access' WHERE id = '$id'";
    $con->query($sql) or die($con->error);

    if ($access == "Secretary") {
        echo header("Location: tblSecretary.php?id=");
    } else if ($access == "Treasurer") {
        echo header("Location: tblTreasurer.php?id=");
    } else if ($access == "Cashier") {
        echo header("Location: tblCashier.php?id=");
    }
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

        <label for="email">Email</label>
        <input name="email" type="text" id="email" value="<?php echo $row['email']; ?>">

        <label for="password">Password</label>
        <input name="password" type="text" id="password" value="<?php echo $row['password']; ?>">

        <label for=" access">Access Type</label>
        <select name="access" id="access">
            <option value="Administrator" <?php echo ($row['access'] == "Administrator") ? 'selected' : ''; ?>>Administrator</option>
            <option value="Secretary" <?php echo ($row['access'] == "Secretary") ? 'selected' : ''; ?>>Secretary</option>
            <option value="Treasurer" <?php echo ($row['access'] == "Treasurer") ? 'selected' : ''; ?>>Treasurer</option>
            <option value="Cashier" <?php echo ($row['access'] == "Cashier") ? 'selected' : ''; ?>>Cashier</option>
            <option value="Archive" <?php echo ($row['access'] == "Archive") ? 'selected' : ''; ?>>Archive</option>
        </select>

        <button type="submit" name="submit" value="Update Form" class="btn btn-primary">Submit</button>


    </form>

</body>

</html>