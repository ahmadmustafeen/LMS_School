<?php

require_once('../connection.php');
if(isset($_POST['Login'])){
    $subject = $_POST['subject'];
    $class = $_POST['class'];
    $class =strtolower($class);
    switch($class){
        case "ixb":
            $class = "ix";
            $section = "biology";
        break;
        case "ixc":
            $class = "ix";
            $section = "computer";
        break;
        case "xb":
            $class = "x";
            $section = "biology";
        break;
        case "xc":
            $class = "x";
            $section = "computer";
        break;
        default:
            $section = "";
        break;
    }
    $class = 'class_'.$class."_students".$section;
    $subject =  strtolower($subject);
    $q = 0;
    $check  = mysqli_query($con,"SELECT * FROM `class_details` WHERE class = '$class' and subjects = '$subject'");
    while($row = mysqli_fetch_assoc($check) ){
        $q = 1;
    }

if($q == 0){
    $basic = "INSERT INTO `class_details`
    (`class`, `subjects`)
     VALUES ('$class','$subject')";
    if($con->query($basic)){
      ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="main">
        <div class="videobar">
            <div class="topbar">
                <a href="../index.php">
                    <button type="submit">Back to Dashboard</button>
                </a>
                <marquee behavior="" direction="" style="width: 80%;">
                    <h2 style="color: white;">
                        Welcome to LMS of Sturdy's Inn
                    </h2>
                </marquee>

                <a href="../../logout.php">
                    <button type="submit">Logout</button>
                </a>

            </div>
            <div class="bar">
                <div class="register">
                    <div class="register-inner">
                        <h2 style="text-align:center">
                            Successfully added <?php echo $subject ?> in class <?php echo $class ?> .
                        </h2>
                        <table style="height:50%;">
                            <tr>
                                <td style="margin:20px">
                                    <a href="../index.php">
                                        <button type="submit" name="Login">
                                            Back to Dashboard
                                        </button>
                                    </a>
                                </td>
                                <td style="width:20px">
                                </td>
                                <td style="margin:20px"> <a href="../addSubject.php">
                                        <button type="submit" name="Login">
                                            Add More Subjects
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </table>




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
else{
    header("location:../index.php");
}

// else{
?>
<!-- 
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
                            Error in Adding the news.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html> -->
<?php
// }
}
else{
    header("location:./index.php");
}
?>