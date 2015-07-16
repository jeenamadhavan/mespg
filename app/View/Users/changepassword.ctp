

<?php  
if(!empty($errors)){
$error = '';
foreach ($errors as $validationError) {
   
 $error .= $this->Html->tag('li', $validationError);
   
}
echo $this->Html->tag('ul', $error);


    
}?>


              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Change Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
             
                <?php echo $this->Form->create('User', array('id' => 'addinstockForm',  'name' => 'addinstockForm', 'novalidate')) ?> 
                  <div class="box-body">
                  
                    <div class="form-group">
                        <label for="quantity">New Password<sup class="mandatory">*</sup></label>
                    <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => false,'type'=>'password', 'id' => 'item_id_O', 'placeholder' => " Enter Password")); ?> 

                    </div>
                    <div class="form-group">
                        <label for="quantity">Confirm Password<sup class="mandatory">*</sup></label>
                    <?php echo $this->Form->input('confpassword', array('class' => 'form-control', 'label' => false, 'type'=>'password','id' => 'quantity_O', 'placeholder' => " Re type your Password")); ?> 

                    </div>
                   
                    
                   
                   
                  <div class="box-footer">
                    <button onclick="document.getElementById('user-form').style.display = 'none';" type="submit" class="btn btn-primary">Submit</button>
                  </div>
               <?php echo $this->Form->end();   ?>
              </div>
                </div><!-- /.box -->
              
          
