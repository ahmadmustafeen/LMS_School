<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{


    if($_POST['subject'] && $_POST['class']){
       $student_class =  $_POST['class'];
       $subject_name=$_POST['subject'];
       $subject_name = strtolower($subject_name);
       
        switch($student_class){
            case "IXB":
                $student_class="ix";
                $section = "biology";
            break;
            case "IXC":
                $student_class="ix";
                $section = "computer";
            break;
            case "XB":
                $student_class="x";
                $section = "biology";
            break;
            case "XC":
                $student_class="x";
                $section = "computer";
            break;
            default:
            $section = "";
            
        }





       $chapter_info  = mysqli_query($con,"SELECT  distinct `student_chapter` FROM `lecture_details` WHERE student_class = '$student_class' and class_subject = '$subject_name'");
   

            

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
                <a href="./index.php">
                    <button type="submit">Back to Dashboard</button>
                </a>
                <marquee behavior="" direction="" style="width: 80%;">
                    <h2 style="color: white;">
                        Welcome to LMS of Sturdy's Inn
                    </h2>
                </marquee>

                <a href="../logout.php">
                    <button type="submit">Logout</button>
                </a>

            </div>
            <div class="bar">
                <div class="register">
                    <div class="register-inner">
                        <h2>
                            Select a Chapter (Show Attendance)
                        </h2>
                        <form action="chooselecture.php" method="POST"
                            style="overflow-y:scroll;overflow-x:hidden;width:90%">
                            <input type="text" name="subject" style="display:none" value="<?php echo $subject_name ?>">
                            <input type="text" name="section" style="display:none" value="<?php echo $section ?>">
                            <input type="text" name="class" style="display:none" value="<?php echo $student_class ?>">
                            <?php
                                $check = 2; 
                                while($row = mysqli_fetch_assoc($chapter_info) ){
                                    $student_chapter = $row['student_chapter'];
                                    $student_chapter = ucwords($student_chapter); 
                                    if($check == 2){
                                        $check = 0;
                                        ?>
                            <div class="row">
                                <?php
                                    }
                                    
                                        ?>
                                <div class="column" style="width:fit-content">

                                    <label class="container" style="color:white"><?php echo $student_chapter ?>
                                        <input type="radio" name="chapter" value="<?php echo $student_chapter ?>">
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