<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{


    if($_POST['chapter']){
       $class =  $_POST['class'];
       $subject=$_POST['subject'];
       $chapter=$_POST['chapter'];
       $subject = strtolower($subject);
       $lecture_info  = mysqli_query($con,"SELECT  `subject_lecture` FROM `lecture_details` WHERE student_class = '$class' and class_subject = '$subject'and student_chapter = '$chapter'");
   

            

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
                            Admin Portal(View Lecture Details)
                        </h2>
                        <form action="showattendance.php" method="POST" style="overflow-y:scroll;overflow-x:hidden;width:90%">
                        <input type="text" name="subject" style="display:none" value="<?php echo $subject ?>">
                        <input type="text" name="class" style="display:none" value="<?php echo $class ?>">
                            <?php
                                $check = 2; 
                                while($row = mysqli_fetch_assoc($lecture_info) ){
                                    $subject_lecture = $row['subject_lecture'];
                                    $subject_lecture = ucwords($subject_lecture); 
                                    if($check == 2){
                                        $check = 0;
                                        ?>
                            <div class="row">
                                <?php
                                    }
                                    
                                        ?>
                                <div class="column">

                                    <label class="container" style="color:white"><?php echo $subject_lecture ?>
                                        <input type="radio" name="lecture" value="<?php echo $subject_lecture ?>">
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
                   </div>



                    </form>

                </div>
            </div>

        </div>


    </div>



</body>

</html>
<?php
    }
else{
    
    header("location:./viewlectureattendance.php ? enter info to access");
}
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>