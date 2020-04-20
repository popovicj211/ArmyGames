<?php 
  require_once 'config/connection.php';
 // require_once "models/products/functions.php";
  /*$upit = 'SELECT * FROM menu;';
  $pripremljeni = $connection->prepare($upit);
  $pripremljeni->execute();
  $linkovi = $pripremljeni->fetchAll();*/
  $linkovi = Menu();
?>
        <div id="footer">
			     <div class="wrapper">
					       <div id="footerup">
                                   <div class="footerblock">
                                  
                                          <ul>
                                                <li><a href="rss.xml" > <i class="fa fa-rss"></i> </a></li>
			         	                        <li><a href="https://www.facebook.com/" > <i class="fa fa-facebook"> </i>   </a></li>
												 <li><a href="https://www.instagram.com/"> <i class="fa fa-instagram"></i> </a></li>
				                                <li><a href="sitemap.xml"> <i class="fa fa-linkedin"></i> </a></li>
				                               <!-- <li><a href="#">  <i class="fa fa-file-text"> </i> </a></li> -->
			                              </ul>  
                                   </div>
                                   <div class="footerblock">
                                 
                                          <ul id="footermenu">
                                              <?php foreach($linkovi as $link): ?>
                                                     <li>
                                                                   <a href="<?= 'index.php?page='.$link->href ?>"> <?= $link->name ?> </a>
                                                     </li>
                                                    
                                              <?php endforeach; ?>
                                          </ul>
                                   </div>
                                   <div class="footerblock">
                                                       
                                                         <p> Zdravka Celara 11 </p>
                                                        <p> Belgrade, Serbia </p>
                                                        <p> +381 11 5555 555 </p> 
                                  </div>
                                   <div class="cleaner"></div>
                           </div> 
                           <div id="footerdown">
                                    <p> Copyright &copy; <a href="mailto:jovanpopovic211it@gmail.com"> Jovan Popović </a> </p>
                           </div>               
				</div>
		</div>
  
        <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
        <?php if($_GET['page'] == "store")  { ?>
            <script type="text/javascript" src="assets/js/jscript.js"></script> 
        <?php }else if($_GET['page'] == "register")  {?>
            <script type="text/javascript" src="assets/js/register.js"> </script>
        <?php } else if($_GET['page'] == "login"){ ?>
          <script type="text/javascript" src="assets/js/login.js"> </script>
        <?php }  else if($_GET['page'] == "contact"){ ?>
          <script type="text/javascript" src="assets/js/contact.js" charset="UTF-8" > </script>
        <?php }  else if($_GET['page'] == "table"){?>
          <script type="text/javascript" src="assets/js/insert.js"></script> 
          <script type="text/javascript" src="assets/js/ajax_up_del.js"></script>
        <?php } else if($_GET['page'] == "adminproduct"){ ?>
          <script type="text/javascript" src="assets/js/insertproduct.js"></script>
          <script type="text/javascript" src="assets/js/adminproducts.js"></script>
        <?php }  ?>
        <script type="text/javascript" src="assets/js/jquery.js"></script> 
       
        	
    
</body>
</html>