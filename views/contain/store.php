
<?php
 

if((!isset($_SESSION['user']))||(!isset($_SESSION['register']))){
 header("Location: ".BASE_URL."index.php?page=login");
} else{ 
 // require_once 'config/connection.php';
 
?>


<div class="containfull">
              <div class="header_text">  <h1>Store</h1>  </div>       
              <div id="wrapper-store">            
                         <div  id="contain-store" class="contain-store" >
                                        <div id="sort">
                                                 <div id="searchProducts" >
                                                 <h3>Search</h3>
                                                           <form>  
                                                               <input type="text" id="searching" name="searching"  /> 
                                                          </form>
             
                                                 </div>
                                                <div id="filterProduct">
                                                 <h3>Categories</h3>  
                                                  <ul  id="filter-store"  > 
                                                <!--  <li> <a  href="http://localhost:8080/phppraktikums/index.php?page=store"> All </a> </li> -->  
                                             
                                                         <?php
                                                                 
                                                                  $categories = getCategory();
                                                                  foreach($categories as $cat):
                                                           ?>
                                                         <li> <a data-id="<?=  $cat->comp_id ?>"  href="#"> <?=  $cat->name ?> </a> </li>  
                                                          <?php   
                                                                endforeach;
                                                          ?>
                                                  </ul>
                                                        
                                                </div>
                                                <h3>Sort</h3>  
                                                         <select  id="sorting-store" name="sorting-store"  > 
                                                                     <option value="0"> Choose.. </option>
                                                                   
                                                                      <?php  
                                                                        $options = [
                                                                          [

                                                                            "value" => 1,
                                                                            "text"  => "Name ascending"
                                                                          ],
                                                                          [
                                                                            "value" => 2,
                                                                            "text" => "Name descending"
                                                                          ],
                                                                          [
                                                                            "value" => 3,
                                                                            "text" => "Price ascending"
                                                                          ],
                                                                          [
                                                                            "value" => 4,
                                                                            "text" => "Price descending"
                                                                          ]
                                                                        ];
                                                                      foreach($options as $o): ?>
                                                                                <option value="<?= $o['value'] ?>"> <?= $o['text'] ?> </option>  
                                                                      <?php  endforeach; ?>
                                                         </select>           
                                        </div> 
                                         	<div id="contain-blocks" >
                                           
                                             </div>		
                                          <div id="pag">
                    
                                          </div> 
												               <div class="cleaner"></div>
                       </div>
                        	         								                                            
              </div> 
   </div> 

   <?php } ?>     
      
       