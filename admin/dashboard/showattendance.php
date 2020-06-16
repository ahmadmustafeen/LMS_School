<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $lecture_name= $_POST['lecture'];
    $class= $_POST['class'];
      $subject= $_POST['subject'];
    $lecture_info  = mysqli_query($con,"SELECT `lecture_id` FROM `lecture_details` WHERE subject_lecture = '$lecture_name' and class_subject = '$subject' and student_class = '$class' ");
    while($row = mysqli_fetch_assoc($lecture_info) ){
        $lecture_id = $row['lecture_id'];

    }
    
         
          
           

   

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
                <div class="register" style="display:flex;flex-direction:row ;justify-content:space-evenly">
                    <div class="register-inner" style="width:45%">
                        <h2>
                            Students (Watched)
                        </h2>
                        <div style="width:80%;height:80%;overflow-y:scroll;overflow-x:hidden">
                            <?php
                               for($i=1;$i<61;$i++){
                                $a = 'a'.(string)$i;
                         $j = mysqli_query($con,"SELECT * FROM `lecture_attendance` WHERE lecture_id = '$lecture_id'");
                         while($row = mysqli_fetch_assoc($j) ){
                             $aa =  $row["$a"];
                            if($aa == 'seen'){
                                 $w = explode("a",$a);
                                 $q = $w[1];
                                 $q = (int)$q;
                                //  echo $q,$class;
                                 $lecture_info  = mysqli_query($con,"SELECT `student_id`, `student_name`, `student_section` FROM `student_details` WHERE student_class = '$class' and student_roll_number= $q");
                                    while($row = mysqli_fetch_assoc($lecture_info) ){
                            $student_id = $row['student_id'];
                            $student_name = $row['student_name'];
                            $student_section = $row['student_section'];
                        ?>
                            <p style="width:100%;height:30px;color:white;padding-top:20px">
                            <?php echo "Name: $student_name ID no: $student_id section: $student_section";?>
                            </p>
                            <?php
                        } 
                    }
                             }
                         }
                   
                                              ?>

                        </div>


                    </div>
                    <div class="register-inner">
                        <h2>
                        Students (Remaining)
                        </h2>
                        <div style="width:80%;height:80%;overflow-y:scroll;overflow-x:hidden">
                            <?php
                               for($i=1;$i<61;$i++){
                                $a = 'a'.(string)$i;
                         $j = mysqli_query($con,"SELECT * FROM `lecture_attendance` WHERE lecture_id = '$lecture_id'");
                         while($row = mysqli_fetch_assoc($j) ){
                             $aa =  $row["$a"];
                            if($aa == 'no'){
                                 $w = explode("a",$a);
                                 $q = $w[1];
                                 $q = (int)$q;
                                //  echo $q,$class;
                                 $lecture_info  = mysqli_query($con,"SELECT `student_id`, `student_name`, `student_section` FROM `student_details` WHERE student_class = '$class' and student_roll_number= $q");
                                    while($row = mysqli_fetch_assoc($lecture_info) ){
                            $student_id = $row['student_id'];
                            $student_name = $row['student_name'];
                            $student_section = $row['student_section'];
                        ?>
                            <p style="width:100%;height:30px;color:white;padding-top:20px;font-size:24px">
                            <?php echo " Name: $student_name ";?>
                            </p>
                            <?php
                        }
                    }
                             }
                         }
                   
                                              ?>

                        </div>


                    </div>




                </div>

            </div>


        </div>


    </div>



</body>

</html>
<?php
    
// else{
    
//     header("location:./viewlectureattendance.php ? enter info to access");
// }

}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>