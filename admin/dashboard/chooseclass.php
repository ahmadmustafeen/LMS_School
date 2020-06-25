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
                <a href="./index.php">
                    <button type="submit">Back to Dashboard</button>
                </a>
                <marquee behavior="" direction="" style="width: 80%;">
                    <h2 style="color: white;">
                        Welcome to LMS of Sturdy's Inn
                    </h2>
                </marquee>

                <a href="../logout.php">
                    <button type="submit">Logout</button>
                </a>

            </div>
            <div class="bar">
                <div class="register">
                    <div class="register-inner">
                        <h2>
                            Admin Portal(View Lecture Details)
                        </h2>
                        <form method="post" action="./choosesubject.php">
                            <table>

                                <tr>
                                    <td>
                                        <label for="class">Select an Action</label>
                                    </td>
                                    <td>
                                        <select name="admin_author" id="class">
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" disabled selected>Select
                                                A Class </option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="II">II
                                            </option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="III">III
                                            </option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="IV">IV</option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="V">V</option>

                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="VI">VI
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="VII">VII
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="VIII">VIII
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="IXC">IX Computer
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="IXB">IX Biology
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="XC">X Computer
                                            </option>
                                            <option type="radio" id="class" name="admin_author"
                                                placeholder="Select a Student Class" value="XB">X Biology
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
                                            Submit
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