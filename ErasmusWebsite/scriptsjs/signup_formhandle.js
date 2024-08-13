 
    var nameType = document.getElementById("name");
    var nameLabel = document.getElementById("nameLabel");
         //RunTime check
         nameType.addEventListener("input",function(event){
              nameTypef(nameType);
          });
 
    var lastName = document.getElementById("lastName");
    var lastNameLabel = document.getElementById("lastNameLabel");
        //RunTime check
         lastName.addEventListener("input",function(event){
             lastNamef(lastName);
         });

    var am = document.getElementById("am");
    var amLabel = document.getElementById("amLabel");
    var amLabel2 = document.getElementById("amLabel2");
         //RunTime check
         am.addEventListener("input",function(event){
           amf(am);
        });

    var tel = document.getElementById("tel");
    var telLabel = document.getElementById("telLabel");
         //RunTime check
         tel.addEventListener("input",function(event){
           telephonef(tel);
        });

    var email = document.getElementById("email");
    var emailLabel = document.getElementById("emailLabel");

    var username = document.getElementById("username");
    var usernameLabel = document.getElementById("usernameLabel");//checking it after the **submit**

    var password = document.getElementById("password");
    var passwordLabel = document.getElementById("passwordLabel");
    var passwordLabel2 = document.getElementById("passwordLabel2");
          
         //RunTime check
         password.addEventListener("input",function(event){
            passwordf(password);
        });

    var confpassword = document.getElementById("confpassword");
    var confpasswordLabel = document.getElementById("confpasswordLabel"); //checking it after the **submit**
         

    var form = document.getElementById("signup-form");

    //**AJAX**
    //xhr variable should be difend before "submit"
    var xhr = new XMLHttpRequest();

     //**SUBMIT**
    //Sending the Data to the PHP File through AJAX
    form.addEventListener("submit",function(event){
        event.preventDefault();

     //Checking via AJAX(asychronous) if the **username** already exists
        xhr.open("POST", "scriptsphp/username_validation.php", true);
        //**data**(username) that we are going to send to the php file
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    let response = xhr.responseText;
                    let usernameexistence = JSON.parse(response);
                   // let usernameexistence = response;
                    console.log(response+" "+usernameexistence);
                    //if we want to use the response that we got from the php file, it is madatory to 
                    //add the rest of the code inside the ajax http request
                                
                    if((usernameexistence==false)&&(confpassword.value == password.value))//|| and if username doesnt exist or it exists already
                    {
                        //Reseting for the Last Time the Labels
                        confpasswordLabel.textContent ="";
                        usernameLabel.textContent = "";
        
                    xhr.open("POST", "scriptsphp/sign-up-register.php", true);

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    // Request was successful, handle the response
                                    let response = xhr.responseText;
                                    //let usernameexistence = JSON.parse(response);
                                    //let usernameexistence = response;
                                    //console.log("The User got Registered");
                                    let headerLabel = document.getElementById("headerLabel");
                                    headerLabel.textContent ="Μόλις η Εγγραφή σου έγινε Αποδεκτή!!!";
                                    // Refresh the page after a delay of 2 seconds (2000 milliseconds)
                                    setTimeout(function() {
                                        window.location.href = "myaccount.php";
                                    }, 2000);

                                } else {
                                    //  Request failed
                                    console.error("Request failed with status " + xhr.status);
                                }
                            }
                        };
                        // Create a new FormData object
                        let formData = new FormData();
                    
                        // Prepare the data to be send (Using formData() instead of string query method)
                        formData.append('name', nameType.value);
                        formData.append('lastName', lastName.value);
                        formData.append('am', am.value);
                        formData.append('tel', tel.value);
                        formData.append('username', username.value);
                        formData.append('password', password.value);
                        formData.append('email', email.value);

                        // Send the request with the data
                        xhr.send(formData);
                        }//EOF if

                        else
                        {
                         if(confpassword.value != password.value)
                         {
                             confpasswordLabel.textContent ="Τα passwords και confirmpassord δεν είναι ίδια";
                         }

                         else
                         {
                            confpasswordLabel.textContent ="";
                         }

                        if(usernameexistence==true)
                        {
                            usernameLabel.textContent = "Αυτό το Username χρησιμοποιείται ήδη";
                        }

                        else
                        {
                            usernameLabel.textContent = "";
                        }
                        }
                      
                } else {
                    // Request failed
                    console.error("Request failed with status " + xhr.status);
                }
            }
        };
        // Create a new FormData object
        let formData = new FormData();
    
        // Prepare the data to be send (Using formData() instead of string query method)
        formData.append('username', username.value);

        // Send the request
        xhr.send(formData);

    });//EOF submit



  //**Validations**
   //Checking the Validation of each field
  function nameTypef(nameType){
     //RunTime check
     nameType.addEventListener("input",function(event){
        if(containsNumbers(nameType.value))
        {
           nameLabel.textContent = "Το Όνομα δεν πρέπει να εμπεριέχει αριθμούς"; 
        }
        else
        {
         nameLabel.textContent = "";
        }
   });
  }  

  function lastNamef(lastName){
    //RunTime check
    lastName.addEventListener("input",function(event){
        if(containsNumbers(lastName.value))
        {
        lastNameLabel.textContent = "Το Επίθετο δεν πρέπει να εμπεριέχει αριθμούς"; 
        }
        else
        {
         lastNameLabel.textContent = "";
        }
    });

  }  

  function amf(am){
     //RunTime check
     am.addEventListener("input",function(event){
        if(containsLetters(am.value))
        {
        amLabel.textContent = ""; 
        }
        else
        {
         amLabel.textContent = "Ο Α.Μ πρέπει να αρχίζει απο 2022 ή 2023 ή 2024";
        }
        if(am.value.length<13)
        {
        amLabel2.textContent = "Το μήκος του Α.Μ θα πρέπει να είναι αποκλειστηκά 13 ψηφία"; 
        }
        else
        {
         amLabel2.textContent = "";
        }
    });
  }  

  function telephonef(tel){
     //RunTime check
     tel.addEventListener("input",function(event){
        if(tel.value.length<10)
        {
        telLabel.textContent = "Το μήκος του Αριθμού θα πρέπει να είναι αποκλειστηκά 10 ψηφία"; 
        }
        else
        {
         telLabel.textContent = "";
        }
    });
  }  

  function emailf(){

  }  

  function usernamef(){
    
  }  

  function passwordf(password){
    //RunTime check
    password.addEventListener("input",function(event){
        if(containsSymbols(password.value))
        {
        passwordLabel.textContent = ""; 
        }
        else
        {
         passwordLabel.textContent = "Ο Κωδικός πρέπει να εμπεριέχει σύμβολα";
        }
        if(password.value.length<5)
        {
        passwordLabel2.textContent = "Το μήκος του Κωδικού θα πρέπει να είναι τουλάχιστον 5 ψηφία"; 
        }
        else
        {
        passwordLabel2.textContent = "";
        }
    });
  }  

  function confpasswordf(){
  }  

  //**REGEX**
   //Method: Checks if a string contains numbers using regex
    function containsNumbers(str) {
        return /[0-9]/.test(str);
    }

    //Method: Checks if a A.M. string contains 2022|2023|2024
    function containsLetters(str) {
        //return /^(2022|2023|2024])[0-9]+$/.test(str);
        return /^(2022|2023|2024)/.test(str);
    }

    //Method: Checks if a A.M. string contains 2022|2023|2024
    function containsSymbols(str) {
        return /[^a-zA-Z0-9\s]/.test(str);
    }