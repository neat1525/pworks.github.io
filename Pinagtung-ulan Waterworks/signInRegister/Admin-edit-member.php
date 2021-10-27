<?php

include_once("connect.php");
$con = connect();
$id = $_GET['id'];



$sql = "SELECT * FROM customer_user WHERE id = '$id'";
$customer_user = $con->query($sql) or die($con->error);
$row = $customer_user->fetch_assoc();

if (isset($_POST['submit'])) {

    $fName =  $_POST['fName'];
    $lName = $_POST['lName'];
    $sitio = $_POST['sitio'];
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

    $sql = "UPDATE customer_user SET firstName = '$fName', lastName = '$lName', sitio = '$sitio', spouse = '$spouse', 
    civilStat = '$civilStat', gender = '$gender', birthPlace = '$birthPlace', birthDate = '$birthDate', age = '$age', 
    contactNum = '$contactNum', highEd = '$highEd', houseMem = '$houseMem', waterSor = '$waterSor', password = '$password' WHERE id = '$id'";
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

        <label for="fName">First Name</label>
        <input name="fName" type="text" id="fName" value="<?php echo $row['firstName']; ?>">
        <label for="lName">Last Name</label>
        <input name="lName" type="text" id="lName" value="<?php echo $row['lastName']; ?>">

        <label for="sitio">Sitio</label>
        <select name="sitio" id="sitio">
            <option value="Sentro" <?php echo ($row['sitio'] == "Sentro") ? 'selected' : ''; ?>>Sentro</option>
            <option value="Kanluran" <?php echo ($row['sitio'] == "Kanluran") ? 'selected' : ''; ?>>Kanluran</option>
            <option value="Silangan" <?php echo ($row['sitio'] == "Silangan") ? 'selected' : ''; ?>>Silangan</option>
            <option value="Pook" <?php echo ($row['sitio'] == "Pook") ? 'selected' : ''; ?>>Pook</option>
        </select>

        <label for="spouse">Spouse</label>
        <input name="spouse" type="text" id="spouse" value="<?php echo $row['spouse']; ?>">

        <label for=" civilStat">Civil Status</label>
        <select name="civilStat" id="civilStat">
            <option value="Single" <?php echo ($row['civilStat'] == "Single") ? 'selected' : ''; ?>>Single</option>
            <option value="Married" <?php echo ($row['civilStat'] == "Married") ? 'selected' : ''; ?>>Married</option>
        </select>

        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == "Female") ? 'selected' : ''; ?>>Female</option>
        </select>

        <label for="birthPlace">Birth Place</label>
        <input name="birthPlace" type="text" id="birthPlace" value="<?php echo $row['birthPlace']; ?>">

        <label for="birthDate">Birth Date</label>
        <input name="birthDate" type="date" id="birthDate" value="<?php echo $row['birthDate']; ?>">

        <label for="contactNum">Contact Number</label>
        <input name="contactNum" type="number" id="contactNum" value="<?php echo $row['contactNum']; ?>">

        <label for="highEd">Educational Attainment</label>
        <select name="highEd" id="highEd">
            <option value="Elementary" <?php echo ($row['highEd'] == "Elementary") ? 'selected' : ''; ?>>Elementary</option>
            <option value="High School" <?php echo ($row['highEd'] == "High School") ? 'selected' : ''; ?>>High School</option>
            <option value="Senior High School" <?php echo ($row['highEd'] == "Senior High School") ? 'selected' : ''; ?>>Senior High School</option>
            <option value="College" <?php echo ($row['highEd'] == "College") ? 'selected' : ''; ?>>College</option>
        </select>

        <label for="houseMem">House Member(s)</label>
        <select name="houseMem" id="houseMem">
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

        <label for="waterSor">Water Source</label>
        <select name="waterSor" id="waterSor">
            <option value="Artesian Well" <?php echo ($row['waterSor'] == "Artesian Well") ? 'selected' : ''; ?>>Artesian Well</option>
            <option value="Hand Pump" <?php echo ($row['waterSor'] == "Hand Pump") ? 'selected' : ''; ?>>Hand Pump</option>
            <option value="Dug Well" <?php echo ($row['waterSor'] == "Dug Well") ? 'selected' : ''; ?>>Dug Well</option>
            <option value="Spring" <?php echo ($row['waterSor'] == "Spring") ? 'selected' : ''; ?>>Spring</option>
        </select>

        <label for="password">Password</label>
        <input name="password" type="text" id="password" value="<?php echo $row['password']; ?>">

        <button type="submit" name="submit" value="Update Form" class="btn btn-primary">Submit</button>

    </form>

</body>

</html>