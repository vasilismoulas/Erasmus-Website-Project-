<?php
include('dbconnect.php');

session_start();
// Retrieve other form data
$name = $_POST['name'];
$lastname = $_POST['lastName'];
$am = $_POST['am'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$password = $_POST['password'];
  //Password Hashing
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$username = $_SESSION['username'];

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
mysqli_query($con, "UPDATE users SET name = '$name', lastname = '$lastname', am = '$am', email = '$email', telephone = '$tel', password = '$hashedPassword'  WHERE username = '$username'");  
}

mysqli_close($con);


echo "Οι Αλλαγές των στοιχείων σου έγιναν αποδεκτές";

//header("location: ../myaccount.php"); 
?>