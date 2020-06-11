<?php
echo $_POST['admin_author'];
if(isset($_POST['admin_author']))
    {
     $check = $_POST['admin_author'];
     switch($check){
         case 'I':
            header('location:./addlecture.php');
         break;
         case 'II':
            header('location:./deletelecture.php');
         break;
     }
}
else{
    header('location:./index.php');
}
?>