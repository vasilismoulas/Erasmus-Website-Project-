<?php
include('dbconnect.php');

session_start();
// Retrieve 'username' from **form** data
$username = $_POST['username'];

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
    $query = "SELECT username FROM users WHERE username = '$username'";
        
    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query executed successfully
    //$response = array();
    if ($result) {
        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            // Username exists in the database
            //echo "Username exists in the database";
            $response = true;
        }
        else {
            // Username does not exist in the database
            //echo "Username does not exist in the database";
            $response = false;
        }
    } 
    else {
        // Query execution failed
        echo "Query execution failed";
    }
}

echo json_encode($response); //Sending the result back to the js file encoded with JSON//
//echo $response;

mysqli_close($con);

//**WARNING**
//header("location: ../sign-up.php"); if you add this when using AJAXn http request, is going to send as a response all the page you redirect him.
?>