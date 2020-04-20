<div class="containfull">  
              <div class="wrapper">              
                         <div class="contain">
                                  <div class="reglog" id="registration">
                                                 <div id="feedback">
                                                         <div class="feedback">
                                                             <?php
                                                             if(isset($_SESSION['verify'])){
                                                                 echo $_SESSION['verify'];
                                                                 unset($_SESSION['verify']);
                                                             }

                                                             ?>
                                                         </div>

                                                 </div>
                                                <h2>Sign Up</h2>
                                                <form id="regform"  action="<?=BASE_URL.'models/user/register.php'?>" method="post" name="regform" >
                                                              <div class="form-group">
                                                                             <label>Username</label>
                                                                            <input type="text" id="regusername" name="regusername" placeholder="Username" />
                                                                            <span class="reginstruction">  </span>
                                                              </div>
                                                              <div class="form-group">
                                                                           <label>Email</label>
                                                                           <input type="text" id="regemail" name="regemail" placeholder="E-mail" />
                                                                           <span class="reginstruction">  </span>
                                                             </div>
                                                             <div class="form-group">
                                                                           <label>Password</label>
                                                                             <input type="password" id="regpass" name="regpass" placeholder="Password" />
                                                                             <span class="reginstruction">   </span>
                                                             </div>
                                                              <div class="form-group">
                                                                             <label>Verify password</label>
                                                                              <input type="password" id="regverpass" name="regverpass" placeholder="Verify password" />
                                                                              <span class="reginstruction">   </span>
                                                             </div>
                                                              <div class="form-group">
                                                                              <input type="button" id="btnreg" name="btnreg" value="Submit" />

                                                             </div>                                                                                                                   
                                                             
                                                </form>
                                  </div>
                        </div>	         								                                            
              </div> 
   </div> 