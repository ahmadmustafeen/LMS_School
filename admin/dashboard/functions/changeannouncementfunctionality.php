<?php

require_once('../connection.php');
session_start();
if(isset($_SESSION['User'])){
    $subject = $_POST['subject'];
    $class = $_POST['class'];
    date_default_timezone_set("Asia/Karachi");
    $date =  date("Y-m-d");
$basic = "UPDATE `announcement` SET`announcement`='$subject',`date`='$date' WHERE class = '$class'";
if($con->query($basic)){
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<div class="main">
    <div class="videobar">
        <div class="topbar">
            <a href="../index.php">
                <button type="submit">Back to Dashboard</button>
            </a>
            <marquee behavior="" direction="" style="width: 80%;">
                <h2 style="color: white;">
                    Welcome to LMS of Sturdy's Inn
                </h2>
            </marquee>

            <a href="../../logout.php">
                <button type="submit">Logout</button>
            </a>

        </div>
        <div class="bar">
            <div class="register">
                <div class="register-inner">
                    <h2>
                        Successfully Updated.
                    </h2>

                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
<?php
}
else{
header("location:../index.php");
}
}