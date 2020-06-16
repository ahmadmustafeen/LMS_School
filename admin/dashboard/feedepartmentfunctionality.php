<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    if($_POST['admin_author']){
       $class =  $_POST['admin_author'];
       $student_names  = mysqli_query($con,"SELECT `student_id` FROM `student_account` WHERE   student_status = 'unpaid' ");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="main">
        <div class="videobar">
            <div class="topbar">

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
                <div class="register">
                    <div class="register-inner">
                        <h2>List Of Unpaid Students</h2>
                        <div class="newsfeed">
                        <form action="changestatus.php" method="POST" style="width:100% !important">
                                    <table style="width:100% !important">
                                        <?php
                    while($row = mysqli_fetch_assoc($student_names) ){
                        $student_id = $row['student_id'];
                        $get_name = mysqli_query($con,"SELECT `student_name`, `student_class` FROM `student_details` WHERE student_id = '$student_id'");
                        while($row = mysqli_fetch_assoc($get_name) ){
                            $student_name = $row['student_name'];
                            $student_class = $row['student_class'];
                        
                        ?> <tr style="width:100% !important">
                                            <td> <label class="container">
                                                   <p> <?php echo "$student_id &nbsp $student_name &nbsp $student_class" ?></p>
                                                    <input type="radio" name="subject" value="<?php echo $student_id ?>">
                                                    <span class="checkmark"></span>
                                                </label>
                                          
                                                <hr>
                                            </td>
                                        </tr>

                                        <?php }  ?>
                                        <tr style="width:50%;margin 0 auto;">

                                            <td style="display:flex;justify-content:center">
                                                <button type="submit" name="submit">
                                                    Submit
                                                </button>
                                            </td>
                                        </tr>

                                    </table>
                                </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>



</body>

</html>
<style>
.newsfeed {
    overflow-x: hidden;
}
.newsfeed p {
    font-size: 24px;
    text-align: center;
}
</style>
<?php
}
    }
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>