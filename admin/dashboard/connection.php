<?php

    $con=mysqli_connect('localhost','root','','modern_school');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
else {
    // echo "working";
}
?>