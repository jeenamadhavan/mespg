 
<?php
$parts = explode(',', $setarray['subject_structure']);
$grades = $setarray['grades'];
$partarray = array();
for ($i = 0; $i < count($parts); $i++) {
    $partarray[$i] = $parts[$i];
}
?>


<table class="table table-bordered">
    <caption><strong>Details of Mark</strong></caption>
    <thead>
        <tr>
            <th colspan="2">Subject</th>
            <th>Grade</th>
            <th>Mark Scored</th>
            <th>Maximum Marks</th>

        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < $partarray[0]; $i++) {
            $part = 1;
            ?>
            <tr class="warning" >
                <td>Part 1</td>
                <td> <?php
        echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . $i, array(
            'options' => ' ',
            'empty' => '-- select one --',
            'class' => 'form-control partsubject1',
            'id' => 'part' . $part . 'subject',
            'required' => 'required',
            'label' => false,
        ));
            ?>
                    <?php
                    echo $this->Form->input('SecondaryRegister.subject_structure', array(
                        'value' => $setarray['subject_structure'],
                        'class' => 'form-control',
                        'id' => 'part' . $part . 'subject',
                        'required' => 'required',
                        'label' => false,
                        'type' => 'hidden'
                    ));
                    ?>

                </td>

                <td>
                    <?php
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . $i, array(
                        'options' => $grades,
                        'empty' => '-- select one --',
                        'class' => 'form-control',
                        'id' => 'part' . $part . 'grade',
                        'required' => 'required',
                        'label' => false,
                    ));
                    ?>
                </td>
                <td>
                    <div class="form-group">
                        <?php
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . $i, array(
                            'type' => 'text',
                            'class' => 'form-control obmark',
                            'id' => 'part' . $part . 'mark',
                            'required' => 'required',
                            'label' => false
                        ));
                        ?>     


                    </div>
                </td>
                <td class="" >
                    <div class="form-group">
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject_maxmark"  name="SecondaryRegister.part<?php echo $part; ?>maxmark" title="Part 1 Maximum Mark" required readonly="readonly">
                    </div>
                </td>

            </tr>
        <?php } ?>
        <?php
        for ($i = 0; $i < $partarray[1]; $i++) {
            $part = 2;
            ?>
            <tr class="info">
                <td>Part 2</td>
                <td> <?php
        echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . $i, array(
            'options' => ' ',
            'empty' => '-- select one --',
            'class' => 'form-control partsubject2',
            'id' => 'part' . $part . 'subject',
            'required' => 'required',
            'label' => false
        ));
            ?>

                </td>
                <td>
                    <?php
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . $i, array(
                        'options' => $grades,
                        'empty' => '-- select one --',
                        'class' => 'form-control',
                        'id' => 'part' . $part . 'grade',
                        'required' => 'required',
                        'label' => false
                    ));
                    ?>
                </td>
                <td>
                    <div class="form-group">
                        <?php
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . $i, array(
                            'type' => 'text',
                            'class' => 'form-control obmark',
                            'id' => 'part' . $part . 'mark',
                            'required' => 'required',
                            'label' => false
                        ));
                        ?>  
                    </div>
                </td>
                <td>
                    <div class="form-group ">
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject_maxmark" name="SecondaryRegister.part<?php echo $part; ?>maxmark" title="Part 1 Maximum Mark" required readonly="readonly">
                    </div>
                </td>

            </tr>
        <?php } ?> 

        <tr class="success">
            <td rowspan="<?php echo $partarray[2]; ?>">Part 3</td>
            <?php
            for ($i = 0; $i < $partarray[2]; $i++) {
                $part = 3;
                ?>
                <td><?php
            echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . $i, array(
                'options' => ' ',
                'empty' => '-- select one --',
                'class' => 'form-control partsubject3',
                'id' => 'part' . $part . 'subject' . $i,
                'required' => 'required',
                'label' => false
            ));
                ?>

                </td>
                <td>
                    <?php
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . $i, array(
                        'options' => $grades,
                        'empty' => '-- select one --',
                        'class' => 'form-control',
                        'id' => 'part' . $part . 'grade' . $i,
                        'required' => 'required',
                        'label' => false
                    ));
                    ?>
                </td>
                <td>
                    <div class="form-group">



                        <?php
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . $i, array(
                            'type' => 'text',
                            'class' => 'form-control obmark',
                            'id' => 'part' . $part . 'mark' . $i,
                            'required' => 'required',
                            'label' => false
                        ));
                        ?>   

                    </div>
                </td>
                <td >
                    <div class="form-group">
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject<?php echo $i; ?>_maxmark" name="SecondaryRegister.part3maxmark1" title="Part 1 Maximum Mark" required readonly="readonly">
                    </div>
                </td>

            </tr>

        <?php } ?>
        <tr><th>Total</th>
            <td ></td><td ></td><td ><div class="form-group">
                    <input type="text" class="form-control" id="marktotal" name="part1total" title="Part 1 Total" required readonly="readonly">
                </div></td><td >
                <div class="form-group">
                    <input type="text" class="form-control" id="maxmarktotal" name="part1total" title="Part 1 Total" required readonly="readonly">
                </div>
            </td>

        <tr>
    </tbody>
</table>
<script>
    
   

    $('.partsubject1').on('change',function(){
    
        var id=$(this).attr('id');
        var d=$('#'+id).val();
    
 
        $.ajax({
            type: "POST",
            url: '<?php echo Router::url('/', true) . "pages/getmaxmarks"; ?>',
            data: { 'id':d  },
            success: function(strJSON){
                var json = $.parseJSON(strJSON);
                $('#'+id+'_maxmark').val(json[0].max_marks);
                $('#maxmarktotal').val(json[0].max_marks);
            }
            
        });
    });
    $('.partsubject2').on('change',function(){
        var mark1=$('#maxmarktotal').val();
    
        var id=$(this).attr('id');
        var d=$('#'+id).val();
    
        $.ajax({
            type: "POST",
            url: '<?php echo Router::url('/', true) . "pages/getmaxmarks"; ?>',
            data: { 'id':d  },
            success: function(strJSON){
                var json = $.parseJSON(strJSON);
                $('#'+id+'_maxmark').val(json[0].max_marks);
                
                var newtotal= parseInt(mark1) + parseInt(json[0].max_marks);
                
                $('#maxmarktotal').val(newtotal);
            }
            
        });
    });
    $('.partsubject3').on('change',function(){
        var mark1=$('#maxmarktotal').val();
        var id=$(this).attr('id');
        var d=$('#'+id).val();
      
      
        $.ajax({
            type: "POST",
            url: '<?php echo Router::url('/', true) . "pages/getmaxmarks"; ?>',
            data: { 'id':d  },
            success: function(strJSON){
                var json = $.parseJSON(strJSON);
                
                $('#'+id+'_maxmark').val(json[0].max_marks);
                var newtotal= parseInt(mark1) + parseInt(json[0].max_marks);
                 
                 
                $('#maxmarktotal').val(newtotal);
                
            }
            
        });
       
        
       
      
    });
    var total=0;
    $("input:text").change(function(e){

        var id=$(this).attr('id');  
        var mark=$('#'+id).val();
        var institution=$('#institution').val();
        
        if(id!='institution'&& id!='registerNumber' && id!='TcnoDate'){
          
            if(!$.isNumeric(mark))
            {  $('#'+id).val(' ');
              
                
                alert('Please Enter Valid Mark!')
                
            }else{
                total=parseInt(total)+parseInt(mark); 
            
            
                $('#marktotal').val(total);
            }
        
        
        }
         
     
    });
    
 

</script>