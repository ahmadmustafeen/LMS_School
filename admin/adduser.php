

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "investforfuture";

$user_username = $_GET['username'];
$user_password = $_GET['password'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$user_password = $_GET['password'];
$email = $_GET['email'];
$phone_number = $_GET['mobile_no'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

// $result = mysqli_query($conn,"SELECT 'user_id' FROM `users`  ");
// while($row=mysqli_fetch_assoc($result)){
//     $username = $row["user_id"];
// }
 


// Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
 



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
(`username`, `daily_ads`, `ads_rate`)
VALUES 
('$user_username','0','0')";

$c = uniqid (rand (10,105),false);
//referral 
$referrals = "
INSERT INTO `referral`
(`username`, `referral_id`, `referral_rate`, `referral_daily`, `referral_total`) 
VALUES 
('$user_username','$c','0','0','0')";

$conn->query($basic);
$conn->query($referrals);
$conn->query($daily_ads);
$conn->query($acct_info);
$conn->query($account);

mysqli_close($conn);
}
// ?>