<?php 
require_once('connection.php');


    if(isset($_POST['Login']))
    {
      $student_info  = mysqli_query($con,"SELECT `student_id`  FROM `student_email` WHERE 1");
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
$father_name= $_POST['father_name'];
$student_mobile = $_POST['student_mobile'];



$basic = "INSERT INTO `student_email`
(`student_id`, `student_password`, `student_name`, `student_class`, `student_fathername`, `student_mobile`) VALUES
 ('$student_id','$student_password','$student_name','$student_class','$father_name','$student_mobile')";
if($con->query($basic)){
    header("location:./login.php");
break;
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
      }
      
    
  