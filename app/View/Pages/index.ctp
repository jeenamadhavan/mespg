<?php 
$randnum=rand ( 1 ,5 );
?>
<div class="container banner">
    <div class="jumbotron fk-jumbotron banner-<?php echo $randnum; ?>">
        <h1>Welcome!</h1>
        <h2 style="color:white;">PG Admission Portal 2015!</h2>
<!--        <ul style="color: #fff; font-size: 16px; margin: 0px;">
            <li>The Biggest residential Post Graduate Institution Under Calicut university.</li>
            <li>18 UG Courses, 14 PG Courses and 8 Research Centers.</li>
            <li>R. Sanker Award for the best special grade college in the state of Keraka(1997-98 & 1999-2000)</li>
            <li>The first college under the university of Calicut to recieve the college with potential for excellence recogonization</li>
            <li>Moulana Abul Kalam Azad literacy Award</li>
        </ul>-->
        <p> </p>
    </div>
</div>
<div class="container">
    <div class="row">
        
        <div class="col-xs-12"><b><h4 style="color:red;">The second phase entry form for PG admission will be open today by 4 PM for payment confirmed candidates.</h4></b>
        <div class="panel panel-default panel-fk">
                <div class="panel-heading">
                    <h3 class="panel-title">INSTRUCTIONS FOR PG ADMISSION 2015</h3>
                </div>
                <div class="panel-body">
                <ul class="instructions">
                    <li>
                        <strong>STEP 1 (Account Registration)</strong>
                        <ul>
                            <li>Every applicant shall create an account with a valid email id to proceed further to the application process. (In case the applicant has no e-mail id, the applicant has to create a new email id, as this shall be considered as a medium for communication between the college and the applicant).</li>
                            <li>The applicant shall enter his name, email id and a desired password for the account and register.</li>
                            <li>On registration, an account confirmation mail will be sent to the email id, wherein the applicant shall confirm the registration by clicking on the link in the email.</li>
                            <li>On confirmation of the account, the applicant shall be redirected to the login page of the admission portal, wherein the login credentials are to be entered.</li>
                        </ul>
                    </li>
                    <li>
                        <strong>STEP 2 (Generic Information, Course Selection & Application Fee payment)</strong>
                        <ul>
                            <li>All the entries in the registration form shall be filled correctly.</li>
                            <li>On saving the form an Application Number will be generated. The Application Number must be noted down by the applicant as it shall be provided for all future needs. After saving the form, applicant will be able to view his profile and can edit all the details.</li>
                            <li>Candidate has to select appropriate courses for PG admission as per eligibility criteria given in prospectus. Application Fee of Rs. 250/- for General Category and Rs. 150/ for SC/ ST must be paid per course for admission process. The payment shall be made through State Bank Collect facility provided by SBT.</li>
                            <li>Candidate must keep a printed copy of the e-receipt for future verification.</li>
                            <li>Only one payment transaction is permissible for an ID (i.e. Only one transaction ID per User permitted). Applicants are requested to go through prospectus for course selection and apply accordingly before payment through SBT.  Once application fee has paid from your ID, you cannot add your choices in course selection and pay for your new selection from that ID.</li>

                        </ul>
                    </li>
                    <li>
                        <strong>STEP 3 ( Payment Confirmation):-</strong>
                        <ul>
                            <li>On successful payment, the candidate will get an e-receipt with a Transaction ID(SBT Collect Reference Number). Candidate must enter Transaction ID in appropriate format and other required information in order to process further towards submission of application.</li>
                            <li>Candidate’s payment will be confirmed by the system within 48 hrs and a confirmation mail will be sent to your registered e-mail ID. After receiving Payment Confirmation mail, candidate may proceed further for filling application in detail, and then submission of final application for admission process.</li>                           
                        </ul>
                    </li>
                    
                </ul>


                </div>
        </div>

            
			<div class="text-center">
            <p><?php echo $this->Html->link(__('Existing User, Plese Login'), "/pages/login", array('escape' => false,'class'=>'btn btn-default btn-lg')) ?>
            <?php echo $this->Html->link(__('Not Registered, register now!'), "/pages/register", array('escape' => false,'class'=>'btn btn-info btn-lg')) ?></p>
			</div>
        </div>
    </div>
</div>