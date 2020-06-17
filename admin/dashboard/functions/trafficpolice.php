<?php
echo $_POST['admin_author'];
if(isset($_POST['admin_author']))
    {
     $check = $_POST['admin_author'];
     switch($check){
         case 'I':
            header('location:../addlecture.php');
         break;
         case 'II':
            header('location:../deletelecture.php');
         break;
         case 'III':
            header('location:../chooseclass.php');
         break;
         case 'IV':
            header('location:../addnews.php');
         break;
         case 'V':
            header('location:../deletenews.php');
         break;
         case 'VII':
            header('location:../approveaccounts.php');
         break;
         case 'VIII':
            header('location:../feedepartment.php');
         break;
         case 'IX':
            header('location:../addSubject.php');
         break;
         case 'X':
            header('location:../createTestclass.php');
         break;
     }
}
else{
    header('location:./index.php');
}
?>