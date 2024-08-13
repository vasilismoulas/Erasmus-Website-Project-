<?php

$university_name = $_POST['un_name'];

include('dbconnect.php');
session_start();

$con = dbconnect();
if(!$con)
{
    echo "Something went wrong";
}
else
{
mysqli_select_db($con,"vasilis");
$univers = mysqli_query($con,"SELECT * FROM universities");

while($row = mysqli_fetch_assoc($univers))
{
    $code = $row['code'];
}
$code++;

$univers2 = mysqli_query($con,"INSERT INTO universities (name,code)  VALUES('$university_name','$code')");

}

mysqli_close($con);
header('location: ../results-universities.php');
?>