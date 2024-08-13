<?php
function universitie_values()
{


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

$universities = array(
    array("id" => null, "name" => null),
    array("id" => null, "name" => null),
    array("id" => null, "name" => null),
    array("id" => null, "name" => null),
    array("id" => null, "name" => null )
    );

$cnt = 0;   
while($row = mysqli_fetch_assoc($univers))
{
    $universities[$cnt]["name"] = $row["name"];
    $universities[$cnt]["id"]   = $row["id"];
    $cnt++;
}

   // Loop through the universities array to generate the options
   foreach ($universities as $university) {
       $id = $university['id'];
       $name = $university['name'];
   echo "<option id = '$id' value='$name'>$name</option>";
   }
}
?>