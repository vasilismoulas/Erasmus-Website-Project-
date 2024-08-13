<?php
include('dbconnect.php');

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
    $query = "SELECT * FROM deadlines";   
    // Execute the query
    $result = mysqli_query($con, $query);
    // Check if the query executed successfully
    if ($result) {
        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            //deadline exists in the database
            $response = true;
            $dline = mysqli_fetch_assoc($result);
            $DT = array(
              "response"=> $response, 
              "untilDT" => $dline['untilDT'],
              "fromDT"  => $dline['fromDT']
            );
        }
        else {
            //deadline does not exist in the database
            $response = false;
            $DT = array(
                "response"=> $response
              );
        }
    } 
    else {
        // Query execution failed
        echo "Query execution failed";
    }
}

echo json_encode($DT); //Sending the result back to the js file encoded with JSON//
mysqli_close($con);
?>