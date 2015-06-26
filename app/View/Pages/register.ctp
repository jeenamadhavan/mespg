<script>
$(document).ready(function(){
$('.datepicker').datepicker();
}); 
</script>

<?php 
$randnum=rand ( 1 ,5 );
?>
<div class="container banner">
    <div class="jumbotron fk-jumbotron banner-<?php echo $randnum; ?>">
        <h1>Register!</h1>
         <h2 style="color:white;">PG Admission Portal 2015!</h2>
<!--        <ul style="color: #fff; font-size: 16px; margin: 0px;">
            <li>The Biggest residential Post Graduate Institution Under Calicut university.</li>
            <li>18 UG Courses, 14 PG Courses and 8 Research Centers.</li>
            <li>R. Sanker Award for the best special grade college in the state of Keraka(1997-98 & 1999-2000)</li>
            <li>The first college under the university of Calicut to recieve the college with potential for excellence recogonization</li>
            <li>Moulana Abul Kalam Azad lietarecy Award</li>
        </ul>-->
        <p> </p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0px 30px 10px 30px;">
            <h3 class="lead">REGISTER</h3>
                <?php echo $this->Form->create('UserForm', array('name'=>'UserRegisterForm')); ?>
                <!--<div class="form-group">
                    <label for="Name" class="control-label">Name<sup class="madadatory">*</sup></label>
                    <?php// echo $this->Form->input('UserForm.Name', array('placeholder' => 'Enter Your Name','id'=>"Email", 'class' => 'form-control', 'label' => false,'title'=>"Please enter your Name",'required'=>'required','maxlength' => '250',)); ?>     
                    <span class="help-block"></span>
                </div>-->
                <div class="form-group">
                    <label for="Email" class="control-label">Name<sup class="madadatory">*</sup></label>
                    <?php echo $this->Form->input('UserForm.frkUserName', array('placeholder' => 'Name','id'=>"Name", 'class' => 'form-control', 'label' => false,'title'=>"Please enter your name",'required'=>'required','maxlength' => '250',)); ?>     
                    <span class="help-block"></span>
                </div>
               <div class="form-group ">
                    <label>Date of Birth<sup class="madadatory">*</sup></label>
                    <input type="text" class="form-control datepicker" name="frkUserDOB" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label">Mobile Number (10 digits)<sup class="madadatory">*</sup></label>
                    <?php echo $this->Form->input('UserForm.frkUserMobile', array('placeholder' => 'Phone','id'=>"phone", 'class' => 'form-control', 'label' => false,'title'=>'Please enter your phone number','required'=>'required','type'=>'number','maxlength' => '10',)); ?>     
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="Email" class="control-label">Email Address<sup class="madadatory">*</sup></label>
                    <?php echo $this->Form->input('UserForm.frkUserEmail', array('placeholder' => 'Email','id'=>"Email", 'class' => 'form-control', 'label' => false,'title'=>"Please enter your email Address",'required'=>'required','type'=>'email','maxlength' => '250',)); ?>     
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="frkUserPassword" class="control-label">Password<sup class="madadatory">*</sup></label>
                <?php echo $this->Form->input('UserForm.frkUserPassword', array('placeholder' => 'Please enter your password','id'=>"frkUserPassword", 'class' => 'form-control', 'label' => false,'title'=>"Please enter your password",'id'=>"frkUserPassword",'type'=>'password','required'=>'required','maxlength' => '250',)); ?>         
                   
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="frkRepeatUserPassword" class="control-label">Repeat Password<sup class="madadatory">*</sup></label>
                     <?php echo $this->Form->input('UserForm.frkRepeatUserPassword', array('placeholder' => 'Please enter your password','id'=>"frkRepeatUserPassword", 'class' => 'form-control', 'label' => false,'title'=>"Please Repeat your password",'id'=>"password-repeat",'type'=>'password','required'=>'required','maxlength' => '250',)); ?>         
                   
                    <span class="help-block"></span>
                </div>

                <button type="submit" class="btn btn-success">Register</button>
             <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
