<!DOCTYPE html>
<html lang="en">
<?php
  include ("scriptsphp/register.php");
  register();
?>
<!--FOR (B) QUERY I NEED TO CREATE A TABLE IN DB FOR REQUESTS/APPLICATIONS history -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application | DIT & Erasmus+</title>
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
                    <li><a href="myaccount.php" class="nav-categories account" id="account" style = "display:block; margin-left: 32px;" >ΛΟΓΑΡΙΑΣΜΟΣ</a></li>
                </ul>
            </div>
    </div>
    <div id="outer-app">
            <!-- DeadLine (Only Admin Visible!)-->
            <!-- Deadline container-->
        <div id = "deadlineLabel" style="color:#FA0000; display: none;">Προθεσμία</div>
        <form id = "form-deadline" style = "display: none">   <!--onsubmit = "deadline(this)"--->
        <div id = "deadline-app"> 
            <label id = "fromLabel" for="from" style = "grid-column: 1/2; grid-row: 1/2">Απο:</label>
            <input id = "from" style = "grid-column: 1/2; grid-row: 2/3;"type="text" required>
  
            <label id = "untilLabel" for="until" style = "grid-column: 2/3; grid-row: 1/2">Εώς:</label>
            <input id = "until" style = "grid-column: 2/3; grid-row: 2/3;" type="text" required>

            <input type = "submit">
        </div> 
        </form>     

        <div id="deadline-app-form" style="color:#FA0000"></div>
        <div id="before-app-form">Αίτησης μετακίνησης προς Πανεπιστήμιο του εξωτερικού:</div><br>
        <form id = "myForm" name = form>
            <label for="name">Όνομα:</label>
            <input type="text" id="name" readonly><br><br>
  
            <label for="lastName">Επίθετο:</label>
            <input type="text" id="lastName" readonly><br><br>

            <label for="am">Αριθμός μητρώου:</label>
            <input type="text" id="am" readonly><br><br>

            <label for="percentPassed">Ποσοστό "περασμένων" μαθημάτων:</label>
            <input type="number" id="percentPassed" min="0" max="100" step="1" required><br><br>

            <label for="averagePassed">Μέσος όρος "περασμένων" μαθημάτων:</label>
            <input type="number" id="averagePassed" min="0" max="10" step="0.1" required><br><br>
            
            <label>Πιστοποιητικό γνώσης της αγγλικής γλώσσας:</label><br>
            <label><input type="radio" name="engLevel" value="1" required> A1 </label>
            <label><input type="radio" name="engLevel" value="2"> A2 </label> 
            <label><input type="radio" name="engLevel" value="3"> B1 </label> 
            <label><input type="radio" name="engLevel" value="4"> B2 </label> 
            <label><input type="radio" name="engLevel" value="5"> C1 </label> 
            <label><input type="radio" name="engLevel" value="6"> C2 </label><br><br>     
            
            <label>Γνώση επιπλέον ξένων γλωσσών:</label><br>
            <label><input type="radio" name="addLang" value="Yes"> Ναι </label>
            <label><input type="radio" name="addLang" value="No"> Όχι </label><br><br> 

            <label>Πανεπιστήμιο - 1η επιλογή:</label>
            <select id="university1"  required>
                <option id = '0' value="-">-</option>
                <?php
                include ("scriptsphp/universities.php"); 
                universitie_values();
                ?>
            </select><br><br>

            <label>Πανεπιστήμιο - 2η επιλογή:</label>
            <select id="university2">
                <option id = '0' value="-">-</option>
                <?php
                universitie_values();
                ?>
            </select><br><br>

            <label>Πανεπιστήμιο - 3η επιλογή:</label>
            <select id="university3">
                <option id = '0' value="-">-</option>
                <?php
                universitie_values();
                ?>
            </select><br><br>
            <a id ="partner-universities" href="results-universities.php" style="display:none">Λίστα Συνεργαζώμενων Πανεπιστήμιων</a><br>

            <label for="grades">Αναλυτική βαθμολογία:</label>
            <input type="file" id="grades"  name="grades" accept=".pdf" required><br><br>

            <label for="certEng">Πτυχίο αγγλικής γλώσσας:</label>
            <input type="file" id="certEng"  name="certEng" accept=".pdf" multiple required><br><br>

            <label for="certOtherLang">Πτυχία άλλων ξένων γλωσσών</label>
            <input type="file" id="certOtherLang" name="certOtherLang" accept=".pdf" multiple><br><br>

            <label>Αποδοχή των όρων:</label>
            <input type="checkbox" name="tos" value="yes" required><br><br>

            <input type="submit" value="Submit"><br><br>

            <a id ="applieshistory" href="applies-history.php" style="display:none">Ιστορικό Αιτήσεων</a>

            <label id = "result" style = "color : #FA0000; font-size: 24px;"></label><br>

            <label id="deadlineInfo"  style = "color : #FA0000; font-size: 20px;"></label><br>
            <label id="deadlineInfo2" style = "color : #FA0000; font-size: 20px;"></label>
        </form>
    </div>
    <!--Script 1 -->
   <script src = "scriptsjs/application_formhandle.js"></script>
    <!--Script 2 -->
    <!-- pre-filled fields (not editable by the user) -->
    <script>
         //AJAX http request
    let xhr1 = new XMLHttpRequest();
    xhr1.open("POST","scriptsphp/session_details.php",true);
    xhr1.onreadystatechange = function(){
       if(xhr1.readyState==4 && xhr1.status==200)
       {
          console.log("script2 if");
          var response = JSON.parse(xhr1.responseText);  
          var nameType = document.getElementById('name');
          var lastName = document.getElementById('lastName');
          var am = document.getElementById('am');      
          nameType.value = response.nameType;
          lastName.value = response.lastName;
          am.value = response.am;
          console.log("script2"+response.nameType+" "+response.lastName+" "+response.am);
       }
    }
    xhr1.send();
  
    </script>

     <!-- Script 3 -->
     <script src = "scriptsphp/application_retuniversities.php"></script>

    <!-- Script 4 -->
    <script src = "scriptsjs/application_setdeadline.js"> </script>

<!-- Script 5 -->
   <script>
     //Submit
     var formf = document.getElementById("form-deadline");
     formf.addEventListener("submit",function(event){
       
        event.preventDefault();

        var form = document.getElementById("myForm");
        var header = document.getElementById("before-app-form")
        var header2 = document.getElementById("deadline-app-form");
        var body = document.querySelector("body");
        //Retrieving inputs values
        var from = document.getElementById("from").value;
        var until= document.getElementById("until").value;
        console.log(until);
        //var deadline = new Date(until);//until it should be like -> until = '2023-07-30T13:30:00'
        var deadlinefrom = new Date(from);
        var deadlineuntil = new Date(until);
        //We **STORE** the dealine information to our daedlines TABLE in vasilis BD
        //AJAX API (sending  deadline information to the server-side)
        var xhr = new XMLHttpRequest();
        xhr.open("POST","scriptsphp/deadline.php",true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4 && xhr.status==200)
            {
                //var response = JSON.parse(xhr.responseText);
                //console.log(response);
            }
        }
        var formData = new FormData();
        formData.append('from',from);
        formData.append('until',until);
        xhr.send(formData);


        var now = new Date();//from
        if (now<deadlinefrom || now>deadlineuntil) 
        {
            //console.log("now>deadline");
            // Deadline has passed, disable or hide the form
           if(now<deadlinefrom)
           {
            if (form) 
            {
            form.style.opacity = '0.5'; // Set the desired opacity
            form.style.pointerEvents = 'none'; // Disable pointer events on the form
            header.style.opacity = '0.5';
            body.style.overflow = 'hidden';
            header2.textContent = "Η Προθεσμία για την Υποβολή Αιτήσεων δεν έχει αρχίσει";
           }
          }
          if(now>deadlineuntil)
          {
            if (form) 
            {
            form.style.opacity = '0.5'; // Set the desired opacity
            form.style.pointerEvents = 'none'; // Disable pointer events on the form
            header.style.opacity = '0.5';
            body.style.overflow = 'hidden';
            header2.textContent = "Η Προθεσμία για την Υποβολή Αιτήσεων έληξε";
           }
          }

        } 
        else {
            //console.log("else");
            if (form) 
            {
            form.style.opacity = '1'; // Set the desired opacity
            form.style.pointerEvents = 'auto'; // Disable pointer events on the form
            header.style.opacity = '1';
            body.style.overflow = 'visible';
            header2.textContent = "";
           }
            // Calculate the remaining time
            var remainingTime = deadlineuntil - now;
            var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            
            // Create the deadline information string
            var deadlineInfo = deadlineuntil.toLocaleString('el-GR', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });

            // Display the deadline information in the div
            var deadlineInfoDiv = document.getElementById('deadlineInfo');
            if (deadlineInfoDiv) {
                //console.log("info");
                deadlineInfoDiv.textContent = "(Προθεσμία:  "+deadlineInfo+")";
            }
             // Create the deadline information string
             var deadlineInfo2 = '(απομένουν ' + days + ' ημέρες ' + hours + ' ώρες ' + minutes + ' λεπτά)'; 
             // Display the deadline information in the div
             var deadlineInfoDiv2 = document.getElementById('deadlineInfo2');
               deadlineInfoDiv2.textContent = deadlineInfo2;
        }
     });
    </script>

</body>
</html>