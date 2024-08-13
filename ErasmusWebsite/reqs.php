<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirments | DIT & Erasmus+</title>
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
    <div id="outer-reqs">
        <div id="reqs-text"><div id="reqs-just-the-text">Σε αυτήν την σελίδα θα μάθεις όλες τις απαιτήσεις σχετικά με τις δηλώσεις συμμετοχής του προγράμματος Erasmus+</div></div> 
        <div id="table">
            <table border="1">
                <thead>
                    <tr>
                        <th>Απαίτηση</th>
                        <th>Τουλάχιστον</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Τρέχον έτος σπουδών </td>
                        <td>μεγαλύτερο ή ίσο του 2ου έτους</td>
                    </tr>
                    <tr>
                        <td>Ποσοστό «περασμένων» μαθημάτων έως το προηγούμενο έτος σπουδών</td>
                        <td>μεγαλύτερο ή ίσο του 70% του συνόλου των μαθημάτων</td>
                    </tr>
                    <tr>
                        <td>Μέσος όρος των «περασμένων» μαθημάτων έως το προηγούμενο έτος σπουδών</td>
                        <td>μεγαλύτερος ή ίσος του 6.50</td>
                    </tr>
                    <tr>
                        <td>Πιστοποιητικό γνώσης της αγγλικής γλώσσας</td>
                        <td>κατ’ ελάχιστον «καλή γνώση της αγγλικής γλώσσας», που αντιστοιχεί σε επίπεδο B2 ή ανώτερο</td>
                    </tr>
                </tbody>
        </table>
        </div>
        <br>
        <div id="before-form">Ας ελέγξουμε αν μπορείς να κάνεις αίτηση:</div>
        <br>
        <div id="reqs-form">
        <form>
            <label>Έτος Σπουδών</label>
            <select id="year">
                <option value="1">1ο έτος</option>
                <option value="2">2ο έτος</option>
                <option value="3">3ο έτος</option>
                <option value="4">4ο έτος</option>
                <option value="5">μεγαλύτερο</option>
            </select>
        <br><br>
        <label for="classes-passed">Ποσοστό "περασμένων" μαθημάτων:</label>
        <input type="number" id="classes-passed" min="0" max="100" step="1">
        <br><br>
        <label for="average-grade">Μέσος όρος "περασμένων" μαθημάτων:</label>
        <input type="number" id="average-grade" min="0" max="10" step="0.1">
        <br><br>

        <label ><input type="radio" name="engLevelReqs" value="A1" onclick = deselectRadio(this)> A1 </label>
        <label ><input type="radio" name="engLevelReqs" value="A2" onclick = deselectRadio(this)> A2 </label> 
        <label ><input type="radio" name="engLevelReqs" value="B1" onclick = deselectRadio(this)> B1 </label> 
        <label ><input type="radio" name="engLevelReqs" value="B2" onclick = deselectRadio(this)> B2 </label> 
        <label ><input type="radio" name="engLevelReqs" value="C1" onclick = deselectRadio(this)> C1 </label> 
        <label ><input type="radio" name="engLevelReqs" value="C2" onclick = deselectRadio(this)> C2 </label>

        <br><br>      
            <input type="submit" value="Submit"><br><br>
            <label id = result style = "color : #FA0000"></label> <!--Printing the **result** IF the student is able or not to participate in the Erasmus Project -->
        </form>
        </div>
        <br><br>

        <div id="before-pdf"> Κάποιες επιπλέον πληροφορίες σχετικά με το πρόγραμμα:</div>
        <br>
        <div class="pdf-container">
            <embed id="pdf" src="assets/erasmus+_guide.pdf" type="application/pdf" />
        </div>
        <br>
        <div id="after-pdf">Μπορείς να το κατεβάσεις πατώντας <a href="assets/erasmus+_guide.pdf" download>εδώ</a> σε περίπτωση που
                            είσαι απο κινητό ή τάμπλετ (ή άμα θες ακόμα και από υπολογιστή!)
        </div>
    </div>

    <div><label id = "results-label" style = "color : #FA0000; font-size: 24px;"><label></div>
    <label id="deadlineInfo"  style = "color : #FA0000; font-size: 20px; display : none;"></label><br>
    <label id="deadlineInfo2" style = "color : #FA0000; font-size: 20px; display : none;"></label><br>
    <div><a id = "results" href = 'results.php' style = 'display: none'>Αποτελέσματα Αιτήσεων</a></div><br><br>   
   <!--Script 1 -->
   <!-- Radio Buttons Unchecking Through JS -->
   <script src ="scriptsjs/radiob_diselect.js"></script>  

    <!--Script 2 -->
    <!-- Requirements filling results -->
    <script src ="scriptsjs/reqs_formhandle.js"></script>

    <!--Script 3 -->
    <!-- Account Validation -->
    <script src ="scriptsjs/accountsec_validation.js"></script>

    <!--Script4 -->
    <script>//window.location.href = "your-script.php";
    var label = document.getElementById("results-label");
    var results = document.getElementById("results");

              //AJAX API (sending  deadline information to the server-side)(2)
             let xhr3 = new XMLHttpRequest();
             xhr3.open("POST","scriptsphp/deadline_validation.php",true);
             xhr3.onreadystatechange = function(){
                 if(xhr3.readyState==4 && xhr3.status==200)
                 {
                    console.log("hey");
                     var response = JSON.parse(xhr3.responseText);
                     //console.log(response);
                     var res = response["response"];
                     var untilDT = response["untilDT"];
                     var fromDT = response["fromDT"];
     
                     var deadlinefrom = new Date(fromDT);
                     var deadlineuntil = new Date(untilDT);
                     //The deadline is seted up if response == true
                     if(res == true)
                     {
                        
                         var now = new Date();//from
                         if (now<deadlinefrom || now>deadlineuntil) 
                         {
                            
                          //console.log("now>deadline");
                          // Deadline has passed, disable or hide the form
                           if(now<deadlinefrom)
                           {
                             
                             label.textContent = "Η Προθεσμία για την Υποβολή Αιτήσεων δεν έχει αρχίσει";
                           }
                           if(now>deadlineuntil)
                          {
                             
                             label.textContent = "Η Προθεσμία για την Υποβολή Αιτήσεων έληξε";
                             results.style.display = "block";
                             
                          }
     
                         }   

                         else
                         {

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
                            deadlineInfoDiv.style.display = "block";
                            }
                            // Create the deadline information string
                            var deadlineInfo2 = '(απομένουν ' + days + ' ημέρες ' + hours + ' ώρες ' + minutes + ' λεπτά)'; 
                            // Display the deadline information in the div
                            var deadlineInfoDiv2 = document.getElementById('deadlineInfo2');
                            deadlineInfoDiv2.textContent = deadlineInfo2;
                            deadlineInfoDiv2.style.display = "block";
                         }
                      }
                     else
                     {
                       label.textContent = "Δεν έχει οριστεί Προθεσμία";    
                     }
                 }
             }
             xhr3.send(); //(2) deadline
    </script>
</body>
</html>