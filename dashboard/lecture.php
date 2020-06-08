<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_id = $_SESSION['User'];


    $student_info  = mysqli_query($con,"SELECT `student_name` ,`student_class` FROM `student_email` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($student_info)){

        $student_name= $row['student_name'];
        $student_class = $row['student_class'];
    }
    $subject_name=$_POST['subject'];
    $chapter_name=$_POST['chapter'];
    $subject_name = strtolower($subject_name);
    $lecture_info  = mysqli_query($con,"SELECT * FROM $subject_name WHERE  student_class= '$student_class' AND student_chapter = '$chapter_name'");
    
  
    

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
                        Welcome to LMS of Sturdy's Inn in <?php echo $subject_name,$chapter_name ?>
                    </h2>
                </marquee>

                <button type="submit">Edit Profile</button>
                <a href="../logout.php"><button> Logout</button></a>
            </div>
            <div class="bar">
                <div class="mainbarleft">
                    <h2>
                        Choose a Subject
                    </h2>
                    <div class="subjectsection">
                        <form action="lecturevideo.php" method="POST">
                        <input type="text" name="subject" style="display:none" value="<?php echo $subject_name ?>">
                        
                        <input type="text" name="chapter" style="display:none" value="<?php echo $chapter_name ?>">
                            <?php
                                $check = 2; 
                                while($row = mysqli_fetch_assoc($lecture_info) ){
                                    $lecture_name = $row['student_lecture'];
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
                    <div class="announcment">
                        <h2>Announcment</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis placeat voluptate
                            asperiores veritatis accusantium reiciendis nihil enim voluptatibus quaerat delectus?
                        </p>
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
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>