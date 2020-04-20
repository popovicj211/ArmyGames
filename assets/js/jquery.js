$(document).ready(function(){
        logReg();
        animateBlock();
        footermenu()
        nav()
       
});

function logReg(){
      $('.logsign, .gotostore, #nav ul li').hover(function(){
        $(this).css({'backgroundColor':'#3273dc','borderRadius':'5px'});
      }, function(){
        $(this).css('backgroundColor','#000');
      });
}

function animateBlock(){
       $('#sliderblock').animate({marginTop:"+=150px"} , 2000);
}

function footermenu(){
   
    $('#footermenu li').hover(function(){
      $(this).css('backgroundColor','#3273dc');
    }, function(){
      $(this).css('backgroundColor','#000');
    });
}

function nav(){
  
         var navs = $('.navother')
  
       if ($(".navother").parent().is("#slider")) {
          navs.css('opacity','0.5')   
      }else{
        navs.css('opacity','1') 
      }
}

