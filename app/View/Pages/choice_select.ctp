<style type="text/css">
	.mandatory {
		  color: red;
	}
</style>
<div class="container">
	<div class="col-md-12">
	<h3>Basic Information</h3><br>
		<?php
		echo $this->Form->create('choice'); ?>
		<div class="form-group">
			<label>Name (As in SSLC):<sup class="mandatory">*</sup></label>
			<?php echo $this->Form->input('name',array('class'=>'form-control','label'=>false,'placeholder'=>'enter your name as in SSLC','required'=>'required','value'=>$user['User']['frkUserName'])); ?>
		</div>

		<?php $gender=array('Male'=>'Male','Female'=>'Female','Neutral'=>'Neutral'); ?>

		<div class="form-group">
			<label>Gender:<sup class="mandatory">*</sup></label>
			<?php echo $this->form->input('choice.gender',array('options'=>$gender,'empty'=>'-- select gender --','class'=>'form-control','label'=>false,'required'=>'required')); ?>
		</div>
                <div class="form-group">
			<label>Date of Birth:<sup class="mandatory">*</sup></label>
			<?php echo $this->Form->input('choice.dob',array('id'=>'datepicker','class'=>'form-control ','label'=>false,'placeholder'=>'enter your Date of Birth as in SSLC','required'=>'required','value'=>$user['User']['frkUserDOB'])); ?>
		</div>
		<div class="form-group">
			<label>Religion:<sup class="mandatory">*</sup></label>
			<?php echo $this->form->input('choice.religion',array('options'=>$religions,'empty'=>'-- select religion --','class'=>'form-control','label'=>false,'required'=>'required')); ?>
		</div>
		<div class="form-group">
			<label>Community Category:<sup class="mandatory">*</sup></label>
			<?php echo $this->form->input('choice.community',array('options'=>$communities,'empty'=>'-- select community --','class'=>'form-control','label'=>false,'required'=>'required')); ?>
		</div>
		<br><hr style="border-top: 1px solid #93C54B;"><br>
		<div class="form-group">
			<span><font color="green"><b>Note: </b>You can select the choices and add more in order</font></span><br><br>
			<label>Select the Choice:<sup class="mandatory">*</sup></label><button class="btn btn-success btn-sm pull-right" id="add_choice"><span class="glyphicon glyphicon-plus"></span> Choice</button><button class="btn btn-success btn-sm pull-right" style="margin-right:5px;" id="delete_choice"><span class="glyphicon glyphicon-minus"></span> Choice</button><br><br>
			<div class="repeatingChoice">
			<?php echo $this->form->input('course[]',array('options'=>$courses,'class'=>'form-control choice','name'=>'course[]','id'=>'choice','label'=>false)); ?><br>
			</div>
			<?php if(isset($this->validationErrors['Choice']['choices'][0])) { ?>
			<span style="position: relative; top:-15px;" id="choice_error"><?php echo $this->validationErrors['Choice']['choices'][0]; ?></span>
			<?php } ?>
		</div><br>
		<?php echo $this->Form->submit('Save & Proceed',array('class'=>'btn btn-success pull-right')); ?>
		<br><br>
		<hr style="border-top: 2px solid #93C54B;">
	</div>
</div>
<script type="text/javascript">

	$('#add_choice').click(function(e){
            e.preventDefault();
            var lastRepeatingGroup = $('.repeatingChoice').last();
            var cloned = lastRepeatingGroup.clone(true);
            //cloned.find("input").val("");
            //cloned.find("input:radio").attr("checked", false);
            cloned.insertAfter(lastRepeatingGroup);
            resetAttributeNames(cloned);
	});

	$('#delete_choice').click(function(e){
            e.preventDefault();
            var count=$('.repeatingChoice').length;
            if(count==1) {
            	alert("You should atleast have one entry");
                return;
            }
            else {
            	var current_choice=$('.repeatingChoice').last();
            	current_choice.slideUp('slow',function(){
            		current_choice.remove();
            	});
            }
            
        });
$(document).ready(function(){
	
	$("#choice").change(function() {
		var arr=[];
    	jQuery('.choice').each(function() {
    		var course_id=$(this).val();
    		if(course_id!=0) {
    			arr.push(course_id);
    		}
    	})
		for(var i=0;i<arr.length-1;i++) {
			for(var j=i+1;j<arr.length;j++) {
				if(arr[i]==arr[j]) {
					alert('Choices cannot be repeated');
					$(this).val(0);
				}
			}
		}
		
	});
		
});
	
</script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>