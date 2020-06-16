<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{   
    if(isset($_POST['submit'])){
        $student_id = $_POST['subject'];
        $thi = "UPDATE `student_account` SET`student_account_status`='approved' WHERE  student_id = '$student_id'";
        if($con->query($thi)){
            header("location:../approveaccounts.php");
        }
    }
    if(isset($_POST['delete'])){
        $student_id = $_POST['subject'];
        $thi = "UPDATE `student_account` SET`student_account_status`='reject' WHERE  student_id = '$student_id'";
        if($con->query($thi)){
            header("location:../approveaccounts.php");
        }
    }
}