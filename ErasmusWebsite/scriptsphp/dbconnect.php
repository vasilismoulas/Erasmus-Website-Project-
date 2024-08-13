<?php
//session_start();
function dbconnect(){
$con = mysqli_connect("localhost","root",""); //default connection to phpmyAdmin DataBase
return $con;
}
?>