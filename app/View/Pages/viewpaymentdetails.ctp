
<div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">Transaction Details</h3>
                    </div>
</div>
<div class="main-content">
    <div class="container-fluid" style="margin:20px;">
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <a href="#" class="btn btn-default changesuccess"><span class=""></span>Add to Success List</a>
                        <a href="#" class="btn btn-default changereject"><span class=""></span>Add to Rejected List</a>
                        <a href="#" class="btn btn-default changepending"><span class=""></span>Add to Pending List</a>
                        <div  style="padding:20px;"></div>
                        <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sl No</th>
                                        <th>Application Number</th>
                                        <th>Name</th>
                                        <th>Transaction Id</th>
                                        <th>Transaction Date</th>
                                        <th>Transaction Status</th>
                                        <th>Community</th>
                                        <th>Total Fee</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo($this->Form->create('Choice')); ?>
                                    <?php $i=1; foreach ($Choices as $row){ ?>
                                    <tr><?php if(isset($row['Payments']['id'])){?>
                                        <th><input type="checkbox" class="chk" value="<?php echo $row['Payments']['id'];?>" /></th>
                                        <?php }else{?>
                                        <th></th>
                                       <?php }?>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('application_no', array('label' => false, 'class' => 'form-control',  'type' => 'hidden')); 
                                            ?>
                                            <?php echo $row['Choices']['application_no'] ?>
                                        </td>
                                        
                                        <td>
                                            <?php 
                                            echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'name')); 
                                            ?>
                                            <?php echo $row['User']['frkName']; ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('transaction_id', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'gender')); 
                                            ?>
                                            <?php echo $row['Payments']['transaction_id']; ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('date', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'gender')); 
                                            ?>
                                            <?php echo $row['Payments']['date']; ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('status', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'gender')); 
                                            ?>
                                            
                                            <?php if($row['Payments']['status']=='P'){echo 'Pending';}else if($row['Payments']['status']=='R'){ echo 'Rejected';}else if($row['Payments']['status']=='C'){ echo 'Completed';}else if($row['Payments']['status']==''){ echo 'Transaction Id Not Submitted';}
                                                 ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('community', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'community')); 
                                            ?>
                                            <?php echo $row['Communities']['name']; ?>
                                            
                                        </td>
                                       <td>
                                            <?php 
                                            echo $this->Form->input('amount', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'amount')); 
                                            ?>
                                            <?php echo $row['Choices']['amount']; ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                            echo $this->Form->input('date', array('label' => false, 'class' => 'form-control', 'type' => 'hidden','id' => 'gender')); 
                                            ?>
                                            <?php echo $row['Choices']['date']; ?>
                                            
                                        </td>
                                        
                                        
                                    </tr>
                                    <?php $i++; } ?>
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
    



