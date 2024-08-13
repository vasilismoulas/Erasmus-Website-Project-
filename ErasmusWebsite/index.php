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
    
<main>
    <div class="basic-grid">
        <div class="card">Το πρόγραμμα Erasmus+ είναι το πιο δημοφιλές πρόγραμμα ανταλλαγής φοιτητών στην Ευρώπη, που
                              παρέχει στους νέους τη δυνατότητα να σπουδάσουν σε διάφορες χώρες της ΕΕ και να αποκτήσουν
                              εμπειρία και δεξιότητες που θα τους βοηθήσουν στην επαγγελματική τους σταδιοδρομία. <br><br>
                              Το πρόγραμμα προσφέρει επίσης ευκαιρίες για πρακτική άσκηση, εθελοντική εργασία και εκπαίδευση
                              σε πολλούς τομείς, καθιστώντας το ένα από τα πιο πολυπληθή και επιτυχημένα προγράμματα της ΕΕ.<br><br>
        </div>
        <div class="card" id="card2"> <img src="assets/images/Erasmus_person.png" id="erasmus-person"></div>
        <div class="card">Σε αυτό τον ιστότοπο θα βρεις όλες τις απαραίτητες πληροφορίες για το πρόγραμμα 
                            Erasmus+. Μπορείς να δεις τις ελάχιστες απαιτήσεις για να συμμετάσχεις σε αυτό, 
                            να μάθεις περισσότερα σχετικά με το πρόγραμμα και να συνδεθείς σε περίπτωση που 
                            θέλεις να κάνεις αίτηση συμμετοχής.<br><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed dui quis nisi bibendum suscipit
                            eu a metus. Aliquam lobortis interdum magna sit amet facilisis.
        </div>
        <div class="card" id="card4"> <img src="assets/images/erasmus-circle.png" id="erasmus-circle"></div>
        <div class="card">Το πρόγραμμα Erasmus+ παρέχει επίσης τη δυνατότητα πρακτικής άσκησης σε επιχειρήσεις και οργανισμούς
                          σε άλλες χώρες της ΕΕ. Μέσω αυτής της εμπειρίας, οι φοιτητές αποκτούν πρακτικές δεξιότητες και εμπειρία
                          εργασίας σε διεθνές περιβάλλον. Επίσης, μπορούν να εθελοντική εργασία σε κοινότητες σε άλλες χώρες της
                          ΕΕ και να συμβάλουν σε κοινωνικά και περιβαλλοντικά προγράμματα.</div>
        <div class="card"> <img src="assets/images/uop-logo-circle.png" id="uop-logo-circle"></div>
    </div>
        <div class="like-footer card"> 
            <img src="assets/images/erasmus-cities.jpg" id="erasmus-cities"> 

                    
    </div>
</main>
<!--Script 1 -->
    <!-- Account Validation -->
    <script src ="scriptsjs/accountsec_validation.js"></script>
</body>
</html>