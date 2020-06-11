<?php

require_once('../connection.php');
if($_POST['subject']){
    $student_class = $_POST['student_class'];
    $student_subject = $_POST['subject'];
    $student_chapter = $_POST['chapter'];
    $student_lecture = $_POST['lecture'];

    $student_subject = strtolower($student_subject);
    $i = 0;
$basic = "DELETE FROM $student_subject WHERE student_class = '$student_class' and student_chapter = '$student_chapter' and student_lecture = '$student_lecture' ";
$check =  mysqli_query($con,"SELECT * FROM $student_subject WHERE student_class = '$student_class'");
while($row = mysqli_fetch_assoc($check) ){
    $student_lecture_check = $row['student_lecture'];
    if ($student_lecture == $student_lecture_check){
         
            $i = 1;
    }
    
}
}
if($i == 1){
    $con -> query($basic);
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
                            Error in Deleting.
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
?>