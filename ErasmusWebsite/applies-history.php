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

<div id = 'filter-container'>
<div><label style = "font-weight:bold; text-decoration: underline;">Φίλτρα</label></div><br>
    <form id ='filter' action = 'scriptsphp/applies_list.php' method = 'post'>
         <label>Φθίνουσα-Ταξινόμηση:</label>
         <input type = 'checkbox' name = 'sort-decrease-check' value = 'checked'></input><br>

         <label>Ποσοστό Επιτυχίας:</label>
         <input type = 'number' name = 'rate' min = '70' max = '100'></input>
         <input type = 'checkbox' name = 'rate-check' value = 'checked'></input><br>

         <label>Πανεπιστήμιο:</label>
         <select id="university" name = 'university'>
            <option id="0" value="-">-</option>
            <?php
              include ("scriptsphp/universities.php"); 
              universitie_values();
            ?>
         </select>
         <input type = 'checkbox' name = 'university-check' value = 'checked'></input><br>

         <label></label><br>
         <input type = 'submit' value = 'Φίλτρα'></input><br><br><br>
    </form>
</div>
    
<div id = 'evaluate-container'>
    <form id ='evaluate' action = 'scriptsphp/evaluate.php' method = 'post'>
         <?php 
          include('scriptsphp/applies_list.php');
          //applieslist();
          ?>
         <input type = 'submit' value = 'Αποθήκευσε'></input><br><br><br>
    </form>
</div>

<div><a href = 'results.php'>Δεκτές Αιτήσεις</a><br><br></div>

<!--Script 1 -->
    <!-- Account Validation -->
    <script src ="scriptsjs/accountsec_validation.js"></script>



</body>
</html>