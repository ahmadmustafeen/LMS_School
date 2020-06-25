<?php 
require_once('connection.php');


    if(isset($_POST['Login']))
    {
      $student_info  = mysqli_query($con,"SELECT `student_id` FROM `student_info` WHERE 1");
      while($row = mysqli_fetch_assoc($student_info)){
          $student_id= $row['student_id'];
          if($student_id == $_POST['UName']){          
            header("location:./error.php");
                }
                }
        $student_id = $_POST['UName'];
        $student_password = $_POST['password'];
        $student_name = $_POST['student_name'];
        $student_class = $_POST['student_class'];
        $student_section = $_POST['student_section'];
        $student_section = strtolower($student_section);
        $father_name= $_POST['father_name'];
        $student_mobile = $_POST['student_mobile'];
        $student_email = $_POST['student_email'];
        $student_acct_status = "pending";
        $student_status = "unpaid";
        $login = "INSERT INTO  `students_login`(`student_id`,`student_password`) Values ('$student_id','$student_password')";
        $gotowaitlist = "INSERT INTO  `waitlist`(`student_id`, `student_password`, `student_name`, `student_class`, `student_section`, `student_father`, `student_mobile`, `student_email`, `student_status`, `student_account_status`) VALUES
         ('$student_id','$student_password','$student_name','$student_class','$student_section','$father_name','$student_mobile','$student_email','unpaid','pending')";
//         $first = "INSERT INTO `student_info`(`student_id`, `student_password`) VALUES ('$student_id','$student_password')";
//         $second = "INSERT INTO `student_details`(`student_id`, `student_name`, `student_father`, `student_class`, `student_mobile`, `student_email`, `student_section`)
//         VALUES ('$student_id','$student_name','$father_name','$student_class','$student_mobile','$student_email','$student_section')";
//         $third = "INSERT INTO `student_account`(`student_id`, `student_account_status`, `student_status`) VALUES ('$student_id','$student_acct_status','$student_status'
//         )";
            if($con -> query($gotowaitlist) && $con -> query($login)){
               header("location:./login.php");
            }
            else{
                header("location:./error.php");
            }
//         if($con->query($first)&&$con->query($second)&&$con->query($third)){
//             $roll_num  = mysqli_query($con,"SELECT `student_roll_number` FROM `student_details` WHERE student_id = '$student_id'");
//             while($row = mysqli_fetch_assoc($roll_num)){
//                 $student_roll_number= $row['student_roll_number'];
                
//             }
//             $student_roll_number = "a".$student_roll_number;
//             $lecture_id_get  = mysqli_query($con,"SELECT `lecture_id` FROM `lecture_details` WHERE student_class = '$student_class'");
//             while($row = mysqli_fetch_assoc($lecture_id_get)){
//                 $lecture_id= $row['lecture_id'];
                
//                 $set_attendance  = "UPDATE `lecture_attendance` SET $student_roll_number ='no' where lecture_id = '$lecture_id'";
//                 if($con -> query($set_attendance)){
//                     header("location:./login.php");
//                 }
//  header("location:./login.php");
//             }
//  header("location:./login.php");
//             }

        }
        else{



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
header("location:./error.php");
?>
</body>

</html>
<?php
          
          
        }
      
      
    
  