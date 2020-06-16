<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_id = $_SESSION['User'];


    $student_info  = mysqli_query($con,"SELECT `student_name` ,`student_class` FROM `student_details` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($student_info)){
        $student_name= $row['student_name'];
        $student_class = $row['student_class'];
    }
    $lecture_name = $_POST['lecture'];
    $subject_name=$_POST['subject'];
    $chapter_name=$_POST['chapter'];
    $subject_name = strtolower($subject_name);
    $lecture_info  = mysqli_query($con,"SELECT `lecture_video`,`time`, `lecture_id` FROM `lecture_details` WHERE  student_class= '$student_class' AND student_chapter = '$chapter_name' AND subject_lecture = '$lecture_name'");
    while($row = mysqli_fetch_assoc($lecture_info)){
        $video_link = $row['lecture_video'];
        $time = $row['time'];
        $lecture_id = $row['lecture_id'];
       
    }
    $a = explode("?v=",$video_link);
   
    $video_linka = "https://www.youtube.com/embed/".$a[1]."?rel=0&modestbranding=1&autohide=1&mute=0&showinfo=0&controls=0&autoplay=1;enablejsapi=1";
    

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
                <a href="../logout.php">
                    <form action="markattendance.php" method="post">
                        <input name="student_id" value=<?php echo $student_id ?> style="display:none">
                        <input name="lecture_id" value=<?php echo $lecture_id ?> style="display:none">
                        <button type="submit" id="hidden" name="marks">Mark Attendance</button>
                    </form>
                </a>

                <button type="submit">Edit Profile</button>
                <a href="../logout.php">
                    <button type="submit">Logout</button>
                </a>

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
    document.getElementById("timer").innerHTML = hours + " hours " +
        minutes + " mins  " + seconds + " sec minutes left before you can mark attendance";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML ="Mark Your Attendance First after you have watched the video";
        document.getElementById('hidden').style.display = "";
    }
}, 1000);
</script>
<?php
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>