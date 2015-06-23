<div class="container" style="padding: 100px 0px;">
    <div class="row text-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-danger">
                <div class="panel-heading"> <strong class="">Reset Password</strong>

                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create('UserLogin', array('id' => 'myForm', 'name' => 'UserLoginForm')) ?>   
                     <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
                                <?php echo $this->Form->input('UserResetPassword.frkUserPassword', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'type'=>'password',
                                            'placeholder' => 'Enter Password',
                                            'required'=>'required')
                              ); ?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <?php echo $this->Form->input('UserResetPassword.frkRepeatUserPassword', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'type'=>'password',
                                            'placeholder' => 'Confirm Password',
                                            'required'=>'required')
                              ); ?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                               
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary btn-sm">Change Password </button>
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
                <div class="panel-footer">Not Registered? 
				<?php echo $this->Html->link(__('REGISTER NOW!'), "/pages/register", array('escape' => false)) ?>
                </div>
            </div>
        </div>
    </div>
</div>