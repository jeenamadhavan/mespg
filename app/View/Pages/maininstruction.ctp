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

    <?php echo $this->Form->create('PrimaryRegister', array('id' => 'myForm', 'name' => 'PrimaryRegisterForm')) ?> 
        <div class="row" id="">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">INSTRUCTIONS</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <textarea class="form-control" rows="30" disabled>
-------------------------------------------
1.	STEP 1 (Account Registration):-
-------------------------------------------
#	Every applicant shall create an account with a valid email id to proceed further to the application process. (In case the applicant has no e-mail id, the applicant has to create a new email id, as this shall be considered as a medium for communication between the college and the applicant). 
#	The applicant shall enter his name, email id and a desired password for the account and register.
#	On registration, an account confirmation mail will be sent to the email id, wherein the applicant shall confirm the registration by clicking on the link in the email.
#	On confirmation of the account, the applicant shall be redirected to the login page of the admission portal, wherein the login credentials are to be entered.
-------------------------------------------
2.	STEP 2 (Personal Information):-
-------------------------------------------
#	All the entries in the form shall be filled in as per the records in the documents.
#	On completion of the entry in the form, the applicant shall read the declaration and save the form.
#	On saving the form, the applicant is able to view his profile and can edit all the details. 
#	On completion of STEP 2, the applicant shall receive the Applicant ID which shall be noted down by the applicant as it shall be provided for all future needs.
-------------------------------------------
3.	STEP 3 ( Qualifying Examination/ Application Fee):- (SHALL ONLY BE ACTIVATED ONCE THE KERALA HSC EXAMINATION RESULTS ARE PUBLISHED)
-------------------------------------------
#	The details of the qualifying examinations are to be entered correctly by the applicant.
#	Any mismatch/false information in the qualifying examination details shall result in cancellation of the application without any prior notice.
#	After the entry of the Qualifying examinations and the courses sought for admission, the applicant shall remit the application and processing fee (Rs 150/- for general, Rs 100/- for SC/ST) through the online payment mode powered by State Bank.
#	The link for the online payment option will be available in the portal itself.
#	The instructions for the online payment option shall also be available in the portal.
#	On successful payment, the applicant shall fill in the required payment details in the Application Fee page in the admission portal and proceed.
-------------------------------------------
4.	STEP 4 (Submission of the Application form):-
-------------------------------------------
#	On completion of STEP 3, the applicant shall re-verify all the details furnished and shall submit the form.
#	Once the form is submitted, no corrections/changes shall be allowed. 
#	Take the Printout of the submitted application and produce it at the time of interview for admission
  
                                </textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="agree" id="Agree">
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I Understand All Instructions. 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <?php echo $this->Html->link(__('FILL APPLICATION'), "/pages/choice_select", array('escape' => false,'class'=>'btn btn-success','id'=>'SubmitButton','disabled'=>'disabled')) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
    var checkboxes = $("#Agree"),
    submitButt = $("#SubmitButton");

    checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
    
    });
</script>

