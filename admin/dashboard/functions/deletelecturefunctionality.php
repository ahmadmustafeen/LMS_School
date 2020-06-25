<?php

require_once('../connection.php');
if($_POST['subject']){
    $student_class = $_POST['student_class'];
    $student_subject = $_POST['subject'];
    $student_chapter = $_POST['chapter'];
    $student_lecture = $_POST['lecture'];

    $student_subject = strtolower($student_subject);
    $i = 0;
    $get_id =  mysqli_query($con,"SELECT `lecture_id` FROM `lecture_details` WHERE student_class = '$student_class'  and class_subject = '$student_subject' and student_chapter ='$student_chapter' and subject_lecture= '$student_lecture'");
    
    while($row = mysqli_fetch_assoc($get_id) ){
        $lecture_id = $row['lecture_id'];
        echo $lecture_id;
        $i = 1;
    
}






if($i == 1){
    $basic = "DELETE FROM `lecture_details` WHERE  lecture_id = '$lecture_id'";
$second = "DELETE FROM `lecture_attendance` WHERE lecture_id = '$lecture_id'";
    $con -> query($basic);
    $con -> query($second);
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
                            Error in Deleting.

                        </h2>
                        <h4 style="color:white;text-align:center;padding:20px">
                            Following Lecture is not a valid one.. if it exists, kindly recheck your spelling. <br>
                            <?php echo "$student_lecture in class $student_class of subject $student_subject"  ?>
                        </h4>
                        <a href="../index.php">
                    <button type="submit">Back</button>
                </a>
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
?>