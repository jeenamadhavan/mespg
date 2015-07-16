 
<script type="text/javascript">

 $("input:text").change(function(e){

     alert(subjectstructure);
        var subjectstructure=$(this).val();
        <?php $subjectstructure ?>=+subjectstructure;
        
        
        
       
         
     
    });
</script>


<table class="table table-bordered"><?php echo $subjectstructure;?>
    <caption><strong>Details of Mark</strong></caption>
    <label for="noofsubjects" class="control-label">No of Subjects<sup class="madadatory">*</sup></label><br>
    <div class="form-group">

                                                <?php
                                                echo $this->Form->input('SecondaryRegister.noofsubjects', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'placeholder' => '12th School Name',
                                                    'maxlength' => '250',
                                                    'id' => 'institution',
                                                    'required' => 'required')
                                                );
                                                ?>
                                            </div>
    <thead>
        <tr>
            <th colspan="2">Subject</th>
            <th>Grade</th>
            <th>Mark Scored</th>
            <th>Maximum Marks</th>

        </tr>
    </thead>
    <tbody>
        <?php  for($i=0;$i<$subjectstructure;$i++){?>
        
            $part = 1;
            ?>
            <tr class="warning" >
                <td>Part 1</td>
                <td> <?php
            echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . 0, array(
                'type' => 'text',
                'empty' => '-- select one --',
                'class' => 'form-control partsubject1',
                'id' => 'part' . $part . 'subject',
                'required' => 'required',
                'label' => false,
            ));
            ?>
                  

                </td>

                <td>
                    <?php
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . 0, array(
                         'type' => 'text',
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
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . 0, array(
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
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject_maxmark"  name="SecondaryRegister.part<?php echo $part; ?>maxmark" title="Part 1 Maximum Mark" required >
                    </div>
                </td>

            </tr><?php }?>
       
        <?php
        
            $part = 2;
            ?>
            <tr class="info">
                <td>Part 2</td>
                <td> <?php
            echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . 1, array(
                'type' => 'text',
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
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . 1, array(
                        'type' => 'text',
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
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . 1, array(
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
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject_maxmark" name="SecondaryRegister.part<?php echo $part; ?>maxmark" title="Part 1 Maximum Mark" required >
                    </div>
                </td>

            </tr>


        <tr class="success">
            <td rowspan="">Part 3</td>
            <?php
            
                $part = 3;
                ?>
                <td><?php
                echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . 0, array(
                    'type' => 'text',
                    'empty' => '-- select one --',
                    'class' => 'form-control partsubject3',
                    'id' => 'part' . $part . 'subject' . 0,
                    'required' => 'required',
                    'label' => false
                ));
                ?>

                </td>
                <td>
                    <?php
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . 0, array(
                         'type' => 'text',
                        'empty' => '-- select one --',
                        'class' => 'form-control',
                        'id' => 'part' . $part . 'grade' . 0,
                        'required' => 'required',
                        'label' => false
                    ));
                    ?>
                </td>
                <td>
                    <div class="form-group">



                        <?php
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . 0, array(
                            'type' => 'text',
                            'class' => 'form-control obmark',
                            'id' => 'part' . $part . 'mark' . 0,
                            'required' => 'required',
                            'label' => false
                        ));
                        ?>   

                    </div>
                </td>
                <td >
                    <div class="form-group">
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject0_maxmark" name="SecondaryRegister.part3maxmark1" title="Part 1 Maximum Mark" required >
                    </div>
                </td>

            </tr>
 <tr class="success">
            <td rowspan="">Part 3</td>
            <?php
            
                $part = 3;
                ?>
                <td><?php
                echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . 1, array(
                    'type' => 'text',
                    'empty' => '-- select one --',
                    'class' => 'form-control partsubject3',
                    'id' => 'part' . $part . 'subject' . 1,
                    'required' => 'required',
                    'label' => false
                ));
                ?>

                </td>
                <td>
                    <?php
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . 1, array(
                       'type' => 'text',
                        'empty' => '-- select one --',
                        'class' => 'form-control',
                        'id' => 'part' . $part . 'grade' . 1,
                        'required' => 'required',
                        'label' => false
                    ));
                    ?>
                </td>
                <td>
                    <div class="form-group">



                        <?php
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . 1, array(
                            'type' => 'text',
                            'class' => 'form-control obmark',
                            'id' => 'part' . $part . 'mark' . 1,
                            'required' => 'required',
                            'label' => false
                        ));
                        ?>   

                    </div>
                </td>
                <td >
                    <div class="form-group">
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject1_maxmark" name="SecondaryRegister.part3maxmark1" title="Part 1 Maximum Mark" required >
                    </div>
                </td>

            </tr>
            <tr class="success">
            <td rowspan="">Part 3</td>
            <?php
            
                $part = 3;
                ?>
                <td><?php
                echo $this->Form->input('SecondaryRegister.part' . $part . 'subject' . 2, array(
                    'type' => 'text',
                    'empty' => '-- select one --',
                    'class' => 'form-control partsubject3',
                    'id' => 'part' . $part . 'subject' . 2,
                    'required' => 'required',
                    'label' => false
                ));
                ?>

                </td>
                <td>
                    <?php
                    echo $this->Form->input('SecondaryRegister.part' . $part . 'grade' . 2, array(
                        'type' => 'text',
                        'empty' => '-- select one --',
                        'class' => 'form-control',
                        'id' => 'part' . $part . 'grade' . 2,
                        'required' => 'required',
                        'label' => false
                    ));
                    ?>
                </td>
                <td>
                    <div class="form-group">



                        <?php
                        echo $this->Form->input('SecondaryRegister.part' . $part . 'mark' . 2, array(
                            'type' => 'text',
                            'class' => 'form-control obmark',
                            'id' => 'part' . $part . 'mark' . 2,
                            'required' => 'required',
                            'label' => false
                        ));
                        ?>   

                    </div>
                </td>
                <td >
                    <div class="form-group">
                        <input type="text" class="form-control maxmark" id="part<?php echo $part; ?>subject2_maxmark" name="SecondaryRegister.part3maxmark1" title="Part 1 Maximum Mark" required >
                    </div>
                </td>

            </tr>

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
        total=parseInt(total)+parseInt($('#'+id).val());
     
     
        $('#marktotal').val(total);
         
     
    });
    
 

</script>