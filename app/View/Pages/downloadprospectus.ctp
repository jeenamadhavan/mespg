<div class="well">
    <?php echo($this->Form->create('Accountgroup')); ?>  
    <div class="form-group">
        <label for="AccountGroupName">Account Group Name</label>
        <?php echo $this->Form->input('groupname', array('label' => false, 'class' => 'form-control', 'id' => 'AccountGroupName', 'placeholder' => 'Enter Account Group Name', 'type' => 'text')); ?>
    </div>
    <div class="form-group">
        <label for="ProfitAndLoss">Profit And Loss</label>
        <?php
        echo $this->Form->input('pandl', array(
            'options' => array('1' => 'Yes', '0' => 'No'),
            'empty' => 'Select Type',
            'class' => 'form-control',
            'id' => 'ProfitAndLoss',
            'label' => false
        ));
        ?>
    </div>
    <div class="form-group">
        <label for="SequenceInTB">Sequence In TB</label>
        <?php echo $this->Form->input('sequenceintb', array('label' => false, 'class' => 'form-control', 'id' => 'SequenceInTB', 'placeholder' => 'Enter Sequence In Trial Balance')); ?>
    </div>
    <button type="submit" class="btn btn-default">Save Group</button>
    <?php echo $this->Form->end(); ?>
</div>