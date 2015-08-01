<?php 
$randnum=rand ( 1 ,5 ); 
?>
<div class="container banner">
    <div class="banner-1" style="background: url('../images/mes_banner.png');background-size: 1170px 424px;background-repeat: no-repeat;height: 400px;margin-top: -40px;">
        <h1 style="color:white;padding: 125px;">Welcome!</h1>
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
                <p>ADDRESS INFORMATION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>10th & +2 DETAILS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>DEGREE DETAILS</p>
            </div>
            <!--<div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>OTHER INFORMATION AND FINISH</p>
            </div>-->
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
                                            'readonly' => 'readonly',
                                            'placeholder' => 'Enter a valid Email Address',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter a Valid Email</span>
                                    </div>
                                    <!--<div class="form-group">
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
                                    </div>-->

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
                                        <!--<div id="otherReligionType" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.religion-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null', 
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Relegion',
                                            'required'=>'required')
                                        ); ?>
                                        </div>-->
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
                                        <label for="village" class="control-label">Village/Municipality<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.village', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Your Village/Municipality',
                                            'maxlength' => '250',
                                            'id' => 'village',
                                            'required'=>'required'
                                            )); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Your Village</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="taluk" class="control-label">Taluk<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.taluk', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Your Taluk',
                                            'maxlength' => '250',
                                            'id' => 'taluk',
                                            'required'=>'required'
                                            )); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Your Taluk</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="ParentName" class="control-label">Parent's Name<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.parent-name', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Your Parent Name',
                                            'maxlength' => '250',
                                            'id' => 'ParentName',
                                            'required'=>'required')
                                        ); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Parent's Name</span>
                                    </div>
                                    <!--<div class="form-group">
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
                                    </div>-->
                                    <?php
                                    $incomes=array(
                                        '< 200,000'=>'< 200,000',
                                        '> 200,000 and < 500,000'=>'> 200,000 and < 500,000',
                                        '> 500,000 and < 10,00,000'=>'> 500,000 and < 10,00,000',
                                        '> 10,00,000'
                                        );
                                    ?>
                                    <div class="form-group">
                                        <label for="ParentIncome" class="control-label">Parent's Annual Income<sup class="madadatory">*</sup></label>
                                        <?php echo $this->Form->input('PrimaryRegister.parent-income', array(
                                            'options'=>$incomes,
                                            'empty'=>'-- select one --',
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Your Parent Annual Income',
                                            'maxlength' => '250',
                                            'id' => 'ParentIncome',
                                            'required'=>'required'
                                            )); ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select the appropriate one</span>
                                    </div>


                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="Gender" class="control-label">Gender<sup class="madadatory">*</sup></label><br>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.gender', array(
                                            'options' => array(
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                                'Neutral' => 'Neutral',
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
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Community" class="control-label">Community Category<sup class="madadatory">*</sup></label><br>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.community', array(
                                                'options' => $communities,
                                                'empty' => '-- select one --',
                                                'class' => 'form-control test',
                                                'id' => 'Community',
                                                'label' => false,
                                                'required' =>'required'
                                            ));
                                            ?>
                                            <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                            <!--<div id="otherCommunity" style="display: none;">
                                                <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                                <?php echo $this->Form->input('PrimaryRegister.community-other', array(
                                                'label' => false, 
                                                'class' => 'form-control', 
                                                'value' => 'null',
                                                'maxlength' => '250',
                                                'placeholder' => 'Specify Category',
                                                'required'=>'required')
                                            ); ?>
                                            </div>-->
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <label for="Caste" class="control-label">Caste<sup class="madadatory">*</sup></label><br>
                                                <div id="Caste">
                                                <?php
                                                echo $this->Form->input('PrimaryRegister.caste', array(
                                                    'options' => '',
                                                    'empty' => '-- select cummunity first --',
                                                    'class' => 'form-control',
                                                    'id' => 'Caste2',
                                                    'label' => false,
                                                    'required' =>'required'
                                                ));
                                                ?></div>
                                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                            </div> 
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
                                        <label for="ParentRelation" class="control-label">Relation with Parent<sup class="madadatory">*</sup></label>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.parent-relation', array(
                                            'options' => array(
                                                'Father'=>'Father',
                                                'Mother'=>'Mother',
                                                'Uncle'=>'Uncle',
                                                'Brother'=>'Brother',
                                                'Sister'=>'Sister',
                                                ),
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'ParentRelation',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Select Relationship with Parent</span>
                                        
                                        <!--<div id="otherParentRelation" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.parent-relation-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null',
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify The Relation',
                                            'required'=>'required')
                                        ); ?>
                                        </div>-->

                                    </div>
                                    <div class="form-group">
                                        <label for="ParentOccupation" class="control-label">Parent's Occupation<sup class="madadatory">*</sup></label>
                                        <?php
                                        echo $this->Form->input('PrimaryRegister.parent-occupation', array(
                                            'options' => $occupations,
                                            'empty' => '-- select one --',
                                            'class' => 'form-control',
                                            'id' => 'ParentOccupation',
                                            'label' => false,
                                            'required' =>'required'
                                        ));
                                        ?>
                                        <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Parent's Occupation</span>
                                        <?php if(isset($other_occupation)) { ?>
                                        <div id="otherParentOccupation">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.parent-occupation-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => $other_occupation,
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Father Occupation',
                                            'required'=>'required')
                                        ); ?>
                                        </div>
                                        <?php } else { ?>
                                        <div id="otherParentOccupation" style="display: none;">
                                            <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                            <?php echo $this->Form->input('PrimaryRegister.parent-occupation-other', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'value' => 'null',
                                            'maxlength' => '250',
                                            'placeholder' => 'Specify Father Occupation',
                                            'required'=>'required')
                                        ); ?>
                                        </div>
                                        <?php } ?>

                                    </div>
                                    <!--<div class="form-group">
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
                                    </div>-->
                                    <!--<div class="form-group">
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
                                    </div>-->
                                    <!--<div class="form-group">
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
                                    </div>-->
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
                            <h3 class="panel-title">Address Information of Candidate</h3>
                        </div>
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
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
                                
                             <div class="col-md-6">
                                <h4>Address for Communication</h4>
                                <div class="checkbox" style="margin-left: -25px;">
                                    <label>
                                        <input type="checkbox" value="" id="Copy">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copy Permanent Address to Communication Address
                                    </label>
                                </div>
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
                            </div> <!-- row -->
                            <hr style="border-top: 2px solid #CDCCC9;">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phonestd" class="control-label">Phone STD Code (Optional)</label>
                                    
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phonenumber" class="control-label">Phone Number (Optional)</label>
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
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">Address Information of Parent/Local guardian</h3>
                        </div>
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Parent Address</h4>
                                <div class="form-group">
                                    <label for="parent-addline1" class="control-label">Address Line 1<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.parent-addline1', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 1',
                                            'maxlength' => '250',
                                            'id' => 'parent-addline1',
                                            'required'=>'required')
                                        ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 1(Eg:-House Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="parent-addline2" class="control-label">Address Line 2<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.parent-addline2', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 2',
                                        'maxlength' => '250',
                                            'id' => 'parent-addline2',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 2(Eg:-Street Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="parent-postoffice" class="control-label">Post Office<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.parent-postoffice', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Post Office',
                                        'maxlength' => '250',
                                            'id' => 'parent-postoffice',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Post Office</span>
                                </div>
                                <div class="form-group">
                                    <label for="parent-pincode" class="control-label">Pin Code<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.parent-pincode', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Pin Code',
                                            'maxlength' => '6',
                                            'id' => 'parent-pincode',
                                            'required'=>'required')
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Pin Code</span>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <h4>Local guardian Address (Optional)</h4>
                                
                                <div class="form-group">
                                    <label for="local-addline1" class="control-label">Address Line 1<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.local-addline1', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 1',
                                        'maxlength' => '250',
                                            'id' => 'local-addline1',
                                            )
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 1(Eg:-House Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="local-addline2" class="control-label">Address Line 2<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.local-addline2', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Address Line 2',
                                        'maxlength' => '250',
                                            'id' => 'local-addline2',
                                            )
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 2(Eg:-Street Name)</span>
                                </div>
                                <div class="form-group">
                                    <label for="local-postoffice" class="control-label">Post Office<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.local-postoffice', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Post Office',
                                        'maxlength' => '250',
                                            'id' => 'local-postoffice',
                                            )
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Post Office</span>
                                </div>
                                <div class="form-group">
                                    <label for="local-pincode" class="control-label">Pin Code<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.local-pincode', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Pin Code',
                                        'maxlength' => '6',
                                            'id' => 'local-pincode',
                                            )
                                     ); ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Pin Code</span>
                                </div>
                                
                            </div>
                            </div> <!-- row -->
                            
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
                            <h3 class="panel-title">10th & +2 Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <!--<label for="QualifyingExam" class="control-label">Examination (10) Passed<sup class="madadatory">*</sup></label><br>
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
                            </div>-->
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <caption><strong>Details 10th Standard Examination</strong></caption>
                                    <thead>
                                        <tr>
                                            <th>Institution Attended<sup class="madadatory">*</sup></th>
                                            <!--<th>Year of Study<sup class="madadatory">*</sup></th>-->
                                            <th>Register Number<sup class="madadatory">*</sup></th>
                                            <th>Percentage (%)<sup class="madadatory">*</sup></th>
                                            <!--<th>Max. Marks<sup class="madadatory">*</sup></th>-->
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
                                            <!--<td>
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
                                            </td>-->
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
                                            <!--<td>
                                                <div class="form-group">
                                                    
                                                    <?php echo $this->Form->input('PrimaryRegister.tenthTotalMarks', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '10th Marks obtained',
                                                        'maxlength' => '250',
                                                            'id' => 'ten-school',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>-->
                                            <td>
                                                <div class="form-group">
                                                    
                                                    <?php echo $this->Form->input('PrimaryRegister.tenthParcentage', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '10th Percantage',
                                                            'id' => 'ten-percantage',
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
                                                        '2000' => '2000',
                                                        '1999' => '1999',
                                                        '1998' => '1998',
                                                        ),
                                                    'empty' => '-- select one --',
                                                    'class' => 'form-control',
                                                    'id' => 'TenYearofPassing',
                                                    'label' => false,
                                                    'required' => 'required'
                                                ));
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><hr style="border-top: 1px solid #C7C7C7; border:1;">



                            <div class="col-md-12">
                                <label for="plusTwoBoard" class="control-label">Examination (+2) Passed<sup class="madadatory">*</sup></label><br>
                                <?php echo $this->Form->input('PrimaryRegister.plusTwoBoard', array(
                                        'label' => false,
                                        'options' => $boards,
                                        'empty' => '-- select one --', 
                                        'class' => 'form-control',
                                        'id' => 'plusTwoBoard',
                                        'required'=>'required')
                                 ); ?>
                                
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                <!--<div id="otherPlusTwoBoard" style="display: none;">
                                    <label for="specify">Specify<sup class="madadatory">*</sup></label>
                                    <?php echo $this->Form->input('PrimaryRegister.otherPlusTwoBoard', array(
                                            'label' => false, 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Specify +2 Board',
                                            'value' => 'null',
                                            'maxlength' => '250',
                                            'required'=>'required')
                                     ); ?>
                                    
                                </div>-->
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <caption><strong>Details 12th Examination</strong></caption>
                                    <thead>
                                        <tr>
                                            <th>Institution Attended<sup class="madadatory">*</sup></th>
                                            <th>Stream<sup class="madadatory">*</sup></th>
                                            <th>Register Number<sup class="madadatory">*</sup></th>
                                            <!--<th>Total Marks<sup class="madadatory">*</sup></th>-->
                                            <th>Percantage (%)<sup class="madadatory">*</sup></th>
                                            <th>Year of Pass<sup class="madadatory">*</sup></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    
                                                    <?php echo $this->Form->input('PrimaryRegister.plusTwo-school', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '12th School Name',
                                                            'maxlength' => '250',
                                                            'id' => 'plusTwo-school',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <!--<td>
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
                                            </td>-->
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $this->Form->input('PrimaryRegister.plusTwoStream', array(
                                                            'label' => false, 
                                                            'class' => 'form-control',
                                                            'options'=>$streams,
                                                            'empty'=>'-- select one --',
                                                            //'placeholder' => 'Stream',
                                                            //'maxlength' => '30',
                                                            'id' => 'plusTwoStream',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $this->Form->input('PrimaryRegister.plusTwoRegno', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => 'Register Number',
                                                            'maxlength' => '30',
                                                            'id' => 'plusTwoRegno',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <!--<td>
                                                <div class="form-group">
                                                    
                                                    <?php echo $this->Form->input('PrimaryRegister.plusTwoTotalMarks', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '12th Marks obtained',
                                                            'maxlength' => '250',
                                                            'id' => 'plusTwoTotalMarks',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>-->
                                            <td>
                                                <div class="form-group">
                                                    
                                                    <?php echo $this->Form->input('PrimaryRegister.plusTwoPercentage', array(
                                                            'label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '12th Percentage',
                                                            'maxlength' => '250',
                                                            'id' => 'plusTwoPercentage',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                echo $this->Form->input('PrimaryRegister.plusTwoYearofPassing', array(
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
                                                    'id' => 'plusTwoYearofPassing',
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
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right next_tenth_btn" type="button" >Next</button>
                </div>
            </div>
        </div>
        <?php if(isset($mark_entered) && $mark_entered==1 && !isset($_GET['edit_marks'])){ ?>
           <div class="row setup-content" id="step-4">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="panel panel-default panel-fk">
                            <div class="panel-heading">
                                <h3 class="panel-title">Degree Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h4>The entered details</h4>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>University:</th>
                                            <td><?php echo $marks['University']['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Degree:</th>
                                            <td><?php echo $marks['Degree']['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Institution:</th>
                                            <td><?php echo $marks['Mark']['institution']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Grade/Mark System:</th>
                                            <td>
                                                <?php
                                                if($marks['Mark']['mark_grade']=='G') { ?>
                                                    Grade System
                                               <?php } else if($marks['Mark']['mark_grade']=='M') { ?>
                                                    Mark System
                                             <?php  }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Main:</th>
                                            <td>
                                                <?php
                                                if($marks['Mark']['main']==1) { ?>
                                                    Single Main
                                               <?php } else if($marks['Mark']['main']==2) { ?>
                                                    Double Main
                                             <?php  } else if($marks['Mark']['main']==3) { ?>
                                                    Triple Main
                                             <?php  } ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <h4><b>Marks</b></h4>
                                    <table class="table table-bordered">
                                    <?php if($marks['Mark']['mark_grade']=='G') {
                                        if($marks['Mark']['main']==1) { ?>
                                        <?php if($marks['Mark']['university_id']!=4){ ?>
                                        <tr>
                                            <th>Course</th>
                                            <th>Credit</th>
                                            <th>CGPA</th>
                                        </tr>
                                        <tr>
                                            <td>Core: <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Complementary-1: <?php echo $marks['Mark']['comp1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_cgpa']; ?></td>
                                        </tr>
                                        <?php if($marks['Mark']['degree_id']!=2 && $marks['Mark']['degree_id']!=4 && $marks['Mark']['degree_id']!=5 && $marks['Mark']['degree_id']!=6) { ?>
                                        <tr>
                                            <td>Complementary-2: <?php echo $marks['Mark']['comp2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_cgpa']; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td>Common course: <?php echo $marks['Mark']['common_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['common_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['common_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Common course (other than english): <?php echo $marks['Mark']['com_other_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Additional common course: <?php echo $marks['Mark']['add_common_course_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_cgpa']; ?></td>
                                        </tr>
                                        <?php if($marks['Mark']['university_id']!=5) { ?>
                                            <tr>
                                                <td>Open course: <?php echo $marks['Mark']['open_sub']; ?></td>
                                                <td><?php echo $marks['Mark']['open_credit']; ?></td>
                                                <td><?php echo $marks['Mark']['open_cgpa']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { //if kannur ?>
                                        <tr>
                                            <th>Course</th>
                                            <th>Weights</th>
                                            <th>SGPA</th>
                                        </tr>
                                        <tr>
                                            <td>Part-3 (Main) <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-3 (Sub1): <?php echo $marks['Mark']['comp1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-3 (Sub1): <?php echo $marks['Mark']['comp2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-1: <?php echo $marks['Mark']['common_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['common_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['common_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-2 (Language): <?php echo $marks['Mark']['com_other_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-2 (Other): <?php echo $marks['Mark']['add_common_course_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Open course: <?php echo $marks['Mark']['open_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['open_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['open_cgpa']; ?></td>
                                        </tr>
                                    <?php } // if kannur ?>
                                    <?php } else if($marks['Mark']['main']==2) { ?>
                                        <tr>
                                            <th>Course</th>
                                            <th>Credit</th>
                                            <th>CGPA</th>
                                        </tr>
                                        <tr>
                                            <td>Core-1: <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Core-2: <?php echo $marks['Mark']['main2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Complementary-1: <?php echo $marks['Mark']['comp1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Common course: <?php echo $marks['Mark']['common_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['common_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['common_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Common course (other than english): <?php echo $marks['Mark']['com_other_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Additional common course: <?php echo $marks['Mark']['add_common_course_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_cgpa']; ?></td>
                                        </tr>
                                        <?php if($marks['Mark']['university_id']!=5) { ?>
                                            <tr>
                                                <td>Open course: <?php echo $marks['Mark']['open_sub']; ?></td>
                                                <td><?php echo $marks['Mark']['open_credit']; ?></td>
                                                <td><?php echo $marks['Mark']['open_cgpa']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php  } else if($marks['Mark']['main']==3) { ?>
                                        <tr>
                                            <th>Course</th>
                                            <th>Credit</th>
                                            <th>CGPA</th>
                                        </tr>
                                        <tr>
                                            <td>Core-1: <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Core-2: <?php echo $marks['Mark']['main2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Core-3: <?php echo $marks['Mark']['main3_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main3_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['main3_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Common course: <?php echo $marks['Mark']['common_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['common_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['common_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Common course (other than english): <?php echo $marks['Mark']['com_other_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['com_other_cgpa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Additional common course: <?php echo $marks['Mark']['add_common_course_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_credit']; ?></td>
                                            <td><?php echo $marks['Mark']['add_common_course_cgpa']; ?></td>
                                        </tr>
                                        <?php if($marks['Mark']['university_id']!=5) { ?>
                                            <tr>
                                                <td>Open course: <?php echo $marks['Mark']['open_sub']; ?></td>
                                                <td><?php echo $marks['Mark']['open_credit']; ?></td>
                                                <td><?php echo $marks['Mark']['open_cgpa']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php  } ?>
                                    <?php if($marks['Mark']['university_id']==4){ ?>
                                        <tr>
                                            <th>Overall Weights for Part-3</th>
                                            <td><?php echo $marks['Mark']['overall_credit']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Overall CGPA for Part-3</th>
                                            <td><?php echo $marks['Mark']['overall_cgpa']; ?></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <th>Overall Credit</th>
                                            <td><?php echo $marks['Mark']['overall_credit']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Overall CGPA</th>
                                            <td><?php echo $marks['Mark']['overall_cgpa']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php  } else if($marks['Mark']['mark_grade']=='M') { 
                                        if($marks['Mark']['main']==1) { ?>
                                        <?php if($marks['Mark']['university_id']!=4) { ?>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Marks Awarded</th>
                                            <th>Max. Marks</th>
                                        </tr>
                                        <tr>
                                            <td>Core: <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Complementary-1: <?php echo $marks['Mark']['comp1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_max']; ?></td>
                                        </tr>
                                        <?php if($marks['Mark']['degree_id']!=2 && $marks['Mark']['degree_id']!=4 && $marks['Mark']['degree_id']!=5 && $marks['Mark']['degree_id']!=6) { ?>
                                        <tr>
                                            <td>Complementary-2: <?php echo $marks['Mark']['comp2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_max']; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td>Part-1: <?php echo $marks['Mark']['part1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-2: <?php echo $marks['Mark']['part2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_max']; ?></td>
                                        </tr>
                                    <?php } else { // if kannur ?>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Marks Awarded</th>
                                            <th>Max. Marks</th>
                                        </tr>
                                        <tr>
                                            <td>Part-3 (Main): <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-3 (Sub1): <?php echo $marks['Mark']['comp1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-3 (Sub2): <?php echo $marks['Mark']['comp2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['comp2_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-1: <?php echo $marks['Mark']['part1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-2: <?php echo $marks['Mark']['part2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_max']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php } else if($marks['Mark']['main']==2) { ?>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Marks Awarded</th>
                                            <th>Max. Marks</th>
                                        </tr>
                                        <tr>
                                            <td>Core-1: <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Core-2: <?php echo $marks['Mark']['main2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Complementary-1: <?php echo $marks['Mark']['comp1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['comp1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-1: <?php echo $marks['Mark']['part1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-2: <?php echo $marks['Mark']['part2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_max']; ?></td>
                                        </tr>
                                    <?php  } else if($marks['Mark']['main']==3) { ?>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Marks Awarded</th>
                                            <th>Max. Marks</th>
                                        </tr>
                                        <tr>
                                            <td>Core-1: <?php echo $marks['Mark']['main1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['main1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Core-2: <?php echo $marks['Mark']['main2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['main2_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Core-3: <?php echo $marks['Mark']['main3_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['main3_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['main3_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-1: <?php echo $marks['Mark']['part1_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part1_max']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Part-2: <?php echo $marks['Mark']['part2_sub']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_mark']; ?></td>
                                            <td><?php echo $marks['Mark']['part2_max']; ?></td>
                                        </tr>
                                    <?php  } ?>
                                    <?php  } ?>
                                    </table>
                                </div>
                            </div> 
                        </div><br><br><br>
                        <?php echo $this->Form->Submit('Save & Proceed', array('class'=>'btn btn-success pull-right')); ?>
                        <?php echo $this->Html->link('Edit Marks',array('controller'=>'pages','action'=>'primary_registration?edit_marks=1')); ?>
                        <!--<a href="" class="btn btn-success pull-right" style="margin-right: 5px;" data-toggle="modal" id="mark_edit_btn" data-target="#edit_modal">Edit Marks</a>-->
                        <div class="modal" id="edit_modal">
                            
                        </div>

                        <!--<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>-->
                        
                    </div>
                </div>
            </div>
        <?php } else { ?>
        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="panel panel-default panel-fk">
                        <div class="panel-heading">
                            <h3 class="panel-title">Degree Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <caption><strong>University and Degree</strong></caption>
                                    <thead>
                                        <tr>
                                            <th>University<sup class="madadatory">*</sup></th>
                                            <!--<th>Year of Study<sup class="madadatory">*</sup></th>-->
                                            <th>Degree<sup class="madadatory">*</sup></th>
                                            <th>Institution attended<sup class="madadatory">*</sup></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $this->Form->input('PrimaryRegister.University', array(
                                                            'options'=>$universities,
                                                            'empty'=>'-- select one --',
                                                            'label' => false, 
                                                            'class' => 'form-control',
                                                            'id' => 'University',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $this->Form->input('PrimaryRegister.degree', array(
                                                            'options'=>$degrees,
                                                            'empty'=>'-- select one --',
                                                            'label' => false, 
                                                            'class' => 'form-control',
                                                            'id' => 'degree',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $this->Form->input('PrimaryRegister.degree_institute', array(
                                                            'label' => false, 
                                                            'class' => 'form-control',
                                                            'id' => 'degree_institute',
                                                            'required'=>'required')
                                                     ); ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table><hr>
                                <div class="row">
                                <div class="col-md-12">
                                    <caption><strong>Select Your System/Main</strong></caption><br>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Mark/Grade<sup class="madadatory">*</sup></th>
                                            <th>Main<sup class="madadatory">*</sup></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" name="mark_grade" value="G" id="grade">&nbsp;&nbsp;&nbsp;Grade System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="M" id="mark" name="mark_grade">&nbsp;&nbsp;&nbsp;Mark System</td>
                                            <td>
                                                <input type="radio" value="1" name="main_system" id="single_main">&nbsp;&nbsp;&nbsp;Single Main&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input value="2" type="radio" id="double_main" name="main_system">&nbsp;&nbsp;&nbsp;Double Main&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input value="3" type="radio" id="triple_main" name="main_system">&nbsp;&nbsp;&nbsp;Triple Main
                                            </td>
                                        </tr>
                                    </table><hr>
                                    <div id="grade_append" style="display:none;">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Common Course (English)<sup class="madadatory">*</sup></th>
                                                <th>Common Course (Other than English)<sup class="madadatory">*</sup></th>
                                                <th>Additional Common Course<sup class="madadatory">*</sup></th>
                                                <th id="open_head">Open Course<sup class="madadatory">*</sup></th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.common_course',
                                                        array(
                                                            'label'=>false,
                                                            'value'=>'English',
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Common Course (English)',
                                                            'id'=>'common_course',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.common_course_other',
                                                        array(
                                                            'label'=>false,
                                                            'options'=>array(
                                                                'Arabic'=>'Arabic',
                                                                'Malayalam'=>'Malayalam',
                                                                'Hindi'=>'Hindi',
                                                                'Urudu'=>'Urudu',
                                                                'Sanskrit'=>'Sanskrit',
                                                                'Kannada'=>'Kannada',
                                                                'Tamil'=>'Tamil',
                                                                'French'=>'French',
                                                                'German'=>'German',
                                                                'Nil'=>'Nil'
                                                                ),
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Common Course (Other the English)',
                                                            'id'=>'common_course_other',
                                                            'empty'=>'-- select one --',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.additional_common_course',
                                                        array(
                                                            'label'=>false,
                                                            'options'=>array(
                                                                'Common course other than languages'=>'Common course other than languages',
                                                                'General Course'=>'General Course',
                                                                'Vocational Course'=>'Vocational Course',
                                                                'Other Subjects'=>'Other Subjects',
                                                                'Nil'=>'Nil',
                                                                ),
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Common Course (Other the English)',
                                                            'id'=>'additional_common_course',
                                                            'empty'=>'-- select one --',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                                <td id="open_body">
                                                    <?php echo $this->Form->input('PrimaryRegister.open_course',
                                                        array(
                                                            'label'=>false,
                                                            'class'=>'form-control',
                                                            'placeholder'=>'Enter Open Course',
                                                            'id'=>'open_course',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="kannur_grade_append" style="display:none;">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Part-1 (English)<sup class="madadatory">*</sup></th>
                                                <th>Part-2 (Language)<sup class="madadatory">*</sup></th>
                                                <th>Part-2 (other)<sup class="madadatory">*</sup></th>
                                                <th>Open Course<sup class="madadatory">*</sup></th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.part_one_english',
                                                        array(
                                                            'label'=>false,
                                                            'value'=>'English',
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Common Course (English)',
                                                            'id'=>'part_one_english',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.part_two_lang',
                                                        array(
                                                            'label'=>false,
                                                            'options'=>array(
                                                                'Arabic'=>'Arabic',
                                                                'Malayalam'=>'Malayalam',
                                                                'Hindi'=>'Hindi',
                                                                'Urudu'=>'Urudu',
                                                                'Sanskrit'=>'Sanskrit',
                                                                'Kannada'=>'Kannada',
                                                                'Tamil'=>'Tamil',
                                                                'French'=>'French',
                                                                'German'=>'German',
                                                                'Nil'=>'Nil'
                                                                ),
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Common Course (Other the English)',
                                                            'id'=>'part_two_lang',
                                                            'empty'=>'-- select one --',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.part_two_other',
                                                        array(
                                                            'label'=>false,
                                                            'options'=>array(
                                                                'Common course other than languages'=>'Common course other than languages',
                                                                'General Course'=>'General Course',
                                                                //'Open Course'=>'Open Course',
                                                                'Nil'=>'Nil',
                                                                ),
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Common Course (Other the English)',
                                                            'id'=>'part_two_other',
                                                            'empty'=>'-- select one --',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.open_course',
                                                        array(
                                                            'label'=>false,
                                                            'options'=>array(
                                                                'Open Course'=>'Open Course',
                                                                'Nil'=>'Nil',
                                                                ),
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Common Course (Other the English)',
                                                            'id'=>'kannur_open_course',
                                                            'empty'=>'-- select one --',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="mark_append" style="display:none;">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Part I<sup class="madadatory">*</sup></th>
                                                <th>Part II (Second Language)<sup class="madadatory">*</sup></th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.part_one_subject',
                                                        array(
                                                            'label'=>false,
                                                            'class'=>'form-control',
                                                            'value'=>'English',
                                                            'placeholder'=>'Enter Part I Subject Name',
                                                            'id'=>'part_one_subject',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->Form->input('PrimaryRegister.part_two_subject',
                                                        array(
                                                            'label'=>false,
                                                            'options'=>array(
                                                                'Arabic'=>'Arabic',
                                                                'Malayalam'=>'Malayalam',
                                                                'Hindi'=>'Hindi',
                                                                'Urudu'=>'Urudu',
                                                                'Sanskrit'=>'Sanskrit',
                                                                'Kannada'=>'Kannada',
                                                                'Tamil'=>'Tamil',
                                                                'French'=>'French'
                                                                ),
                                                            'class'=>'form-control',
                                                            //'placeholder'=>'Enter Part II (Second Language) Subject Name',
                                                            'id'=>'part_two_subject',
                                                            //'required'=>'required'
                                                            )); ?>
                                                </td>
                                            </tr>
                                        </table><hr>
                                    </div>
                                    <div id="single_main_form" style="display:none;">
                                        <h4><b>Select your subjects</b></h4>
                                        <div class="form-group">
                                            <label>Main/Core<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.singleMainSubject1',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'class'=>'form-control select1 singleMainSubject1',
                                                    'id'=>'MainSubject1',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Complementory I (Subsidiery)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.singleCompSubject1',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'CompSubject1',
                                                    'class'=>'form-control select1 singleCompSubject1',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Complementory II (Subsidiery)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.singleCompSubject2',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'CompSubject2',
                                                    'class'=>'form-control select1 singleCompSubject2',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>
                                    <div id="kannur_single_main_form" style="display:none;">
                                        <h4><b>Select your subjects</b></h4>
                                        <div class="form-group">
                                            <label>Part-3 (main)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.part_three_main',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'class'=>'form-control select1 part_three_main',
                                                    'id'=>'part_three_main',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Part-3 (Sub-1)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.part_three_sub1',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'part_three_sub1',
                                                    'class'=>'form-control select1 part_three_sub1',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Part-3 (Sub-2)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.part_three_sub2',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'part_three_sub2',
                                                    'class'=>'form-control select1 part_three_sub2',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>
                                    <div id="kannur_com_single_main_form" style="display:none;">
                                        <h4><b>Select your subjects</b></h4>
                                        <div class="form-group">
                                            <label>Part-3 (main)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.com_part_three_main',
                                                array(
                                                    'label'=>false,
                                                    'value'=>'Commerce',
                                                    'readonly'=>'readonly',
                                                    'class'=>'form-control select1 com_part_three_main',
                                                    'id'=>'com_part_three_main',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Part-3 (Sub-1)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.com_part_three_sub1',
                                                array(
                                                    'label'=>false,
                                                    'options'=>array(
                                                        'Commerce'=>'Commerce',
                                                        'Finance'=>'Finance',
                                                        'Travel and Tourism'=>'Travel and Tourism',
                                                        'Cooperation'=>'Cooperation',
                                                        'Computer Applications'=>'Computer Applications',
                                                        'Islamic Finance'=>'Islamic Finance',
                                                        'BBA'=>'BBA',
                                                        'General Course'=>'General Course',
                                                        'Open Course'=>'Open Course',
                                                        'Nil'=>'Nil'
                                                        ),
                                                    'empty'=>'-- select one --',
                                                    'id'=>'com_part_three_sub1',
                                                    'class'=>'form-control select1 com_part_three_sub1',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Part-3 (Sub-2)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.com_part_three_sub2',
                                                array(
                                                    'label'=>false,
                                                    'options'=>array(
                                                        'Commerce'=>'Commerce',
                                                        'Finance'=>'Finance',
                                                        'Travel and Tourism'=>'Travel and Tourism',
                                                        'Cooperation'=>'Cooperation',
                                                        'Computer Applications'=>'Computer Applications',
                                                        'Islamic Finance'=>'Islamic Finance',
                                                        'BBA'=>'BBA',
                                                        'General Course'=>'General Course',
                                                        'Open Course'=>'Open Course',
                                                        'Nil'=>'Nil'
                                                        ),
                                                    'empty'=>'-- select one --',
                                                    'id'=>'com_part_three_sub2',
                                                    'class'=>'form-control select1 com_part_three_sub2',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>
                                    <div id="double_main_form" style="display:none;">
                                        <h4><b>Select your subjects</b></h4>
                                        <div class="form-group">
                                            <label>Main I/Core I<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.doubleMainSubject1',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'MainSubject1',
                                                    'class'=>'form-control select2 doubleMainSubject1',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Main II/Core II<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.doubleMainSubject2',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'MainSubject2',
                                                    'class'=>'form-control select2 doubleMainSubject2',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Complementory I (Subsidiery)<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.doubleCompSubject1',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'CompSubject1',
                                                    'class'=>'form-control select2 doubleCompSubject1',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>
                                    <div id="triple_main_form" style="display:none;">
                                        <h4><b>Select your subjects</b></h4>
                                        <div class="form-group">
                                            <label>Main I/Core I<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.tripleMainSubject1',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'MainSubject1',
                                                    'class'=>'form-control select3 tripleMainSubject1',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Main II/Core II<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.tripleMainSubject2',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'id'=>'MainSubject2',
                                                    'class'=>'form-control select3 tripleMainSubject2',
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Main III/Core III<sup class="madadatory">*</sup></label>
                                            <?php
                                            echo $this->Form->input('PrimaryRegister.tripleMainSubject3',
                                                array(
                                                    'label'=>false,
                                                    'options'=>'',
                                                    'empty'=>'-- select one --',
                                                    'class'=>'form-control select3 tripleMainSubject3',
                                                    'id'=>'MainSubject3',
                                                    )
                                                );
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <a class="btn btn-success marks_add" title="select grade/mark system and main first">Add Marks Now</a><br>
                                    <span><font color="green"><b>Note:</b> You should select your mark/grade system and main to enter the marks</font></span>

                                    <div id="mark_table" style="display: none;">
                                        <h4>Enter Your Marks</h4>
                                    </div>
                                    
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<button class="btn btn-primary btn-lg pull-right" id='next_degree' type="button" >Next</button>-->
                    <?php echo $this->Form->submit('Save & Proceed',array('class'=>'btn btn-success pull-right','id'=>'save_proceed_btn')); ?>
                </div>
            </div>
        </div>
        <?php } ?>
    
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
                <p>10th & +2 DETAILS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>DEGREE DETAILS</p>
            </div>
            <!--<div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>OTHER INFORMATION & FINISH</p>
            </div>-->
        </div>
    </div>
<script>
    function set_bba() {
        if($('#University').val()==4 && $('#degree').val()==4) {
            $('#com_part_three_main').attr('value','BBA');
        }
    }
</script>
<script>
    function hide_open() {
        if($('#University').val()==5) {
            $('#open_head').hide();
            $('#open_body').hide();
        }
    }
</script>
<script type="text/javascript">
    $('#ten-percantage,#plusTwoPercentage').blur(function(){
        var per=$(this).val();
        if(per>100 || per<0) {
            alert('Percentage should be from 0 to 100'); 
            $(this).val('');
            return;
        } else if(per % 1 != 0) {
            var fixed=parseFloat(Math.round(per * 100) / 100).toFixed(2);
            $(this).val(fixed);
            return;
        }
    });
</script>
<script type="text/javascript">
    $('#save_proceed_btn').click(function(){
        if($('#University').val()=='') {
            alert('You should select your university first');
            return false;
        }
        else if($('#degree').val()=='') {
            alert('You should select your degree first');
            return false;
        } else if($('#degree_institute').val()=='') {
            alert('You should enter your degree institution');
            return false;
        }
        else if(!$('#grade').is(':checked') && !$('#mark').is(':checked')) {
            alert('You should select grade or mark system first');
            return false;
        }
        else if(!$('#single_main').is(':checked') && !$('#double_main').is(':checked') && !$('#triple_main').is(':checked')) {
            alert('You should select your main first');
            return false;
        } else if($('.markTable').length==0){
            alert('You should enter your marks and try again.');
            return false;
        }
    });
</script>

<script type="text/javascript">
    $('#mark_edit_btn').click(function(){
        var BASEURL='<?php echo Router::url('/', true); ?>';
        $.ajax({
            type: 'POST',
            dataType: 'html',
            async: false,
            url:BASEURL+"pages/edit_marks",
            success: function(data) {
                $('#edit_modal').html(data);
            }
        });
    });
</script>
<script type="text/javascript">
    var checkboxes = $("#Agree"),
    submitButt = $("#SubmitButton");

    checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
    
    });
    var copybox=$("#Copy");
    copybox.click(function() {
    if ($(this).is(':checked')) {
        //alert($('#perma-addline1').val());
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#Community').change(function(){
            var BASEURL='<?php echo Router::url('/', true); ?>';
            var cummunity_id = $(this).val();
            $.ajax({
            url:BASEURL+"pages/get_castes",
            type:'POST',
            data:'cummunity_id='+cummunity_id ,
            dataType: "html",
            async: false,
            success: function(result){
                $('div #Caste').html(result);
            }
            })
    })
    });

    $(document).ready(function(){
       var BASEURL='<?php echo Router::url('/', true); ?>';
        if($('#Caste2').val()=='') {
            var cummunity_id = $('#Community').val();
            $.ajax({
            url:BASEURL+"pages/get_castes",
            type:'POST',
            data:'cummunity_id='+cummunity_id ,
            dataType: "html",
            async: false,
            success: function(result){
                
                $('div #Caste2').html(result);
            }
            })
        }
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
    $('#ParentOccupation').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherParentOccupation").show();
            $("#otherParentOccupation input").val("");
        }
        else{
            $("#otherParentOccupation").hide();
            $("#otherParentOccupation input").val("null");
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
    $('#plusTwoBoard').on('change',function(){
        if( $(this).val()==="other"){
            $("#otherplusTwoBoard").show();
            $("#otherplusTwoBoard input").val("");
        }
        else{
            $("#otherplusTwoBoard").hide();
            $("#otherplusTwoBoard input").val("null");
            //$("#comm-country").val("99");
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
<!--// last added from bla by rafeeque-->
<script type="text/javascript">
    $(document).ready(function(){
    
    /*$(".select1,.select2,.select3").change(function() {
        var arr=[];
        if($('#single_main').is(':checked')) {
            jQuery('.select1').each(function() {
            var subject_id=$(this).val();
            if(subject_id!=0) {
                arr.push(subject_id);
            }
        });
        } else if($('#double_main').is(':checked')) {
            jQuery('.select2').each(function() {
            var subject_id=$(this).val();
            if(subject_id!=0) {
                arr.push(subject_id);
            }
        });
        } else if($('#triple_main').is(':checked')) {
            jQuery('.select3').each(function() {
            var subject_id=$(this).val();
            if(subject_id!=0) {
                arr.push(subject_id);
            }
        });
        }
        for(var i=0;i<arr.length-1;i++) {
            for(var j=i+1;j<arr.length;j++) {
                if(arr[i]==arr[j]) {
                    alert('Subjects cannot be repeated');
                    $(this).val(0);
                    
                }
            }
        }
    });*/
        
});
</script>

<script type="text/javascript">
    $('#single_main').on('click',function(){
        if ($(this).is(':checked')) {
            if($('#University').val()!=4) {
                if($('#degree').val()!=2 && $('#degree').val()!=4 && $('#degree').val()!=5 && $('#degree').val()!=6) {
                    $("#double_main_form").hide();
                    $("#triple_main_form").hide();
                    $("#kannur_single_main_form").hide();
                    $("#single_main_form").show();
                }
            } else {
                if($('#degree').val()!=2 && $('#degree').val()!=4 && $('#degree').val()!=5) {
                    $("#double_main_form").hide();
                    $("#single_main_form").hide();
                    $("#triple_main_form").hide();
                    $("#kannur_single_main_form").show();
                } else {
                    if($('#degree').val()==5 || $('#degree').val()==6) { // change for bmmc and bca
                        alert('please contact the administrator with your mark details');
                        return;
                    }
                    else if($('#degree').val()==2 || $('#degree').val()==4) { // change for bca and bmmc
                        $("#double_main_form").hide();
                        $("#single_main_form").hide();
                        $("#triple_main_form").hide();
                        $("#kannur_single_main_form").hide();
                        $("#kannur_com_single_main_form").show();
                        set_bba();
                    }
                    
                }
            }
            
        }
    });
    $('#double_main').on('click',function(){
        if ($(this).is(':checked')) {
            if($('#University').val()!=4) {
                if($('#degree').val()!=2 && $('#degree').val()!=4 && $('#degree').val()!=5  && $('#degree').val()!=6) {
                    $("#single_main_form").hide();
                    $("#triple_main_form").hide();
                    $("#kannur_single_main_form").hide();
                    $("#double_main_form").show();
                }
            } else {
                alert('You can select single main only');
                return;
            }
        }
    });
    $('#triple_main').on('click',function(){
        if ($(this).is(':checked')) {
            if($('#University').val()!=4) {
                if($('#degree').val()!=2 && $('#degree').val()!=4 && $('#degree').val()!=5 && $('#degree').val()!=6) {
                    $("#single_main_form").hide();
                    $("#double_main_form").hide();
                    $("#kannur_single_main_form").hide();
                    $("#triple_main_form").show();
                }
            } else {
                alert('You can select single main only');
                return;
            }
        }
    });

    $('#grade').on('click',function(){
        if ($(this).is(':checked')) {
            if($('#University').val()==4) {
                $("#mark_append").hide();
                $("#grade_append").hide();
                $("#kannur_grade_append").show();
            } else {
                $("#mark_append").hide();
                $("#kannur_grade_append").hide();
                $("#grade_append").show();
                hide_open();
            }
        }
    });

    $('#mark').on('click',function(){
        if ($(this).is(':checked')) {
            $("#grade_append").hide();
            $("#kannur_grade_append").hide();
            $("#mark_append").show();
        }
    });
</script>
<script type="text/javascript">
    function limit_marks() {
       $(".max").keyup(function() {
        //alert($(this).closest('tr').children('.marks').html());
        //alert($(this).closest('tr').children('td:nth-child(2)').children('input').val());
        $(this).closest('tr').children('td:nth-child(2)').children('input').attr('max', $(this).val());
        $(this).closest('tr').children('td:nth-child(2)').children('input').attr('min', 0);
    });
    }
  
</script>
<script>
$(document).ready(function(){
    $('.marks_add').click(function(){
        if($('#University').val()=='') {
            alert('You should select your university first');
            return;
        }
        else if($('#degree').val()=='') {
            alert('You should select your degree first');
            return;
        }else if($('#degree_institute').val()=='') {
            alert('You should enter your degree institute');
            return;
        }
        else if(!$('#grade').is(':checked') && !$('#mark').is(':checked')) {
            alert('You should select grade or mark system first');
            return;
        }
        else if(!$('#single_main').is(':checked') && !$('#double_main').is(':checked') && !$('#triple_main').is(':checked')) {
            alert('You should select your main first');
            return;
        }
        else {
        if($('#University').val()!=4) { // if not kannur
        if($('#degree').val()!=2 && $('#degree').val()!=4 && $('#degree').val()!=5 && $('#degree').val()!=6){ // if not bcom, bba,bca and bmmc
        if($('.markTable').length>0){ $('.markTable').hide(); }
        if($('#single_main').is(':checked')) {
            if($('.singleMainSubject1').val()==0 || $('.singleCompSubject1').val()==0 || $('.singleCompSubject2').val()==0) {
                    alert('You should select main subjects and complimentary subjects');
                    return;
                }
                if($('.singleMainSubject1').val()=='Nil') {
                   alert('You cannot select Nil as core subject');
                   $('.singleMainSubject1').val(0);
                    return; 
                }
            var core=$('.singleMainSubject1 option:selected').text();
            var comp1=$('.singleCompSubject1 option:selected').text();
            var comp2=$('.singleCompSubject2 option:selected').text();
            if($('#grade').is(':checked')) {
                if($('#University').val()==5) {
                    if($('#common_course').val().length==0 || $('#common_course_other').val().length==0 || $('#additional_common_course').val().length==0) {
                        alert('You should enter/select all your common course, common course (other than english) and additional common course names');
                        return;
                    }
                } else {
                    if($('#common_course').val().length==0 || $('#common_course_other').val().length==0 || $('#additional_common_course').val().length==0 || $('#open_course').val().length==0) {
                        alert('You should enter/select all your common course, common course (other than english), additional common course and open course names');
                        return;
                    }
                }
                var common_course=$('#common_course').val();
                var common_course_other=$('#common_course_other').val();
                var add_common_course=$('#additional_common_course').val();
                 var overall_credit=$('#overall_credit').val();
                 var overall_cgpa=$('#overall_cgpa').val();
                var open_course=$('#open_course').val();
                    $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Course</th><th>Credit</th><th>CGPA</th></tr><tr><td>1. Core: "+core+"</td><td><input type='number' name='core_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='core_cgpa' class='form-control' required></td></tr><tr><td>2. Complementary-1: "+comp1+"</td><td><input type='number' name='comp1_credit' min='0' class='form-control' "+(comp1=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp1_cgpa'  step='0.01' min='0' max='4' class='form-control' "+(comp1=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>3. Complementary-2: "+comp2+"</td><td><input type='number' name='comp2_credit' min='0' class='form-control' "+(comp2=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp2_cgpa' step='0.01' min='0' max='4' class='form-control' "+(comp2=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>4. Common Course: "+common_course+"</td><td><input type='number' name='common_course_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_cgpa' class='form-control' required></td></tr><tr><td>5. Common Course (Other than English): "+common_course_other+"</td><td><input type='number' name='common_course_other_credit' min='0' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_other_cgpa' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>6. Additional common course: "+add_common_course+"</td><td><input type='number' name='add_common_course_credit' min='0' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='add_common_course_cgpa' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>7. Open Course: "+open_course+"</td><td><input type='number' name='open_course_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='open_course_cgpa' class='form-control' required></td></tr><tr><td> Overall Credit and CGPA of the programme: </td><td><input type='number' name='overall_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='overall_cgpa' class='form-control' required></td></tr></table>");
                $('#mark_table').show();
            } else if($('#mark').is(':checked')) {
                if($('#part_one_subject').val()=='' || $('#part_two_subject').val()=='') {
                    alert('You should enter all your part one, part two subject names');
                    return;
                }
                var part_one_subject=$('#part_one_subject').val();
                var part_two_subject=$('#part_two_subject').val();
                
                $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Subject</th><th>Marks Awarded</th><th>Max. Marks</th></tr><tr><td>1. Core: "+core+"</td><td><input type='number' name='core_marks' id='core_marks' min='0' class='form-control marks' required></td><td><input type='number' name='core_max' id='core_max' class='form-control max' required></td></tr><tr><td>2. Complementary-1: "+comp1+"</td><td><input type='number' name='comp1_marks' class='form-control marks' id='comp1_marks' min='0' required "+(comp1=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp1_max' id='comp1_max' class='form-control max' required "+(comp1=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>3. Complementary-2: "+comp2+"</td><td><input type='number' min='0' name='comp2_marks' class='form-control marks' id='comp2_marks' required "+(comp2=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp2_max' class='form-control max' id='comp2_max' required "+(comp2=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>4. Part 1: "+part_one_subject+"</td><td><input type='number' name='part_one_marks' min='0' class='form-control marks' id='part1_marks' required></td><td><input type='number' name='part_one_max' id='part1_max' class='form-control max' required></td></tr><tr><td>5. Part 2: "+part_two_subject+"</td><td><input type='number' name='part_two_marks' min='0' id='part2_marks' class='form-control marks' required></td><td><input type='number' name='part_two_max' id='part2_max' class='form-control max' required></td></tr></table>");
                $('#mark_table').show();
                limit_marks();
            }
        } else if($('#double_main').is(':checked')) {
            if($('.doubleMainSubject1').val()==0 || $('.doubleMainSubject2').val()==0 || $('.doubleCompSubject1').val()==0) {
                    alert('You should select main subjects and complimentary subjects');
                    return;
                }
                if($('.doubleMainSubject1').val()=='Nil') {
                   alert('You cannot select Nil as core subjects');
                   $('.doubleMainSubject1').val(0);
                    return; 
                } else if($('.doubleMainSubject2').val()=='Nil') {
                    alert('You cannot select Nil as core subjects');
                    $('.doubleMainSubject2').val(0);
                    return;
                }
            var core1=$('.doubleMainSubject1 option:selected').text();
            //alert(core1);
            var core2=$('.doubleMainSubject2 option:selected').text();
            var comp1=$('.doubleCompSubject1 option:selected').text();
            if($('#grade').is(':checked')) {
                if($('#University').val()==5) {
                    if($('#common_course').val().length==0 || $('#common_course_other').val().length==0 || $('#additional_common_course').val().length==0) {
                        alert('You should enter/select all your common course, common course (other than english) and additional common course names');
                        return;
                    }
                } else {
                    if($('#common_course').val()==0 || $('#common_course_other').val()==0 || $('#additional_common_course').val().length==0 || $('#open_course').val()==0) {
                        alert('You should enter/select all your common course, common course (other than english), additional common course and open course names');
                        return;
                    }
                }
                var add_common_course=$('#additional_common_course').val();
                var common_course=$('#common_course').val();
                var common_course_other=$('#common_course_other').val();
                var open_course=$('#open_course').val();
                
                    $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Course</th><th>Credit</th><th>CGPA</th></tr><tr><td>1. Core-1: "+core1+"</td><td><input type='number' name='core1_credit' class='form-control' min='0' required></td><td><input type='number' step='0.01' min='0' max='4' name='core1_cgpa' class='form-control' required></td></tr><tr><td>2. Core-2: "+core2+"</td><td><input type='number' name='core2_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='core2_cgpa' class='form-control' required></td></tr><tr><td>3. Complementary-1: "+comp1+"</td><td><input type='number' name='comp1_credit' min='0' class='form-control' "+(comp1=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp1_cgpa' step='0.01' min='0' max='4' class='form-control' "+(comp1=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>4. Common Course: "+common_course+"</td><td><input type='number' name='common_course_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_cgpa' class='form-control' required></td></tr><tr><td>5. Common Course (Other than English): "+common_course_other+"</td><td><input type='number' name='common_course_other_credit' min='0' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_other_cgpa' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>6.Additional Common Course: "+add_common_course+"</td><td><input type='number' name='add_common_course_credit' min='0' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='add_common_course_cgpa' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>7. Open Course: "+open_course+"</td><td><input type='number' name='open_course_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='open_course_cgpa' class='form-control' required></td></tr><tr><td> Overall Credit and CGPA of the programme: </td><td><input type='number' name='overall_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='overall_cgpa' class='form-control' required></td></tr></table>");
               
                $('#mark_table').show();
            } else if($('#mark').is(':checked')) {
                if($('#part_one_subject').val()=='' || $('#part_two_subject').val()=='') {
                    alert('You should enter all your part one, part two subject names');
                    return;
                }
                var part_one_subject=$('#part_one_subject').val();
                var part_two_subject=$('#part_two_subject').val();
                
                $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Subject</th><th>Marks Awarded</th><th>Max. Marks</th></tr><tr><td>1. Core-1: "+core1+"</td><td><input type='number' name='core1_marks' id='core1_marks' min='0' class='form-control marks' required></td><td><input type='number' name='core1_max' class='form-control max' id='core1_max' required></td></tr><tr><td>2. Core-2: "+core2+"</td><td><input type='number' name='core2_marks' min='0' id='core2_marks' class='form-control marks' required></td><td><input type='number' name='core2_max' class='form-control max' id='core2_max' required></td></tr><tr><td>3. Complementary-1: "+comp1+"</td><td><input type='number' name='comp1_marks' min='0' class='form-control marks' id='comp1_marks' required "+(comp1=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp1_max' id='comp1_max' class='form-control max' required "+(comp1=='Nil' ? 'readonly' : '')+"></td></tr></tr><tr><td>4. Part-1: "+part_one_subject+"</td><td><input type='number' name='part_one_marks' id='part1_marks' min='0' class='form-control marks' required></td><td><input type='number' name='part_one_max' id='part1_max' class='form-control max' required></td></tr><tr><td>5. Part-2: "+part_two_subject+"</td><td><input type='number' name='part_two_marks' min='0' id='part2_marks' class='form-control marks' required></td><td><input type='number' id='part2_max' name='part_two_max' class='form-control max' required></td></tr></table>");
            
                $('#mark_table').show();
                limit_marks();
            }
        } else if($('#triple_main').is(':checked')) {
            if($('.tripleMainSubject1').val()==0 || $('.tripleMainSubject2').val()==0 || $('.tripleMainSubject3').val()==0) {
                    alert('You should select main subjects subjects');
                    return;
                }
                if($('.tripleMainSubject1').val()=='Nil') {
                   alert('You cannot select Nil as core subjects');
                   $('.tripleMainSubject1').val(0);
                    return; 
                } else if($('.tripleMainSubject2').val()=='Nil') {
                    alert('You cannot select Nil as core subjects');
                    $('.tripleMainSubject2').val(0);
                    return;
                } else if($('.tripleMainSubject3').val()=='Nil') {
                    alert('You cannot select Nil as core subjects');
                    $('.tripleMainSubject3').val(0);
                    return;
                }
            var core1=$('.tripleMainSubject1 option:selected').text();
            var core2=$('.tripleMainSubject2 option:selected').text();
            var core3=$('.tripleMainSubject3 option:selected').text();
            if($('#grade').is(':checked')) {
                if($('#University').val()==5) {
                    if($('#common_course').val().length==0 || $('#common_course_other').val().length==0 || $('#additional_common_course').val().length==0) {
                        alert('You should enter/select all your common course, common course (other than english) and additional common course names');
                        return;
                    }
                } else {
                    if($('#common_course').val()==0 || $('#common_course_other').val()==0 || $('#additional_common_course').val().length==0 || $('#open_course').val()==0) {
                        alert('You should enter/select all your common course, common course (other than english), additional common course and open course names');
                        return;
                    }
                }
                var add_common_course=$('#additional_common_course').val();
                var common_course=$('#common_course').val();
                var common_course_other=$('#common_course_other').val();
                var open_course=$('#open_course').val();
                $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Course</th><th>Credit</th><th>CGPA</th></tr><tr><td>1. Core-1: "+core1+"</td><td><input type='number' name='core1_credit' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='core1_cgpa' class='form-control' required></td></tr><tr><td>2. Core-2: "+core2+"</td><td><input type='number' name='core2_credit' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='core2_cgpa' class='form-control' required></td></tr><tr><td>3. Core-3: "+core3+"</td><td><input type='number' name='core3_credit' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='core3_cgpa' class='form-control' required></td></tr><tr><td>4. Common Course: "+common_course+"</td><td><input type='number' name='common_course_credit' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_cgpa' class='form-control' required></td></tr><tr><td>5. Common Course (Other than English): "+common_course_other+"</td><td><input type='number' name='common_course_other_credit' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_other_cgpa' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>6. Additional Common Course: "+add_common_course+"</td><td><input type='number' name='add_common_course_credit' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='add_common_course_cgpa' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>7. Open Course: "+open_course+"</td><td><input type='number' name='open_course_credit' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='open_course_cgpa' class='form-control' required></td></tr><tr><td> Overall Credit and CGPA of the programme: </td><td><input type='number' name='overall_credit' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='overall_cgpa' class='form-control' required></td></tr></table>");
                $('#mark_table').show();
            } else if($('#mark').is(':checked')) {
                if($('#part_one_subject').val()=='' || $('#part_two_subject').val()=='') {
                    alert('You should enter all your part one, part two subject names');
                    return;
                }
                var part_one_subject=$('#part_one_subject').val();
                var part_two_subject=$('#part_two_subject').val();
                $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Subject</th><th>Marks Awarded</th><th>Max. Marks</th></tr><tr><td>1. Core-1: "+core1+"</td><td><input type='number' name='core1_marks' id='core1_marks' min='0' class='form-control marks' required></td><td><input type='number' name='core1_max' class='form-control max' id='core1_max' required></td></tr><tr><td>2. Core-2: "+core2+"</td><td><input type='number' name='core2_marks' min='0' id='core2_marks' class='form-control marks' required></td><td><input type='number' name='core2_max' class='form-control max' id='core2_max' required></td></tr><tr><td>3. Core-3: "+core3+"</td><td><input type='number' name='core3_marks' class='form-control marks' id='core3_marks' min='0' required></td><td><input type='number' name='core3_max' class='form-control max' id='core3_max' required></td></tr></tr><tr><td>4. Part-1: "+part_one_subject+"</td><td><input type='number' name='part_one_marks' min='0' class='form-control marks' id='part1_marks' required></td><td><input type='number' name='part_one_max' id='part1_max' class='form-control max' required></td></tr><tr><td>5. Part-2: "+part_two_subject+"</td><td><input type='number' name='part_two_marks' id='part2_marks' min='0' class='form-control marks' required></td><td><input type='number' name='part_two_max' id='part2_max' class='form-control max' required></td></tr></table>");
                $('#mark_table').show();
                limit_marks();
            }
        }
    }// degree not bcom,bba,bca and bmmc
    else if($('#degree').val()==2 || $('#degree').val()==4 || $('#degree').val()==5 || $('#degree').val()==6) { // if bcom or bba or bmmc or bca
        if($('.markTable').length>0){ $('.markTable').hide(); }
        if($('#single_main').is(':checked')) {
            
            if($('#grade').is(':checked')) {
                if($('#common_course').val()==0 || $('#common_course_other').val()==0 || $('#additional_common_course').val().length==0 || $('#open_course').val()==0) {
                    alert('You should enter/select all your common course, common course (other than english), additional common course and open course names');
                    return;
                }
                var add_common_course=$('#additional_common_course').val();
                var common_course=$('#common_course').val();
                var common_course_other=$('#common_course_other').val();
                 var overall_credit=$('#overall_credit').val();
                 var overall_cgpa=$('#overall_cgpa').val();
                var open_course=$('#open_course').val();

                $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Course</th><th>Credit</th><th>CGPA</th></tr><tr><td>1. Core:</td><td><input type='number' name='core_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='core_cgpa' class='form-control' required></td></tr><tr><td>2. Complementary-1:</td><td><input type='number' name='comp1_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='comp1_cgpa' class='form-control' required></td></tr><tr><td>3. Common Course: "+common_course+"</td><td><input type='number' name='common_course_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_cgpa' class='form-control' required></td></tr><tr><td>4. Common Course (Other than English): "+common_course_other+"</td><td><input type='number' name='common_course_other_credit' min='0' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='common_course_other_cgpa' class='form-control' required "+(common_course_other=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>5. Additional Common Course: "+add_common_course+"</td><td><input type='number' name='add_common_course_credit' min='0' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='add_common_course_cgpa' class='form-control' required "+(add_common_course=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>6. Open Course: "+open_course+"</td><td><input type='number' name='open_course_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='open_course_cgpa' class='form-control' required></td></tr><tr><td> Overall Credit and CGPA of the programme: </td><td><input type='number' name='overall_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='overall_cgpa' class='form-control' required></td></tr></table>");
            
                $('#mark_table').show();
            } else if($('#mark').is(':checked')) {
                if($('#part_one_subject').val()=='' || $('#part_two_subject').val()=='') {
                    alert('You should enter all your part one, part two subject names');
                    return;
                }
                var part_one_subject=$('#part_one_subject').val();
                var part_two_subject=$('#part_two_subject').val();
                
                $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Subject</th><th>Marks Awarded</th><th>Max. Marks</th></tr><tr><td>1. Core:</td><td><input type='number' name='core_marks' id='core_marks' min='0' class='form-control marks' required></td><td><input type='number' name='core_max' id='core_max' class='form-control max' required></td></tr><tr><td>2. Complementary-1:</td><td><input type='number' name='comp1_marks' class='form-control marks' id='comp1_marks' min='0' required></td><td><input type='number' name='comp1_max' id='comp1_max' class='form-control max' required></td></tr><tr><td>3. Part 1: "+part_one_subject+"</td><td><input type='number' name='part_one_marks' min='0' class='form-control marks' id='part1_marks' required></td><td><input type='number' name='part_one_max' id='part1_max' class='form-control max' required></td></tr><tr><td>4. Part 2: "+part_two_subject+"</td><td><input type='number' name='part_two_marks' min='0' id='part2_marks' class='form-control marks' required></td><td><input type='number' name='part_two_max' id='part2_max' class='form-control max' required></td></tr></table>");
            
                $('#mark_table').show();
                limit_marks();
            }// mark
        
        }// main
        else if($('#double_main').is(':checked')) {
            alert('You can only click single main');
            $(this).attr('checked',false);
            return;
        } else if($('#triple_main').is(':checked')) {
            alert('You can only click single main');
            $(this).attr('checked',false);
            return;
        }
    }// degree bcome or bba or bmmc
    } // if not kannur
    else if($('#University').val()==4) { // if kannur
        
        if($('.markTable').length>0){ $('.markTable').hide(); }
        if($('#single_main').is(':checked')) {
            if($('#degree').val()!=2 && $('#degree').val()!=4 && $('#degree').val()!=5) { // if not bcom, bba and bmmc
                if($('.part_three_main').val()==0 || $('.part_three_sub1').val()==0 || $('.part_three_sub2').val()==0) {
                        alert('You should select main subjects and complimentary subjects');
                        return;
                    }
            } else if($('#degree').val()==2 || $('#degree').val()==4 || $('#degree').val()==5){ // if   bcom or bba or bmmc
                if($('.com_part_three_sub1').val()==0 || $('.com_part_three_sub2').val()==0) {
                        alert('You should select complimentary subjects');
                        return;
                    }
            }
            if($('#degree').val()!=2 && $('#degree').val()!=4 && $('#degree').val()!=5) { // if not bcom, bba and bmmc
                if($('.part_three_main').val()=='Nil') {
                   alert('You cannot select Nil as core subject');
                   $('.part_three_main').val(0);
                    return; 
                }
                var comp1=$('.part_three_sub1 option:selected').text();
                var comp2=$('.part_three_sub2 option:selected').text();
                var core=$('.part_three_main option:selected').text();
            } else if($('#degree').val()==2 || $('#degree').val()==4 || $('#degree').val()==5) { // if bcom or bba or bmmc
                var core=$('.com_part_three_main').val();
                var comp1=$('.com_part_three_sub1 option:selected').text();
                var comp2=$('.com_part_three_sub2 option:selected').text();
            }
            
            if($('#grade').is(':checked')) {
                if($('#part_one_english').val().length==0 || $('#part_two_lang').val().length==0 || $('#part_two_other').val().length==0 || $('#kannur_open_course').val().length==0) {
                    alert('You should enter/select all your part-1, part-2 (Language), part-2 other and open course subject names');
                    return;
                }
                var part_one_english=$('#part_one_english').val();
                var part_two_lang=$('#part_two_lang').val();
                var part_two_other=$('#part_two_other').val();
                var kannur_open_course=$('#kannur_open_course').val();
                    $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Course</th><th>Weights</th><th>SGPA</th></tr><tr><td>1. Part-3 (main): "+core+"</td><td><input type='number' name='core_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='core_cgpa' class='form-control' required></td></tr><tr><td>2. Part-3 (Sub-1): "+comp1+"</td><td><input type='number' name='comp1_credit' min='0' class='form-control' "+(comp1=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp1_cgpa'  step='0.01' min='0' max='4' class='form-control' "+(comp1=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>3. Part-3 (Sub-2): "+comp2+"</td><td><input type='number' name='comp2_credit' min='0' class='form-control' "+(comp2=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp2_cgpa' step='0.01' min='0' max='4' class='form-control' "+(comp2=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>4. Part-1: "+part_one_english+"</td><td><input type='number' name='part_one_credit' min='0' class='form-control' required></td><td><input type='number' step='0.01' min='0' max='4' name='part_one_cgpa' class='form-control' required></td></tr><tr><td>5. part-2 (Language): "+part_two_lang+"</td><td><input type='number' name='part_two_lang_credit' min='0' class='form-control' required "+(part_two_lang=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='part_two_lang_cgpa' class='form-control' required "+(part_two_lang=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>6. Part-2 (Other): "+part_two_other+"</td><td><input type='number' name='part_two_other_credit' min='0' class='form-control' required "+(part_two_other=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='part_two_other_cgpa' class='form-control' required "+(part_two_other=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>7. Open Course: "+kannur_open_course+"</td><td><input type='number' name='open_course_credit' min='0' class='form-control' required "+(kannur_open_course=='Nil' ? 'readonly' : '')+"></td><td><input type='number' step='0.01' min='0' max='4' name='open_course_cgpa' class='form-control' required "+(kannur_open_course=='Nil' ? 'readonly' : '')+"></td></tr><tr><td> Overall Weights for part-3: </td><td><input type='number' name='overall_credit' min='0' class='form-control' required></td></tr><tr><td>Overall CGPA for part-3: </td><td><input type='number' step='0.01' min='0' max='4' name='overall_cgpa' class='form-control' required></td></tr></table>");
                $('#mark_table').show();
            } else if($('#mark').is(':checked')) {
                if($('#part_one_subject').val()=='' || $('#part_two_subject').val()=='') {
                    alert('You should enter all your part one, part two subject names');
                    return;
                }
                var part_one_subject=$('#part_one_subject').val();
                var part_two_subject=$('#part_two_subject').val();
                
                $("#mark_table").append("<table class='table table-bordered markTable'><tr><th>Subject</th><th>Marks Awarded</th><th>Max. Marks</th></tr><tr><td>1. Core: "+core+"</td><td><input type='number' name='core_marks' id='core_marks' min='0' class='form-control marks' required></td><td><input type='number' name='core_max' id='core_max' class='form-control max' required></td></tr><tr><td>2. Complementary-1: "+comp1+"</td><td><input type='number' name='comp1_marks' class='form-control marks' id='comp1_marks' min='0' required "+(comp1=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp1_max' id='comp1_max' class='form-control max' required "+(comp1=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>3. Complementary-2: "+comp2+"</td><td><input type='number' min='0' name='comp2_marks' class='form-control marks' id='comp2_marks' required "+(comp2=='Nil' ? 'readonly' : '')+"></td><td><input type='number' name='comp2_max' class='form-control max' id='comp2_max' required "+(comp2=='Nil' ? 'readonly' : '')+"></td></tr><tr><td>4. Part 1: "+part_one_subject+"</td><td><input type='number' name='part_one_marks' min='0' class='form-control marks' id='part1_marks' required></td><td><input type='number' name='part_one_max' id='part1_max' class='form-control max' required></td></tr><tr><td>5. Part 2: "+part_two_subject+"</td><td><input type='number' name='part_two_marks' min='0' id='part2_marks' class='form-control marks' required></td><td><input type='number' name='part_two_max' id='part2_max' class='form-control max' required></td></tr></table>");
            
                $('#mark_table').show();
                limit_marks();
            } //mark
        } else if($('#double_main').is(':checked')) {
            alert('You can select only single main');
            return;
        } else if($('#triple_main').is(':checked')) {
            alert('You can select only single main');
            return;
        }
    
    } // if kannur
    }//else
    });
});
</script>
<script type="text/javascript">
    $('#degree').change(function(){
        $('.markTable').hide();
        $('#single_main_form').hide();
        $('#double_main_form').hide();
        $('#triple_main_form').hide();
        $('#kannur_single_main_form').hide();
        $('#kannur_com_single_main_form').hide();
        var degree_id=$(this).val();
        var base_url='<?php echo Router::url('/', true); ?>';
        if($('#University').val()!=4) { // if not kannur
            if(degree_id!=2 && degree_id!=4 && degree_id!=5) {
                $.ajax({
                    type:'post',
                    data:'degree_id='+degree_id,
                    dataType:'html',
                    url:base_url+'pages/get_subjects',
                    async:false,
                    success: function(data){
                        $('.singleMainSubject1').html(data);
                        $('.singleCompSubject1').html(data);
                        $('.singleCompSubject2').html(data);
                        $('.doubleMainSubject1').html(data);
                        $('.doubleMainSubject2').html(data);
                        $('.doubleCompSubject1').html(data);
                        $('.tripleMainSubject1').html(data);
                        $('.tripleMainSubject2').html(data);
                        $('.tripleMainSubject3').html(data);
                    }
                })
            }else if(degree_id==2 || degree_id==4 || degree_id==5) {
                $('#single_main_form').hide();
                $('#double_main_form').hide();
                $('#triple_main_form').hide();
            }
        } // if not kannur
        else { // if kannur
            if(degree_id!=2 && degree_id!=4 && degree_id!=5) {
                $.ajax({
                    type:'post',
                    data:'degree_id='+degree_id,
                    dataType:'html',
                    url:base_url+'pages/get_subjects',
                    async:false,
                    success: function(data){
                        $('.part_three_main').html(data);
                        $('.part_three_sub1').html(data);
                        $('.part_three_sub2').html(data);
                        
                    }
                })
            }else if(degree_id==2 || degree_id==4 || degree_id==5) {
                $('#single_main_form').hide();
                $('#double_main_form').hide();
                $('#triple_main_form').hide();
            }
        } // if kannur
        
        
    });
</script>

<script>
$('.next_tenth_btn').click(function(){
alert('Instructions for the next step\n\n• If course / subjects in core or complementary are not listed, please mail us at admission@mesmampadadmission.com with a copy of marks / grade sheet attached.\n• Credit: Sum total of all credits of the concerned subject in various semesters. For example, if the core subject has 4 credits in Sem1, 4 credits in Sem2, 8 credits in Sem3 , 8 credits in Sem4, 16 credits in Sem5, 18 credit Sem6 and project of 4 credits, credit for the core=4+4+8+8+16+18+4=62.\n• Overall credit is the sum total of all credits of the course');
});
</script>

<script type="text/javascript"> // to be changed by rafeeque if kannur marks case
    $('#mark').click(function(){
        if($('#University').val()==4 && $(this).is(':checked')) {
            alert('Please contact the administrator with your mark sheet');
            $(this).attr('checked',false);
            return;
        }
    });
</script>



