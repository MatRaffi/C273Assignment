<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include("dbFunctions.php");
$error_msg = "";
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM patient WHERE username = '$username' AND password = sha1 ('$password')";
$result = mysqli_query($link, $query) or die (mysqli_errno($link));
$row = mysqli_fetch_array($result);

$message = "";
if(!empty($row)){
    header("location:exercise.php");
} else {
    $message .= "The username or password that you have entered is incorrect. <br> <a href='login.html'>Back to Login</a>";
    echo '<br>';    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>      
    </head>
    <body>
        <?php
        echo $message;
        ?>
    </body>
</html>