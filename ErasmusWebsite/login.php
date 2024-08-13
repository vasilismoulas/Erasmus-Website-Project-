<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in | DIT & Erasmus+</title>
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
    <div id="outer-login">
        <p>Συνδέσου!</p><br><br>
        <form id="login-form">
            <label for="username">Username:</label>
            <input type="text" id="username"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password"><br><br>

            <label id = "userpassLabel" style = "color : #FA0000; font-size: 12px;"></label><br>

            <input type="submit" value="Σύνδεση"><br><br>

            <div><a href = sign-up.php>Δεν έχεις λογαριασμό;</a><div>

        </form>
</div>
<!--Script 1 -->
    <!-- Account Validation -->
    <script src ="scriptsjs/accountsec_validation.js"></script>

<!--Script 2 -->
    <!-- Account Validation -->
    <script>
          var username = document.getElementById('username');
          var password = document.getElementById('password');
          var label = document.getElementById('userpassLabel');
          var form = document.getElementById('login-form');
          console.log("heyyyy");

        form.addEventListener("submit",function(event){

            event.preventDefault();

            console.log("heyyyy2");
            var xhr = new XMLHttpRequest;
            //AJAX http request    
            xhr.open("POST","scriptsphp/login_validation.php",true);

            xhr.onreadystatechange = function(){
            if(xhr.readyState==4 && xhr.status==200)
            {
                console.log("heyyyy3");
               // var response = JSON.parse(xhr.responseText);
                var response = xhr.responseText;
                console.log(response);
                   if(response == true)
                   {
                     console.log("heyyyy4.1");
                     label.textContent = "";
                       setTimeout(function() {
                       location.reload();
                       window.location.href = "myaccount.php";
                       }, 1000)
                   }
                   else
                   {
                     label.textContent = "Το username ή το password ενδέχεται να είναι λανθασμένα";
                     console.log("heyyyy4.2");
                   }
            } 
            }
            var formdata = new FormData();

            formdata.append('username',username.value);
            formdata.append('password',password.value);

            xhr.send(formdata);  
        });
    </script>

</body>
</html>