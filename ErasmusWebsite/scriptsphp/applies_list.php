<?php
include('dbconnect.php');

$sort_decrease_check = isset($_POST['sort-decrease-check'])?$_POST['sort-decrease-check']:"notchecked";

$success_rate_check = isset($_POST['rate-check'])?$_POST['rate-check']:"notchecked";
  if( isset($_POST['rate-check']))
  {
    $rate = $_POST['rate'];
  }
  else
  {
    $rate = NULL;
  }

$university_check = isset($_POST['university-check'])?$_POST['university-check']:"notchecked";
  if(isset($_POST['university-check']))
  {
    $university = $_POST['university'];
  }
  else
  {
    $university = NULL;
  }

  if ($sort_decrease_check != "notchecked" || $success_rate_check != "notchecked" || $university_check != "notchecked") {
    // Filters are applied, process the filters and modify the SQL query accordingly
    //echo "ok1";
    applieslistfilter($sort_decrease_check, $success_rate_check, $rate, $university, $university_check);
  } else {
    // No filters applied, retrieve all applies
    //echo "ok2";
    applieslist();
  }



function applieslistfilter($sort_decrease_check, $success_rate_check,$rate, $university,$university_check){

    $con = dbconnect();
    if (!$con)
    {
    echo json_encode("problem in the connection");
    }
    else
    {
         // Επιλογή της βάσης δεδομένων
         mysqli_select_db($con, "vasilis");
         // Prepare the SQL statement with placeholders
         $result = mysqli_query($con,"SELECT * FROM requests");  
    }
    mysqli_close($con);


    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    
    //Type of Filters Apllied
    if(isset($_POST['sort-decrease-check']))
    {
    usort($rows, function ($a, $b) {
        return $b['averagePassed'] - $a['averagePassed'];
        // To sort in descending order, use the following line instead:
        // return $b['averagePassed'] - $a['averagePassed'];
      });
    }



   if(mysqli_num_rows($result)>0) 
   {
    $cnt = 0;
       foreach($rows as $row)
       {
        if(isset($_POST['rate-check']) || isset($_POST['university-check'])) //If filters have been selected
        {  
          if(isset($_POST['rate-check']) && !isset($_POST['university-check']))  
          {
          if($row['percentPassed'] >= $rate)
          {
            echo $cnt," apply";
            echo "<br>";
            echo "Name: ",$row["name"]," ","LastName: ",$row["lastName"]," ","AM: ",$row["am"]," PercentPassed: ",$row["percentPassed"]," AveragePassed: ",$row["averagePassed"]," engLevel: ",$row["engLevel"]," addLang: ",$row["addLang"]," university1: ",$row["university1"]," university2: ",$row["university2"]," university3: ",$row["university3"];
            echo "<br>";
            //FILES
            $gradesPath = $row['gradesPath'];
            echo "<a id='pdf' href='$gradesPath' type='application/pdf' target='_blank'>grades</a><br>";
            $certEngPath = $row['certEngPath'];
            echo "<a id='pdf' href='$certEngPath' type='application/pdf' target='_blank'>grades</a><br><br>";
            
            if($row['certOtherLangPath'])
            {
               $certOtherLangPath = $row['certOtherLangPath'];
               echo "<a id='pdf' href='$certOtherLangPath' type='application/pdf' target='_blank'>grades</a><br><br>";
              //echo "<input type='checkbox'></input>";
            }
           $cnt++; 
          }
         }

         if(!isset($_POST['rate-check']) && isset($_POST['university-check']))  
          {
          if($row['university1'] == $university || $row['university2'] == $university || $row['university3'] == $university)
          {
            echo $cnt," apply";
            echo "<br>";
            echo "Name: ",$row["name"]," ","LastName: ",$row["lastName"]," ","AM: ",$row["am"]," PercentPassed: ",$row["percentPassed"]," AveragePassed: ",$row["averagePassed"]," engLevel: ",$row["engLevel"]," addLang: ",$row["addLang"]," university1: ",$row["university1"]," university2: ",$row["university2"]," university3: ",$row["university3"];
            echo "<br>";
            //FILES
            $gradesPath = $row['gradesPath'];
            echo "<a id='pdf' href='$gradesPath' type='application/pdf' target='_blank'>grades</a><br>";
            $certEngPath = $row['certEngPath'];
            echo "<a id='pdf' href='$certEngPath' type='application/pdf' target='_blank'>grades</a><br><br>";
            
            if($row['certOtherLangPath'])
            {
               $certOtherLangPath = $row['certOtherLangPath'];
               echo "<a id='pdf' href='$certOtherLangPath' type='application/pdf' target='_blank'>grades</a><br><br>";
               //echo "<input type='checkbox'></input>";
            }
           $cnt++; 
          }
         }

         if(isset($_POST['rate-check']) && isset($_POST['university-check']))
         {
            if(($row['percentPassed'] >= $rate) && ($row['university1'] == $university || $row['university2'] == $university || $row['university3'] == $university))
          {
            echo $cnt," apply";
            echo "<br>";
            echo "Name: ",$row["name"]," ","LastName: ",$row["lastName"]," ","AM: ",$row["am"]," PercentPassed: ",$row["percentPassed"]," AveragePassed: ",$row["averagePassed"]," engLevel: ",$row["engLevel"]," addLang: ",$row["addLang"]," university1: ",$row["university1"]," university2: ",$row["university2"]," university3: ",$row["university3"];
            echo "<br>";
            //FILES
            $gradesPath = $row['gradesPath'];
            echo "<a id='pdf' href='$gradesPath' type='application/pdf' target='_blank'>grades</a><br>";
            $certEngPath = $row['certEngPath'];
            echo "<a id='pdf' href='$certEngPath' type='application/pdf' target='_blank'>grades</a><br><br>";
            
            if($row['certOtherLangPath'])
            {
               $certOtherLangPath = $row['certOtherLangPath'];
               echo "<a id='pdf' href='$certOtherLangPath' type='application/pdf' target='_blank'>grades</a><br><br>";
               //echo "<input type='checkbox'></input>";
            }
           $cnt++; 
          }
         }
        }

        else                                                            //If filters haven't been selected
        {
         echo $cnt," apply";
         echo "<br>";
         echo "Name: ",$row["name"]," ","LastName: ",$row["lastName"]," ","AM: ",$row["am"]," PercentPassed: ",$row["percentPassed"]," AveragePassed: ",$row["averagePassed"]," engLevel: ",$row["engLevel"]," addLang: ",$row["addLang"]," university1: ",$row["university1"]," university2: ",$row["university2"]," university3: ",$row["university3"];
         echo "<br>";
         //FILES
         $gradesPath = $row['gradesPath'];
         echo "<a id='pdf' href='$gradesPath' type='application/pdf' target='_blank'>grades</a><br>";
         $certEngPath = $row['certEngPath'];
         echo "<a id='pdf' href='$certEngPath' type='application/pdf' target='_blank'>grades</a><br><br>";
         
         if($row['certOtherLangPath'])
         {
            $certOtherLangPath = $row['certOtherLangPath'];
            echo "<a id='pdf' href='$certOtherLangPath' type='application/pdf' target='_blank'>grades</a><br><br>";
            echo "<input type='checkbox'></input>";
         }
        $cnt++; 
        }
      } 
    }  
 } 

 function applieslist(){
    

    $con = dbconnect();
    if (!$con)
    {
    echo json_encode("problem in the connection");
    }
    else
    {
         // Επιλογή της βάσης δεδομένων
         mysqli_select_db($con, "vasilis");
         // Prepare the SQL statement with placeholders
         $result = mysqli_query($con,"SELECT * FROM requests");  
    }
    mysqli_close($con);

   if(mysqli_num_rows($result)>0) 
   {
    $cnt = 0;
       while($row = mysqli_fetch_assoc($result))
       {
         echo $cnt," apply";
         echo "<br>";
         echo "Name: ",$row["name"]," ","LastName: ",$row["lastName"]," ","AM: ",$row["am"]," PercentPassed: ",$row["percentPassed"]," AveragePassed: ",$row["averagePassed"]," engLevel: ",$row["engLevel"]," addLang: ",$row["addLang"]," university1: ",$row["university1"]," university2: ",$row["university2"]," university3: ",$row["university3"];
         echo "<br>";
         //FILES
         $gradesPath = $row['gradesPath'];
         echo "<a id='pdf' href='$gradesPath' type='application/pdf' target='_blank'>grades</a><br>";
         $certEngPath = $row['certEngPath'];
         echo "<a id='pdf' href='$certEngPath' type='application/pdf' target='_blank'>grades</a><br>";
         
         if($row['certOtherLangPath'])
         {
            $certOtherLangPath = $row['certOtherLangPath'];
            echo "<a id='pdf' href='$certOtherLangPath' type='application/pdf' target='_blank'>grades</a><br>";
         }
         echo "Evaluation: " . "<input type='checkbox' name='evaluation[]' value='" . $row['id'] . "'></input><br><br>"; 
        $cnt++; 
       }
    }  
 } 
 
    ?>