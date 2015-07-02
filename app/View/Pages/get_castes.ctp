<?php if(isset($caste)) {
   echo $this->Form->input('PrimaryRegister.caste', array(
        'options' => $castes,
        'empty' => '-- select one --',
        'class' => 'form-control',
        'id' => 'Caste',
        'value'=>$caste,
        'label' => false,
        'selected'=>'selected',
       'required' =>'required'
    )); 
} else {
    echo $this->Form->input('PrimaryRegister.caste', array(
        'options' => $castes,
        'empty' => '-- select one --',
        'class' => 'form-control',
        'id' => 'Caste',
        'label' => false,
        'selected'=>'selected',
        'required' =>'required'
    ));
}
    
    ?>