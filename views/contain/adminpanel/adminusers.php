<?php 
 // require_once 'php/connection.php';
 include "models/admin/adminuser/functions.php";
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

  /*  $queryFunc ="SELECT * FROM  func ";
    $prepareFunc = $connection -> prepare($queryFunc);
    $prepareFunc -> execute();
    $func = $prepareFunc -> fetchAll();*/
    $func = Func();

   /* $queryCountInsert = "SELECT COUNT(*) as count_insert FROM user u INNER JOIN func f ON u.function_id=f.function_id ";
    $countPrepareIns = $connection->prepare($queryCountInsert);
     $countPrepareIns -> execute();
     $insCount = $countPrepareIns -> fetch(); */

  /*   $filter = null;
$trueFalse = false;
$countFIlt = null;
$insCount = CountExtra($countFIlt, $filter, $trueFalse);
*/


$from = Pagination($per_page = 5 , $getIns = 'ins');
//print_r($from);
/*
$per_page = 5; 
$number_of_links = ceil($insCount->counts/$per_page);
$numberIns = isset($_GET['ins']) ? $_GET['ins'] : 1; 
$from = $per_page * ($numberIns - 1);
*/



    /*  $per_page = 5; 
      $number_of_links = ceil($insCount->count_insert/$per_page);
      $numberIns = isset($_GET['ins']) ? $_GET['ins'] : 1; 
    $from = $per_page * ($numberIns - 1);*/

   /* $queryPagIns = "SELECT * FROM user u INNER JOIN func f ON u.function_id=f.function_id LIMIT $from, $per_page ";
    $preparedPagIns = $connection->prepare($queryPagIns);
    $preparedPagIns -> execute();
    $pagIns = $preparedPagIns ->fetchAll();*/



   // $limit = " LIMIT ".$from['from'].", $per_page";
    $limit = getLimitUser($from['from'] ,$per_page );
    $pagIns = getQueryULimit($limit);
     
     $queryCont = "SELECT * FROM contact  ";
      $preparedCont = $connection->prepare($queryCont);
      $preparedCont -> execute();
      $contUsr = $preparedCont ->fetchAll();

       $br=1; 

?>

<div class="containfull">  
              <div class="header_text">  <h1> Users Admin Panel  </h1>  </div>       
              <div id="wrapper-store">                    
                         <div    class="contain-store contain-admin" > 
                              <a href="index.php?page=adminlog"> Admin panel log </a> <a href="index.php?page=adminproduct"> Admin panel products </a>
                           <div id="contAdm">
                         
                           <table  class="admintable"> 
                                           <tr>
                                                     <th> # </th>  <th> Full name </th> <th> Email </th> <th> Text </th>
                                           </tr>
                                        
                                           <?php foreach($contUsr as $c): ?>
                                           <tr>
                                                     <td> <?= $br++ ?> </td>   <td> <?= $c->fullname ?> </td>   <td>  <?= $c->email ?> </td> <td> <?= $c->text ?>  </td>
                                           </tr>
                                                  <?php endforeach;  ?>
                                               
                                  </table>
                           </div>         
                         <div class="reglog" id="insert">
                                                <h2>Add new user</h2>
                                                <form id="insform" action="<?=BASE_URL.'models/admin/adminuser/insert.php'?>" method="post" name="insform"  >
                                                              <div class="form-group">
                                                                             <label>Username</label>
                                                                            <input type="text" id="insusername"  name="insusername" placeholder="Username" />
                                                                            <span class="insinstruction">  </span>
                                                              </div>
                                                              <div class="form-group">
                                                                           <label>Email</label>
                                                                           <input type="text" id="insemail"  name="insemail" placeholder="E-mail" />
                                                                           <span class="insinstruction">  </span>
                                                             </div>
                                                             <div class="form-group">
                                                                           <label>Password</label>
                                                                             <input type="password" id="inspass"  name="inspass" placeholder="Password" />
                                                                             <span class="insinstruction">   </span>
                                                             </div>
                                                              <div class="form-group">
                                                                             <label>Verify password</label>
                                                                              <input type="password"  id="insverpass"  name="insverpass" placeholder="Verify password" />
                                                                              <span class="insinstruction">   </span>
                                                             </div>
                                                          
                                                             <div class="form-group">
                                                                             <label>User function</label>
                                                                             <select name="users-list" id="users-list" class="form-control">
                                                                                       <option value="0"> Change </option>
                                                                                    <?php foreach($func as $u): ?>
                                                                                       <option  value="<?= $u->function_id ?>"> <?= $u->name ?></option>
                                                                                     <?php endforeach; ?>
                                                                             </select>
                                                                             <span class="insinstruction">   </span>
                                                             </div>
                                                              <div class="form-group">
                                                                              <input type="button" id="btnins" name="btnins" value="Send" />

                                                             </div>                                                                                                                                                                              
                                                </form>
                                                <div id="feedbackIns"></div>
                                  </div>
                                  <div class="reglog" id="upDate">
                                                      
                                                   <form id="upform" action="<?=BASE_URL.'models/admin/adminuser/update.php'?>" method="post" name="upform"  >
                                                   <h2>Update</h2>
                                                                                                                       <div class="form-group">
                                                                                                                                  <label>Username</label>
                                                                                                                                   <input type="text" id="upusername"  name="upusername" placeholder="Username" />
                                                                                                                                  <span class="upinstruction">  </span>
                                                                                                                       </div>
                                                                                                                       <div class="form-group">
                                                                                                                                   <label>Email</label>
                                                                                                                                          <input type="text" id="upemail"  name="upemail" placeholder="E-mail" />
                                                                                                                                        <span class="upinstruction">  </span>
                                                                                                                       </div>
                                                                                                                        <div class="form-group">
                                                                                                                                    <label>Password</label>
                                                                                                                                    <input type="password" id="uppass"  name="uppass" placeholder="Password" />
                                                                                                                                     <span class="upinstruction">   </span>
                                                                                                                       </div>
                                                                                                                         <div class="form-group">
                                                                                                                                       <label>Verify password</label>
                                                                                                                                       <input type="password"  id="upverpass"  name="upverpass" placeholder="Verify password" />
                                                                                                                                      <span class="upinstruction">   </span>
                                                                                                                        </div>
                                                                                                                      
                                                                                                                        <div class="form-group">
                                                                                                                                      <label>User function</label>
                                                                                                                                        <select name="users-list-up" id="users-list-up" class="form-control">
                                                                                                                                               
                                                                                                                                               <?php foreach($func as $u): ?>
                                                                                                                                               <option  value="<?= $u->function_id ?>"> <?= $u->name ?></option>
                                                                                                                                            <?php endforeach; ?>
                                                                                                                                        </select>
                                                                                                                                          <span class="upinstruction">   </span>
                                                                                                                          </div>
                                                                                                                          <div class="form-group">
                                                                                                                              <input type="hidden" id="hiddenUserId" name="hiddenUserId" />
                                                                                                                           <!--   <label>Active</label>
                                                                                        <input type="checkbox"  value="1" name="upactive" /> 
                                                                                                         <span class="upinstruction">   </span> -->
                                                                                                                      </div>
                                                                                                                          <div class="form-group">
                                                                                                                                          <input type="submit" id="btnup" name="btnup" value="Send" />

                                                                                                                         </div>                                                                                                                   
                                                             
                                                                                                                 </form>
                                                                                                                  <div id="feedbackIns"></div>
                                        </div>
                                    <a href="#" id="addusr" class="addusr" >Add new user</a>
                                  
                                    <?php  if(count($pagIns)): $br=1 ?>
                                             <table  class="admintable">
                                                        <tr><th>#</th><th>Username</th><th>Email</th><th>Password</th><th>Verify password</th><th>Date register</th><th> User function</th><th>Update</th><th>Delete</th></tr>
                                                        <?php foreach($pagIns as $u): ?>
                                                                    <tr>
                                                                                <td><?= $br++ ?></td>
                                                                                
                                                                                 <td><?= $u->username ?></td>
                                                                                  <td><?= $u->email ?></td>
                                                                                 <td><?= $u->password ?></td>
                                                                                  <td><?= $u->verifypassword ?></td>
                                                                                 <td> <?php
                                                                                // $dateTime = explode(" ", $u->dateregister);
                                                                               $dateTime =strtotime($u->dateregister);
					                                                                    // 	$date = explode("-", $dateTime);
						
					                                                                     //  	$timestamp = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
                                                                                //  echo date("l, d-m-Y H:i", $timestamp);
                                                                                echo date("d-m-Y H:i:s" , $dateTime );
                                                                                ?>
                                                                                 </td>
                                                                                 <td><?= $u->name ?></td>
                                                                                   <?php  if(isset($_SESSION['user'])&&($_SESSION['user']->function_id == 1)):  ?>
                                                                                   <td><a class="update-user" data-id="<?= $u->user_id ?>" href="#" >Update</a>
                                                                                  
                                                                                   </td>
                                                                                    <td><a class="delete-user" data-id="<?= $u->user_id ?>" href="#" >Delete</a></td>
                                                                                   <?php  endif;  ?>
                                                                    </tr>
                                                        <?php endforeach;?>
                                             </table>
            <div class="page-part">
                      <ul>
                      <?php for($i = 0; $i < $from['link']; $i++): $j = $i+1 ?> 
                      <li class="page-part-otr"  > <a data-ins="<?= $j ?>"  href="<?=BASE_URL.'index.php?page=table&ins='.$j?>" > <?= $j ?> </a>  </li>                  
                      <?php endfor; ?>
                      </ul>
            </div>
         
            
        
        <?php else:  ?>
            <h1>No users</h1>
        <?php endif; ?>
                       </div>
                      
              </div> 
   </div> 