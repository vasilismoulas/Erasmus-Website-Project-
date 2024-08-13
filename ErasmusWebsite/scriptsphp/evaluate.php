<?php
include('dbconnect.php');

session_start();

$con = dbconnect();
if (!$con) {
    echo "problem in the connection";
} else {
    mysqli_select_db($con, "vasilis");
    
        if (isset($_POST['evaluation'])) {
            $evaluations = $_POST['evaluation'];
            
            // Update the database with the evaluation status
            foreach ($evaluations as $evaluation) {
                //$id = $evaluation['value'];
                $id = $evaluation;
                $query = "UPDATE requests SET Pending = 'checked' WHERE id = '$id'";
                mysqli_query($con, $query);

                // // Insert into results table
                // $insertQuery = "INSERT INTO results (apply_id) VALUES ('$id')";
                // mysqli_query($con, $insertQuery);
                //echo "foreach";
            }
        }
    
}

mysqli_close($con);
header("Location: ../applies-history.php");
?>