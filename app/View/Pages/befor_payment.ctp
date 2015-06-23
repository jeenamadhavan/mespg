<?php 
$randnum=rand ( 1 ,5 );
?>
<div class="container banner">
    <div class="jumbotron fk-jumbotron banner-<?php echo $randnum; ?>">
        <h1>Instructions</h1>
<!--        <ul style="color: #fff; font-size: 16px; margin: 0px;">
            <li>The Biggest residential Post Graduate Institution Under Calicut university.</li>
            <li>18 UG Courses, 14 PG Courses and 8 Research Centers.</li>
            <li>R. Sanker Award for the best special grade college in the state of Keraka(1997-98 & 1999-2000)</li>
            <li>The first college under the university of Calicut to recieve the college with potential for excellence recogonization</li>
            <li>Moulana Abul Kalam Azad lietarecy Award</li>
        </ul>-->
    </div>
</div>
<div class="container">


        <div class="row" id="">
            <div class="col-xs-12">
                
             
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading" style="background-color:#d95c5c;">
                            <h3 class="panel-title" style="color:#fff;"><strong>INSTRUCTIONS</strong></h3>
                        </div>
                        <div class="panel-body">
                             <div class="row" >
  <div class="col-xs-12">    

<ul>
    <li>Application Fee: Rs. 250/- for General Category and Rs. 150/ for SC/ ST (per course). Please do the payment through State Bank Collect facility provided by SBT.</li>
<li>On successful payment, the candidate will get an e-receipt with a Transaction ID. Candidate must enter Transaction ID in appropriate format (in Basic Info Page, "Verify Payment" button) in order to process further towards submission of application.</li>
<li>Candidate’s payment will be confirmed by the system within 48 hrs and a confirmation mail will be sent to your registered e-mail ID. After receiving Payment Confirmation mail, candidate may proceed further for filling application in detail, and then submission of final application for admission process.</li>
<li>Candidate must keep a printed copy of the e-receipt for future verification.</li>
<li><strong>If confirmation has not received by the system within 48 hours, please contact </strong>admission@farookcollege.ac.in with a soft copy of e-receipt</li>
</ul>
</div>
</div>
                   <span class="panel-title" style="color:#474646; text-transform: capitalize;">
<h5>You will need the following info during the payment process, please make a note of it.</h5></span>
                          
        <div class="col-xs-6">                          
     <table  class="table" style=" border:1px dotted #e2e2e2;  text-align:left ; font-size:12px; margin:0 auto;">
    <tbody>
         <tr>
        <td>Payment Amount :</td>
        <td><span style="color:#A52929;">&#8377;<strong> <?php echo $Userdata['amount'];  ?></span></strong></td>
      </tr>
      <tr>
        <td>Application Number :</td>
        <td><?php echo $Userdata['Choices']['application_no'];  ?></td>
      </tr>
      <tr>
        <td>Name :	</td>
        <td><?php echo $Userdata['User']['frkUserName'];  ?></td>
      </tr>
      <tr>
        <td>Email Id :</td>
        <td><?php echo $Userdata['User']['frkUserEmail'];  ?></td>
      </tr>
      <tr>
        <td>Date of Birth :</td>
        <td><?php echo $Userdata['User']['frkUserDOB'];  ?></td>
      </tr>
      <tr>
        <td>Mobile Number :</td>
        <td><?php echo $Userdata['User']['frkUserMobile'];  ?></td>
      </tr>
     
    </tbody>
  </table>
                            





    
    
Please click below link to State Bank Collect
                              
                        
                            <div class="form-group">
                            
                                <?php echo $this->Html->link(__('SBT ONLINE'), "https://www.sbtonline.in/prelogin/icollecthome.htm", array('target' => '_blank','escape' => false,'class'=>'btn btn-primary','id'=>'SubmitButton')) ?>
                            </div>
</div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
</div>