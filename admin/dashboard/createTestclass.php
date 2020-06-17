<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <div class="register-inner addlecture">
                        <h2>
                            Admin Portal (Create a Test)
                        </h2>

                        <form method="post" action="./createTestquestion.php" style="width:70%">
                            <table >
                                <tr>
                                    <td>
                                        <label for="class">Class</label>
                                    </td>
                                    <td>
                                        <select name="student_class" id="class" required>
                                        <option type="radio" id="class" name="student_class"
                                                placeholder="Select a Student Class" disabled selected>Choose a Class</option>
                                            <option type="radio" id="class" name="student_class"
                                                placeholder="Select a Student Class" value="I">I</option>

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
                                        <label for="subject">Subject Name</label>
                                    </td>
                                    <td>
                                        <input type="text" id="subject" name="subject" placeholder="Subject Name Here"
                                            required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="chapter">Chapter Name</label>
                                    </td>
                                    <td>
                                        <input type="text" id="chapter" name="chapter" placeholder="Chapter Name Here"
                                            required>
                                    </td>
                                </tr>
                          

                                <tr>
                                    <td>
                                        <label for=""></label>
                                    </td>
                                    <td>
                                        <button type="submit" name="ABC">
                                           Continue
                                        </button>
                                    </td>
                                </tr>

                            </table>

                    </div>



                    </form>

                </div>
            </div>

        </div>


    </div>



</body>

</html>
<?php
}
else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>