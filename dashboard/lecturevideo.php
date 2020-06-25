<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_id = $_SESSION['User']; 
    $subject_name = $_POST['subject'];
    $chapter_name = $_POST['chapter'];
    $lecture = $_POST['lecture'];
    $subject_name = strtolower($subject_name);
    $chapter_name = strtolower($chapter_name);
    $lecture = strtolower($lecture);
    if(!$lecture){
        header("location:./index.php");
    }





    $waitlistcheck  = mysqli_query($con,"SELECT `student_account_status`,`student_class`,`student_name`,`student_section` FROM `waitlist` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($waitlistcheck)){
        $student_account_status= $row['student_account_status'];
        $student_class= $row['student_class'];
        $student_section= $row['student_section'];
         $student_name = $row['student_name'];
    }

    $student_class = strtolower($student_class);

    $newsWeb  = mysqli_query($con,"SELECT * FROM `news` ORDER BY date DESC");


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
    $lecture_info  = mysqli_query($con,"SELECT   `lecture_video`, `lecture_id`, `time` FROM `lecture_details` WHERE student_class= '$student_class' and class_subject = '$subject_name' and student_chapter = '$chapter_name' and subject_lecture = '$lecture'");
    while($row = mysqli_fetch_assoc($lecture_info)){
        $video_link = $row['lecture_video'];
        $lecture_id = $row['lecture_id'];
        $time = $row['time'];
    }




    if($student_account_status == "approved"){
        if($student_status=="paid"){

    $a = explode("?v=",$video_link);
   
    $video_linka = "https://www.youtube.com/embed/".$a[1]."?rel=0&modestbranding=1&autohide=1&mute=0&showinfo=0&controls=0&autoplay=1;enablejsapi=1";
    
    $class = strtolower($student_class);
    if($class != 'ix' && $class != 'x'){
        $student_section = '';
    }
    $class = "class_".$student_class."_students".$student_section;

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
                <div class="lectureleft">
                    <div class="video">
                        <iframe src="<?php echo $video_linka ?>" frameborder="0" allow="accelerometer" autoplay;
                            class="youtube" allowfullscreen allow="autoplay" id="movie_player"></iframe>
                    </div>
                    <p id="s">

                    </p>
                </div>

            </div>


        </div>
    </div>


</body>

</html>
<script>
var val = "<?php echo $time ?>";
var hours = (val / 60);
var rhours = Math.floor(hours);
var minutes = (hours - rhours) * 60;
var rminutes = Math.round(minutes);




var today = new Date();


var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var time = (today.getHours() + rhours) + ":" + (today.getMinutes() + rminutes) + ":" + today.getSeconds();
var dateTime = date + ' ' + time;
document.getElementById("timer").innerHTML = time;
var countDownDate = new Date(dateTime).getTime();

// Update the count down every 1 second
var x = setInterval(function() {
    document.getElementById('hidden').style.display = "none";
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //   Display the result in the element with id="demo"
    document.getElementById("timer").innerHTML =
        minutes + " mins  " + seconds + " sec minutes left before you can mark attendance";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML =
            "Mark Your Attendance First after you have watched the video";
        document.getElementById('hidden').style.display = "";
    }
}, 1000);
</script>
<?php
}
    }}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>