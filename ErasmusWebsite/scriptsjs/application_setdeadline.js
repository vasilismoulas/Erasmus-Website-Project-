
         //We have to identify if the user is just a regular registered user or not
         //if he has the role of an admin, then he will be able to define a deadline for the candidates to apply
         //**AJAX** http request (1)
         let xhr  = new XMLHttpRequest();
         xhr.open("POST","scriptsphp/application_formhandle.php",true);
         xhr.onreadystatechange = function(){

         if(xhr.readyState==4 && xhr.status==200)
         {
            
           var response = JSON.parse(xhr.responseText);
           console.log(response);
     
             if(response == 'admin'){
             //var deadline = new Date('2023-07-30T13:30:00');
             var form = document.getElementById("myForm");
             var header = document.getElementById("before-app-form")
             var header2 = document.getElementById("deadline-app-form");
             var body = document.querySelector("body");
     
             //Form visibility
             var form_deadline = document.getElementById("form-deadline");
             var apllies_history = document.getElementById("applieshistory");
             var partner_universities = document.getElementById("partner-universities");
             form_deadline.style.display = "block";
             apllies_history.style.display = "block";
             partner_universities.style.display = "block";
             //Only admin visble inputs and labels
             //Inputs
              //var from = document.getElementById("from");
              //var until= document.getElementById("until");
             //Labels
              //var deadlineLabel = document.getElementById("deadlineLabel");
              //var fromLabel  = document.querySelector('label[for = "from"]');
              //var untilLabel = document.querySelector('label[for = "until"]');
             //Display:block
             //deadlineLabel.style.display = "block";
             //from.style.display = "block";
             //until.style.display = "block";
             //fromLabel.style.display = "block";
             //untilLabel.style.display = "block";
            //   if (form) {
            //       form.style.opacity = '0.5'; // Set the desired opacity
            //       form.style.pointerEvents = 'none'; // Disable pointer events on the form
            //       header.style.opacity = '0.5';
            //       body.style.overflow = 'visible';
            //       //header2.textContent = "Δεν έχει οριστεί Προθεσμία";
            //      } 
          
             //AJAX API (sending  deadline information to the server-side)(2)
            let xhr2 = new XMLHttpRequest();
            xhr2.open("POST","scriptsphp/deadline_validation.php",true);
            xhr2.onreadystatechange = function(){
                if(xhr2.readyState==4 && xhr2.status==200)
                {
                    var response = JSON.parse(xhr2.responseText);
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
                                            //var deadline = new Date('2023-07-30T13:30:00');
                            var form = document.getElementById("myForm");
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
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
                                          //var deadline = new Date('2023-07-30T13:30:00');
                            var form = document.getElementById("myForm");
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
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
                        else 
                        {
                            var form = document.getElementById("myForm");
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
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
                    }
                    if(res == false)
                    {
                      var form = document.getElementById("myForm");
                      
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
                      if (form) {
                      form.style.opacity = '0.5'; // Set the desired opacity
                      form.style.pointerEvents = 'none'; // Disable pointer events on the form
                      header.style.opacity = '0.5';
                      body.style.overflow = 'visible';
                      header2.textContent = "Δεν έχει οριστεί Προθεσμία";
                     }
                    }
                }
            }
            xhr2.send(); //(2) deadline
           }//end of if

           if(response == 'registered_user')
           {
             var form = document.getElementById("myForm");
             var header = document.getElementById("before-app-form")
             var header2 = document.getElementById("deadline-app-form");
             var body = document.querySelector("body");
     
              //AJAX API (sending  deadline information to the server-side)(2)
             let xhr3 = new XMLHttpRequest();
             xhr3.open("POST","scriptsphp/deadline_validation.php",true);
             xhr3.onreadystatechange = function(){
                 if(xhr3.readyState==4 && xhr3.status==200)
                 {
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
                            var form = document.getElementById("myForm");
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
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
                            var form = document.getElementById("myForm");
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
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
                         else 
                         {
                          var form = document.getElementById("myForm");
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
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
                     }
                     else
                     {
                       var form = document.getElementById("myForm");
                       
                            var header = document.getElementById("before-app-form")
                            var header2 = document.getElementById("deadline-app-form");
                            var body = document.querySelector("body");
                       if (form) {
                       form.style.opacity = '0.5'; // Set the desired opacity
                       form.style.pointerEvents = 'none'; // Disable pointer events on the form
                       header.style.opacity = '0.5';
                       body.style.overflow = 'visible';
                       header2.textContent = "Δεν έχει οριστεί Προθεσμία";
                      }
                     }
                 }
             }
             xhr3.send(); //(2) deadline
           }
           }//200 ok from the server in order to run it     
          }//onreadystate function
     
          xhr.send(); //(1) admin/user