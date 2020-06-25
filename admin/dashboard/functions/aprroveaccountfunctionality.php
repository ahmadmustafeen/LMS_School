<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{   
  
    if(isset($_POST['submit'])){
        $student_id = $_POST['subject'];
        $student_names  = mysqli_query($con,"SELECT `student_password`, `student_name`, `student_section`, `student_class`, `student_father`, `student_mobile`, `student_email` FROM `waitlist` WHERE student_id ='$student_id' ");
        while($row = mysqli_fetch_assoc($student_names) ){
            $student_password = $row['student_password'];
            $student_name = $row['student_name'];
            $student_class = $row['student_class'];
            $student_father = $row['student_father'];
            $student_mobile = $row['student_mobile'];
            $student_email = $row['student_email'];
            $student_section = "";
            $student_class = strtolower($student_class);
            if($student_class == "ix" || $student_class == "x"){
                $student_section = $row['student_section'];
            }
        }

        $student_class = "class_".$student_class."_students".$student_section;

        
        $student_login = "INSERT INTO `students_login`(`student_id`, `student_password`) VALUES ('$student_id','$student_password')";
        
        $student_accounts = "INSERT INTO `student_account`(`student_id`, `student_status`) VALUES ('$student_id','unpaid')";
        
        $student_details = "INSERT INTO `$student_class`(`student_id`, `student_name`, `student_father`, `student_email`, `student_mobile`, `student_status`)
        VALUES ('$student_id','$student_name','$student_father','$student_email','$student_mobile','unpaid')";



        $approved = "UPDATE `waitlist` SET `student_account_status`='approved' WHERE student_id = '$student_id'";
        if($con->query($student_login) &&  $con->query($student_details) && $con->query($approved) &&  $con->query($student_accounts)){
            header("location:../approveaccounts.php");
        }
    }
    if(isset($_POST['delete'])){
        $student_id = $_POST['subject'];
        $student_names  = mysqli_query($con,"SELECT `student_password` FROM `waitlist` WHERE student_id ='$student_id' ");
        while($row = mysqli_fetch_assoc($student_names) ){
            $student_password = $row['student_password'];
        }
        $student_login = "INSERT INTO `students_login`(`student_id`, `student_password`) VALUES ('$student_id','$student_password')";
        $rejected = "UPDATE `waitlist` SET `student_account_status`='reject' WHERE student_id = '$student_id'";
        if($con->query($rejected) && $con->query($student_login) ){
            header("location:../approveaccounts.php");
        }
    }
}