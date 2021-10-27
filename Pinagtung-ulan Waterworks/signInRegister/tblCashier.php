<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("connect.php");

$con = connect();


$sql = "SELECT * FROM employee_user WHERE access LIKE 'Cashier'";
$employee = $con->query($sql) or die($con->error);
$row = $employee->fetch_assoc();

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
            border-bottom: 2px solid rgba(96, 169, 255, 1);
        }
    </style>

    <div class="container-fluid">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th id="boderBot" scope="col">First Name</th>
                    <th id="boderBot" scope="col">Last Name</th>
                    <th id="boderBot" scope="col">Gender</th>
                    <th id="boderBot" scope="col">Birth Date</th>
                    <th id="boderBot" scope="col">Age</th>
                    <th id="boderBot" scope="col">Access Type</th>
                    <th id="boderBot" scope="col">Date Created</th>
                    <th id="boderBot" scope="col">Functions</th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td> <?php echo $row['firstName']; ?> </td>
                        <td> <?php echo $row['lastName']; ?> </td>
                        <td> <?php echo $row['gender']; ?> </td>
                        <td> <?php echo $row['birthDate']; ?> </td>
                        <td> <?php echo $row['age']; ?> </td>
                        <td> <?php echo $row['access']; ?> </td>
                        <td> <?php echo $row['addedAt']; ?> </td>
                        <td>
                            <form action="delete.php" method="post">
                                <a class="btn btn-primary" href="Admin-edit-employee.php?id=<?php echo $row['id']; ?>" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg></a>
                                <button type="submit" name="delete" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                                    </svg></button>
                                <input class="d-none" type="text" name="id" value="<?php echo $row['id']; ?>">
                            </form>
                        </td>
                    </tr>
                    </tr>
                <?php } while ($row = $employee->fetch_assoc()); ?>
            </tbody>
        </table>

    </div>

</body>

</html>