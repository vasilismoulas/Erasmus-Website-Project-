<?php

include('dbconnect.php');

session_start();
// Retrieve 'username' from **form** data
$username = $_SESSION['username'];
$response;
$role;
//Later we add the data of each user after he submited them, and if they are valid, to the Data Bases Table
//After that the user is consodered **registered**

$con = dbconnect();
if (!$con)
{
echo "problem in the connection";
}
else
{
    //echo "All good";
    mysqli_select_db($con, "vasilis");

    // Prepare the query to check if the username exists in the 'users' table
    $query = "SELECT username,role FROM users WHERE username = '$username'";
       
    // Execute the query
    $result = mysqli_query($con, $query);
    $response = mysqli_fetch_assoc($result);
    $role = $response['role'];
    echo json_encode($role);
}
mysqli_close($con);

?>