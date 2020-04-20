$(document).ready(function(){
   const BaseUrl = "http://localhost:8080/phppraktikums/" 
  
   function error(xhr,status, statusTxt){
    console.log(xhr.status)
    console.log(statusTxt);
   var status = xhr.status;
   switch(status){
       case 500:
        //   alert("Error on server!");
           break;
       case 400:
           alert("Bad request!");
           break;
       case 404:
          alert("Page not found!");
           break;
       default:
           alert("Error: " + status + " - ");
           break;
   }
} 
  
    articles();
   // categories()
  
  $('#filter-store li a').click(filterCat)
    paginacija()
   // sorting()
   $('#sorting-store').change(sortingProducts)
    $('#searchProducts form input').keyup(searchProducts)          
   // $('#sortingShow a').click(Sorting)
    

    function filterCat(e){
      e.preventDefault()
           let type = $(this).data("id");
          //  showPag()
          articles(type)
        //  hidePag()   
}


function articles(type){

    let url = BaseUrl + "models/products/getproducts.php";

   $.ajax({
       url:url,
       method:"GET",
        dataType:"json",
        data : {
         type : type
        },
        success:function(data){

          let isp = dataArticles(data.prod)

       
       
       //  console.log(isp)
         $('#contain-blocks').html(isp);
           
           pagLinks(data)
         
         //  paginacija()
        

        }, error : error
   })
}



function dataArticles(dataArt){
  let article=""
  console.log(dataArt)
  for(let i of dataArt){
  
     article +=`<div class="containstore-block" id="containstore-block${i.game_id}">
                           <img class="containstore-block-image" src="${i.src}" alt="${i.name}" />
                            <h3>${i.name}</h3>
                           <h4>${i.company_name}</h4>
                           <span class="games-year">${i.game_year}</span>
                            <span class="price">${i.price}$</span>
                         <span class="read-more" id="myBtn"><a data-idRm="${i.game_id}" href="${BaseUrl}index.php?page=readmore&rdmore=${i.game_id}"  >Read more</a> </span>  <span class="add-cart"> Add to cart </span> 
         </div>`
  }

     article +=`<div class="cleaner"></div> `
            
        return article;
   


}

function PagValue(){
  $('.page-part').on("click",".page-part-otr a" , function(e){
    e.preventDefault()          
  let numb = $(this).data("value");

  pag(numb)

  
  })
}





function paginacija() { 

 let url = BaseUrl + "models/products/count.php";

   $.ajax({ 
       url: url, 
       method: 'GET', 
       dataType: 'json', 
       success: function(data) { 
        pagLinks(data)
       /*  
          $('.page-part').on("click",".page-part-otr a" , function(e){
            e.preventDefault()          
          let numb = $(this).data("value");
         
          pag(numb)
       
          
          })
          */ 
         PagValue()
       }, 
       error: error
       
   }); 
 }



function pagLinks(data){
  var br = data.broj.counts
  console.log(br)
  var countArticles = parseInt(br); 
  var countLink = (Math.ceil(countArticles / 4)); 
     var article = ''; 
     article +=  '<div class="page-part">' 
     article +=  '<ul>'
     for(var i = 1; i <= countLink ; i++) {                                                 
                                     article += '<li class="page-part-otr"  >   <a  data-value="'+ i +'" href="#">'+ i +'</a>  </li>'                     
     } 
     article += '</ul>'
    article += '</div>'        
     $('#pag').html(article);
}


 function pag(numb){
  let url = BaseUrl + "models/products/count.php";

  $.ajax({ 
      url: url, 
      type: 'GET', 
      dataType: 'json', 
      data : { numb : numb},
     success:function(data){
            let isp = dataArticles(data.pag)
              $('#contain-blocks').html(isp); 
              $('.read-more a').click(function(e){  
                e.preventDefault();      
             
                  var ispis="";
               for(let i of data.pag){
                     ispis = i.game_id
               }
       
                if(!numb){            
                  window.location.href = BaseUrl + "index.php?page=readmore&rdmore="+ ispis;   
            
                 }else{           
                   window.location.href = BaseUrl + "index.php?page=readmore&numb="+ numb +"&rdmore="+ ispis;        
              
                  }
        })
      },error: error

    })
 } 




 function sortingProducts(){
  let sort = $(this).val() 
  let url = BaseUrl + "models/products/sorting.php";
  if($('#sorting-store').val() != 0){

    $.ajax({
           url: url,
          method:"get",
         dataType:"json",
          data : { sort : sort  },
          success:function(data){
         
          let isp = dataArticles(data) 
         
        $('#contain-blocks').html(isp);
        hidePag()
        ShowSortingBlocks(sort)
      
        } , error : error                        
})
  }
  /*
$("#sorting-store option:selected").each(function() {
    if($('#sorting-store option').is(":selected")){
          // hidePag()

      }
      
    
});*/

$("#sorting-store option").each(function() {
       $('#sorting-store option:first-child').hide()
         
});



}

 
 

function searchProducts(){
  let search = $(this).val()
  let url = BaseUrl + "models/products/searching.php";
 // showPag()
   $.ajax({
           url: url,
          method:"get",
          dataType:"json",
            data : { search : search },
             success:function(data){

          let isp = dataArticles(data)   
          $('#contain-blocks').html(isp);
          hidePag()
       
        } , error : error                         
})
}

function showPag(){
  $('.page-part ').show();
}

function hidePag(){
  $('.page-part ').hide();
}



function ShowSortingBlocks(sort){
      
      let isp =""
       isp += `<span id="sortingShow" class="page-part"   >
                  <a  href="#" data-show="4"  > Show more </a>
              </span>`
             
      $('#pag').html(isp)
    
  //   $('#sortingShow').on("click", "a" , Sorting)
  
  Sorting(sort)
}


function Sorting(sort){
  $('#sortingShow').on("click", "a" , function(e){

 
e.preventDefault()


  let show = $(this).data("show") 
  console.log(show)
  
 let url = BaseUrl + "models/products/sorting.php";


    $.ajax({
           url: url,
          method:"get",
         dataType:"json",
          data : {  show : show , sort : sort   },
          success:function(data){
            console.log(data)
          let isp = dataArticles(data)   
        $('#contain-blocks').html(isp);
        hidePag()
      
        } , error : error                 
})
 

})
}



})


