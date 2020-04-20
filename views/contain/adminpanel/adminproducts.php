<?php
  include 'models/admin/adminproduct/functions.php';
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


  $from = Pagination($per_page = 5 , $getIns = 'game');

  //$limit = " LIMIT ".$from['from'].", $per_page";
  $limit = getLimitUser($from['from'] ,$per_page );
  $pagIns = getQueryULimit($limit);

   $brand = Brand();
 


?>
<div class="containfull">
         <div class="header_text">  <h1>Game Admin Panel </h1>  </div>   
                  <div id="wrapper-store"> 
                          <div   class="contain-store contain-admin" > 
                                  <div class="reglog" id="insertProduct">
                                                <h2>Add new game</h2>
                                                <form id="insformpro" action="<?=BASE_URL.'models/admin/adminproduct/insertproduct.php'?>" method="post" name="insformpro" onsubmit="return processins()"  enctype="multipart/form-data" >
                                                              <div class="form-group">
                                                                             <label>Name:</label>
                                                                            <input type="text" id="insproname"  name="insproname" placeholder="Name" />
                                                                            <span class="insproinstruction">  </span>
                                                              </div>
                                                              <div class="form-group">
                                                                           <label>Brand: </label>
                                                                         <!--  <input type="text" id="insprobrend"  name="insprobrend" placeholder="Brend" /> -->
                                                                        
                                                                             <select name="insprobrend" id="insprobrend" >
                                                                                       <option value="0"> Change </option>
                                                                                    <?php foreach($brand as $u): ?>
                                                                                       <option  value="<?= $u->comp_id ?>"> <?= $u->name ?></option>
                                                                                     <?php endforeach; ?>
                                                                             </select>
                                                                           <span class="insproinstruction">  </span>
                                                             </div>
                                                             <div class="form-group">
                                                                             <label>Image:</label>
                                                                           <!--   <input type="file"  id="insproimg"  name="insproimg"  />
                                                                              <span class="insproinstruction">   </span> -->

                                                                              <button type="button" id="btnProImage" class="btnProImage" onclick="document.getElementById('insproimg').click()" >Add image of game</button>
                                                                       <span id="gameImageValue"></span>

                                                                         <input type="file" name="insproimg" id="insproimg" style="display:none;" onchange="document.getElementById('gameImageValue').innerHTML=this.value;"/>
                                                                         <span class="insproinstruction">   </span>
                                                             </div>
                                                             <div class="form-group">
                                                                           <label>Year of release:</label>
                                                                                   
                                                              
                                                                              <select name="insproyear" id="insproyear">
                                                                                     <option value="0">Change</option>
                                                                                     <?php  
                                                                        $years = [
                                                                          [

                                                                            "value" => 2019,
                                                                            
                                                                          ],
                                                                          [
                                                                            "value" => 2018 ,
                                                                            
                                                                          ],
                                                                          [
                                                                            "value" => 2017,
                                                                           
                                                                          ],
                                                                          [
                                                                            "value" => 2016,
                                                                           
                                                                          ],
                                                                          [
                                                                            "value" => 2015,
                                                                           
                                                                          ],
                                                                          [
                                                                            "value" => 2014,
                                                                          
                                                                          ],
                                                                          [
                                                                            "value" => 2013,
                                                                            
                                                                          ],
                                                                          [
                                                                            "value" => 2012,
                                                                            
                                                                          ],
                                                                          [
                                                                            "value" => 2011,
                          
                                                                          ],
                                                                          [
                                                                            "value" => 2010,
                                                                          ]
                                                                        ];
                                                                      foreach($years as $o): ?>
                                                                                <option value="<?= $o['value'] ?>"> <?= $o['value'] ?> </option>  
                                                                      <?php  endforeach; ?>
                                                                              </select>
                                                                           <!--  <input type="text" id="insproyear"  name="insproyear" placeholder="Year" /> -->
                                                                             <span class="insproinstruction">   </span>
                                                             </div>
                                                              <div class="form-group">
                                                                             <label>Price:</label>
                                                                              <input type="text"  id="insproprice"  name="insproprice" placeholder="Price" />
                                                                              <span class="insproinstruction">   </span>
                                                             </div>
                                                             <div class="form-group">
                                                                           <label>Description:</label>
                                                                             <textarea name="insprodesc" id="insprodesc" cols="30" rows="10" placeholder="Description" ></textarea>
                                                                             <span class="insproinstruction">   </span>
                                                             </div>
                                                        
                                                             <div class="form-group">
                                                                             <label> First image about game :</label>
                                                                              <button type="button" id="btnProImageGal1" class="btnProImage" onclick="document.getElementById('insproimggal1').click()" >Add first image about game</button>
                                                                       <span id="gameGal1Value"></span>

                                                                         <input type="file" name="insproimggal1" id="insproimggal1" style="display:none;" onchange="document.getElementById('gameGal1Value').innerHTML=this.value;" multiple  />
                                                                         <span class="insproinstruction">   </span>

                       

                                                                      
                                                             </div>

                                                             <div class="form-group">
                                                                             <label>Second image about game :</label>
                                                                              <button type="button" id="btnProImageGal2" class="btnProImage" onclick="document.getElementById('insproimggal2').click()" >Add second image about game</button>
                                                                       <span id="gameGal2Value"></span>

                                                                         <input type="file" name="insproimggal2" id="insproimggal2" style="display:none;" onchange="document.getElementById('gameGal2Value').innerHTML=this.value;"/>
                                                                         <span class="insproinstruction">   </span>

                                                             </div>
                                                             <div class="form-group">
                                                                             <label> Third image about game :</label>
                                                                              <button type="button" id="btnProImageGal3" class="btnProImage" onclick="document.getElementById('insproimggal3').click()" >Add third image about game</button>
                                                                       <span id="gameGal3Value"></span>

                                                                         <input type="file" name="insproimggal3" id="insproimggal3" style="display:none;" onchange="document.getElementById('gameGal3Value').innerHTML=this.value;"/>
                                                                         <span class="insproinstruction">   </span>

                                                                     
                                                             </div> 
                                                          
                                                              <div class="form-group">
                                                                              <input type="submit" id="btninspro" name="btninspro" value="Send" />

                                                             </div>                                                                                                                                                                            
                                                </form>
                                                <div id="feedbackIns"></div>
                                   </div>
                                   <div class="reglog" id="upProDate">
                                                      
                                                 <form id="upProform" action="<?=BASE_URL.'models/admin/adminproduct/updateproduct.php'?>" method="post" name="upProform"  >
                                                      <h2>Update</h2>
                                                             <div class="form-group">
                                                                            <label>Name:</label>
                                                                            <input type="text" id="upproname"  name="upproname" placeholder="Name" />
                                                                            <span class="upproinstruction">  </span>
                                                            </div>
                                                             <div class="form-group">
                                                                          <label>Brand: </label>
                                                                        <!--   <input type="text" id="upprobrend"  name="upprobrend" placeholder="Brend" /> -->
                                                                        
                                                                        <select name="upprobrend" id="upprobrend" >
                                                                                       <option value="0"> Change </option>
                                                                                    <?php foreach($brand as $u): ?>
                                                                                       <option  value="<?= $u->comp_id ?>"> <?= $u->name ?></option>
                                                                                     <?php endforeach; ?>
                                                                             </select>
                                                                       <span class="upproinstruction">  </span>
                                                             </div>
                                                            <div class="form-group">
                                                            <label>Image:</label>
                                                                           <!--   <input type="file"  id="insproimg"  name="insproimg"  />
                                                                              <span class="insproinstruction">   </span> -->

                                                                              <button type="button" class="btnProImage" onclick="document.getElementById('upproimg') .click()" >Modify image of game</button>
                                                                       <span id="upGameImageValue"></span>

                                                                         <input type="file" name="upproimg" id="upproimg" style="display:none;" onchange="document.getElementById('upGameImageValue').innerHTML=this.value;"/>
                                                                        
                                                                      <span class="upproinstruction">   </span>
                                                            </div>
                                                            <div class="form-group">
                                                                     <label>Year of release:</label>
                                                                           
                                                                     <select name="upproyear" id="upproyear">
                                                                                     <option value="0">Change</option>
                                                                                     <?php  
                                                                        $years = [
                                                                          [

                                                                            "value" => 1,
                                                                            "year"  => 2019
                                                                          ],
                                                                          [
                                                                            "value" => 2,
                                                                            "year" => 2018
                                                                          ],
                                                                          [
                                                                            "value" => 3,
                                                                            "year" => 2017
                                                                          ],
                                                                          [
                                                                            "value" => 4,
                                                                            "year" => 2016
                                                                          ],
                                                                          [
                                                                            "value" => 5,
                                                                            "year" => 2015
                                                                          ],
                                                                          [
                                                                            "value" => 6,
                                                                            "year" => 2014
                                                                          ],
                                                                          [
                                                                            "value" => 7,
                                                                            "year" => 2013
                                                                          ],
                                                                          [
                                                                            "value" => 8,
                                                                            "year" => 2012
                                                                          ],
                                                                          [
                                                                            "value" => 9,
                                                                            "year" => 2011
                                                                          ],
                                                                          [
                                                                            "value" => 10,
                                                                            "year" => 2010
                                                                          ]
                                                                        ];
                                                                      foreach($years as $o): ?>
                                                                                <option value="<?= $o['value'] ?>"> <?= $o['year'] ?> </option>  
                                                                      <?php  endforeach; ?>
                                                                              </select>

                                                                         <!--    <input type="text" id="upproyear"  name="upproyear" placeholder="Year" /> -->
                                                                       <span class="upproinstruction">   </span>
                                                             </div>
                                                             <div class="form-group">
                                                                             <label>Price:</label>
                                                                              <input type="text"  id="upproprice"  name="upproprice" placeholder="Price" />
                                                                              <span class="upproinstruction">   </span>
                                                             </div>
                                                             <div class="form-group">
                                                                           <label>Description:</label>
                                                                             <textarea name="upprodesc" id="upprodesc" cols="30" rows="10" placeholder="Description" ></textarea>
                                                                             <span class="insproinstruction">   </span>
                                                             </div>
                                                                                                                         
                                                            <div class="form-group">
                                                                        <input type="hidden" id="hiddenProId" name="hiddenProId" />
                                                            </div>
                                                             <div class="form-group">
                                                                         <input type="submit" id="btnproup" name="btnproup" value="Send" />
   
                                                             </div>                                                                                                                   
                                                                
                                                </form>
                                                         <div id="feedbackIns"></div>
                                           </div>
                                     
                                           <a href="#" id="addpro" class="addusr" >Add new game</a>
                                                 
                                           <?php  if(count($pagIns)): $br=1 ?>
                                           <table  class="admintable">
                                                      <tr><th>#</th><th>Name</th><th>Brand</th><th>Image of game</th><th>Year of release</th><th> Price</th> <th>Description</th> <th>Update</th><th>Delete</th></tr>
                                                      <?php foreach($pagIns as $u): ?>
                                                                  <tr>
                                                                              <td><?= $br++ ?></td>
                                                                              <td><?= $u->name ?></td>
                                                                               <td><?= $u->name_brand ?></td>
                                                                             <?php 
                                                                                    // $filename = $u->src; 
                                                                                  //  $imgsz  = imageSizeAdmin($filename);
                                                                             
                                                                             ?>
                                                                               <td> <img src="<?= $u->src  ?>" id="imgTab"  alt="<?= $u->name ?>"> </td>
                                                                               <td><?= $u->year ?> </td>
                                                                             
                                                                               <td><?= $u->price ?>&dollar; </td>
                                                                                 <?php  if(isset($_SESSION['user'])&&($_SESSION['user']->function_id == 1)):  ?>
                                                                                 <td> <?= $u->description ?> </td>
                                                                                 <td><a class="update-pro" data-pro="<?= $u->game_id ?>" href="#" >Update</a>
                                                                                
                                                                                 </td>
                                                                                  <td><a class="delete-pro" data-pro="<?= $u->game_id ?>" href="#" >Delete</a></td>
                                                                                 <?php  endif;  ?>
                                                                  </tr>
                                                      <?php endforeach;?>
                                           </table>
                                           <div class="page-part">
                                                <ul>
                                                      <?php for($i = 0; $i < $from['link']; $i++): $j = $i+1 ?> 
                                                                 <li class="page-part-otr"  > <a data-game="<?= $j ?>"  href="<?=BASE_URL.'index.php?page=adminproduct&game='.$j?>" > <?= $j ?> </a>  </li>                  
                                                      <?php endfor; ?>
                                               </ul>
                                               
                                          </div>
                                           
                         <?php else:  ?>
                    <h1>No games</h1>
                  <?php endif; ?>
                          </div> 
                  </div>
         </div>          
</div>