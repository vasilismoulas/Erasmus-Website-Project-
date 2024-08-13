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

<div id = 'universities-add'>
    <form id ='universities-add-form' action = 'scriptsphp/university_add.php' method = 'post'>
         <label style = "font-weight:bold; text-decoration: underline;">Εισαγωγή νέου Πανεπιστημίου: </label><br>

         <label>Όνομα: </label><br>
         <input type = 'text' name = 'un_name'></input><br>
         <input type = 'submit' value = 'Αποθήκευση'></input><br><br><br>
    </form>
</div>

<div id = 'universities-list'>
    <form id ='universities-list-form' action = '' method = 'post'>
         <label style = "font-weight:bold; text-decoration: underline;">Λίστα Συνεργαζώμενων Πανεπιστημίων: </label><br><br>
         <?php 
          include('scriptsphp/universities_list.php');
          //applieslist();
          ?>  
    </form>
</div>


<!--Script 1 -->
    <!-- Account Validation -->
    <script src ="scriptsjs/accountsec_validation.js"></script>



</body>
</html>