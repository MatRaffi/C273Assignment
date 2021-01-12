<?php

include("dbFunctions.php");

$username = $_POST['username'];
$password = $_POST['psw'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$dob = $_POST['dob'];
$activelevel = $_POST['level'];

$query = "INSERT INTO patient(username, password, height, weight, dob, active_level) 
          VALUES 
          ('$username','$password','$height','$weight','$dob','$activelevel')";

$status = mysqli_query($link, $query) or die(mysqli_error($link));

if ($status) {
    $msg = "Account creation successful. Continue to <a href='login.html'>login</a>";
} else {
    $msg = "form insertion failed.<br/>";
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php echo $msg; ?>
    </body>
</html>