<div class="container" style="padding: 100px 0px;">
    <div class="row text-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-danger">
                <div class="panel-heading"> <strong class="">Reset Password</strong>

                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create('UserLogin', array('id' => 'myForm', 'name' => 'UserLoginForm')) ?>   
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('UserForgotPassword.frkUserEmail', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'inputEmail3',
                                            'type'=>'email',
                                            'placeholder' => 'Enter a valid Email Address',
                                            'required'=>'required')
                              ); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                               
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