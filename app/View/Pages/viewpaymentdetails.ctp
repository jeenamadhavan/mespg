
<div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">Index Details</h3>
                    </div>
</div>
<div class="main-content">
    <div class="container-fluid" style="margin:20px;">
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        
                        <div  style="padding:20px;"></div>
                        <table class="table table-bordered" id="datatable" >
                           
                                <thead>
                                    <tr><label for="QualifyingExam" class="control-label">Programmes<sup class="madadatory">*</sup></label><br>
                            <?php
                            echo $this->Form->input('', array(
                                'options' => $options,
                                'empty' => '-- select one --',
                                'class' => '',
                                'id' => 'courses',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?><b><a href='indexdetails'>View All List</a></b></tr>
                                
                                    <tr>
                                    
                                        
                                        <th>Application Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Course name</th>
                                        <th>Index</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo($this->Form->create('Choice')); ?>
                                    
                                    <?php  $num=1;foreach ($indexes as $row){ ?>
                                    <tr><?php if(isset($row['indexes']['id'])){?>
                                        
                                        <?php }else{?>
                                        <th></th>
                                       <?php }?>
                                       
                                        <td>
                                            <?php 
                                            echo $this->Form->input('application_no', array('label' => false, 'class' => 'form-control',  'type' => 'hidden')); 
                                            ?>
                                            <?php //echo $row['choices']['application_no'] ?>
                                              <?php echo $this->Html->link($row['choices']['application_no'], "/admins/generatepdf/".$row['indexes']['user_id']."/".$row['courses']['frkCourseID'], array('escape' => false)) ?>
                                        </td>
                                        
                                       <td>
                                            <?php 
                                            echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'name')); 
                                            ?>
                                                                      <?php echo $this->Html->link($row['users']['frkUserName'], "/admins/edit_applicant/".$row['indexes']['user_id'], array('escape' => false)) ?>

                                            
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('email', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'name')); 
                                            ?>
                                            <?php echo $row['users']['frkUserEmail']; ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('mobile', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'name')); 
                                            ?>
                                            <?php echo $row['users']['frkUserMobile']; ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('coursename', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'name')); 
                                            ?>
                                            <?php echo $row['courses']['coursename']; ?>
                                            
                                        </td>
                                       <td>
                                            <?php 
                                            echo $this->Form->input('index', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'name')); 
                                            ?>
                                            <?php echo $row['indexes']['index']; ?>
                                            
                                        </td>
                                        
                                        
                                    </tr>
                                    <?php  $num++;} ?>
                                    <?php echo $this->Form->end(); ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        $(document).ready(function() {
            $('#courses').on('change',function(e){
            var id=$(this).val();
            $.ajax({
            type: "POST",
            url: '<?php echo Router::url('/', true) . "admins/ajax_view"; ?>',
            data: { 'id':id  },
            success: function(response){
                $(".panel-body").html(response);
           
               }
            
        });
        
    });
            
            
            
            
            $('#datatable').DataTable();
            
            
            
             $('.changesuccess').click(function () {
             
            var chkArray = [];
	
            $(".chk:checked").each(function() {
                
                chkArray.push($(this).val());
            });
            
            if(chkArray.length >= 1){
		
                $.ajax({
                    url: '<?php echo Router::url('/', true) . "admins/changestatus"; ?>',
                    type: 'post',
                    data: {'action': chkArray,'status':'C'},
                    success: function(data, status) {
                        if(data == "ok") {
        
                            document.location.href = '<?php echo Router::url('/', true) . "admins/viewpaymentdetails"; ?>';
                        }
                    }
                }); 
                // end ajax call   
                
                
           }else{
                alert("Please select at least one of the checkbox");	
            }
            
     

        });
         $('.changereject').click(function () {
             
            var chkArray = [];
	
            $(".chk:checked").each(function() {
                chkArray.push($(this).val());
            });
            if(chkArray.length >= 1){
		
                $.ajax({
                    url: '<?php echo Router::url('/', true) . "admins/changestatus"; ?>',
                    type: 'post',
                    data: {'action': chkArray,'status':'R'},
                    success: function(data, status) {
                        if(data == "ok") {
        
                            document.location.href = '<?php echo Router::url('/', true) . "admins/viewpaymentdetails"; ?>';
                        }
                    },
                    error: function(xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                }); // end ajax call   
                
                
            }else{
                alert("Please select at least one of the checkbox");	
            }
            
     

        });
        $('.changepending').click(function () {
             
            var chkArray = [];
	
            $(".chk:checked").each(function() {
                chkArray.push($(this).val());
            });
            if(chkArray.length >= 1){
		
                $.ajax({
                    url: '<?php echo Router::url('/', true) . "admins/changestatus"; ?>',
                    type: 'post',
                    data: {'action': chkArray,'status':'P'},
                    success: function(data, status) {
                        if(data == "ok") {
        
                            document.location.href = '<?php echo Router::url('/', true) . "admins/viewpaymentdetails"; ?>';
                        }
                    },
                    error: function(xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                }); // end ajax call   
                
                
            }else{
                alert("Please select at least one of the checkbox");	
            }
            
     

        });
            
            
        });
         
        

    </script>
    



