<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User'])){
    $student_id = $_SESSION['User'];
    $student_info  = mysqli_query($con,"SELECT `student_name` ,`student_class`,`student_roll_number` FROM `student_details` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($student_info)){
        $student_roll_number = $row['student_roll_number'];
    }
    $student_roll_number = "mark".$student_roll_number;
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $chapter = $_POST['chapter'];
    $roll_number_marks_query = mysqli_query($con,"SELECT * FROM `test_marks` WHERE student_class = '$class' and class_subject = '$subject' and subject_chapter = '$chapter'");
    while($row = mysqli_fetch_assoc($roll_number_marks_query) ){  
        $mark = $row["$student_roll_number"];
}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
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
                            <h2>
                                Subject: <span style="color:#FFD200"><?php echo ucwords($subject) ?></span> &nbsp Chapter: <span style="color:#FFD200"><?php echo ucwords($chapter) ?></span>
                            </h2>
                            <?php  
                            $markscored = explode("/",$mark); 
                            ?>
                            <h3 style="font-weight:400;font-size:26px;padding-top:30px">
                                You have Scored <?php echo $markscored[0]?> mark(s) out of <?php echo $markscored[1]?>
                            </h3>
                            <a href="./index.php">
                                <button type="submit">
                                    Back to Dashboard
                                </button>
                            </a>
                        </div>
    
                    </div>
    
                </div>
    
    
            </div>
        </div>
    
    
    </body>
    
    </html>
    
    <?php
        }
    

