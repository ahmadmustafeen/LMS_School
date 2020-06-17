<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['User']))
{
    $student_class = $_POST['student_class'];
    $student_chapter = $_POST['chapter'];
    $student_chapter = strtolower($student_chapter);
    $student_subject = $_POST['subject'];
    $student_subject = strtolower($student_subject);

    if(isset($_POST['question'])){
        $question = $_POST['question'];
        $A = $_POST['A'];
        $B = $_POST['B'];
        $C = $_POST['C'];
        $D = $_POST['D'];
        switch($_POST['Correct']){
            case 'I':
                $Correct  = $A;
            break;
            case 'II':
                $Correct  = $B;
            break;
            case 'III':
                $Correct  = $C;
            break;
            case 'IV':
                $Correct  = $D;
            break;
            default:
                $Correct = $A;

        }
        $sql = "INSERT INTO `test`(`student_class`, `class_subject`, `subject_chapter`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `correct`) VALUES
         ('$student_class','$student_subject','$student_chapter','$question','$A','$B','$C','$D','$Correct')";
         if ($con->query($sql)){

         
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
                            Do you want to add more Questions?
                        </h2>

                        <form method="post" action="./createTestquestion.php" style="width:70%;">
                            <table>
                                <input type="text" style="display:none;" name="student_class"
                                    value="<?php echo $student_class; ?>">
                                <input type="text" style="display:none;" name="subject"
                                    value="<?php echo $student_subject; ?>">
                                <input type="text" style="display:none;" name="chapter"
                                    value="<?php echo $student_chapter; ?>">
                                <tr>
                                    <td>
                                        <button type="submit" name="ABC">
                                            Add More Questions
                                        </button>
                                    </td>
                                    <td>
                                        <button type="submit" name="CDE">
                                            Finish the Test
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
                            There was Error in Adding this question.

                        </h2>
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
}