<?php
session_start();
include("dbFunctions.php");
$error_msg = "";
$exerciseType = $_POST['type'];
$duration = $_POST['duration'];
$query = "INSERT INTO exercise(type_exercise, duration_minutes) 
          VALUES 
          ('$exerciseType','$duration')";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
$message = "";
if ($result) {    
    $message .= "Record successfully!";
} else {
    $message .= "Failed to record!";
}


?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.min.css"> 
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.min.js" type="text/javascript"></script>      
        <script src="js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/additional-methods.min.js" type="text/javascript"></script>           
        <link rel="stylesheet" href="css/all.min.css">              
        <script>
            $(document).ready(function () {

                $("#slider").slider({
                    value: 0,
                    min: 5,
                    max: 120,
                    step: 1,
                    slide: function (event, ui) {
                        $("#num").val(ui.value);
                    }
                });
                $("#num").val($("#slider").slider("value"));
            });

        </script>
    </head>
    <body>
        <?php
        echo $message;
        include("navbar.php");
        ?>

        <form action="doExercise.php" method="post">
            <div class="container">
                <h1 class="display-4">Please field up the form</h1>

                <hr>

                <label for="type">Type of Exercise:</label>
                <select name="type" id="type">
                    <option value="Walk">Walk</option>
                    <option value="Run">Run</option>
                    <option value="Cycle">Cycle</option>
                </select>

                <br><br>

                <label for="slider"> Exercise duration:<input type="text" id="num" name="duration" readonly style="border:0; color:#FF0000; font-weight:bold; text-align:right;" size="1"> minutes</label>
                <div id="slider"></div>

                <br>

                <div>          
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </body>
</html>
