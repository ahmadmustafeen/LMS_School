<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $newsWeb  = mysqli_query($con,"SELECT * FROM `news` WHERE 1");
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
                        <div class="news">

                            <div class="newsfeed">
                                <form action="./functions/deletenewsfunctionality.php" method="POST" style="width:100% !important">
                                    <table style="width:100% !important">
                                        <?php
                    while($row = mysqli_fetch_assoc($newsWeb) ){
                        $news = $row['news'];
                        $date = $row['date'];
                        ?> <tr style="width:100% !important">
                                            <td> <label class="container">
                                                    <?php echo $news ?>
                                                    <input type="radio" name="subject" value="<?php echo $news ?>">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <h4> <?php echo $date ?> </h4>
                                                <hr>
                                            </td>
                                        </tr>

                                        <?php }  ?>
                                        <tr style="width:50%;margin 0 auto;">

                                            <td style="display:flex;justify-content:center">
                                                <button type="submit" name="Login">
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


    </div>



</body>

</html>
<style>
.newsfeed {
    overflow-x: hidden;
}
</style>
<?php
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>