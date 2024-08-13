
form.addEventListener("submit",function(event){

//event.preventDefault();
    
var nameType = document.getElementById('name');
var lastName = document.getElementById('lastName');
var am = document.getElementById('am');   
let resultDiv = document.getElementById("result");
let classes_passed = document.getElementById("percentPassed").value;
let average_grade = document.getElementById("averagePassed").value;
let selectedRadio = document.querySelector('input[name="engLevel"]:checked');
let addLang = document.querySelector('input[name="addLang"]:checked');
    let addLangV;
let university1 = document.getElementById('university1');
    let university1V;
let university2 = document.getElementById('university2');
    let university2V;
let university3 = document.getElementById('university3');
    let university3V;
let grades = document.getElementById('grades');
    let gradesV = grades.files[0];
let certEng = document.getElementById('certEng');
    let certEngV = certEng.files[0];
let certOtherLang = document.getElementById('certOtherLang');
    let certOtherLangV = certOtherLang.files[0];


//let resultText = year+" "+classes_passed+" "+average_grade+" "+selectedRadio;

    if(classes_passed >= 70)
    {
       if(average_grade >= 6.50)
       {
         
          if(selectedRadio.value > 3)
         {
            
               if(addLang)
               {
                   addLangV = addLang.value;
                 
                     university1V =  university1.value;
                     
                     university2V =  university2.value;
                    
                     if(university2V !== "-")
                     {
                        university2V =  university2.value;
                     }  
                     else
                     {
                        university2V = "NS";
                     }             
                     university3V =  university3.value;
                     if(university3V !== "-")
                     {
                        university3V = university3.value;
                     }  
                     else
                     {
                        university3V = "NS";
                     }    
                     
                    // gradesV = grades.files;
                    // certEngV = certEng.files

                    //  if (certEngV.length === 0) {
                    //    // console.log("No file selected");
                    //  } else {
                    //    // console.log("File(s) selected");
                    //     // Perform further actions with the selected file(s)
                    //  }

                    //  //certOtherLangV = certOtherLang.files;
                    //  if (certOtherLangV.length === 0) {
                    //     // console.log("No file selected");
                    //  } else {
                    //     // console.log("File(s) selected");
                    //      // Perform further actions with the selected file(s)
                    //  }

                     //AJAX XmlTttpRequest
                     var xhr3  = new XMLHttpRequest();
                     xhr3.open("POST","scriptsphp/requests.php",true);
                     xhr3.onreadystatechange = function(){
                        if(xhr3.readyState==4 && xhr3.status==200)
                       {
                           var response = xhr3.responseText;
                           console.log(response);
                       }
                     }
                     var formData = new FormData();
                     formData.append('name',nameType.value);
                     formData.append('lastName',lastName.value);
                     formData.append('am',am.value);
                     formData.append('percentPassed',classes_passed);
                     formData.append('averagePassed',average_grade);
                     formData.append('engLevel',selectedRadio.value);
                     formData.append('addLang',addLangV);
                     formData.append('university1',university1V);
                     formData.append('university2',university2V);
                     formData.append('university3',university3V);
                     formData.append('grades',gradesV);
                     formData.append('certEng',certEngV);
                     formData.append('certOtherLang',certOtherLangV);

                    //  console.log(nameType.value);
                    //  console.log(lastName.value);
                    //  console.log(am.value);
                    //  console.log(classes_passed);
                    //  console.log(average_grade);
                    //  console.log(selectedRadio.value);
                    //  console.log(addLangV);
                    //  console.log(university1VV);
                    //  console.log(university2VV);
                    //  console.log(university3VV);
                    //  console.log(gradesV);
                    //  console.log(certEngV);
                    //  console.log(certOtherLangV);
                   
                     xhr3.send(formData);   
               }

               else
               {
                  addLangV = "NS"; //NS -> NotSelected 
                  
               }
         }      
          else
         {
             //resultDiv.innerHTML = "Δεν μπορείτε να συμμετέχετε στο Erasmus Project";
             //alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
             //console.log("else3");
         }
        }
       else
       {
         //resultDiv.innerHTML = "Δεν μπορείτε να συμμετέχετε στο Erasmus Project";
         //alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
         //console.log("else2");
       }
    }
    else
    {
        resultDiv.innerHTML = "Δεν μπορείτε να συμμετέχετε στο Erasmus Project";
        //console.log("else1");
       // alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
    }

  //resultDiv.innerHTML = resultText;
});


