<?php 
 
 include "models/admin/adminlog/functions.php";

  if(isset($_SESSION['user'])){
   
  
    if($_SESSION['user']->function_id != 1){
  
      $_SESSION['error_admin'] ="You are not admin!";
           //  header("Location: http://localhost:8080/phppraktikums/index.php?page=index");
           header("Location: ".BASE_URL."index.php?page=index");
       }   
  } else {
    $_SESSION['error_admin'] ="You are not logged in!";
    header("Location: ".BASE_URL."index.php?page=index");
    
  }


 $countUserL = CountUsersLog($logC = 1); 



 // $from = Pagination($per_page = 49 , $getIns = 'log');
 // $limit = " LIMIT ".$from['from'].", $per_page";
  //$pagIns = getQueryULimit($limit);



  $POSTS_PER_PAGE = 49;
                        
  if(!isset($_GET['log'])) {
    $_GET['log'] = 1;
}


$first_post = ($_GET['log'] - 1) * $POSTS_PER_PAGE;
$last_post = $_GET['log'] * $POSTS_PER_PAGE - 1;

//$first_post = 0;
//$last_post = 49;

?>
<div class="containfull"> 
<div class="header_text">  <h1>Log Admin Panel </h1>  </div>   
      <div id="wrapper-store">     
      <div   class="contain-store contain-admin" > 
           <div id="adminLog" >
                  
           <table class="admintable" id="statisticOfUser">
                           <tr> <th>Number access page</th>  </tr>  
                               <?php 
                       
                                 $fileLogAccess = getLogFile();
                                 $now = time();
                                 $pageNames = ['Home', 'Store' ,'Readmore store' ,'About us', 'Contact', 'Admin', 'Product admin', 'Log admin'];
                                 $pages = [0,0,0,0,0,0,0,0];
                                 $sum = 0;     
                                               foreach($fileLogAccess as $access){
                                                  $rowData = explode("\t", $access);
                                                  if($now - strtotime($rowData[2]) <= 86400 ){
                                                       if(strpos($rowData[0] , 'index.php?') !== false ){
                                                           $url = explode('=', $rowData[0]);
                                                           $page = $url[1];
                                                           switch($page){
                                                                 case 'index':
                                                                 $pages[0] = $pages[0] + 1;
                                                                 break;
                                                                 case 'store':
                                                                 $pages[1] = $pages[1] + 1;
                                                                 break;
                                                                 case 'readmore':
                                                                 $pages[2] = $pages[2] + 1;
                                                                 break;
                                                                 case 'aboutus':
                                                                 $pages[3] = $pages[3] + 1;
                                                                 break;
                                                                 case 'contact':
                                                                 $pages[4] = $pages[4] + 1;
                                                                 break;
                                                                 case 'table':
                                                                 $pages[5] = $pages[5] + 1;
                                                                 break;
                                                                 case 'adminproduct':
                                                                 $pages[6] = $pages[6] + 1;
                                                                 break;
                                                                 case 'adminlog':
                                                                 $pages[7] = $pages[7] + 1;
                                                                 break;
                                                              
                                                           }
                                                           $sum = $sum + 1;
                                                       }
                                                  } 
                                               }
                                                        
                                        
                                                 
                                               for($i = 0; $i < count($pageNames); $i++){
                                                  $percentage = round($pages[$i]/$sum*100); ?>
                                                       <tr> <td> <progress value="<?=$percentage?>" max="100"></progress>   <label><?= $percentage ?>%  <?= $pageNames[$i] ?></label> </td> </tr> 
                                               <?php }?>
                                    
                  </table>

                  <table  class="admintable"> 
                                            <tr>
                                                     <th> # </th>  <th> Page access </th> <th> IP address </th> <th> Date access </th>
                                           </tr>
                                           <?php  
                                                         $fileLog = getLogFile();
                                                      
                                                   
                                                      for($i = $first_post;  $i < count($fileLog);  $i++ ):
                                                                if($i < $last_post ){               
                                                                 $arrLog = explode("\t", $fileLog[$i]); 
                                                                         
                                                                   
                                                        ?>
                                              <tr>
                                              <td> <?= $i ?> </td>   <td> <?= $arrLog[0] ?> </td>   <td>  <?= $arrLog[1] ?> </td> <td> <?= $arrLog[2] ?>  </td>
                                       </tr>
                                                                <?php   }  endfor;                                      
                                                     
                                               ?>            
                 </table>
              </div>
              <div class="page-part">
                      <ul>
                      <?php 
                      
                      for($i = 0; $i < ceil(count($fileLog) / $POSTS_PER_PAGE); $i++): $j = $i+1 ?> 
                      <li class="page-part-otr"  > <a data-log="<?= $j ?>"  href="<?=BASE_URL.'index.php?page=adminlog&log='.$j?>" > <?= $j ?> </a>  </li>                  
                      <?php endfor; ?>
                      </ul>
            </div>
            
          </div>
     </div>
</div>     



