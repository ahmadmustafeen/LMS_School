<?php
    session_start();

    if(isset($_SESSION['User']))
    {
        header("location:./dashboard/index.php");
        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:index.php");
    }


?>
<html>
<h1> <a href="dashboard/index.php">DASHBOARD</a> </h1>

</html>