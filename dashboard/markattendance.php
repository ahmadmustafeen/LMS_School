<?php
require_once("../connection.php");
if(isset($_POST['marks'])){
    $lecture_id= $_POST['lecture_id'];
    $student_id= $_POST['student_id'];
    $class = $_POST['class'];
    // echo $class;
    $student_info  = mysqli_query($con,"SELECT `student_roll_number` FROM `$class` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($student_info)){
        $student_roll_number = $row['student_roll_number'];
    }
    $student_roll_number = "a".$student_roll_number;
    $ap = "UPDATE `lecture_attendance` SET `$student_roll_number` = 'seen' WHERE lecture_id = '$lecture_id' and class = '$class'";
    if($con -> query($ap)){
        header("location:./index.php");
        
    }
    else{
        echo"sorry";
    }
}

?>