<!DOCTYPE html>
<html lang="en"></html>
<?php
  session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up | DIT & Erasmus+</title>
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
                    <li><a href="myaccount.php" class="nav-categories account" id="account" >ΛΟΓΑΡΙΑΣΜΟΣ</a></li>
                </ul>
            </div>
    </div>  

    <div id="outer-signup">
       <label id = headerLabel>Εγγράψου και ετοιμάσου!</label><br><br>
         <!--action="scriptsphp/sign-up-register.php   onsubmit = submit() -->
        <form id="signup-form" method="post">

            <label for="name">Όνομα:</label>
            <input type="text" pattern = "[a-zA-Z]+" title = "Επιτρέπονται μόνο γράμματα" id="name" name="name" maxlength="20" required><br>
            <label id = nameLabel style = "color : #FA0000; font-size: 12px;"></label><br>
  
            <label for="lastName">Επίθετο:</label>
            <input type="text"  pattern = "[a-zA-Z]+" title = "Επιτρέπονται μόνο γράμματα" id="lastName" name="lastName" maxlength="20" required><br>
            <label id = lastNameLabel style = "color : #FA0000; font-size: 12px;"></label><br>

            <label for="am">Αριθμός μητρώου:</label>
            <input type="text" pattern = "^(2022|2023|2024)[0-9]+" title = "Αποκλειστικά αποτελείται από ψηφία.Πιο συγκεκριμένα, αποτελείται από 13 ψηφία και τα 4 πρώτα θα πρέπει να είναι υποχρεωτικά είτε 2022 είτε 2024 είτε 2025" id="am" name="am" minlength="13" maxlength="13" required><br>
            <label id = amLabel style = "color : #FA0000; font-size: 12px;"></label><br>
            <label id = amLabel2 style = "color : #FA0000; font-size: 12px;"></label><br>

            <label for="tel">Τηλέφωνο:</label>
            <input type="tel" pattern = "[0-9]+"  title = "Αποκλειστικά αποτελείται από ψηφία" id="tel" name="tel" minlength="10" maxlength="10" required><br>
            <label id = telLabel style = "color : #FA0000; font-size: 12px;"></label><br>

            <label for="email">Email:</label> <!--pattern = /^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,63}$/ -->
            <input type="email" id="email" name="email" required><br>
            <label id = emailLabel style = "color : #FA0000; font-size: 12px;"></label><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username"  maxlength="20" required><br>
            <label id = usernameLabel style = "color : #FA0000; font-size: 12px;"></label><br>

            <label for="password">Password:</label>
            <input type="password" pattern = "^(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9\s]).+$" title = "Αποτελείται από τουλάχιστον 5 χαρακτήρες και υπάρχει τουλάχιστον ένας χαρακτήρας-σύμβολο (π.χ. !, #, $) πέρα από γράμματα/ψηφία" id="password" name="password" maxlength="20" required><br>
            <label id = passwordLabel style = "color : #FA0000; font-size: 12px;"></label><br>
            <label id = passwordLabel2 style = "color : #FA0000; font-size: 12px;"></label><br>

            <label for="confpassword">Confirm password:</label>
            <input type="password" id="confpassword" name="confpassword" maxlength="20" required><br>
            <label id = confpasswordLabel style = "color : #FA0000; font-size: 12px;"></label><br>

            <input type="submit" value="Submit"><br><br>

            <div><a href = login.php >Έχεις ήδη λογαριασμό;</a></div>
        </form>
    </div>
    <!--Script 1 -->
    <!-- Requirements filling results -->
    <script src = "scriptsjs/signup_formhandle.js"> </script>

    <!--Script 2 -->
    <!-- Account Validation -->
    <script src ="scriptsjs/accountsec_validation.js"></script>
</body>
</html>