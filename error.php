<?php 
require_once('connection.php');


    if(isset($_POST['Login']))
    {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="./assets/style/styles.css">
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
                <h2>Cannot Create a New Account</h2>
                <p>
                    UserName Already Exist Kindly Login or apply for new password
                </p>
                <a href="./login.php">
                    <button>
                        Login
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
                <img src="./assets/images/logo.png">
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
    else{
mysqli_close($conn);
header("location:./login.php");
 }
?>