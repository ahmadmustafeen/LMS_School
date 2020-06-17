<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_id = $_SESSION['User'];


    $student_info  = mysqli_query($con,"SELECT `student_name` ,`student_class`,`student_roll_number` FROM `student_details` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($student_info)){
        $student_name= $row['student_name'];
        $student_class = $row['student_class'];
        $student_roll_number = $row['student_roll_number'];
    }
    $subject_name=$_POST['subject'];
    $chapter_name=$_POST['chapter'];
    $chapter_name = strtolower($chapter_name);
    $subject_name = strtolower($subject_name);
    $lecture_info  = mysqli_query($con,"SELECT `subject_lecture` FROM `lecture_details` WHERE student_class= '$student_class' AND class_subject = '$subject_name'AND student_chapter = '$chapter_name'");
    
    $checkexistence = mysqli_query($con,"SELECT * FROM `test_marks` WHERE
     student_class = '$student_class' and class_subject = '$subject_name' and subject_chapter = '$chapter_name'");
    $student_roll_number = "mark".$student_roll_number;
    // echo $student_roll_number,$subject_name,$student_class,$chapter_name;
    $roll_number_marks_query = mysqli_query($con,"SELECT `$student_roll_number` FROM `test_marks` WHERE student_class = '$student_class' and class_subject = '$subject_name' and subject_chapter = '$chapter_name'");
    $student_roll_number_marks1 = null;
    while($row = mysqli_fetch_assoc($roll_number_marks_query) ){  
        $student_roll_number_marks1 = $row["$student_roll_number"];
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <div class="mainside">
            <div class="mainsidelogo">
                <img src="../assets/images/logo.png" alt="">
            </div>
            <div class="mainsideprofile">
                <div class="mainsideprofileimg">
                    <img src="../assets/images/profile.jpg" alt="">
                </div>
                <h2>
                    <?php echo $student_id ?>
                </h2>

                <h2>
                    <?php echo $student_name ?>
                </h2>

                <h2>
                    <?php echo $student_class ?>
                </h2>

            </div>
        </div>
        <div class="mainbar">
            <div class="topbar">

                <marquee behavior="" direction="" style="width: 60%;">
                    <h2 style="color: white;">
                        Welcome to LMS of Sturdy's Inn
                    </h2>
                </marquee>

                <button type="submit">Edit Profile</button>
                <a href="../logout.php"><button> Logout</button></a>
            </div>
            <div class="bar">
                <div class="mainbarleft">
                    <h2>
                        Choose a Lecture
                    </h2>
                    <div class="subjectsection">
                        <form action="lecturevideo.php" method="POST">
                            <input type="text" name="subject" style="display:none" value="<?php echo $subject_name ?>">

                            <input type="text" name="chapter" style="display:none" value="<?php echo $chapter_name ?>">
                            <?php
                                $check = 2; 
                                while($row = mysqli_fetch_assoc($lecture_info) ){
                                    $lecture_name = $row['subject_lecture'];
                                    if($check == 2){
                                        $check = 0;
                                        ?>
                            <div class="row">
                                <?php
                                    }
                                    
                                        ?>
                                <div class="column">

                                    <label class="container"><?php echo $lecture_name ?>
                                        <input type="radio" name="lecture" value="<?php echo $lecture_name ?>">
                                        <span class="checkmark"></span>
                                    </label>


                                    <?php 
                                    $check = $check +1;
                                    ?>

                                </div>
                                <?php
                                    if($check == 2){
                                        ?>
                            </div>
                            <?php
                                    }
                                }
                                if($check < 2){
                                    ?>
                    </div>

                    <?php 
                            }
                             ?>



                </div>
                <button type="submit" class="submit">submit</button>
                </form>
                <div class="announcmentsection">
                    <div class="announcment"
                        style="display:flex;flex-direction:column; width:100%; align-items:center;">
                        <h2 style="padding-bottom:20px">Attempt Test (One try)</h2>
                        <?php 
                         if(mysqli_fetch_assoc($checkexistence) && is_null($student_roll_number_marks1)){
                          ?>
                          <form action="test.php" method="POST">
                              <input type="text" name="class" style="display:none" value = "<?php echo $student_class ?>">
                              
                              <input type="text" name="subject" style="display:none" value = "<?php echo $subject_name ?>">
                              
                              <input type="text" name="chapter" style="display:none" value = "<?php echo $chapter_name ?>">
                              
                              <input type="text" name="rollNumber" style="display:none" value = "<?php echo $student_roll_number_marks1 ?>">

                          <button type="submit" class="submit">Attempt</button>
                          </form>
                        <?php
                        }
                        else if(!is_null($student_roll_number_marks1)){
                            ?>
                         
                         <form action="testmarks.php" method="POST">
                              <input type="text" name="class" style="display:none" value = "<?php echo $student_class ?>">
                              
                              <input type="text" name="subject" style="display:none" value = "<?php echo $subject_name ?>">
                              
                              <input type="text" name="chapter" style="display:none" value = "<?php echo $chapter_name ?>">
                              
                           

                          <button type="submit" class="submit">Already Taken</button>
                          </form>
                        <?php
                        }
                        else if(!mysqli_fetch_assoc($checkexistence) && is_null($student_roll_number_marks1)){   ?>
                            <a href="#">
                           <button type="submit" class="submit">Kindly Wait </button>
                           </a>
                           <?php
                            
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="mainbarright">
                <div class="news">
                    <h2>Latest News</h2>
                    <div class="newsfeed">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis placeat voluptate
                            asperiores veritatis accusantium reiciendis nihil enim voluptatibus quaerat delectus?
                        </p>
                        <h4>02-April-2020</h4>
                        <hr>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis placeat voluptate
                            asperiores veritatis accusantium reiciendis nihil enim voluptatibus quaerat delectus?
                        </p>
                        <h4>02-April-2020</h4>
                        <hr>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>


</body>

</html>
<style>

</style>
<?php

}
else{
header("location:./index.php");
}
?>