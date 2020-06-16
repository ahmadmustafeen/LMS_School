<?php

require_once('../connection.php');
$v =0;
$newsWeb  = mysqli_query($con,"SELECT * FROM `news` WHERE 1");
if(isset($_POST['Login'])){
    $student_subject = $_POST['subject'];
    while($row = mysqli_fetch_assoc($newsWeb) ){
        $news = $row['news'];
        // echo $news;
        if($news == $student_subject){
            $v = 1;
        }
    }
    $delete = " DELETE FROM `news` WHERE news = '$student_subject'";
    if($v == 1){
        if($con -> query($delete)){
          	header('location:../index.php');
        }
        else{
            echo "sorry1";
        }
    }
    else{
        echo"sorry";
    }
}
?>