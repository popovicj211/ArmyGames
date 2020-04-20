<body>
               <div id="header">
                         <?php if(!isset($_SESSION['user'])) : ?>
                            
                             <div class="logsign" id="signin"><a href="index.php?page=register">REGISTER </a></div>	
                             <div class="logsign" id="login"> <a href="index.php?page=login">LOGIN</a> </div> 
                        <?php endif; ?>      
                        <?php if(isset($_SESSION['user'])) : ?>      
                             <div class="logsign" id="login"> <a href="models/user/logout.php">LOGOUT</a> </div> 
                        <?php endif; ?>       
		                  <div class="wrapper">		                

                                    <h1><a href="index.php?page=index">ARMYGAMES</a></h1>   

					     </div>
							   
             </div> 