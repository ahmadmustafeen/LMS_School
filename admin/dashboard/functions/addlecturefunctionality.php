<?php

require_once('../connection.php');
if($_POST['subject']){
    $student_class = $_POST['student_class'];
    $student_subject = $_POST['subject'];
    $student_chapter = $_POST['chapter'];
    $student_chapter = strtolower($student_chapter);
$student_lecture = $_POST['lecture'];
$Must = $_POST['Must'];
$Must = (int)$Must;
$lecture_videolink = $_POST['lecture_video'];
$lecture_id = mt_rand(1,4444);
$student_subject = strtolower($student_subject);

function randoms($number){
    $lecute_id_check  = mysqli_query($con,"SELECT `lecture_id` FROM `lecture_details` WHERE lecture_id = '$number'");
        if($lecute_id_check){
            while($row = mysqli_fetch_assoc($lecute_id_check)){
                $lecture_id = mt_rand(1,4444);
                randoms($number);
            }
        }   
    }
    randoms($lecture_id);

    $second = "INSERT INTO `lecture_attendance`(`lecture_id`) VALUES ('$lecture_id')";

$basic = "INSERT INTO `lecture_details`(`student_class`, `class_subject`, `student_chapter`, `subject_lecture`, `lecture_video`, `lecture_id`,`time`)
 VALUES ('$student_class','$student_subject','$student_chapter','$student_lecture','$lecture_videolink','$lecture_id','$Must')";
if($con->query($basic) && $con->query($second)){
    header("location:../index.php");
}
else{
    echo "Sorry";
}
}
?>