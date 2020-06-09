<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['UName']) || empty($_POST['Password']))
       {
            header("location:index.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from admin where admin='".$_POST['UName']."' and pass='".$_POST['Password']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['Password'];
                header("location:wellcome.php");
            }
            else
            {
                header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    
?>