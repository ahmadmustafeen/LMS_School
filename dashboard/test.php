<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_id = $_SESSION['User'];
    if(isset($_POST['class'])&&isset($_POST['subject'])&&isset($_POST['chapter'])&&isset($_POST['rollNumber'])){
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $chapter = $_POST['chapter'];
        $student_info  = mysqli_query($con,"SELECT `student_name` ,`student_class`,`student_roll_number` FROM `student_details` WHERE student_id = '$student_id'");
        while($row = mysqli_fetch_assoc($student_info)){
            $rollNumber = $row['student_roll_number'];
        }
        $checkexistence = mysqli_query($con,"SELECT * FROM `test` WHERE
        student_class = '$class' and class_subject = '$subject' and subject_chapter = '$chapter'");

    $checkalready = mysqli_query($con,"SELECT * FROM `test_marks` WHERE
     student_class = '$class' and class_subject = '$subject' and subject_chapter = '$chapter'");
     $rollNumber = "mark".$rollNumber;
    $student_roll_number_marks1 = null;
    $roll_number_marks_query = mysqli_query($con,"SELECT * FROM `test_marks` WHERE student_class = '$class' and class_subject = '$subject' and subject_chapter = '$chapter'");
    while($row = mysqli_fetch_assoc($roll_number_marks_query) ){  
        $student_roll_number_marks1 = $row["$rollNumber"];
}
if(is_null($student_roll_number_marks1)){


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
        <div class="videobar">
            <div class="topbar">
                <a href="./index.php"><button type="submit">Back to Dashboard</button></a>

                <h2 style="color: white;width:60%; text-align:center" id="timer">
                    Welcome to LMS of Sturdy's Inn
                </h2>


                <button type="submit">Edit Profile</button>
                <a href="../logout.php">
                    <button type="submit">Logout</button>
                </a>

            </div>
            <div class="bar testscreen">
                <div class="lectureleft testscreen padd">
                    <div class="test">



                        <form method="post" action="testcheck.php">
                            <?php 
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($checkexistence)){
                                $question = $row["question"];
                                $question = strtolower($question);
                                $question = ucwords($question);
                                $choice1 = $row["choice1"];
                                $choice2 = $row["choice2"];
                                $choice3 = $row["choice3"];
                                $choice4 = $row["choice4"];
                                ?>
                            <div class="questioncheck">
                                <div class="question">
                                    <h3> Q No.<?php echo $i+1;  ?>
                                        <?php echo " $question" ?>
                                    </h3>
                                </div>

                                <div class="testrow">
                                    <div class="testcolumn">
                                        <p>
                                            <input type="radio" name="<?php echo $i+1 ?>"
                                                value="<?php echo $choice1 ?>">
                                            <?php echo $choice1 ?>
                                        </p>
                                    </div>
                                    <div class="testcolumn">
                                        <p>
                                            <input type="radio" name="<?php echo $i+1 ?>"
                                                value="<?php echo $choice2 ?>">
                                            <?php echo $choice2 ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="testrow">
                                    <div class="testcolumn">
                                        <p>
                                            <input type="radio" name="<?php echo $i+1 ?>"
                                                value="<?php echo $choice3 ?>">
                                            <?php echo $choice3 ?>
                                        </p>
                                    </div>
                                    <div class="testcolumn">
                                        <p>
                                            <input type="radio" name="<?php echo $i+1 ?>"
                                                value="<?php echo $choice4 ?>">
                                            <?php echo $choice4 ?>
                                        </p>
                                    </div>
                                </div>


                                <?php
                                $i = $i+1;
                                }
                                ?>
                                <input type="text" name="class" style="display:none" value="<?php echo $class ?>">

                                <input type="text" name="subject" style="display:none" value="<?php echo $subject ?>">

                                <input type="text" name="chapter" style="display:none" value="<?php echo $chapter ?>">


                                <input type="text" name="rollNumber" style="display:none"
                                    value="<?php echo $rollNumber ?>">
                                <input type="text" name="questionNumber" style="display:none" value="<?php echo $i ?>">
                                <button type="submit">Submit</button>
                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>


</body>

</html>
<?php
    }
    else{
        header("location:./index.php");
    }
} else{
    header("location:./index.php");
}
}
else{
    header("location:./index.php");
}