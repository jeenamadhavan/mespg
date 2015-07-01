<?php echo $this->Form->create('SecondaryRegister', array('id' => 'myForm', 'name' => 'SecondaryRegister')) ?>
    <div class="row setup-content" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">OTHER INFORMATIONS & FINISH</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Illiteracy" class="control-label">Whether Institution(s) attended for qualifying Examination/College is affiliated to University of Calicut? <sup class="madadatory">*</sup></label><br>
                                <?php
                                echo $this->Form->input('SecondaryRegister.Illiteracy', array(
                                    'type' => 'radio',
                                    'legend' => false,
                                    'id' => 'Illiteracy',
                                    'required' => 'required',
                                    'class' => false,
                                    'options' => array(
                                        'Yes' => 'Yes',
                                        'No' => 'No',
                                    )
                                ));
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                            </div>
                            <div class="form-group">
                                <label for="Illiteracy" class="control-label">Instituation(s) and course(s) attended after the qualifying examination, if any </label><br>
                            
                            <?php
                                                echo $this->Form->input('SecondaryRegister.extra_course', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'placeholder' => '',
                                                    'maxlength' => '250',
                                                    'id' => 'extra_course',
                                                        )
                                                );
                                                ?>
                            
                            </div>
                            
                            
                                <div class="form-group">
                                <label for="FeeConcession" class="control-label">Have you been eligible for fee concession? <sup class="madadatory">*</sup></label><br>
                                <?php
                                echo $this->Form->input('SecondaryRegister.FeeConcession', array(
                                    'type' => 'radio',
                                    'legend' => false,
                                    'id' => 'fee_concession',
                                    'required' => 'required',
                                    'class' => false,
                                    'value'=> isset($reservations['Reservation']['frkFeeConcession'])?$reservations['Reservation']['frkFeeConcession']:"No",
                                    'options' => array(
                                        'Yes' => 'Yes',
                                        'No' => 'No',
                                    ),
                                    
                                ));
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one [ you must attach the copies of certificate ] </span>

                            </div>
                                <div class="form-group">
                                <label for="HandiCapped" class="control-label">Are you eligible for claim under physically handicapped?<sup class="madadatory">*</sup></label><br>
                                <?php
                                echo $this->Form->input('SecondaryRegister.HandiCapped', array(
                                    'type' => 'radio',
                                    'legend' => false,
                                    'id' => 'HandiCapped',
                                    'required' => 'required',
                                    'class' => false,
                                     'value'=> isset($reservations['Reservation']['frkHandiCapped'])?$reservations['Reservation']['frkHandiCapped']:"No",
                                    'options' => array(
                                        'Yes' => 'Yes',
                                        'No' => 'No',
                                    )
                                ));
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one [ you must attach the copies of certificate ] </span>

                            </div>
                            <div class="form-group">
                                <label for="GraceMark" class="control-label">Are you eligible for grace marks for admission?<sup class="madadatory">*</sup></label><br>

                                <?php echo $this->Form->input('SecondaryRegister.NCC/NSS', array('type' => 'checkbox')); ?>
                                <?php echo $this->Form->input('SecondaryRegister.Ex-ServiceMan', array('type' => 'checkbox')); ?>
                                <?php echo $this->Form->input('SecondaryRegister.NCC_Certificate_A', array('type' => 'checkbox')); ?>
                                <?php echo $this->Form->input('SecondaryRegister.NCC_Certificate_B', array('type' => 'checkbox')); ?> 
                                <?php echo $this->Form->input('SecondaryRegister.NCC_Certificate_C', array('type' => 'checkbox')); ?>
                                <?php echo $this->Form->input('SecondaryRegister.None', array('type' => 'checkbox')); ?>

                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one [ you must attach the copies of certificate ]  </span>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <caption><strong>Representation in sports/games Specify the discipline and choose the level</strong><br><span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Attach Copies of certificates</span></caption>
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Zone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->input('SecondaryRegister.Sports1', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Specify the Discipline',
                                                    'maxlength' => '250',
                                                        )
                                                );
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.SportsLevel1', array(
                                                'options' => array(
                                                    'District' => 'District',
                                                    'State' => 'State',
                                                    'BZone' => 'B Zone',
                                                    'IntZone' => 'Int Zone',
                                                    'National' => 'National',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'SportsLevel1',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->input('SecondaryRegister.Sports2', array(
                                                        'label' => false,
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Specify the Discipline',
                                                        'maxlength' => '250',
                                                            )
                                                    );
                                                    ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.SportsLevel2', array(
                                               'options' => array(
                                                    'District' => 'District',
                                                    'State' => 'State',
                                                    'BZone' => 'B Zone',
                                                    'IntZone' => 'Int Zone',
                                                    'National' => 'National',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'SportsLevel2',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <?php
                                                        echo $this->Form->input('SecondaryRegister.Sports3', array(
                                                            'label' => false,
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Specify the Discipline',
                                                            'maxlength' => '250',
                                                                )
                                                        );
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.SportsLevel3', array(
                                                'options' => array(
                                                    'District' => 'District',
                                                    'State' => 'State',
                                                    'BZone' => 'B Zone',
                                                    'IntZone' => 'Int Zone',
                                                    'National' => 'National',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'SportsLevel3',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <caption><strong>Representation in arts activities Specify the item and choose the level</strong><br><span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Attach Copies of certificates</span></caption>

                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Zone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->input('SecondaryRegister.Arts1', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Specify the Discipline',
                                                    'maxlength' => '250',
                                                        )
                                                );
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.ArtsLevel1', array(
                                                'options' => array(
                                                    'District' => 'District',
                                                    'State' => 'State',
                                                    'BZone' => 'B Zone',
                                                    'IntZone' => 'Int Zone',
                                                    'National' => 'National',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'ArtsLevel1',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <?php
                                                    echo $this->Form->input('SecondaryRegister.Arts2', array(
                                                        'label' => false,
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Specify the Discipline',
                                                        'maxlength' => '250',
                                                            )
                                                    );
                                                    ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.ArtsLevel2', array(
                                                'options' => array(
                                                    'District' => 'District',
                                                    'State' => 'State',
                                                    'BZone' => 'B Zone',
                                                    'IntZone' => 'Int Zone',
                                                    'National' => 'National',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'ArtsLevel2',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <?php
                                                        echo $this->Form->input('SecondaryRegister.Arts3', array(
                                                            'label' => false,
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Specify the Discipline',
                                                            'maxlength' => '250',
                                                                )
                                                        );
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.ArtsLevel3', array(
                                                'options' => array(
                                                    'District' => 'District',
                                                    'State' => 'State',
                                                    'BZone' => 'B Zone',
                                                    'IntZone' => 'Int Zone',
                                                    'National' => 'National',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'ArtsLevel3',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
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
                                <button type="submit" id="SubmitButton" class="btn btn-success" title="Agree Terms and Conditions then Click" disabled>SAVE APPLICATION</button>
                            </div>
                        </div>
                    </div>
                </div> 

                    </div>
                            </table>
                        </div>
                </div>
<!--                
            </div>
        </div>
    </div>
    <!--<div class="stepwizard col-md-12" style="margin-top:20px">
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
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>OTHER INFORMATION & FINISH</p>
            </div>
        </div>
    </div>-->
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
