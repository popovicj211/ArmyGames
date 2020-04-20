<?php 
  require_once 'config/connection.php';
 // require_once "models/products/functions.php";
 /* $querySlider = 'SELECT * FROM menu;';
  $preparedSlider = $connection->prepare($querySlider);
  $preparedSlider->execute();
  $linkovi = $preparedSlider->fetchAll(); */
  $linkovi = Menu();
?>
      
    <div id="slider">
                  <div id="navigation" class="navother">
                           <div class="wrapper">
					                         <div id="nav">
                                          <ul>
                                            
                                              <?php foreach($linkovi as $link): ?>
                                                     <li>
                                                                   <a href="<?= 'index.php?page='.$link->href ?>"> <?= $link->name ?> </a>
                                                     </li>
                                              <?php endforeach; 
                                            
                                              if(isset($_SESSION['user'])) :
                                                       if($_SESSION['user']->function_id == 1): 
                                              ?>
                                               <li><a href="index.php?page=table">ADMIN</a></li>
                                                        <?php endif; ?>
                                            <?php endif; ?>         
                                             

                                          </ul>
                                 </div> 
                                 <div id="slidergame">
                                              <div id="sliderblock"> 
                                                       <h2>ARMYGAMES</h2>                             <p>You can see the price of games here. Find your favorite game. </p> 
                                                       <div class="gotostore" id="findgame"> <a href="index.php?page=store">Find game </a> </div>                         
                                               </div>
                                 </div>  	
                                 
                          </div>                                    
                 </div>  
    </div>    