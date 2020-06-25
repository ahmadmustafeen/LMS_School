<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    if(isset($_POST['submit'])){
        $student_id = $_POST['subject'];
        $aa = "UPDATE `student_account` SET `student_status`='paid' WHERE  student_id = '$student_id'";
        if($con -> query($aa)){
           header('location:./index.php');
        }
    }
?>


    <?php
}

else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>