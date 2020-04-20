 
        <div class="containfull">  
              <div class="wrapper">              
                         <div class="contain">
                                  <div class="reglog" id="login">
                                 
                                                <div id="feedbackL">
                                                    <?php
                                                    if(isset($_SESSION['active'])){

                                                    echo $_SESSION['active'];
                                                    unset($_SESSION['active']);
                                                    }
                                                    ?>
                                                </div>
                                                <h2>Log In</h2>
                                                <form id="logform" action="<?=BASE_URL.'models/user/login.php'?>" method="post" name="logform" >
                                                              <div class="form-group">
                                                                           <label>Username</label>
                                                                           <input type="text" id="logusername" name="logusername" placeholder="Username" />
                                                                       <span class="loginstruction">   </span>
                                                              </div>
                                                              <div class="form-group">
                                                                           <label>Password</label>
                                                                             <input type="password" id="logpass" name="logpass" placeholder="Password" />
                                                                       <span class="loginstruction">    </span>
                                                             </div>
                                                              <div class="form-group">
                                                                              <input type="button" id="btnlog" name="btnlog" value="LogIn" />

                                                             </div>                                                        
                                                             <div class="form-group">
                                                                            You don't have an account? <a href="<?=BASE_URL.'index.php?page=register'?>">Sign up here</a> 

                                                             </div>                                                                                                             
                                                             
                                                </form>
                                                <?php   if(isset($_SESSION['error_admin'])){
							$error = $_SESSION['error_admin'];
							echo $error;

							// u alert
							echo "<script>alert('$error')</script>";	

							unset($_SESSION['error_admin']);
						} ?>
                                  </div>
                        </div>	         								                                            
              </div> 
       </div> 