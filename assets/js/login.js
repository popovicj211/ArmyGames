
window.onload = function(){
    document.getElementById("btnlog").addEventListener("click", process);
}

window.addEventListener("load", loading);

function loading(){
    var  loadArray = ["Please enter your username same as characters of email to @ ","Password should be at least 6 characters upper case , lower case and digits"]
    var result = ''
    for(var z in loadArray)
    {	
        result = ' <p style="color:#fff;"> ' + loadArray[z] + '</p> ';
         document.getElementsByClassName("loginstruction")[z].innerHTML = result;
    }
}


function process(){
    var userL = $("#logusername"); 
    var passL = $("#logpass"); 
    var regUser =/^[\w\-\@\s\.]{3,20}$/;
    var regPass =/^[A-z0-9]{6,20}$/;

    var goodArray = [];
    var errors = [];

    if(!regUser.test(userL.val()))
    {
             userL.css("border","2px solid #ff0000");
             errors.push("Invalid username");
    }
    else
    {     
        userL.css("border","2px solid #fff");
        goodArray.push("Username successfully entered");
    }
    
    if(!regPass.test(passL.val()))
    {
               
        passL.css("border","2px solid #ff0000");
        errors.push("Invalid password");
    }
    else
    {
        passL.css("border","2px solid #fff");
        goodArray.push("Password successfully entered");
    }
    
    var result = ''
	if(errors.length != 0)
	{
		for(var x in errors)
		{	
            result = ' <p style="color:#ff0000;"> ' + errors[x] + '</p> ';
           document.getElementsByClassName("loginstruction")[x].innerHTML = result;
		}
	}
    else
	{
        for(var y in goodArray)
		{	
            result = ' <p style="color:#fff;"> ' + goodArray[y] + '</p> ';
            document.getElementsByClassName("loginstruction")[y].innerHTML = result;
        }
        ajaxLogin()
    }

    function ajaxLogin(){
         
        $.ajax({
            url: "http://localhost:8080/phppraktikums/models/user/login.php",
            method: "post",
            dataType: "json",
            data : {
                     btnlog:"LogIn", 
                     logusername:userL.val(),       
                    logpass:passL.val()
                  
            },
            success : function(data){
            
              alert(data.message);
                window.location.href = "http://localhost:8080/phppraktikums/index.php?page=store"
              
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
                        poruka = "Your are not registered";
                         break;
                }
                console.log(xhr.responseText);
               $("#feedbackL").html("<h1 style='color:#ff0000;' >"+ poruka +"</h1>");
                   console.log(xhr.responseText);
             }
            
        })
  
      }
  

}