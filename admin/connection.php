<?php

    $con=mysqli_connect('localhost','root','','school_lms');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
else {
    // echo "working";
}
?>