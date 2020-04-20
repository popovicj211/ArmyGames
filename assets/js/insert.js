window.onload = function(){
    document.getElementById("btnins").addEventListener("click", processins);
    
}

$('#insert').hide();
$(document).ready(function(){
   show()
  function show(){
   
  
     $('#addusr').click(function(event){
         event.preventDefault();
       
       // $('#insert').slideDown(3000);
       $('#insert').toggle(3000)
     });
   }
        
})


window.addEventListener("load", loadingins)

function loadingins(){
  var  loadArray = ["Please enter your username same as characters of email to @","Please enter your e-mail","Password should be at least 6 characters upper case , lower case and digits","Same as previous password", "Please choose user"]
  var result = ''
  for(var c in loadArray)
  {	
      result = ' <p style="color:#fff;"> ' + loadArray[c] + '</p> ';
       document.getElementsByClassName("insinstruction")[c].innerHTML = result;
  }
}

function processins(){

     var userR = $('#insusername'); 
     var emailR = $('#insemail'); 
     var passR = $('#inspass'); 
     var passVerifyR = $('#insverpass'); 
     var userValue = $('#insusername').val().toString();
     var emailValue = $('#insemail').val().toString();
     var userList = $('#users-list');
    // var date = $('#insdate');
     var cep = emailValue.substring(0, emailValue.indexOf("@"));


     var regUserR =/^[\w\-\@\s\.]{3,20}$/;
     var regEmailR =/^[a-z][\w\.\d]+\@((gmail\.com)|(ict\.edu\.rs))$/;
 
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
  
     
      if(userList.val() == "0"){
        userList.css("border","2px solid #ff0000");
        errorsR.push("User don't changed");
      }else{
        userList.css("border","2px solid #fff");
        goodArrayR.push("User are successfully changed");
      }

      var resultR = ''
      if(errorsR.length != 0)
      {
          for(var a in errorsR)
          {	
              resultR = ' <p style="color:#ff0000;"> ' + errorsR[a] + '</p> ';
        document.getElementsByClassName("insinstruction")[a].innerHTML = resultR;
          }
         
      }
      else{
      for(var b in goodArrayR)
      {	
          resultR = ' <p style="color:#fff;"> ' + goodArrayR[b] + '</p> ';
          document.getElementsByClassName("insinstruction")[b].innerHTML = resultR;
      }
      ajaxInsert();
    
  }
   
  function ajaxInsert(){
         
    $.ajax({
        url:"http://localhost:8080/phppraktikums/models/admin/adminuser/insert.php",
        method: "post",
        dataType: "json",
        data : {
                  
                  insusername:userR.val(),
                  insemail:emailR.val(),
                  inspass:passR.val(),
                  insverpass:passVerifyR.val(),
                  userslist:userList.val(),
                 // insdate:date.val(),
                  btnins:"Send"
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
              $("#feedbackIns").html("<h1 style='color:#ff0000;'>"+ poruka +"</h1>");
         }
        
    })

  }

 

    
}