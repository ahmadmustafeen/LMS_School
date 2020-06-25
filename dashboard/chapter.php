<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_id = $_SESSION['User'];
    $subject_name = $_POST['subject'];
    if(!$subject_name){
        header("location:./index.php");
    }
    $subject_name = strtolower($subject_name);
    $waitlistcheck  = mysqli_query($con,"SELECT `student_account_status`,`student_class`,`student_section` FROM `waitlist` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($waitlistcheck)){
        $student_account_status= $row['student_account_status'];
        $student_class= $row['student_class'];
        $student_section= $row['student_section'];
    }
    $student_class = strtolower($student_class);
    if($student_class != "ix" && $student_class != "x"){
        $student_section = "";
    }
    $subject  = mysqli_query($con,"SELECT distinct `student_chapter` FROM `lecture_details` WHERE  student_class = '$student_class' and class_subject = '$subject_name'");
   
    $student_class = "class_".$student_class."_students".$student_section;


    $student_info  = mysqli_query($con,"SELECT `student_name` FROM `$student_class` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($student_info)){
        $student_name = $row['student_name'];
    }

    $newsWeb  = mysqli_query($con,"SELECT * FROM `news` ORDER BY date DESC");
    //     $student_info  = mysqli_query($con,"SELECT `student_name`, `student_class` FROM `student_details` WHERE student_id = '$student_id'");
    // while($row = mysqli_fetch_assoc($student_info)){
    //     $student_name= $row['student_name'];
    //     $student_class = $row['student_class'];
    // }
   
    $class = explode("_",$student_class);
    $student_class = strtoupper($class[1]);

    $announcement_query  = mysqli_query($con,"SELECT  `announcement`, `date` FROM `announcement` WHERE  class = '$student_class'");
    while($row = mysqli_fetch_assoc($announcement_query)){
        $announcement = $row['announcement'];
        $date = $row['date'];
        $year = explode("-",$date);
    }


    $account_status  = mysqli_query($con,"SELECT  `student_status` FROM `student_account` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($account_status)){
        $student_status = $row['student_status'];
    }



    $student_id = $_SESSION['User'];
    $waitlistcheck  = mysqli_query($con,"SELECT `student_account_status`,`student_class`,`student_section` FROM `waitlist` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($waitlistcheck)){
        $student_account_status= $row['student_account_status'];
        $student_class= $row['student_class'];
        $student_section= $row['student_section'];
    }


    if($student_account_status == "approved"){
        if($student_status=="paid"){

  

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
        <div class="mainside">
            <div class="mainsidelogo">
                <img src="../assets/images/logo.png" alt="">
            </div>
            <div class="mainsideprofile">
                <div class="mainsideprofileimg">
                    <img src="../assets/images/profile.jpg" alt="">
                </div>
                <h2>
                    <?php echo $student_id ?>
                </h2>

                <h2>
                    <?php echo $student_name ?>
                </h2>

                <h2>
                    <?php echo $student_class ?>
                </h2>

            </div>
        </div>
        <div class="mainbar">
            <div class="topbar">
                <a href="./index.php" id="hide"><button> Back to Dashboard</button></a>
                <marquee behavior="">
                    <h2 style="color: white;">
                        Welcome to LMS of Sturdy's Inn
                    </h2>
                </marquee>
                <div class="button">
                    <a href="./index.php" id="show"><button> Back to Dashboard</button></a>
                    <a href="#"><button> Edit Profile</button></a>
                    <a href="../logout.php"><button> Logout</button></a>
                </div>

            </div>
            <div class="bar">
                <div class="mainbarleft">
                    <h2>
                        Choose a Chapter
                    </h2>
                    <div class="subjectsection">
                        <form action="lecture.php" method="POST">
                            <input type="text" name="subject" style="display:none" value="<?php echo $subject_name ?>">
                            <?php
                                $check = 2; 
                                while($row = mysqli_fetch_assoc($subject) ){
                                    $chapter_name = $row['student_chapter'];
                                    $chapter_name = ucwords($chapter_name);
                                    if($check == 2){
                                        $check = 0;
                                        ?>
                            <div class="row">
                                <?php
                                    }
                                    
                                        ?>
                                <div class="column">

                                    <label class="container"><?php echo $chapter_name ?>
                                        <input type="radio" name="chapter" value="<?php echo $chapter_name ?>">
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
                <div class="announcmentsection">
                    <div class="announcment">
                        <h2>Announcment</h2>
                        <p style="text-align:center">
                            <?php echo $announcement ?>
                        </p>
                        <h3 style="text-align:center;"><?php echo ($year[2]."-".$year[1]."-".$year[0]) ?></h3>
                    </div>
                </div>
            </div>
            <div class="mainbarright">
                <div class="news">
                    <h2>Latest News</h2>
                    <div class="newsfeed">
                        <?php
                    while($row = mysqli_fetch_assoc($newsWeb) ){
                        $news = $row['news'];
                        $date = $row['date'];
                        ?>
                        <p style="width:90%">
                            <?php echo $news ?>
                        </p>
                        <h4>
                            <?php echo $date ?></h4>
                        <hr>
                        <?php }  ?>

                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>


</body>

</html>
<style>

</style>
<?php
}else{
    header("location:./index.php");
}
    }
    else{
        header("location:./index.php");
    }
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>