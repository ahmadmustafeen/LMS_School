<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{


    $student_id = $_SESSION['User'];
    
    
    
    
    //getting details of the account to continue...
    $waitlistcheck  = mysqli_query($con,"SELECT `student_account_status`,`student_class`,`student_section` FROM `waitlist` WHERE student_id = '$student_id'");
    while($row = mysqli_fetch_assoc($waitlistcheck)){
        $student_account_status= $row['student_account_status'];
        $student_class= $row['student_class'];
        $student_section= $row['student_section'];
    }

    //creating a student class
    $student_class = strtolower($student_class);
    if($student_class != "ix" && $student_class != "x"){
        $student_section = "";
        $student_class = "class_".$student_class."_students".$student_section;
    }
    else{
        $student_class = "class_".$student_class."_students".$student_section;
        
        $class_subjects  = mysqli_query($con,"SELECT distinct `subjects` FROM `class_details` WHERE class = '$student_class'");
        // echo"$student_class";
    }

    //checking if the account is approved or not...
    if($student_account_status == "approved"){
        
        //getting the info of students
        $student_info  = mysqli_query($con,"SELECT `student_name` FROM `$student_class` WHERE student_id = '$student_id'");
        while($row = mysqli_fetch_assoc($student_info)){
            $student_name = $row['student_name'];
        }
        $account_status  = mysqli_query($con,"SELECT  `student_status` FROM `student_account` WHERE student_id = '$student_id'");
        while($row = mysqli_fetch_assoc($account_status)){
            $student_status = $row['student_status'];
        }

        //students class development
        
        
        $class = explode("_",$student_class);
        // $student_class = strtoupper($class[1]);
        if($student_class != 'IX' && $student_class != 'X'){
            $class_subjects  = mysqli_query($con,"SELECT distinct `subjects` FROM `class_details` WHERE class = '$student_class'");
        }
        $student_class = strtoupper($class[1]);
        //getting subject for class
        // $class_subjects  = mysqli_query($con,"SELECT distinct `subjects` FROM `class_details` WHERE class = '$student_class'");
        // while($row = mysqli_fetch_assoc($class_subjects)){
        //     $student_subjects = $row['subjects'];
        // }
        $newsWeb  = mysqli_query($con,"SELECT `news`,`date` FROM `news` where 1 ORDER BY date desc");
        $announcement_query  = mysqli_query($con,"SELECT  `announcement`, `date` FROM `announcement` WHERE  class = '$student_class'");
        while($row = mysqli_fetch_assoc($announcement_query)){
            $announcement = $row['announcement'];
            $date = $row['date'];
            $year = explode("-",$date);
        }

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
                        Choose a Subject
                    </h2>
                    <div class="subjectsection">
                        <form action="chapter.php" method="POST">

                            <?php
                                        $check = 2; 
                                        while($row = mysqli_fetch_assoc($class_subjects) ){
                                            $subject_name = $row['subjects'];
                                            $subject_name = ucwords($subject_name); 
                                            if($check == 2){
                                                $check = 0;
                                                ?>
                            <div class="row">
                                <?php
                                            }
                                            
                                                ?>
                                <div class="column">

                                    <label class="container"><?php echo $subject_name ?>
                                        <input type="radio" name="subject" value="<?php echo $subject_name ?>">
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
<?php

                            }
        else if($student_status == "unpaid"){

            ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="../assets/style/styles.css">
    <title>Sturdy's Inn</title>

    <script src="https://kit.fontawesome.com/407fccd64e.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="menu">

        <div class="topbar">
            <div class="topbar-inner">
                <a href="./index.html">News</a>
                <a href="./index.html">Register A Student</a>
                <a href="./index.html">Student Portal</a>
            </div>
        </div>
        <div class="middlebar">
            <div class="middlebar-inner">

                <h1>Sturdy's Inn</h1>
                <hr>
                <h3>A Innovation in Progress</h3>
            </div>
        </div>
        <div class="menubar">
            <div class="menubar-inner">
                <a href="">
                    Home
                </a>
                <a href="">
                    About Us
                </a>
                <a href="">
                    News
                </a>
                <a href="">
                    Blogs
                </a>
            </div>


        </div>
        <div class="logo">
            <img src="./assets/images/logo.png" alt="">
        </div>
    </section>


    <section id="slider">
        <div class="slider">
            <div class="slider-inner">
                <h2>Fees is not Paid.</h2>
                <p>
                    Kindly pay the fees as soon as possible to resume your studies.
                </p>
                <a href="../index.html">
                    <button>
                        Back
                    </button>
                </a>

            </div>
        </div>
    </section>

    <section id="footer">
        <div class="footer">
            <div class="footerside">
                <div class="footersidetop">
                    <div class="footersidetopinner">
                        <div class="footersidetopinnermenu">
                            <a href="">Home</a>
                            <a href="">About Us</a>
                        </div>
                        <div class="footersidetopinnermenu">
                            <a href="">News</a>
                            <a href="">Blog</a>
                        </div>

                    </div>

                </div>
                <div class="footersidebottom">
                    <p>
                        New M. A. Jinnah Rd, Jamshed Quarters Muslimabad, Karachi, Karachi City, Sindh 74800
                    </p>
                    <p>
                        557-5677-6777
                    </p>
                </div>
            </div>
            <div class="footermiddle">
                <img src="../assets/images/logo.png">
            </div>
            <div class="footerside">
                <div class="footersidetop">
                    <button>
                        <i class="far fa-user-circle fa-2x"></i>
                        <p>Portal Login</p>
                    </button>
                    <a href="">
                        Register
                    </a>
                </div>
                <div class="footersidebottom">
                    <p>
                        © 2020 Sturdy's Inns, School of Innovation. All Rights Reserved.
                    </p>
                    <p>
                        Sturdy Cyber Software
                    </p>
                </div>
            </div>

        </div>
    </section>



</body>

</html>
<?php

        }
    }

    

    
    
        else if($student_account_status == 'pending'){
        ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="../assets/style/styles.css">
    <title>Sturdy's Inn</title>

    <script src="https://kit.fontawesome.com/407fccd64e.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="menu">

        <div class="topbar">
            <div class="topbar-inner">
                <a href="./index.html">News</a>
                <a href="./index.html">Register A Student</a>
                <a href="./index.html">Student Portal</a>
            </div>
        </div>
        <div class="middlebar">
            <div class="middlebar-inner">

                <h1>Sturdy's Inn</h1>
                <hr>
                <h3>A Innovation in Progress</h3>
            </div>
        </div>
        <div class="menubar">
            <div class="menubar-inner">
                <a href="">
                    Home
                </a>
                <a href="">
                    About Us
                </a>
                <a href="">
                    News
                </a>
                <a href="">
                    Blogs
                </a>
            </div>


        </div>
        <div class="logo">
            <img src="./assets/images/logo.png" alt="">
        </div>
    </section>


    <section id="slider">
        <div class="slider">
            <div class="slider-inner">
                <h2>Account is not approved Yet.</h2>
                <p>
                    Kindly wait for 24 hours or contact your school.
                </p>
                <a href="../index.html">
                    <button>
                        Back
                    </button>
                </a>

            </div>
        </div>
    </section>

    <section id="footer">
        <div class="footer">
            <div class="footerside">
                <div class="footersidetop">
                    <div class="footersidetopinner">
                        <div class="footersidetopinnermenu">
                            <a href="">Home</a>
                            <a href="">About Us</a>
                        </div>
                        <div class="footersidetopinnermenu">
                            <a href="">News</a>
                            <a href="">Blog</a>
                        </div>

                    </div>

                </div>
                <div class="footersidebottom">
                    <p>
                        New M. A. Jinnah Rd, Jamshed Quarters Muslimabad, Karachi, Karachi City, Sindh 74800
                    </p>
                    <p>
                        557-5677-6777
                    </p>
                </div>
            </div>
            <div class="footermiddle">
                <img src="../assets/images/logo.png">
            </div>
            <div class="footerside">
                <div class="footersidetop">
                    <button>
                        <i class="far fa-user-circle fa-2x"></i>
                        <p>Portal Login</p>
                    </button>
                    <a href="">
                        Register
                    </a>
                </div>
                <div class="footersidebottom">
                    <p>
                        © 2020 Sturdy's Inns, School of Innovation. All Rights Reserved.
                    </p>
                    <p>
                        Sturdy Cyber Software
                    </p>
                </div>
            </div>

        </div>
    </section>



</body>

</html>


<?php
    }

    else if($student_account_status == 'reject'){
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="../assets/style/styles.css">
    <title>Sturdy's Inn</title>

    <script src="https://kit.fontawesome.com/407fccd64e.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="menu">

        <div class="topbar">
            <div class="topbar-inner">
                <a href="./index.html">News</a>
                <a href="./index.html">Register A Student</a>
                <a href="./index.html">Student Portal</a>
            </div>
        </div>
        <div class="middlebar">
            <div class="middlebar-inner">

                <h1>Sturdy's Inn</h1>
                <hr>
                <h3>A Innovation in Progress</h3>
            </div>
        </div>
        <div class="menubar">
            <div class="menubar-inner">
                <a href="">
                    Home
                </a>
                <a href="">
                    About Us
                </a>
                <a href="">
                    News
                </a>
                <a href="">
                    Blogs
                </a>
            </div>


        </div>
        <div class="logo">
            <img src="./assets/images/logo.png" alt="">
        </div>
    </section>


    <section id="slider">
        <div class="slider">
            <div class="slider-inner">
                <h2>Account is Rejected.</h2>
                <p>If you are the student of Sturdy's Inn.
                    Contact the school.
                    <br>
                    021-111-111-1
                </p>
                <a href="../index.php">
                    <button>
                        Back
                    </button>
                </a>

            </div>
        </div>
    </section>

    <section id="footer">
        <div class="footer">
            <div class="footerside">
                <div class="footersidetop">
                    <div class="footersidetopinner">
                        <div class="footersidetopinnermenu">
                            <a href="">Home</a>
                            <a href="">About Us</a>
                        </div>
                        <div class="footersidetopinnermenu">
                            <a href="">News</a>
                            <a href="">Blog</a>
                        </div>

                    </div>

                </div>
                <div class="footersidebottom">
                    <p>
                        New M. A. Jinnah Rd, Jamshed Quarters Muslimabad, Karachi, Karachi City, Sindh 74800
                    </p>
                    <p>
                        557-5677-6777
                    </p>
                </div>
            </div>
            <div class="footermiddle">
                <img src="../assets/images/logo.png">
            </div>
            <div class="footerside">
                <div class="footersidetop">
                    <button>
                        <i class="far fa-user-circle fa-2x"></i>
                        <p>Portal Login</p>
                    </button>
                    <a href="">
                        Register
                    </a>
                </div>
                <div class="footersidebottom">
                    <p>
                        © 2020 Sturdy's Inns, School of Innovation. All Rights Reserved.
                    </p>
                    <p>
                        Sturdy Cyber Software
                    </p>
                </div>
            </div>

        </div>
    </section>



</body>

</html>
<?php
    }
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>