<!DOCTYPE html>
<html lang="en">
<?php
  //session_set_cookie_params(0);
  session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | DIT & Erasmus+</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div id="header" name="header">
    <div id="erasmusHeader" name="erasmusHeader">Erasmus+<br><div id="smaller">Explore the world around you!</div></div>  

        <div id="categories" name="categories">
            <ul class="menu-items">
                <li><a href="index.php" class="nav-categories" id="main">ΑΡΧΙΚΗ</a></li>
                <li><a href="more.php" class="nav-categories" id="more">ΠΕΡΙΣΣΟΤΕΡΑ</a></li>
                <li><a href="reqs.php" class="nav-categories" id="reqs">ΕΛΑΧΙΣΤΕΣ ΑΠΑΙΤΗΣΕΙΣ</a></li>
                <li><a href="application.php" class="nav-categories" id="application">ΑΙΤΗΣΗ</a></li>
                <li><a href="sign-up.php" class="nav-categories" id="sign-up">ΕΓΓΡΑΦΗ</a></li>
                <li><a href="login.php" class="nav-categories" id="login">ΕΙΣΟΔΟΣ</a></li>
                <li><a href="myaccount.php" class="nav-categories account" id="account">ΛΟΓΑΡΙΑΣΜΟΣ</a></li>
            </ul>
        </div>
</div>  

<!--Script 1 -->
    <!-- Account Validation -->
    <script src ="scriptsjs/accountsec_validation.js"></script>


    <?php
        include('scriptsphp/dbconnect.php');

        $con = dbconnect();
        if (!$con)
        {
        echo "problem in the connection";
        }
        else
        {
        //echo "All good";
        mysqli_select_db($con, "vasilis");
        $result = mysqli_query($con, "SELECT * FROM requests WHERE pending = 'checked' ");

        if(mysqli_num_rows($result)>0)
        {
            $cnt = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                echo $cnt," apply";
                echo "<br>";
                echo "Name: ",$row["name"]," ","LastName: ",$row["lastName"]," ","AM: ",$row["am"]," PercentPassed: ",$row["percentPassed"]," AveragePassed: ",$row["averagePassed"]," engLevel: ",$row["engLevel"]," addLang: ",$row["addLang"]," university1: ",$row["university1"]," university2: ",$row["university2"]," university3: ",$row["university3"]," Pending: ","Accepted";
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
                echo "<br><br>";
                $cnt++; 
            }
        } 
        else 
        {
            
        }
        
        }
        mysqli_close($con);
        //echo "The User is considered now Registered";
        //header("location: ../sign-up.php"); 
        ?>
</body>
</html>