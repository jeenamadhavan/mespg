<div class="container" style="padding: 100px 0px;">
    <div class="row text-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong class="">Login</strong>

                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create('UserLogin', array('id' => 'myForm', 'name' => 'UserLoginForm')) ?>   
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('UserLogin.username', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'inputEmail3',
                                            'type'=>'text',
                                            'placeholder' => 'Enter User name',
                                            'required'=>'required')
                              ); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('UserLogin.password', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'type'=>'password',
                                            'placeholder' => 'Enter Password',
                                            'required'=>'required')
                              ); ?>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label class="">
                                        <input class="" type="checkbox">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
               
            </div>
        </div>
    </div>
</div>