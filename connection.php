<?php

    $con=mysqli_connect('localhost','root','','lms');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
else {
    // echo "working";
}
?>