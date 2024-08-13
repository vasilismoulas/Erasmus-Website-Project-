<?php
include('dbconnect.php');

$from  = $_POST['from'];
    $date1 = new DateTime();
    $datetimefrom = $date1->format($from);
$until = $_POST['until'];
    $date2 = new DateTime();
    $datetimeuntil = $date2->format($until);




$con = dbconnect();
if(!$con)
{
    echo 'a problem occured during the connection';
}
else
{
  mysqli_select_db($con,"vasilis");
  mysqli_query($con,"DELETE FROM deadlines");
  mysqli_query($con,"INSERT INTO deadlines (fromDT,untilDT) VALUES (' $datetimefrom','$datetimeuntil')");
}

mysqli_close($con);

?>