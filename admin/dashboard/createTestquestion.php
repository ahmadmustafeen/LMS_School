<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    if(isset($_POST['student_class']) && isset($_POST['ABC'])){
        $student_class = $_POST['student_class'];
        $student_chapter = $_POST['chapter'];
        $student_subject = $_POST['subject'];
        $checkexistence = mysqli_query($con,"SELECT * FROM `test_marks` WHERE student_class = '$student_class' and class_subject = '$student_subject' and subject_chapter = '$student_chapter'");
        if(!mysqli_fetch_assoc($checkexistence)){

        
            
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
                    <div class="register-inner test">
                        <h2>
                            Create the Test (Enter the Question)
                        </h2>

                        <form method="post" action="./confirmquestion.php" style="width:70%;">
                            <table style="height:100%;">
                                <input type="text" style="display:none;" name="student_class"
                                    value="<?php echo $student_class; ?>">
                                <input type="text" style="display:none;" name="subject"
                                    value="<?php echo $student_subject; ?>">
                                <input type="text" style="display:none;" name="chapter"
                                    value="<?php echo $student_chapter; ?>">
                                <tr>
                                    <td>
                                        <label for="subject">Question</label>
                                    </td>
                                    <td>
                                        <input type="text" id="question" name="question" placeholder="Enter Question"
                                            required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="chapter">Choice: A</label>
                                    </td>
                                    <td>
                                        <input type="text" id="chapter" name="A" placeholder="Choice a " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="chapter">Choice: B</label>
                                    </td>
                                    <td>
                                        <input type="text" id="chapter" name="B" placeholder="Choice b" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="chapter">Choice: C</label>
                                    </td>
                                    <td>
                                        <input type="text" id="chapter" name="C" placeholder="Choice c " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="chapter">Choice: D</label>
                                    </td>
                                    <td>
                                        <input type="text" id="chapter" name="D" placeholder="Choice d" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="class">Answer</label>
                                    </td>
                                    <td>
                                        <select name="Correct" id="class" required>
                                            <option type="radio" id="class" name="Correct"
                                                placeholder="Select a Student Class" disabled>Choose the
                                                correct answer
                                            </option>
                                            <option type="radio" id="class" name="Correct"
                                                placeholder="Select a Student Class" value="I">A</option>

                                            <option type="radio" id="class" name="Correct"
                                                placeholder="Select a Student Class" value="II">B</option>

                                            <option type="radio" id="class" name="Correct"
                                                placeholder="Select a Student Class" value="III">C</option>
                                            <option type="radio" id="class" name="Correct"
                                                placeholder="Select a Student Class" value="IV">D</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" name="submit">
                                            Submit Question
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



</body>

</html>
<?php
}
else{
    ?>

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
                    <div class="register-inner ">
                        <h2 style="padding-bottom:50px">
                            Following subject already have a test
                        </h2>
                        <a href="./index.php">
                            <button type="submit">Back</button>
                        </a>


                    </div>





                </div>
            </div>

        </div>


    </div>



</body>

</html>
<?php
}
    }
else if( isset($_POST['CDE'])){
    $student_class = $_POST['student_class'];
    $student_chapter = $_POST['chapter'];
    $student_subject = $_POST['subject'];
    $inseart = "INSERT INTO `test_marks`(`student_class`, `class_subject`, `subject_chapter`) VALUES
     ('$student_class','$student_subject','$student_chapter')";
    if ($con ->query($inseart)){
    header('location:./index.php');
}
}
else{
    header('location:./index.php');
}
}

else
{
echo "ga";
    header("location:../login.php ? enter info to access");
}
?>