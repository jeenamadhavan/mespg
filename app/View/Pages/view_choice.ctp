<div class="container">
	<div class="col-md-12">
		<h3>Your Basic Information<span class="pull-right"><small>Application No: <?php echo $choices[0]['Choice']['application_no']; ?></small></span></h3><br>
		<table class="table table-striped">
			<tr>
				<th>Name (As in SSLC) :</th>
				<td><?php echo $choices[0]['User']['frkUserName']; ?></td>
			</tr>
			<tr>
				<th>Application No :</th>
				<td><?php echo $choices[0]['Choice']['application_no']; ?></td>
			</tr>
			<tr>
				<th>Gender :</th>
				<td><?php echo $choices[0]['User']['frkUserGender']; ?></td>
			</tr>
                        <tr>
				<th>Date of Birth:</th>
				<td><?php echo $choices[0]['User']['frkUserDOB']; ?></td>
			</tr>
			<!--<tr>
				<th>Community :</th>
				<td><?php echo $choices[0]['Community']['name']; ?></td>
			</tr>
			<tr>
				<th>Religion :</th>
				<td><?php echo $choices[0]['Religion']['name']; ?></td>
			</tr>-->
			<tr>
				<th>Choices :</th>
				<td>
					<?php $count=1; ?>
					<?php foreach($choices_name as $choice) { ?>
						<?php echo $count; ?>. <?php echo $choice; ?><br>
					<?php $count++; } ?>
				</td>
			</tr>
			<tr>
				<th>Total Amount :</th>
				<td><?php echo $choices[0]['Choice']['amount']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link('Pay Online', "https://www.sbtonline.in/prelogin/icollecthome.htm", array('target' => '_blank','escape' => false,'class'=>'btn btn-primary')); ?></td>
			</tr>
			<tr>
				<th>SBT Collect Reference ID :</th>
				<?php if(isset($reference_entered) && $reference_entered==1) { ?>
				<td>
					<div id="id_entered"><?php echo $reference_no; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($choice_edit)) { ?>
						<button class="btn" id="edit_reference_btn">Edit</button>
					<?php } ?>
					</div>
					<div class="id_form" style="display:none;">
						<?php echo $this->Form->create('transaction_id_form',array('url' => '/pages/add_transaction/')); ?>
						<?php echo $this->form->input('transaction_id_form.ref_no',array('class'=>'form-control','required'=>'required','id'=>'transaction_id')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Form->submit('Submit',array('class'=>'btn','id'=>'refer_submit','style'=>'  float: left;')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn cancel_edit">Cancel</button>
					</div>
				</td>
				<?php } else { ?>
					<?php echo $this->Form->create('transaction_id_form',array('url' => '/pages/add_transaction/')); ?>
					<td><?php echo $this->form->input('transaction_id_form.ref_no',array('class'=>'form-control','required'=>'required','id'=>'transaction_id')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Form->submit('Submit',array('class'=>'btn','id'=>'refer_submit')); ?>
					</td>
				<?php } ?>
				

			</tr>
		</table>

                <?php if(!isset($cannot_fill)) { ?>
                	<?php if(isset($edit_form)) { ?>
                		<?php echo $this->Html->link('Edit Application',array('controller'=>'pages','action'=>'primary_registration'),array('class'=>'btn btn-success pull-right')); ?>
                	<?php } else { ?>
                	<?php echo $this->Html->link('Fill Application',array('controller'=>'pages','action'=>'primary_registration'),array('class'=>'btn btn-success pull-right')); ?>
                <?php } } ?>
                <?php echo $this->Html->link('Edit Choice',array('controller'=>'pages','action'=>'choice_edit'),array('class'=>'btn btn-success pull-right','style'=>'margin-right: 5px;','disabled'=>(isset($reference_entered) ? 'disabled' : ''))); ?>

	</div>
</div>

<script>
$(document).ready(function(){
 $('#refer_submit').click(function(){
 	//$("#transaction_id").blur(function(){
    var data = $('#transaction_id').val() ;
    re=/^[A-Z]{2}[0-9]{8}$/;
     var result = re.test(data);
     if(result){
    return true;
}else{
    $('#transaction_id').focus();
    return false;
}
   
//});
 });   
    
}); 
</script>
<script type="text/javascript">
	$('#edit_reference_btn').click(function(){
		//alert('hii');
		$('#id_entered').hide();
		$('.id_form').show();
	});
	$('.cancel_edit').click(function(){
		$('.id_form').hide();
		$('#id_entered').show();
	});
</script>
