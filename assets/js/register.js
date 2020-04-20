const BASE_URL = "http://localhost:8080/phppraktikums/";
window.onload = function(){
    document.getElementById("btnreg").addEventListener("click", processreg);
}

window.addEventListener("load", loadingreg)

function loadingreg(){
  var  loadArray = ["Please enter your username same as characters of email to @ ","Please enter your e-mail","Password should be at least 6 characters  upper case, lower case and digits","Same as previous password"]
  var result = ''
  for(var c in loadArray)
  {	
      result = ' <p style="color:#fff;"> ' + loadArray[c] + '</p> ';
       document.getElementsByClassName("reginstruction")[c].innerHTML = result;
  }
}

function processreg(){

     var userR = $('#regusername'); 
     var emailR = $('#regemail'); 
     var passR = $('#regpass'); 
     var passVerifyR = $('#regverpass'); 
     var userValue = $('#regusername').val().toString();
     var emailValue = $('#regemail').val().toString();
     var cep = emailValue.substring(0, emailValue.indexOf("@"));


     var regUserR =/^[\w\-\@\s\.]{3,20}$/;
     var regEmailR =/^[a-z][\w\.\d]+\@((gmail\.com)|(ict\.edu\.rs))$/;
 
     //  var regPassR =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/
     var regPassR =/^[A-z0-9]{6,20}$/

       var goodArrayR = [];
       var errorsR = [];
  
       if(cep == userValue){
             if(regUserR.test(userR.val()))
              {
                userR.css("border","2px solid #fff");
                goodArrayR.push("Username successfully entered");
               }
             else
               {     
              
               userR.css("border","2px solid #ff0000");
               errorsR.push("Invalid username");
                }
        }else{
                userR.css("border","2px solid #ff0000");
                errorsR.push("Invalid username");
            }
       if(!regEmailR.test(emailR.val()))
       {
              emailR.css("border","2px solid #ff0000");
                errorsR.push("Invalid email");
       }
       else
       {     
           emailR.css("border","2px solid #fff");
               goodArrayR.push("Email successfully entered");
       }

       if(!regPassR.test(passR.val()))
     {
                
                passR.css("border","2px solid #ff0000");
                errorsR.push("Invalid password");
     }
     else
     {
          passR.css("border","2px solid #fff");
          goodArrayR.push("Password successfully entered");
     }

     if(passVerifyR.val()==passR.val()){
        if(regPassR.test(passVerifyR.val())){
           passVerifyR.css("border","2px solid #fff");
           goodArrayR.push("Verify password successfully entered");
        }
        else{
                passVerifyR.css("border","2px solid #ff0000");
                 errorsR.push("Invalid verify password");
            } 
  }
  else{
             passVerifyR.css("border","2px solid #ff0000");
             errorsR.push("Invalid verify password");
      }

      var resultR = ''
      if(errorsR.length != 0)
      {
          for(var a in errorsR)
          {	
              resultR = ' <p style="color:#ff0000;"> ' + errorsR[a] + '</p> ';
        document.getElementsByClassName("reginstruction")[a].innerHTML = resultR;
          }
      }
      else{
      for(var b in goodArrayR)
      {	
          resultR = ' <p style="color:#fff;"> ' + goodArrayR[b] + '</p> ';
          document.getElementsByClassName("reginstruction")[b].innerHTML = resultR;
      }

      
      ajaxRegister();
  }

    function ajaxRegister(){
         
      $.ajax({
          url: BASE_URL + "models/user/register.php",
          method: "post",
          dataType: "json",
          data : {
                    btnreg:"Registration", 
                  regusername:userR.val(),
                  regemail:emailR.val(),
                  regpass:passR.val(),
                  regverpass:passVerifyR.val()
          },
          success : function(data){
            alert(data.message);

          },
           error : function(xhr,status,Msgerror){
                 var poruka = "";
                 switch(xhr.status) {
                     case 404 :
                         poruka = "Page not found";
                         break;
                    case 422:
                         poruka = "Data are not validate.";
                         break;
                     case 500:
                         poruka = "Error on server";
                         break;
                 }
                 console.log(xhr.responseText);
                $("#feedback").html("<h1 style='color:#ff0000;'>"+ poruka +"</h1>");
           }
          
      })

    }
}