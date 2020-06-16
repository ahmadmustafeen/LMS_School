<?php

require_once('../connection.php');
if(isset($_POST['Login'])){
    $news = $_POST['news'];
    date_default_timezone_set("Asia/Karachi");
    $date =  date("Y-m-d");
$basic = "INSERT INTO `news` (`news`,`date`) 
VALUES ('$news','$date')";
if($con->query($basic)){
    header("location:../index.php");
}
else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="main">
        <div class="videobar">
            <div class="topbar">

                <marquee behavior="" direction="" style="width: 60%;">
                    <h2 style="color: white;">
                        Welcome to LMS of Sturdy's Inn
                    </h2>
                </marquee>

                <button type="submit">Edit Profile</button>
                <a href="../logout.php">
                    <button type="submit">Logout</button>
                </a>

            </div>
            <div class="bar">
                <div class="register">
                    <div class="register-inner">
                        <h2>
                            Error in Adding the news.
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
}
else{
    header("location:./index.php");
}
?>