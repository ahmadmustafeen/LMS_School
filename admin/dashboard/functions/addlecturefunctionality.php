<?php

require_once('../connection.php');
if($_POST['subject']){
    //getting data from form
    $student_class = $_POST['student_class'];
    $student_subject = $_POST['subject'];
    $student_chapter = $_POST['chapter'];
    $student_lecture = $_POST['lecture'];
    $Must = $_POST['Must'];
    $lecture_videolink = $_POST['lecture_video'];
    

    //converting data to desired standard
    $student_chapter = strtolower($student_chapter);
    $Must = (int)$Must;
    $lecture_id = mt_rand(1,4444);
    $student_subject = strtolower($student_subject);
    $student_class = strtolower($student_class);


    //cheking if lecture id is already presenting (function)
    function randoms($number,$con){
        if(mysqli_query($con,"Select `lecture_id from `lecture_details` where lecture_id = '$number' ")){
            while($row = mysqli_fetch_assoc($lecute_id_check)){
                $lecture_id = mt_rand(1,4444);
                randoms($number);
            }
        }   
    }
    
    //cheking if lecture id is already presenting (working)
    randoms($lecture_id,$con);

    
    
    
    //creating queries...
    //entering data in lecture details...
    //it have student_class as "ix" or "x"
    $basic = "INSERT INTO `lecture_details`(`student_class`, `class_subject`, `student_chapter`, `subject_lecture`, `lecture_video`, `lecture_id`,`time`)
    VALUES ('$student_class','$student_subject','$student_chapter','$student_lecture','$lecture_videolink','$lecture_id','$Must')";



    //checking if the entered class is not ninth and matric
    if($student_class != 'ix' && $student_class != 'x'){
        
        
        //creating a name to be get name of the table of the class 
        $student_class = "class_".$student_class."_students";


        $second = "INSERT INTO `lecture_attendance`(`lecture_id`,`class`) VALUES ('$lecture_id','$student_class')";
        //running
        $con->query($second);
    }


    //if class is ninth or matric
    else{


        //checking to be not bio
        if($student_subject != 'biology'){

            //creating a name for the table of class with section computer
            $student_class_C = "class_".$student_class."_studentscomputer";
            //inserting into table
            $computerclass = "INSERT INTO `lecture_attendance`(`lecture_id`,`class`) VALUES ('$lecture_id','$student_class_C');";
            $con->query($computerclass);
        }
        //checking to be not computer
        if($student_subject != 'computer'){
        $student_class_B = "class_".$student_class."_studentsbiology";
        $bioclass = "INSERT INTO `lecture_attendance`(`lecture_id`,`class`) VALUES ('$lecture_id','$student_class_B');";
        echo "done2";
        $con -> query($bioclass);
        }
    }

    //inserting into lecture details must
    if($con->query($basic)){

        //checking is subject if not bio and class is where ninth or matric
        if($student_subject != 'biology' && ($student_class =="ix" || $student_class == "x")){


            //getting the roll number from the class of computer
            $student_roll  = mysqli_query($con,"SELECT `student_roll_number` FROM `$student_class_C` WHERE  1 ");
            while($row =  mysqli_fetch_assoc($student_roll) ){
                $student_roll_number = $row['student_roll_number'];
                $student_roll_number = "a".$student_roll_number;
                //marking every student as unseen in the lecture attendance
                $update = "UPDATE `lecture_attendance` SET `$student_roll_number` = 'unseen' WHERE lecture_id = '$lecture_id'  and class = '$student_class_C'";
                $con -> query($update);
                echo $student_class_C;
            }
        }


        //checking is subject if not computer and class is where ninth or matric
        if($student_subject != 'computer' && ($student_class =="ix" || $student_class == "x")){
       
            //getting the roll number from the class of biology
            $student_roll  = mysqli_query($con,"SELECT `student_roll_number` FROM `$student_class_B` WHERE  1 ");
            while($row =  mysqli_fetch_assoc($student_roll) ){
                $student_roll_number = $row['student_roll_number'];
                $student_roll_number = "a".$student_roll_number;
                //marking every student as unseen in the lecture attendance
                $update = "UPDATE `lecture_attendance` SET `$student_roll_number` = 'unseen' WHERE lecture_id = '$lecture_id' and class = '$student_class_B'";
                if($con -> query($update)){
                    
                }
        }
    }



        //checking if class is not ninth or matric
        if($student_class !="ix" && $student_class != "x"){

            //getting the roll number from the class
            $student_roll  = mysqli_query($con,"SELECT `student_roll_number` FROM `$student_class` WHERE  1 ");
            while($row =  mysqli_fetch_assoc($student_roll) ){
            $student_roll_number = $row['student_roll_number'];
            $student_roll_number = "a".$student_roll_number;
             //marking every student as unseen in the lecture attendance
            $update = "UPDATE `lecture_attendance` SET `$student_roll_number` = 'unseen' WHERE lecture_id = '$lecture_id'";
            if($con -> query($update)){
            
            }

        header("location:../index.php");

    }
    header("location:../index.php");


}header("location:../index.php");
}
else{
echo "something went wrong";
}
}

?>