window.onload = function(){
    document.getElementById("btncontact").addEventListener("click", processcont);
}

window.addEventListener("load", loadingcont);

function loadingcont(){
    var  loadArray = ["First name and Last name must have first uppercase letter and other lowercase letters","Please enter your e-mail","Please enter your comment"];
    var result = ''
    for(var z in loadArray)
    {	
        result = ' <p style="color:#fff;"> ' + loadArray[z] + '</p> ';
         document.getElementsByClassName("coninstruction")[z].innerHTML = result;
    }
}


function processcont(){

    var fullname = $('#contactname');
    var email = $('#contactemail');
    var text = $('#context');
    var regFullname =/^[A-ZČĆŠĐŽ][a-zčćšđž]{3,}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,})+$/;
   var regEmail =/^[a-z][\w\.\d]+\@((gmail\.com)|(ict\.edu\.rs))$/;
    var regText =/^[A-ZČĆŠĐŽa-zčćšđž\d\s\.\,\*\+\?\!\-\_\/\'\:\;]{5,}$/; 

    var goodArray = [];
    var errors = [];

    if(!regFullname.test(fullname.val()))
    {
           fullname.css("border","2px solid #ff0000");
             errors.push("Invalid fullname");
    }
    else
    {     
           fullname.css("border","2px solid #fff");
            goodArray.push("Fullname successfully entered");
    }
    
    if(!regEmail.test(email.val()))
    {
               
               email.css("border","2px solid #ff0000");
               errors.push("Invalid email");
    }
    else
    {
         email.css("border","2px solid #fff");
         goodArray.push("Email successfully entered");
    }

    if(!regText.test(text.val()))
    {
               
               text.css("border","2px solid #ff0000");
               errors.push("Invalid comment");
    }
    else
    {
         text.css("border","2px solid #fff");
         goodArray.push("Comment successfully entered");
    }
    
    
    var result = ''
	if(errors.length != 0)
	{
		for(var x in errors)
		{	
            result = ' <p style="color:#ff0000;"> ' + errors[x] + '</p> ';
           document.getElementsByClassName("coninstruction")[x].innerHTML = result;
        }
       
	}
    else
	{
        for(var y in goodArray)
		{	
            result = ' <p style="color:#fff;"> ' + goodArray[y] + '</p> ';
            document.getElementsByClassName("coninstruction")[y].innerHTML = result;
        }
        ajaxContact()
    }

    function ajaxContact(){
         
        $.ajax({
            url: "http://localhost:8080/phppraktikums/models/user/contact.php",
            method: "post",
            dataType: "json",
            data : {
                     
                      contactname:fullname.val(),
                      contactemail:email.val(),
                      context:text.val(),
                      btncontact:"Send"
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
                           poruka = "Your data does not exist in the database";
                           break;
                   }
                   console.log(xhr.responseText);
                  $("#feedback").html("<h1 style='color:#ff0000;'>"+ poruka +"</h1>");
             }
            
        })
  
      }


}