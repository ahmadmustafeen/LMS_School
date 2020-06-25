<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{


    if($_POST['admin_author']){
        $student_class_get = '';
       $student_class =  $_POST['admin_author'];
       switch($student_class){
            case 'IXB':
                $student_class_get = 'class_ix_studentsbiology';
            break;
            case 'IXC':
                $student_class_get = 'class_ix_studentscomputer';
            break;
            case 'XB':
                $student_class_get = 'class_x_studentsbiology';
            break;
            case 'XC':
                $student_class_get = 'class_x_studentscomputer';
            break;
            default:
            $student_class_get = strtolower($student_class);
            $student_class_get = "class_".$student_class_get."_students";
       }
    //    echo"$student_class_get";
        $subject_info  = mysqli_query($con,"SELECT `subjects` FROM `class_details`  WHERE class = '$student_class_get' "); 

            

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
                            Select a Subject (View Attendance)
                        </h2>
                        <form action="choosechapter.php" method="POST"
                            style="overflow-y:scroll;overflow-x:hidden;width:90%">
                            <input type="text" name="class" style="display:none" value="<?php echo $student_class ?>">
                            <?php
                                $check = 2; 
                                while($row = mysqli_fetch_assoc($subject_info) ){
                                    $class_subject = $row['subjects'];
                                    $class_subject = ucwords($class_subject); 
                                    if($check == 2){
                                        $check = 0;
                                        ?>
                            <div class="row">
                                <?php
                                    }
                                    
                                        ?>
                                <div class="column">

                                    <label class="container" style="color:white"><?php echo $class_subject ?>
                                        <input type="radio" name="subject" value="<?php echo $class_subject ?>">
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