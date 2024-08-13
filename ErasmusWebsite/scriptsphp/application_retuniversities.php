<?php
include('dbconnect.php');
session_start();

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
    $query = "SELECT name,code FROM universities";
    // Execute the query
    $result = mysqli_query($con, $query);
}

echo json_encode($result); //Sending the result back to the js file encoded with JSON//
//echo $response;

mysqli_close($con);

//**WARNING**
//header("location: ../sign-up.php"); if you add this when using AJAXn http request, is going to send as a response all the page you redirect him.
?>
