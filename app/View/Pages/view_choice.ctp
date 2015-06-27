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
			<tr>
				<th>Community :</th>
				<td><?php echo $choices[0]['Community']['name']; ?></td>
			</tr>
			<tr>
				<th>Religion :</th>
				<td><?php echo $choices[0]['Religion']['name']; ?></td>
			</tr>
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
				<td><?php echo $choices[0]['Choice']['amount']; ?></td>
			</tr>
		</table>
		<?php if(isset($cannot_edit)&&$cannot_edit==1) {echo $this->Html->link('Confirm Payment',array('controller'=>'pages','action'=>'after_payment'),array('class'=>'btn btn-danger pull-right','disabled'=>'disabled')); ?>
		<?php echo $this->Html->link('Proceed to Payment',array('controller'=>'pages','action'=>'befor_payment'),array('class'=>'btn btn-success pull-right','style'=>'margin-right: 5px;','disabled'=>'disabled')); ?>
		<?php 
echo $this->Html->link('Edit',array('controller'=>'pages','action'=>'choice_edit'),array('class'=>'btn btn-success pull-right','style'=>'margin-right: 5px;','disabled'=>'disabled')); 
} else {
   echo $this->Html->link('Confirm Payment',array('controller'=>'pages','action'=>'after_payment'),array('class'=>'btn btn-danger pull-right'));
  echo  $this->Html->link('Proceed to Payment',array('controller'=>'pages','action'=>'befor_payment'),array('class'=>'btn btn-success pull-right','style'=>'margin-right: 5px;'));
echo $this->Html->link('Edit',array('controller'=>'pages','action'=>'choice_edit'),array('class'=>'btn btn-success pull-right','style'=>'margin-right: 5px;')); 
} ?>

	</div>
</div>