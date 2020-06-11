<?php

require_once('../connection.php');
if($_POST['subject']){
    $student_class = $_POST['student_class'];
    $student_subject = $_POST['subject'];
$student_chapter = $_POST['chapter'];
$student_lecture = $_POST['lecture'];
$lecture_videolink = $_POST['lecture_video'];

$student_subject = strtolower($student_subject);

$basic = "INSERT INTO $student_subject (`student_class`,`student_chapter`, `student_lecture`, `student_videolink`) 
VALUES ('$student_class','$student_chapter','$student_lecture','$lecture_videolink')";
if($con->query($basic)){
    header("location:./index.php");
}
else{
    $sql = "CREATE TABLE $student_subject(
        student_class VARCHAR(255)  ,
        student_chapter VARCHAR(255) ,
        student_lecture VARCHAR(255) ,
        student_videolink VARCHAR(255)
        )";
        if($con->query($sql)){
            if($con->query($basic)){
                header("location:./index.php");
            }
        } 
}
}
?>