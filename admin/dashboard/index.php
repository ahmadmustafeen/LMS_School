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
                    <div class="register-inner">
                        <h2>
                            Admin Portal
                        </h2>
                        <form method="post" action="./functions/trafficpolice.php">
                            <table>

                                <tr>
                                    <td>
                                        <label for="class">Select an Action</label>
                                    </td>
                                    <td>
                                        <select name="admin_author" id="class">
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="I" disabled selected>Select
                                                A Query </option>

                                                <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="I">Add A Lecture</option>
                                                <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="IX">Add A Suject to class</option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="II">Delete A Lecture
                                            </option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="III">View Student Details
                                            </option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="IV">Add News</option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="V">Delete News</option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="VI">Change Announcement
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="VII">Approve Account
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="VIII">Fee Department
                                            </option>




                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for=""></label>
                                    </td>
                                    <td>
                                        <button type="submit" name="Login">
                                            Log In
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