
 let form = document.querySelector("form");

         form.addEventListener("submit",function(event){
         event.preventDefault(); // Prevent the default form submission    
         let resultDiv = document.getElementById("result");

         let year = document.getElementById("year").value;
         let classes_passed = document.getElementById("classes-passed").value;
         let average_grade = document.getElementById("average-grade").value;
         let selectedRadio = document.querySelector('input[name="engLevelReqs"]:checked').value;
    
         //let resultText = year+" "+classes_passed+" "+average_grade+" "+selectedRadio;
        
          if(parseInt(year) >= 2)
         {
             if(classes_passed >= 70)
             {
                if(average_grade >= 6.50)
                {
                  
                   if( (selectedRadio.charAt(0).localeCompare("B"))>=0)
                  {
                     if( (selectedRadio.charAt(0).localeCompare("B") ==0 && parseInt(selectedRadio.charAt(1)) == parseInt("2")) || (selectedRadio.charAt(0).localeCompare("B")>0 && parseInt(selectedRadio.charAt(1)) >= parseInt("1")) )
                     {
                      resultDiv.innerHTML = "Πληρείτε τις προϋποθέσεις ώστε να συμμετάσχετε στο Erasmus Project";
                      //alert("Συγχαρητήρια !!! Μπορείς να συμμετέχεις στο Erasmus Project");
                     }      
                    
                     if( (selectedRadio.charAt(0).localeCompare("B") ==0 && parseInt(selectedRadio.charAt(1)) == parseInt("1")) )
                     {
                      resultDiv.innerHTML = "Δεν μπορείτε να συμμετέχετε στο Erasmus Project";
                      //alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
                     }      
                  }      
                     else
                     {
                      resultDiv.innerHTML = "Δεν μπορείτε να συμμετέχετε στο Erasmus Project";
                      //alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
                     }
                 }
                else
                {
                  resultDiv.innerHTML = "Δεν μπορείτε να συμμετέχετε στο Erasmus Project";
                  //alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
                }
             }
             else
             {
                 resultDiv.innerHTML = "Δεν μπορείτε να συμμετέχετε στο Erasmus Project";
                // alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
             }
          }
          else
          {
             resultDiv.innerHTML = "Δεν Μπορείς να συμμετέχετε στο Erasmus Project";
            // alert("Δεν Μπορείς να συμμετέχεις στο Erasmus Project");
          }
         
           //resultDiv.innerHTML = resultText;
        })