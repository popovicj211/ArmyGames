<?php 
          require_once 'config/connection.php';

            if(isset($_GET['rdmore'])){
                    $gd = $_GET['rdmore'];
          /* 
          $queryGal = 'SELECT  g.gal_id, g.href as gale_link , g.src as gale_src , g.alt as gale_des FROM gallery g INNER JOIN games_gallery gg ON g.gal_id = gg.gal_id  WHERE gg.game_id = :rm';
           $preparedGal = $connection->prepare($queryGal);
           $preparedGal -> bindParam(":rm", $gd);
           $preparedGal ->execute();
            $gal = $preparedGal ->fetchAll(); */
            $gal = Gallery($gd);
           
        /*   $queryDes ="SELECT description FROM games WHERE game_id = :descr";
             $preparedDes = $connection->prepare($queryDes);
             $preparedDes -> bindParam(":descr", $gd);
             $preparedDes -> execute();
             $des = $preparedDes -> fetchAll();*/
             $des = Description($gd);
            }
?>
<div class="containfull">  
              <div class="header_text">  <h1>Read more</h1>  </div>       
              <div class="wrapper">                    
                         <div class="contain" id="contain-rm" >   
                                     
                                                       
                                       <h3 class="h-store-description"> Desctiption</h3>
                                       <?php foreach($des as $d):  ?>
                                         <p class="p-store-description"><?= $d->description ?></p>
                                         <?php endforeach;  ?>
                                          <h3 class="h-store-description"> Gallery</h3>   
                                 <?php foreach($gal as $g):  ?>                    
                                           <a data-fancybox="gallery" data-idGal="<?php $g->g.gal_id ?>"  href="<?= stripslashes($g->gale_link) ?>"><img class="gal-store" src="<?= stripslashes($g->gale_src) ?>" alt="<?= $g->gale_des ?>"/></a>
                                 <?php endforeach;  ?>
                                           
                                  
                               
                                        <div class="cleaner"></div>
                       </div>
                        	         								                                            
              </div> 
   </div> 