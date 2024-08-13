<?php
include('dbconnect.php');

session_start();
// Retrieve other form data
$name = $_POST['name'];
$lastname = $_POST['lastName'];
$am = $_POST['am'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
  //Password Hashing
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$confpassword = $_POST['confpassword'];

//Later we add the data of each user after he submited them, and if they are valid, to the Data Bases Table
//After that the user is consodered **registered**
$message = "The User is considered now Registered";
//$con = mysqli_connect("localhost","root","");
$con = dbconnect();
if (!$con)
{
echo "problem in the connection";
}
else
{
//echo "All good";
// Assign username to session variable so the user can have all the benefits
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
mysqli_select_db($con, "vasilis");
mysqli_query($con, "INSERT INTO users (name, role, lastname, am, email, telephone, username, password) VALUES ('$name', 'registered_user', '$lastname', '$am', '$email', '$tel', '$username', '$password')");
}

mysqli_close($con);

//echo json_encode($message);
echo "The User is considered now Registered";

header("location: ../myaccount.php"); 
?>