<?php
include('dbconnect.php');
session_start();

$username = $_SESSION['username'];

//$con = mysqli_connect("localhost","root","");
$con = dbconnect();

if(!$con)
{
    echo "Something went wrong with the connection in the db";
}
else
{
    mysqli_select_db($con,"vasilis");
    $result = mysqli_query($con,"SELECT name,lastName,am,telephone FROM users WHERE username = '$username'");
}

$row = mysqli_fetch_assoc($result);
$response = array();

if(!$row)
{
  $response['error'] = "error";
  echo json_encode($response);
}
else
{
  $response['nameType'] = $row['name'];
  $response['lastName'] = $row['lastName'];
  $response['am'] = $row['am'];
  $response['telephone'] = $row['telephone'];

  echo json_encode($response); 
}
mysqli_close($con);
// $response = array(
//     'name'    =>$row['name'],
//     'lastName'=>$row['lastName'],
//     'am'      =>$row['am']
//   );
?>