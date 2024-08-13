<?php

$con = mysqli_connect("localhost","root","");
if(!$con)
{
    echo "Something went wrong";
}
else
{
mysqli_select_db($con,"vasilis");
$univers = mysqli_query($con,"SELECT * FROM universities");

}

mysqli_close($con);


while($row = mysqli_fetch_assoc($univers))
{
    echo "University: ".$row['name'].", Code: ".$row['code'];
    echo "<br>";
}
?>