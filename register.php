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
                <a href="./register.php">Register A Student</a>
                <a href="./login.php">Student Portal</a>
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


    <section id="register">
        <div class="register">
            <div class="register-inner">
                <h2>
                    Student Portal Login
                </h2>
                <form method="post" action="adduser.php">
                    <table>
                        <tr>
                            <td>
                                <label for="username">Student ID</label>
                            </td>
                            <td>
                                <input type="text" id="username" name="UName" placeholder="Student ID Here" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password">Password</label>
                            </td>
                            <td>
                                <input type="password" id="password" name="password" placeholder="Password Here"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="student_name">Student Name</label>
                            </td>
                            <td>
                                <input type="text" id="student_name" name="student_name" placeholder="Student Name Here"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="class">Class</label>
                            </td>
                            <td>
                                <select name="student_class" id="class">


                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="II">II</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="III">III</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="IV">IV</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="V">V</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="VI">VI</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="VII">VII</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="VIII">VIII</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="IX">IX</option>

                                    <option type="radio" id="class" name="student_class"
                                        placeholder="Select a Student Class" value="X">X</option>


                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="student_section">Class Section</label>
                            </td>
                            <td>
                                <select name="student_section" id="student_section">

                                    <option type="radio" id="student_section" name="student_section"
                                        placeholder="Select a Student Section" value="A">A</option>

                                    <option type="radio" id="class" name="student_section"
                                        placeholder="Select a Student Section" value="Biology">Biology</option>

                                    <option type="radio" id="class" name="student_section"
                                        placeholder="Select a Student Section" value="Computer">Computer</option>


                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="father_name">Father Name</label>
                            </td>
                            <td>
                                <input type="text" id="father_name" name="father_name" placeholder="Father Name Here"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="student_mobile">Phone Number</label>
                            </td>
                            <td>
                                <input type="text" id="student_mobile" name="student_mobile"
                                    placeholder="Mobile Number Here" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="student_email">Email Address</label>
                            </td>
                            <td>
                                <input type="email" id="student_email" name="student_email"
                                    placeholder="Student Email Here">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for=""></label>
                            </td>
                            <td>
                                <button type="submit" name="Login">
                                    Register
                                </button>
                            </td>
                        </tr>

                    </table>

            </div>



            </form>

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
<style>

</style>