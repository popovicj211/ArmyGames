
$('#insertProduct').hide();
$(document).ready(function(){
   show()
  function show(){
   
  
     $('#addpro').click(function(event){
         event.preventDefault();
       
       // $('#insert').slideDown(3000);
       $('#insertProduct').toggle(3000)
     });
   }
        
})


window.addEventListener("load", loadingins)

function loadingins(){
  var  loadArray = ["Please enter name of game","Please select brand","Please upload image of game" ,"Please select year of game", "Please enter price", "Please enter description", "Please upload first image about game", "Please upload second image about game", "Please upload third image about game"]
  var result = ''
  for(var c in loadArray)
  {	
      result = ' <p style="color:#fff;"> ' + loadArray[c] + '</p> ';
       document.getElementsByClassName("insproinstruction")[c].innerHTML = result;
  }
}

function processins(){

     var name = $('#insproname'); 
     var brand = $('#insprobrend'); 
     var image = $('#insproimg'); 
     var btnImage = $('#btnProImage'); 
     var year = $('#insproyear'); 
     var price = $('#insproprice');
     var desc = $('#insprodesc');

     var imageAboutGameF = $('#insproimggal1');
     var btnImageAboutGameF = $('#btnProImageGal1');
     var  imageAboutGameS = $('#insproimggal2');
     var  btnImageAboutGameS = $('#btnProImageGal2');
     var  imageAboutGameT = $('#insproimggal3');
     var  btnImageAboutGameT = $('#btnProImageGal3');
    
     var regName = /^[\w\-\/\s]{4,40}$/;
     var regPrice = /^[1-9]([0-9])?(\.)[0-9][0-9]$/;
     var regDesc = /^[\w\-\/\=\!\@\#\%\&\*\+\?\.\,\:\;\s\'\"]{4,}$/;

 
       var goodArrayR = [];
       var errorsR = [];
  
       if(!regName.test(name.val()))
              {
                name.css("border","2px solid #ff0000");
                errorsR.push("Invalid name of game");
               }
      else{     
        name.css("border","2px solid #fff");
        goodArrayR.push("Name is successfully entered");
              
          }

          if(brand.val() == "0"){
            brand.css("border","2px solid #ff0000");
            errorsR.push("Brand don't selected");
          }else{
            brand.css("border","2px solid #fff");
            goodArrayR.push("Brand is successfully selected");
          }

          if(image.val() == ""){
            btnImage.css("border","2px solid #ff0000");
            errorsR.push("Image is not uploaded");
          }else{
            btnImage.css("border","2px solid #fff");
            goodArrayR.push("Image is successfully uploaded");
          }



          if(year.val() == "0"){
            year.css("border","2px solid #ff0000");
            errorsR.push("Year is not selected");
          }else{
            year.css("border","2px solid #fff");
            goodArrayR.push("Year is successfully changed");
          }

       if(!regPrice.test(price.val()))
       {
        price.css("border","2px solid #ff0000");
                errorsR.push("Invalid price");
       }
       else
       {     
        price.css("border","2px solid #fff");
               goodArrayR.push("Price is successfully entered");
       }

       if(!regDesc.test(desc.val()))
     {
                
                desc.css("border","2px solid #ff0000");
                errorsR.push("Invalid description");
     }
     else
     {
          desc.css("border","2px solid #fff");
          goodArrayR.push("Description successfully entered");
     }

     if(imageAboutGameF.val() == ""){
      btnImageAboutGameF.css("border","2px solid #ff0000");
      errorsR.push("Image is not uploaded");
    }else{
      btnImageAboutGameF.css("border","2px solid #fff");
      goodArrayR.push("Image is successfully uploaded");
    }


    if(imageAboutGameS.val() == ""){
      btnImageAboutGameS.css("border","2px solid #ff0000");
      errorsR.push("Image is not uploaded");
    }else{
      btnImageAboutGameS.css("border","2px solid #fff");
      goodArrayR.push("Image is successfully uploaded");
    }


    if(imageAboutGameT.val() == ""){
      btnImageAboutGameT.css("border","2px solid #ff0000");
      errorsR.push("Image is not uploaded");
    }else{
      btnImageAboutGameT.css("border","2px solid #fff");
      goodArrayR.push("Image is successfully uploaded");
    }

      var resultR = ''
      if(errorsR.length != 0)
      {
          for(var a in errorsR)
          {	
              resultR = ' <p style="color:#ff0000;"> ' + errorsR[a] + '</p> ';
        document.getElementsByClassName("insproinstruction")[a].innerHTML = resultR;
          }
         return false;
      }
      else{
      for(var b in goodArrayR)
      {	
          resultR = ' <p style="color:#fff;"> ' + goodArrayR[b] + '</p> ';
          document.getElementsByClassName("insproinstruction")[b].innerHTML = resultR;
      }
 
     return true;
  }
  

    
}