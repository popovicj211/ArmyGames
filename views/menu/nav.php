<?php 
  require_once 'config/connection.php';
 // require_once "models/products/functions.php";
 /* $queryMenu = 'SELECT * FROM menu;';
  $preparedMenu = $connection->prepare($queryMenu);
  $preparedMenu->execute();
  $linkovi = $preparedMenu->fetchAll();*/
  $linkovi = Menu();
  
?>
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
                                  <div class="cleaner"></div>
                                		
                         </div>                                    
              </div>

              