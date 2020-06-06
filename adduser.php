<?php
$c = uniqid (rand (10,105),false);
$servername = "localhost";
$usernamea = "root";
$password = "";
$dbname = "investforfuture";

$user_username = $_GET['username'];
$user_password = $_GET['password'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$user_password = $_GET['password'];
$email = $_GET['email'];
$phone_number = $_GET['mobile_no'];
$refer_by = $_GET['refer_by'];



$conn = mysqli_connect($servername, $usernamea, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
  

  $userreferalid = null;
  $result = mysqli_query($conn,"SELECT username FROM `referral` where referral_id = '$refer_by'");
  while($row=mysqli_fetch_assoc($result)){
      $userreferalid = $row['username'];
  }


  if($userreferalid != null){
    $a = "INSERT INTO `refer_by`(`username`, `refer_by`) VALUES ('$user_username','$userreferalid')";
    $conn->query($a);
  }

  $user_username_withdraw = $user_username . "_withdraw_referral";
  $sql = "CREATE TABLE $user_username_withdraw(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    amount INT(6) UNSIGNED,
    payment_method VARCHAR(50),
    request_date date,
    status_withdraw VARCHAR(50),
    completion_date date
    )";
    
  $user_username_withdraw_daily = $user_username . "_withdraw_daily";
  $_withdraw_daily = "CREATE TABLE $user_username_withdraw_daily(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    amount INT(6) UNSIGNED,
    payment_method VARCHAR(50),
    request_date date,
    status_withdraw VARCHAR(50),
    completion_date date
    )";
    $conn->query($_withdraw_daily);
  
  $withdraw = "CREATE TABLE $user_username(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    package VARCHAR(50),
    acctstatus VARCHAR(50)
    )";
    $conn->query($withdraw);
    
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
  
   if($userreferalid != null){
  $insertion = "INSERT INTO `$userreferalid`(`userid`, `username`, `package`, `acctstatus`) VALUES ('$c','$user_username','none','none')";




  if ($conn->query($insertion) === TRUE) {
    echo "Tasadasdable asasasa cadasdreated succasdasdessfully";
} else {
    echo "Eadsadarror creatiadsadng tasadable: " . $conn->error;
}
   }
  
  




  // sql to create table
 
//user info whenever new user is registered.
$basic = "INSERT INTO `user_info`
 (username,upassword,first_name,last_name,phone_number,email)
 VALUES 
 ('$user_username','$user_password', '$first_name', '$last_name','$phone_number','$email')";




//acount info of the user
 $account = "INSERT INTO `account`
 (`username`, `total_amount`, `minimum_withdrawn`, `total_withdrawn`, `remaining_balance`)
  VALUES 
  ('$user_username','0','0','0','0')";



//acct_info
$acct_info = "INSERT INTO `acct_info`
(`username`, `acct_status`, `acct_type`, `acct_exp`)
 VALUES
('$user_username','unpaid','NA','NA')";



//daily ads
$daily_ads ="INSERT INTO `daily_ads`
(`username`, `daily_ads`, `ads_rate`,`daily_ads_limit`,`acct_status`)
VALUES 
('$user_username','0','0','0','unpaid')";

//referral 
$referrals = "
INSERT INTO `referral`(`username`, `referral_id`, `referral_rate`, `referral_daily`, `referral_total`, `ads_today`, `referral_total_earning`) 
VALUES
('$user_username','$c','0','0','0','0','0')";

//daily earning acct
$daily_ads_earning = "INSERT INTO `daily_ads_earning`
(`username`, `total_ads_earning`, `minimum_ads_withdrawn`, `total_ads_withdrawn`, `available_ads_balance`)
 VALUES 
 ('$user_username','0','0','0','0')";

 //referral earning acct
$ref_ads_earning = "INSERT INTO `referral_ads_earning`
(`username`, `total_ref_earning`, `minimum_ref_withdrawn`, `total_ref_withdrawn`, `available_ref_balance`)
 VALUES 
 ('$user_username','0','0','0','0')";

$conn->query($basic);
$conn->query($referrals);
$conn->query($daily_ads);
$conn->query($acct_info);
$conn->query($account);
$conn->query($daily_ads_earning);
$conn->query($ref_ads_earning);





mysqli_close($conn);
header("location:./login.php");
 }
?>