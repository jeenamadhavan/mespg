
<style type="text/css">
    .container {
        display: none;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('.container').show();
    });
</script>
<div class="container" style="margin-top:10px;">


        <div class="row" >
            <div class="col-xs-12">
  
              <div class="col-md-12">
                  <div class="panel panel-primary">
                      <div class="panel-heading">Payment Verification

                      </div>
                      <div class="panel-body">
    <?php echo $this->Form->create('Pages' ,array( 'action'=>'after_payment_verify','id' => 'myForm','role'=>'form','class'=>'form-horizontal' ,'name' => 'PrimaryRegisterForm')) ?> 

                              <div class="form-group">
                                  <label class="control-label col-sm-2" for="AdmissionNumber">Application Number</label>
                                  <div class="col-sm-4">
                                      <input type="text" class="form-control" required id="ApplicationNumber" value="<?php echo $Userdata['Choices']['application_no']; ?>" name="ApplicationNumber" readonly >
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-2" for="transaction_id">Transaction Id</label>
                                  <div class="col-sm-4">
                                      <input maxlength="10" onblur="tran(this.value);"  required type="text" class="form-control"  id="transaction_id" name="transaction_id"  title="Enter a valid Transaction Id In Relevant Format,Eg:DU12345678"   placeholder="Enter a valid Transaction Id , Eg : DU12345678">
                                  </div>
                              </div>
                               <div class="form-group">
                                  <label class="control-label col-sm-2" for="transaction_id">Confirm Transaction Id</label>
                                  <div class="col-sm-4">
                                      <input maxlength="10" onblur="tran2();"  required type="text" class="form-control"  id="transaction_id2" name="transaction_id2"  title="Confirm Transaction Id"   placeholder="Confirm Transaction Id">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-2" for="TransactionDate">Transaction Date</label>
                                  <div class="col-sm-4">
                                       <input type="text" required class="form-control datepicker" name="transactionDate">  
                                
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                      <button  type="submit" class="btn btn-default">Submit</button>
                                      <?php echo $this->Html->link(__('BACK TO BASIC INFO'), array('controller'=>'pages','action'=>'choice_select'), array('escape' => false,'class'=>'btn btn-success')) ?>
                                  </div>
                              </div>
                       <?php echo $this->Form->end(); ?>
                      </div>

                  </div>
        </div>  

            </div>
        </div>
</div>
<noscript>
 <p><h2>We have detected that Javascript is disabled in your browser.This application requires javascript to be enabled.Here are some <a href="http://www.enable-javascript.com/">instructions on how to enable Javascript </a>in your browser.</h2></p>
   
</noscript>


<script>
$(document).ready(function(){
$('.datepicker').datepicker();
}); 
</script>
<script>

function tran(data){
 re=/^[A-Z]{2}[0-9]{8}$/;
 var result = re.test(data)


if(result){
  return true;
}else{
    document.getElementById('transaction_id').focus();
}
}
</script>

<script>

function tran2(){


var value1 = document.getElementById('transaction_id').value;
var value2 =  document.getElementById('transaction_id2').value;
  
  
 re=/^[A-Z]{2}[0-9]{8}$/;
 var result = re.test(value1);


if(result){
  
  
  if(value1==value2){
   document.getElementById("transaction_id2").style.borderColor = "#dfd7ca";

  	return true;
  }else{
  document.getElementById("transaction_id2").style.borderColor = "#E34234";
    document.getElementById('transaction_id2').focus();

  }
}else{
    document.getElementById("transaction_id").style.borderColor = "#E34234";
    document.getElementById('transaction_id').focus();
}
}
</script>
<script>
$(document).ready(function(){
    
$("#transaction_id").blur(function(){
    var data = $('#transaction_id').val() ;
    re=/^[A-Z]{2}[0-9]{8}$/;
     var result = re.test(data);
     if(result){
    return true;
}else{
    $('#transaction_id').focus();
}
   
});    
}); 
</script>