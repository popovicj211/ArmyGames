  <div class="containfull">  
              <div class="header_text">  <h1>Home</h1>  </div>       
              <div class="wrapper">                    
                         <div class="contain" id="contain-home" >  
                                 <?php 
                                  $blocks = executeQuery("SELECT * FROM indexcontent");
                                 foreach($blocks as $part): ?>           
                                       <div class="contain-block">
                                               <div class="contain-block-image">
                                                            <img src="<?= $part->src ?>" alt="<?= $part->alt ?>">
                                               </div>
                                               <div class="contain-block-text">
                                                                <h3> <?= $part->name ?> </h3>
                                                                <p> <?= $part->text ?> </p>
                                               </div>
                                       </div>
                                     <?php endforeach; ?>
                                       <div class="cleaner"></div>
                       </div>
                        	         								                                            
              </div> 
   </div> 
