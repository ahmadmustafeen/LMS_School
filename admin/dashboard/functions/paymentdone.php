<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{   
    $newsWeb  = mysqli_query($con,"SELECT * FROM `news` WHERE 1");
    while($row = mysqli_fetch_assoc($newsWeb) ){
    $news = $row['news'];
    echo $_POST[$news];
        ?>
    <?php
    }
}
    else
    {
    echo "ga";
        header("location:../login.php ? enter info to access");
    }
    ?>