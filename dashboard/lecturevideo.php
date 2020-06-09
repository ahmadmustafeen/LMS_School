<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_id = $_SESSION['User'];


    $student_info  = mysqli_query($con,"SELECT `student_name` ,`student_class` FROM `student_email` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($student_info)){

        $student_name= $row['student_name'];
        $student_class = $row['student_class'];
    }
    $lecture_name = $_POST['lecture'];
    $subject_name=$_POST['subject'];
    $chapter_name=$_POST['chapter'];
    $subject_name = strtolower($subject_name);
    $lecture_info  = mysqli_query($con,"SELECT * FROM $subject_name WHERE  student_class= '$student_class' AND student_chapter = '$chapter_name' AND student_lecture = '$lecture_name'");
    while($row = mysqli_fetch_assoc($lecture_info)){
        $video_link = $row['student_videolink'];
    }
  $video_link = $video_link."?rel=0&modestbranding=1&autohide=1&mute=0&showinfo=0&controls=0&autoplay=1;enablejsapi=1";
    

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
            <div class="lectureleft">

                <div class="video">
                    <iframe src="<?php echo $video_link ?>" frameborder="0"
                        allow="accelerometer" autoplay; class="youtube" allowfullscreen allow = "autoplay" ></iframe>
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
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>
