
<?php 
$randnum=rand ( 1 ,5 );
?>
<div class="container banner">
    <div class="jumbotron fk-jumbotron banner-<?php echo $randnum; ?>">
        <h1>Welcome!</h1>
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
    <div class="stepwizard col-md-12">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>PRIMARY INFORMATION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>ADDRESS INFORMATIONS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>DETAILS OF TENTH EXAMINATION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>OTHER INFORMATIONS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>CONFIRM AND FINISH</p>
            </div>
        </div>
    </div>
    <?php echo $this->Form->create('PrimaryRegister', array('id' => 'myForm', 'name' => 'PrimaryRegisterForm')) ?> 

        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">PRIMARY INFORMATIONS</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">

                                    <div class="form-group">
                                        <label for="name" class="control-label">Name<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.name', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'name', 
                                            'maxlength' => '250', 
                                            'placeholder' => 'Enter Your Name',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> In block letters exactly as in SSLC book</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email" class="control-label">Email<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.email', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'Email',
                                            'type'=>'email',
                                            'maxlength' => '250',
                                            'placeholder' => 'Enter a valid Email Address',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter a Valid Email</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Adhaar Number</label>
                                        <?php echo $this->Form->input('PrimaryRegister.adhaar', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'adhaar',
                                            'maxlength' => '250',
                                            'placeholder' => 'Enter Adhaar Number',
                                        )
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Your Adhaar Card Number</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="BloodGroup" class="control-label">Blood Group<sup class="madadatory">*</sup></label><br>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.blood', array(
                                            'options' => array(
                                                'Oplus' => 'O+',
                                                'Oneg' => 'O-',
                                                'Aplus' => 'A+',
                                                'Aneg' => 'A-',
                                                'Bplus' => 'B+',
                                                'Bneg' => 'B-',
                                                'ABplus' => 'AB+',
                                                'ABneg' => 'AB-'
                                                ),
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'BloodGroup',
                                            'required' => 'required',
                                            'label' => false
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Religion" class="control-label">Religion<sup class="madadatory">*</sup></label>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.religion', array(
                                            'options' => $religions,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'Religion',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>

                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                        <div id="otherReligionType" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.religion-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null', 
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Relegion',
                                            'required'=>'required')
                                        ); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="DateofBirth" class="control-label">Date of Birth<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.dob', array(
                                            'label' => false, 
                                            'class' => 'form-control datepicker',
                                            'data-format' => 'DD/MM/YYYY', 
                                            'data-template' => 'D MMM YYYY', 
                                            'placeholder' => 'dd/mm/yyyy',
                                            'id' => 'DateofBirth',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> As in SSLC Book</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="FatherName" class="control-label">Father's Name<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.father-name', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Your Father Name',
                                            'maxlength' => '250',
                                            'id' => 'FatherName',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Father's Name</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="FatherQualification" class="control-label">Father's Qualification<sup class="madadatory">*</sup></label>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.father-qualification', array(
                                            'options' => $qualifications,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'FatherQualification',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Father's Qualification</span>
                                        <div id="otherFatherQualification" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.father-qualification-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null',
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Father Qualification',
                                            'required'=>'required')
                                        ); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="FatherOccupation" class="control-label">Father's Occupation<sup class="madadatory">*</sup></label>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.father-occupation', array(
                                            'options' => $occupations,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'FatherOccupation',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Father's Occupation</span>
                                        <div id="otherFatherOccupation" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.father-occupation-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null',
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Father Occupation',
                                            'required'=>'required')
                                        ); ?>
                                        </div>

                                    </div>


                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="Gender" class="control-label">Gender<sup class="madadatory">*</sup></label><br>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.gender', array(
                                            'options' => array(
                                                'M' => 'Male',
                                                'F' => 'Female',
                                                'N' => 'Neutral',
                                                ),
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'Gender',
                                            'required' => 'required',
                                            'label' => false
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Mobile" class="control-label">Mobile<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.mobile', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter a Mobile Number',
                                            'maxlength' => '10',
                                            'id' => 'Mobile',
                                            'required'=>'required')
                                        ); ?>
                                        <span id="errmsg" style="color:red;"></span>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter a Ten Digit Valid Mobile Number</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nationality" class="control-label">Nationality<sup class="madadatory">*</sup></label><br>
                             
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.nationality', array(
                                            'options' => $countries,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'Nationality',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Community" class="control-label">Category<sup class="madadatory">*</sup></label><br>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.community', array(
                                            'options' => $communities,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'Community',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                        <div id="otherCommunity" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.community-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null',
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Category',
                                            'required'=>'required')
                                        ); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="PlaceofBirth" class="control-label">Place of Birth<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.placeofbirth', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Place of Birth',
                                            'maxlength' => '250',
                                            'id' => 'PlaceofBirth',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Your Birth Place</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="MotherName" class="control-label">Mother's Name<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.mother-name', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Your Mother Name',
                                            'maxlength' => '250',
                                            'id' => 'MotherName',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Mother's Name</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="MotherQualification" class="control-label">Mother's Qualification<sup class="madadatory">*</sup></label>
               
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.mother-qualification', array(
                                            'options' => $qualifications,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'MotherQualification',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Mother's Qualification</span>
                                        <div id="otherMotherQualification" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.mother-qualification-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null',
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Mother Qualification',
                                            'required'=>'required')
                                        ); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="MotherOccupation" class="control-label">Mother's Occupation<sup class="madadatory">*</sup></label>
                                        <?php
                                        $motheroccupation=$occupations;
                                        $motheroccupation[0]='House Wife';
                                        echo $this->Form->input('PrimaryRegister.mother-occupation', array(
                                            'options' => $motheroccupation,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'MotherOccupation',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Mother's Occupation</span>
                                        <div id="otherMotherOccupation" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.mother-occupation-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null', 
                                                'maxlength' => '250',
                                            'placeholder' => 'Specify Mother Occupation',
                                            'required'=>'required')
                                        ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">Address Information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h4>Permanent Address</h4>
                                <div class="form-group">
                                    <label for="perma-addline1" class="control-label">Address Line 1<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.perma-addline1', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 1',
                                        'maxlength' => '250',
                                            'id' => 'perma-addline1',
                                            'required'=>'required')
                                        ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 1(Eg:-House Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="perma-addline2" class="control-label">Address Line 2<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.perma-addline2', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 2',
                                        'maxlength' => '250',
                                            'id' => 'perma-addline2',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 2(Eg:-Street Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="perma-postoffice" class="control-label">Post Office<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.perma-postoffice', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Post Office',
                                        'maxlength' => '250',
                                            'id' => 'perma-postoffice',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Post Office</span>
                                </div>
                                <div class="form-group">
                                    <label for="perma-pincode" class="control-label">Pin Code<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.perma-pincode', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Pin Code',
                                        'maxlength' => '6',
                                            'id' => 'perma-pincode',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Pin Code</span>
                                </div>
                                <div class="form-group">
                                    <label for="perma-city" class="control-label">District<sup class="madadatory">*</sup></label>
									<?php
                                        echo $this->Form->input('PrimaryRegister.perma-city', array(
                                            'options' => $districts,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'PermaCity',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Select District Name(Eg:-Calicut)</span>
									<div id="otherPermaCity" style="display: none;">
                                        <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.perma-city-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'perma-city-other',
                                                'maxlength' => '250',
                                            'value' => 'null', 
                                            'placeholder' => 'Specify District',
                                            'required'=>'required')
                                        ); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="perma-state" class="control-label">State<sup class="madadatory">*</sup></label>
                                    <?php
                                    echo $this->Form->input('PrimaryRegister.perma-state', array(
                                        'options' => $states,
                                        'empty' => '-- select one --',
                                        'class' => 'form-control',
                                        'id' => 'perma-state',
                                        'label' => false,
                                        'required' =>'required'
                                    ));
                                    ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                                    <div id="otherPermaState" style="display: none;">
                                        <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.perma-state-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'perma-state-other',
                                                'maxlength' => '250',
                                            'value' => 'null', 
                                            'placeholder' => 'Specify State',
                                            'required'=>'required')
                                        ); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="perma-country" class="control-label">Country<sup class="madadatory">*</sup></label>
                                    <?php
                                    echo $this->Form->input('PrimaryRegister.perma-country', array(
                                        'options' => $countries,
                                        'empty' => '-- select one --',
                                        'class' => 'form-control',
                                        'id' => 'perma-country',
                                        'label' => false,
                                        'required' =>'required'
                                    ));
                                    ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="" id="Copy">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copy Permanent Address to Communication Address
                                    </label>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <h4>Address for Communication</h4>
                                <div class="form-group">
                                    <label for="comm-addline1" class="control-label">Address Line 1<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.comm-addline1', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 1',
                                        'maxlength' => '250',
                                            'id' => 'comm-addline1',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 1(Eg:-House Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="comm-addline2" class="control-label">Address Line 2<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.comm-addline2', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 2',
                                        'maxlength' => '250',
                                            'id' => 'comm-addline2',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 2(Eg:-Street Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="comm-postoffice" class="control-label">Post Office<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.comm-postoffice', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Post Office',
                                        'maxlength' => '250',
                                            'id' => 'comm-postoffice',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Post Office</span>
                                </div>
                                <div class="form-group">
                                    <label for="comm-pincode" class="control-label">Pin Code<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.comm-pincode', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Pin Code',
                                        'maxlength' => '6',
                                            'id' => 'comm-pincode',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Pin Code</span>
                                </div>
                                <div class="form-group">
                                    <label for="comm-city" class="control-label">District<sup class="madadatory">*</sup></label>
									<?php
                                        echo $this->Form->input('PrimaryRegister.comm-city', array(
                                            'options' => $districts,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'CommCity',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Select District Name(Eg:-Calicut)</span>
									<div id="otherCommCity" style="display: none;">
                                        <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.comm-city-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'comm-city-other',
                                                'maxlength' => '250',
                                            'value' => 'null', 
                                            'placeholder' => 'Specify District',
                                            'required'=>'required')
                                        ); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comm-state" class="control-label">State<sup class="madadatory">*</sup></label>
                                    <?php
                                    echo $this->Form->input('PrimaryRegister.comm-state', array(
                                        'options' => $states,
                                        'empty' => '-- select one --',
                                        'class' => 'form-control',
                                        'id' => 'comm-state',
                                        'label' => false,
                                        'required' =>'required'
                                    ));
                                    ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                                    <div id="otherCommState" style="display: none;">
                                        <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.comm-state-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'comm-state-other',
                                                'maxlength' => '250',
                                            'value' => 'null', 
                                            'placeholder' => 'Specify State',
                                            'required'=>'required')
                                        ); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comm-country" class="control-label">Country<sup class="madadatory">*</sup></label>
                                    <?php
                                    echo $this->Form->input('PrimaryRegister.comm-country', array(
                                        'options' => $countries,
                                        'empty' => '-- select one --',
                                        'class' => 'form-control',
                                        'id' => 'comm-country',
                                        'label' => false,
                                        'required' =>'required'
                                    ));
                                    ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                                </div>
                            </div>
                            
                             <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="phonestd" class="control-label">Phone STD Code</label>
                                    
                                    <?php echo $this->Form->input('PrimaryRegister.phonestd', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter STD Code',
                                        'maxlength' => '10',
                                            'id' => 'phonestd',
                                        )
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter STD Code(Eg:-0466)</span>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="phonenumber" class="control-label">Phone Number</label>
                                    <?php echo $this->Form->input('PrimaryRegister.phonenumber', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Phone Number',
                                        'maxlength' => '20',
                                            'id' => 'phonenumber',
                                        )
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Phone Number</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details of Tenth Examination</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <label for="QualifyingExam" class="control-label">Examination (10) Passed<sup class="madadatory">*</sup></label><br>
                                <?php
                                echo $this->Form->input('PrimaryRegister.qualifyingexam', array(
                                    'options' => array(
                                        'SSLC' => 'Kerala SSLC',
                                        'CBSE' => 'CBSE',
                                        'ICSE' => 'ICSE',
                                        'other' => 'other',

                                    ),
                                    'empty' => '-- select one --',
                                    'class' => 'form-control',
                                    'id' => 'QualifyingExam',
                                    'required' => 'required',
                                    'label' => false
                                ));
                                ?>
                                
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                <div id="otherQualifyingExam" style="display: none;">
                                    <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.otherqualifyingexam', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Specify Qualifying Exam',
                                            'value' => 'null',
                                        'maxlength' => '250',
                                            'required'=>'required')
                                     ); ?>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <caption><strong>Details 10th Standard Examination</strong></caption>
                                    <thead>
                                        <tr>
                                            <th>Institution Attended<sup class="madadatory">*</sup></th>
                                            <th>Year of Study<sup class="madadatory">*</sup></th>
                                            <th>Register Number<sup class="madadatory">*</sup></th>
                                            <th>Year of Pass<sup class="madadatory">*</sup></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    
                                                    <?php echo $this->Form->input('PrimaryRegister.ten-school', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '10th School Name',
                                                        'maxlength' => '250',
                                                            'id' => 'ten-school',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                echo $this->Form->input('PrimaryRegister.tenyearofstudy', array(
                                                    'options' => array(
                                                        '2014-2015' => '2014-2015',
                                                        '2013-2014' => '2013-2014',
                                                        '2012-2013' => '2012-2013',
                                                        '2011-2012' => '2011-2012',
                                                        '2010-2011' => '2010-2011',
                                                        '2009-2010' => '2009-2010',
                                                        '2008-2009' => '2008-2009',
                                                        '2007-2008' => '2007-2008',
                                                        '2006-2007' => '2006-2007',
                                                        '2005-2006' => '2005-2006',
                                                        '2004-2005' => '2004-2005',
                                                        '2003-2004' => '2003-2004',
                                                        '2002-2003' => '2002-2003',
                                                        '2001-2002' => '2001-2002',
                                                        '2000-2001' => '2000-2001',
                                                        ),
                                                    'empty' => '-- select one --',
                                                    'class' => 'form-control',
                                                    'id' => 'tenyearofstudy',
                                                    'required' => 'required',
                                                    'label' => false
                                                ));
                                                ?>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $this->Form->input('PrimaryRegister.tenthRegno', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => 'Register Number',
                                                        'maxlength' => '30',
                                                            'id' => 'tenthRegno',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                echo $this->Form->input('PrimaryRegister.TenYearofPassing', array(
                                                    'options' => array(
                                                        '2015' => '2015',
                                                        '2014' => '2014',
                                                        '2013' => '2013',
                                                        '2012' => '2012',
                                                        '2011' => '2011',
                                                        '2010' => '2010',
                                                        '2009' => '2009',
                                                        '2008' => '2008',
                                                        '2007' => '2007',
                                                        '2006' => '2006',
                                                        '2005' => '2005',
                                                        '2004' => '2004',
                                                        '2003' => '2003',
                                                        '2002' => '2002',
                                                        '2001' => '2001',
                                                        ),
                                                    'empty' => '-- select one --',
                                                    'class' => 'form-control',
                                                    'id' => 'TenYearofPassing',
                                                    'required' => 'required',
                                                    'label' => false
                                                ));
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">Other Informations</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="CareerAmbition" class="control-label">Career Ambition<sup class="madadatory">*</sup></label>
                                    <?php
                                    echo $this->Form->input('PrimaryRegister.carrer-ambition', array(
                                        'options' => $ambitions,
                                        'empty' => '-- select one --',
                                        'class' => 'form-control',
                                        'id' => 'CareerAmbition',
                                        'label' => false,
                                        'required' => 'required'
                                    ));
                                    ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Career Ambition</span>
                                    <div id="otherCareerAmbition" style="display: none;">
                                        <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.other-carrer-ambition', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Specify Career Ambition',
                                            'maxlength' => '250',
                                            'value' => 'null',
                                            'required'=>'required')
                                     ); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inlineCheckbox1" class="control-label">Have you Appeared for Entrance Examination<sup class="madadatory">*</sup></label><br>
                                    
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.keralmedical', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'Kerala Medical',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.keralengg', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'Kerala Engineering',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.iit', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'NEST',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.jee', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'JEE',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.aitmt', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'AIPMT',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.aiims', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'AIIMS',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.jitmer', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'JIPMER',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.ali', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'AMU Medical',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.wardhah', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'WARDAH',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.amrita', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'CUSAT',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.manipal', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'IIST',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.vellore', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'IISER',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.other', array(
                                            'type' => 'select',
                                            'multiple' => 'checkbox',
                                            'label' => false,
                                            'options' => array(
                                                    'Yes' => 'Other',
                                            )
                                        )); 
                                        ?>
                                    </label>
                                    <div id="otherEntrance" style="display: none;">
                                        <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.entrance-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'id' => 'entrance-other',
                                                'maxlength' => '250',
                                            'placeholder' => 'Specify Other Entrnce You Appeared Seperate by Commas',
                                            )
                                        ); ?>
                                    </div>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Chose examinations you appeared</span>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-5">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">Declaration</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" disabled>
1. I do hereby declare that the above furnished information are true and correct to my knowledge and belief. 
2. I am aware that my application  will be rejected in case of any descripancies in the data entered.
                                </textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="agree" id="Agree">
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I Agree/Accept the terms and conditions. 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button type="submit" id="SubmitButton" class="btn btn-success" title="Agree Teams and Conditions then Click" disabled>SAVE APPLICATION</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
    <div class="stepwizard col-md-12" style="margin-top:20px">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>PRIMARY INFORMATION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>ADDRESS INFORMATIONS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>DETAILS OF TENTH EXAMINATION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>OTHER INFORMATIONS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>CONFIRM AND FINISH</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var checkboxes = $("#Agree"),
    submitButt = $("#SubmitButton");

    checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
    
    });
    var copybox=$("#Copy");
    copybox.click(function() {
    if ($(this).is(':checked')) {
            $('#comm-addline1').val($('#perma-addline1').val());
            $('#comm-addline2').val($('#perma-addline2').val());
            $('#comm-postoffice').val($('#perma-postoffice').val());
            $('#comm-pincode').val($('#perma-pincode').val());
            $('#CommCity').val($('#PermaCity').val());
            $('#comm-city-other').val($('#perma-city-other').val());
            $('#comm-state').val($('#perma-state').val());
            $('#comm-state-other').val($('#perma-state-other').val());
            $('#comm-country').val($('#perma-country').val());
        }
    
    
    
    });
    var med='<?php echo $entranceData['med'] ?>';
    var eng='<?php echo $entranceData['eng'] ?>';
    var iit='<?php echo $entranceData['iit'] ?>';
    var jee='<?php echo $entranceData['jee'] ?>';
    var aitmt='<?php echo $entranceData['aitmt'] ?>';
    var aiims='<?php echo $entranceData['aiims'] ?>';
    var jitmer='<?php echo $entranceData['jitmer'] ?>';
    var ali='<?php echo $entranceData['ali'] ?>';
    var wardhah='<?php echo $entranceData['wardhah'] ?>';
    var amrita='<?php echo $entranceData['amrita'] ?>';
    var manipal='<?php echo $entranceData['manipal'] ?>';
    var vellore='<?php echo $entranceData['vellore'] ?>';
    var other='<?php echo $entranceData['other'] ?>';


    if(med=='Yes'){
        $('#PrimaryRegisterKeralmedicalYes').prop('checked', true);
    }
    if(eng=='Yes'){
        $('#PrimaryRegisterKeralenggYes').prop('checked', true);
    }
    if(iit=='Yes'){
        $('#PrimaryRegisterIitYes').prop('checked', true);
    }
    if(jee=='Yes'){
        $('#PrimaryRegisterJeeYes').prop('checked', true);
    }




    if(aitmt=='Yes'){
        $('#PrimaryRegisterAitmtYes').prop('checked', true);
    }
    if(aiims=='Yes'){
        $('#PrimaryRegisterAiimsYes').prop('checked', true);
    }
    if(jitmer=='Yes'){
        $('#PrimaryRegisterJitmerYes').prop('checked', true);
    }
    if(ali=='Yes'){
        $('#PrimaryRegisterAliYes').prop('checked', true);
    }
    if(wardhah=='Yes'){
        $('#PrimaryRegisterWardhahYes').prop('checked', true);
    }
    if(amrita=='Yes'){
        $('#PrimaryRegisterAmritaYes').prop('checked', true);
    }
    if(manipal=='Yes'){
        $('#PrimaryRegisterManipalYes').prop('checked', true);
    }
    if(vellore=='Yes'){
        $('#PrimaryRegisterVelloreYes').prop('checked', true);
    }
    if(other=='Yes'){
        $('#PrimaryRegisterOtherYes').prop('checked', true);
    }









</script>
<script>
$(function(){
    $('#DateofBirth').combodate();    
});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){ 
        jQuery('#name').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
        
        
 });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
            $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea],select"),
            isValid = true;
            console.log(curInputs.length);
            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
              
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#Mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
    
   });
   jQuery('#Mobile').mouseout(function() {

     var value = $(this).val();
     if(value.length<10){
         $.alert.open('error','Enter Ten Digit Mobile Number');
     }
 });
});
</script>





<script>
    $('#Religion').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherReligionType").show();
            $("#otherReligionType input").val("");
        }
        else{
            $("#otherReligionType").hide();
            $("#otherReligionType input").val("null");
        }
    });
    $('#FatherQualification').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherFatherQualification").show();
            $("#otherFatherQualification input").val("");
        }
        else{
            $("#otherFatherQualification").hide();
            $("#otherFatherQualification input").val("null");
        }
    });
    $('#FatherOccupation').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherFatherOccupation").show()
            $("#otherFatherOccupation input").val("");
        }
        else{
            $("#otherFatherOccupation").hide();
            $("#otherFatherOccupation input").val("null");
        }
    });
    $('#Community').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherCommunity").show();
            $("#otherCommunity input").val("");
        }
        else{
            $("#otherCommunity").hide();
            $("#otherCommunity input").val("null");
        }
    });
    $('#MotherQualification').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherMotherQualification").show();
            $("#otherMotherQualification input").val("");
        }
        else{
            $("#otherMotherQualification").hide();
            $("#otherMotherQualification input").val("null");
        }
    });
    $('#MotherOccupation').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherMotherOccupation").show();
            $("#otherMotherOccupation input").val("");
        }
        else{
            $("#otherMotherOccupation").hide()
            $("#otherMotherOccupation input").val("null");
        }
    });

    $('#QualifyingExam').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherQualifyingExam").show();
            $("#otherQualifyingExam input").val("");
        }
        else{
            $("#otherQualifyingExam").hide()
            $("#otherQualifyingExam input").val("null");
        }
    });
    $('#CareerAmbition').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherCareerAmbition").show();
            $("#otherCareerAmbition input").val("");
        }
        else{
            $("#otherCareerAmbition").hide();
            $("#otherCareerAmbition input").val("null");
        }
    });
    $('#perma-state').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherPermaState").show();
            $("#otherPermaState input").val("");
        }
        else{
            $("#otherPermaState").hide();
            $("#otherPermaState input").val("null");
            $("#perma-country").val("99");
        }
    });
    $('#comm-state').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherCommState").show();
            $("#otherCommState input").val("");
        }
        else{
            $("#otherCommState").hide();
            $("#otherCommState input").val("null");
            $("#comm-country").val("99");
        }
    });
	$('#CommCity').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherCommCity").show();
            $("#otherCommCity input").val("");
            
            
        }
        else{
            $("#otherCommCity").hide();
            $("#otherCommCity input").val("null");
            $("#comm-state").val("1");
            $("#comm-country").val("99");
        }
    });
	$('#PermaCity').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherPermaCity").show();
            $("#otherPermaCity input").val("");
            
        }
        else{
            $("#otherPermaCity").hide();
            $("#otherPermaCity input").val("null");
            $("#perma-state").val("1");
            $("#perma-country").val("99");
        }
    });
    $("#PrimaryRegisterOtherYes").click(function() {
    if(this.checked) {
        $("#otherEntrance").show();
    }else{
       $("#otherEntrance").show(); 
    }
});
</script>



