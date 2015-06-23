<?php echo $this->Form->create('User', array('id'=>'registerForm','action' => '','controller'=>'users','novalidate'=>"novalidate",'method'=>'post')); ?>
                <div class="form-group">
                    <label for="Email" class="control-label">Email Address</label>
               <?php echo $this->Form->input('frkUserEmail', array('placeholder' => 'Email','id'=>"Email", 'class' => 'form-control', 'label' => false,'title'=>"Please enter your email Address")); ?>     
                    
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                <?php echo $this->Form->input('frkUserPassword', array('placeholder' => 'Please enter your password','id'=>"frkUserPassword", 'class' => 'form-control', 'label' => false,'title'=>"Please enter your password",'id'=>"frkUserPassword",'type'=>'password')); ?>         
                   
                    <span class="help-block"></span>
                </div>
                
                <div id="loginErrorMsg" class="alert alert-error hide">Wrong email or password</div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" id="remember"> Remember login
                    </label>
                    <p class="help-block">(if this is a private computer)</p>
                </div>
                <button type="submit" class="btn btn-success">Login</button>
             <?php echo $this->Form->end(); ?>