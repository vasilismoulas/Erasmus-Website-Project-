<?php
include('dbconnect.php');

session_start();
// Retrieve other form data
$username = $_POST['username'];
$password = $_POST['password'];

$hashedpassword = password_hash($password,PASSWORD_BCRYPT);

$account;
//$con = mysqli_connect("localhost","root","");
$con = dbconnect();
if (!$con)
{
echo "problem in the connection";
}
else
{
//echo "All good";
mysqli_select_db($con, "vasilis");
$response = mysqli_query($con, "SELECT username , password FROM users WHERE username = '$username' ");

 if(mysqli_num_rows($response)>0)
 {
    $row = mysqli_fetch_assoc($response);
     //if(password_verify($hashedpassword,$row["password"]))
     if($password == $row["password"])
     {
     $account = true;
      //Assign username to session variable so the user can have all the benefits
     $_SESSION['username'] = $username;
     $_SESSION['password'] = $password;
     }
     else
     {
         $account = false;
     }
 } 
 else 
 {
     $account = false;
 }
 
}

mysqli_close($con);

echo $account;
//echo "The User is considered now Registered";
//header("location: ../sign-up.php"); 
?>