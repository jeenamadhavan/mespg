<?php
$randnum = rand(1, 5);
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
                <p>DETAILS OF (+2) EXAMINATION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>COURSE SELECTION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>RESERVATION INFORMATIONS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>PARENT/GUARDIAN INFORMATIONS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p>CONFIRM AND FINISH</p>
            </div>
        </div>
    </div>
    <?php echo $this->Form->create('SecondaryRegister', array('id' => 'myForm', 'type'=>"file",'name' => 'PrimaryRegisterForm', 'novalidate')) ?> 

    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">Details of Qualifying Examination(+2) Passed</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <label for="QualifyingExam" class="control-label">Examination (+2) Passed<sup class="madadatory">*</sup></label><br>
                            <?php
                            echo $this->Form->input('SecondaryRegister.qualifyingexam', array(
                                'options' => $examboards,
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
                                <?php
                                echo $this->Form->input('SecondaryRegister.otherqualifyingexam', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Specify Qualifying Exam',
                                    'value' => 'null',
                                    'maxlength' => '250',
                                    'required' => 'required')
                                );
                                ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <caption><strong>Details of 12th Standard Examination</strong></caption>
                                <thead>
                                    <tr>
                                        <th>Institution Attended<sup class="madadatory">*</sup></th>
                                        <th>Year of Study<sup class="madadatory">*</sup></th>
                                        <th>Register Number<sup class="madadatory">*</sup></th>
                                        <th>Year of Pass<sup class="madadatory">*</sup></th>
                                        <th>TC No& Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">

                                                <?php
                                                echo $this->Form->input('SecondaryRegister.institution', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'placeholder' => '12th School Name',
                                                    'maxlength' => '250',
                                                    'id' => 'institution',
                                                    'required' => 'required')
                                                );
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.yearOfstudy', array(
                                                'options' => array(
                                                    '2014-2015' => '2014-2015',
                                                    '2013-2014' => '2013-2014',
                                                    '2012-2013' => '2012-2013',
                                                    '2011-2012' => '2011-2012',
                                                    '2010-2011' => '2010-2011',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'yearOfstudy',
                                                'required' => 'required',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <?php
                                                echo $this->Form->input('SecondaryRegister.registerNumber', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Register Number',
                                                    'maxlength' => '15',
                                                    'id' => 'registerNumber',
                                                    'required' => 'required')
                                                );
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.yearOfPass', array(
                                                'options' => array(
                                                    '2015' => '2015',
                                                    '2014' => '2014',
                                                    '2013' => '2013',
                                                    '2012' => '2012',
                                                    '2011' => '2011',
                                                ),
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'yearOfPass',
                                                'required' => 'required',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                        <td>
                                            <div class="form-group">

                                                <?php
                                                echo $this->Form->input('SecondaryRegister.TcnoDate', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'placeholder' => '56552,12/04/2014',
                                                    'maxlength' => '250',
                                                    'id' => 'TcnoDate',
                                                        )
                                                );
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>

                        </div>
                         <div class="col-md-12">
                        <table class="table table-bordered">
                            <caption><strong>Details of Mark</strong></caption>
                            <thead>
                                <tr>
                                    <th colspan="2">Subject</th>
                                    <th>Grade</th>
                                    <th>Mark Scored</th>
                                    <th>Maximum Marks</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="warning">
                                    <td>Part 1</td>
                                    <td>English</td>
                                    <td>
                                         <?php
                            echo $this->Form->input('SecondaryRegister.part1grade', array(
                                'options' => $grades,
                                'empty' => '-- select one --',
                                'class' => 'form-control',
                                'id' => 'QualifyingExam',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1mark" name="part1mark" title="Part 1 Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part1maxmark" title="Part 1 Maximum Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part1total" title="Part 1 Total" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="info">
                                    <td>Part 2</td>
                                    <td>
                                        <select class="form-control" id="part1grade" name="part2subject">
                                            <option value="">-- select one --</option>
                                            <option>Malayalam</option>
                                            <option>Hindi</option>
                                            <option>Urdu</option>
                                            <option>Tamil</option>
                                        </select>
                                    </td>
                                    <td>
                                       <?php
                            echo $this->Form->input('SecondaryRegister.part2grade', array(
                                'options' => $grades,
                                'empty' => '-- select one --',
                                'class' => 'form-control',
                                'id' => 'QualifyingExam',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1mark" name="part2mark" title="Part 1 Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part2maxmark" title="Part 1 Maximum Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part2total" title="Part 1 Total" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td rowspan="4">Part 3</td>
                                    <td>
                                        <select class="form-control" id="part3grade" name="part3subject1">
                                            <option value="">-- select one --</option>
                                            <option>Malayalam</option>
                                            <option>Hindi</option>
                                            <option>Urdu</option>
                                            <option>Tamil</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php
                            echo $this->Form->input('SecondaryRegister.part3grade1', array(
                                'options' => $grades,
                                'empty' => '-- select one --',
                                'class' => 'form-control',
                                'id' => 'QualifyingExam',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1mark" name="part3mark1" title="Part 3 Mark 1" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3maxmark1" title="Part 1 Maximum Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3total1" title="Part 1 Total" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td>
                                        <select class="form-control" id="part3grade" name="part3subject1">
                                            <option value="">-- select one --</option>
                                            <option>Malayalam</option>
                                            <option>Hindi</option>
                                            <option>Urdu</option>
                                            <option>Tamil</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php
                            echo $this->Form->input('SecondaryRegister.part3grade2', array(
                                'options' => $grades,
                                'empty' => '-- select one --',
                                'class' => 'form-control',
                                'id' => 'QualifyingExam',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1mark" name="part3mark1" title="Part 3 Mark 1" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3maxmark1" title="Part 1 Maximum Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3total1" title="Part 1 Total" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td>
                                        <select class="form-control" id="part3grade" name="part3subject1">
                                            <option value="">-- select one --</option>
                                            <option>Malayalam</option>
                                            <option>Hindi</option>
                                            <option>Urdu</option>
                                            <option>Tamil</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php
                            echo $this->Form->input('SecondaryRegister.part3grade3', array(
                                'options' => $grades,
                                'empty' => '-- select one --',
                                'class' => 'form-control',
                                'id' => 'QualifyingExam',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1mark" name="part3mark1" title="Part 3 Mark 1" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3maxmark1" title="Part 1 Maximum Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3total1" title="Part 1 Total" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td>
                                        <select class="form-control" id="part3grade" name="part3subject1">
                                            <option value="">-- select one --</option>
                                            <option>Malayalam</option>
                                            <option>Hindi</option>
                                            <option>Urdu</option>
                                            <option>Tamil</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php
                            echo $this->Form->input('SecondaryRegister.part3grade4', array(
                                'options' => $grades,
                                'empty' => '-- select one --',
                                'class' => 'form-control',
                                'id' => 'QualifyingExam',
                                'required' => 'required',
                                'label' => false
                            ));
                            ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1mark" name="part3mark1" title="Part 3 Mark 1" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3maxmark1" title="Part 1 Maximum Mark" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="part1maxmark" name="part3total1" title="Part 1 Total" required>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admission seeking for</h3>
                    </div>
                    <div class="panel-body">

                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <caption><strong>Core Course to which admission is sought</strong></caption>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="CourseChoice1" class="control-label">Choice 1<sup class="madadatory">*</sup></label><br>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.CourseChoice1', array(
                                                'options' => $courses,
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'CourseChoice1',
                                                'required' => 'required',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                        <td>
                                            <label for="CourseChoice2" class="control-label">Choice 2<sup class="madadatory">*</sup></label><br>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.CourseChoice2', array(
                                                'options' => $courses,
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'CourseChoice2',
                                                'required' => 'required',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                        <td>
                                            <label for="CourseChoice3" class="control-label">Choice 3<sup class="madadatory">*</sup></label><br>
                                            <?php
                                            echo $this->Form->input('SecondaryRegister.CourseChoice3', array(
                                                'options' => $courses,
                                                'empty' => '-- select one --',
                                                'class' => 'form-control',
                                                'id' => 'CourseChoice3',
                                                'required' => 'required',
                                                'label' => false
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="LanguageChoice" class="control-label">Common course chosen in Languages other than English<sup class="madadatory">*</sup></label><br>
                                <?php
                                echo $this->Form->input('SecondaryRegister.frkSLanguageID', array(
                                    'options' => $secondlanguages,
                                    'empty' => '-- select one --',
                                    'class' => 'form-control',
                                    'id' => 'frkSLanguageID',
                                    'required' => 'required',
                                    'label' => false
                                ));
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
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
                        <h3 class="panel-title">RESERVATION INFORMATIONS</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="NumberofChances" class="control-label">Number of chances taken for passing qualifying examination<sup class="madadatory">*</sup></label><br>

                                <?php
                                echo $this->Form->input('SecondaryRegister.NumberofChances', array(
                                    'type' => 'radio',
                                    'id' => 'NumberofChances',
                                    'required' => 'required',
                                    'legend' => false,
                                    'class' => false,
                                    'options' => array(
                                        'One' => 'One',
                                        'Two' => 'Two',
                                        'Three' => 'Three',
                                        'More' => 'More',
                                    )
                                ));
                                ?>

                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one </span>
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
                            <div class="form-group">
                                <label for="Illiteracy" class="control-label">Have you Worked in the illiteracy eradication program?<sup class="madadatory">*</sup></label><br>
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
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <caption><strong>Representation in sports/games Specify the discipline and choose the level</strong><br><span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Attach Copies of certificates</span></caption>
                                <thead>
                                    <tr>
                                        <th>Discipline</th>
                                        <th>Level</th>
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
                                        <th>Discipline</th>
                                        <th>Level</th>
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
                        <h3 class="panel-title">PARENT Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parent-name" class="control-label">Parent Name<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-name', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'parent-name',
    'required' => 'required',
    'placeholder' => 'Enter Parent Name',
    'maxlength' => '250',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Parent Name</span>
                            </div>

                            <div class="form-group">
                                <label for="parent-addline2" class="control-label">Address Line 2<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-addline2', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'parent-addline2',
    'required' => 'required',
    'placeholder' => 'Enter Address line 2',
    'maxlength' => '250',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 2(Eg:-Street Name)</span>
                            </div>

                            <div class="form-group">
                                <label for="parent-pincode" class="control-label">Pin Code<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-pincode', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'parent-pincode',
    'required' => 'required',
    'placeholder' => 'Enter Pin Code',
    'maxlength' => '250',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Pin Code</span>
                            </div>

                            <div class="form-group">
                                <label for="parent-state" class="control-label">State<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-state', array(
    'options' => $states,
    'empty' => '-- select one --',
    'class' => 'form-control',
    'required' => 'required',
    'id' => 'parent-state',
    'label' => false
));
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-phonestd" class="control-label">Phone STD Code</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.parent-phonestd', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'parent-phonestd',
                                    'placeholder' => 'Enter STD Code',
                                    'maxlength' => '10',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter STD Code(Eg:-0466)</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-mobilenumber" class="control-label">Mobile Number<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-mobilenumber', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'parent-mobilenumber',
    'placeholder' => 'Enter Parent Mobile Number',
    'maxlength' => '15',
    'required' => 'required',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Mobile Number</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parent-addline1" class="control-label">Address Line 1<sup class="madadatory">*</sup></label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.parent-addline1', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'parent-addline1',
                                    'placeholder' => 'Enter Address Line 1',
                                    'maxlength' => '250',
                                    'required' => 'required',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 1(Eg:-House Name)</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-postoffice" class="control-label">Post Office<sup class="madadatory">*</sup></label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.parent-postoffice', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'parent-postoffice',
                                    'placeholder' => 'Enter Post Office',
                                    'maxlength' => '250',
                                    'required' => 'required',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Post Office</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-city" class="control-label">District<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-city', array(
    'options' => array(
        'District' => 'District',
    ),
    'empty' => '-- select one --',
    'class' => 'form-control',
    'required' => 'required',
    'id' => 'parent-city',
    'label' => false
));
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter City Name(Eg:-Calicut)</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-country" class="control-label">Country<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-country', array(
    'options' => $countries,
    'empty' => '-- select one --',
    'class' => 'form-control',
    'required' => 'required',
    'id' => 'parent-country',
    'label' => false
));
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                            </div>

                            <div class="form-group">
                                <label for="parent-phonenumber" class="control-label">Phone Number</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.parent-phonenumber', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'parent-phonenumber',
                                    'placeholder' => 'Enter Phone Number',
                                    'maxlength' => '20',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Phone Number</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-email" class="control-label">Email</label>
<?php
echo $this->Form->input('SecondaryRegister.parent-email', array(
    'label' => false,
    'type' => 'email',
    'class' => 'form-control',
    'id' => 'parent-email',
    'placeholder' => 'Enter Email Address',
    'maxlength' => '20',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter a Valid Email</span>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="parent-relationship" class="control-label">Parent Relationship With Applicant<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-relationship', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'parent-relationship',
    'required' => 'required',
    'placeholder' => 'Enter Parent Relationship',
    'maxlength' => '250',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Parent Relationship With Applicant (Eg:-Father)</span>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="parent-income" class="control-label">Annual Income<sup class="madadatory">*</sup></label>
<?php
echo $this->Form->input('SecondaryRegister.parent-income', array(
    'label' => false,
    'class' => 'form-control',
    'required' => 'required',
    'id' => 'parent-income',
    'placeholder' => 'Enter Annual Income',
    'maxlength' => '250',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Annual Income (Eg:-100000)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">GUARDIAN Information (IF ANY)</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guard-name" class="control-label">Guardian Name</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-name', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'guard-name',
                                    'placeholder' => 'Enter Guardian Name',
                                    'maxlength' => '250',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Guardian Name</span>
                            </div>

                            <div class="form-group">
                                <label for="guard-addline2" class="control-label">Address Line 2</label>
<?php
echo $this->Form->input('SecondaryRegister.guard-addline2', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'guard-addline2',
    'placeholder' => 'Enter Address line 2',
    'maxlength' => '250',
        )
);
?>


                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 2(Eg:-Street Name)</span>
                            </div>

                            <div class="form-group">
                                <label for="guard-pincode" class="control-label">Pin Code</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-pincode', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'guard-pincode',
                                    'placeholder' => 'Enter Pin Code',
                                    'maxlength' => '250',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Pin Code</span>
                            </div>

                            <div class="form-group">
                                <label for="guard-state" class="control-label">State</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-state', array(
                                    'options' => $states,
                                    'empty' => '-- select one --',
                                    'class' => 'form-control',
                                    'id' => 'guard-state',
                                    'label' => false
                                ));
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-phonestd" class="control-label">Phone STD Code</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-phonestd', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'guard-phonestd',
                                    'placeholder' => 'Enter STD Code',
                                    'maxlength' => '10',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter STD Code(Eg:-0466)</span>
                            </div>
                            <div class="form-group">
                                <label for="parent-mobilenumber" class="control-label">Mobile Number</label>
<?php
echo $this->Form->input('SecondaryRegister.guard-mobilenumber', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'guard-mobilenumber',
    'placeholder' => 'Enter Guardian Mobile Number',
    'maxlength' => '15',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Mobile Number</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guard-addline1" class="control-label">Address Line 1</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-addline1', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'guard-addline1',
                                    'placeholder' => 'Enter Address Line 1',
                                    'maxlength' => '250',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Address line 1(Eg:-House Name)</span>
                            </div>
                            <div class="form-group">
                                <label for="guard-postoffice" class="control-label">Post Office</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-postoffice', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'guard-postoffice',
                                    'placeholder' => 'Enter Post Office',
                                    'maxlength' => '250',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Post Office</span>
                            </div>
                            <div class="form-group">
                                <label for="guard-city" class="control-label">District</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-city', array(
                                    'options' => array(
                                        'District' => 'District',
                                    ),
                                    'empty' => '-- select one --',
                                    'class' => 'form-control',
                                    'id' => 'guard-city',
                                    'label' => false
                                ));
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter City Name(Eg:-Calicut)</span>
                            </div>
                            <div class="form-group">
                                <label for="guard-country" class="control-label">Country</label>
<?php
echo $this->Form->input('SecondaryRegister.guard-country', array(
    'options' => $countries,
    'empty' => '-- select one --',
    'class' => 'form-control',
    'id' => 'guard-country',
    'label' => false
));
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please Select appropriate one</span>
                            </div>

                            <div class="form-group">
                                <label for="guard-phonenumber" class="control-label">Phone Number</label>
                                <?php
                                echo $this->Form->input('SecondaryRegister.guard-phonenumber', array(
                                    'label' => false,
                                    'class' => 'form-control',
                                    'id' => 'guard-phonenumber',
                                    'placeholder' => 'Enter Phone Number',
                                    'maxlength' => '20',
                                        )
                                );
                                ?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Phone Number</span>
                            </div>
                            <div class="form-group">
                                <label for="guard-email" class="control-label">Email</label>
<?php
echo $this->Form->input('SecondaryRegister.guard-email', array(
    'label' => false,
    'type' => 'email',
    'class' => 'form-control',
    'id' => 'guard-email',
    'placeholder' => 'Enter Email',
    'maxlength' => '250',
        )
);
?>
                                <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter a Valid Email</span>
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
                        <h3 class="panel-title">Accommodation Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Hostel" class="control-label">Do you require hostel admission?<sup class="madadatory">*</sup></label><br>
<?php
echo $this->Form->input('SecondaryRegister.Hostel', array(
    'type' => 'radio',
    'legend' => false,
    'id' => 'Hostel',
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
                        </div>
                    </div>
                </div>
                <div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">BANK DETAILS</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="BankName" class="control-label">Your Bank</label><br>
                                    <?php
                                    echo $this->Form->input('SecondaryRegister.BankName', array(
                                        'options' => array(
                                            'District' => 'District',
                                        ),
                                        'empty' => '-- select one --',
                                        'class' => 'form-control',
                                        'id' => 'BankName',
                                        'label' => false
                                    ));
                                    ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Please select appropriate one</span>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="bankbranch" class="control-label">Enter Bank Branch</label>
                                    <?php
                                    echo $this->Form->input('SecondaryRegister.bankbranch', array(
                                        'label' => false,
                                        'class' => 'form-control',
                                        'id' => 'bankbranch',
                                        'placeholder' => 'Enter Name of Branch',
                                        'maxlength' => '200',
                                            )
                                    );
                                    ?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Name of your Bank Branch</span>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="BankAccNumber" class="control-label">Transfer Certificate(TC) Number</label>
<?php
echo $this->Form->input('SecondaryRegister.BankAccNumber', array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'BankAccNumber',
    'placeholder' => 'Enter Account Number',
    'maxlength' => '200',
        )
);
?>
                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Enter Bank Account Number </span>
                                </div>
                            </div>
                            
                             <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="Photo" class="control-label">Upload an  image...</label>
                                    
                                    
                                    <div class="file-wrapper">
                                       
                                        <?php echo $this->Form->file('SecondaryRegister.Photo'); ?>

                                    </div>

                                    <span class="help-block"><span class="glyphicon glyphicon-info-sign"></span> Upload an  image </span>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
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
<?php
echo $this->Form->input('SecondaryRegister.Agree', array(
    'type' => 'checkbox',
    'legend' => false,
    'id' => 'Agree',
    'required' => 'required',
    'class' => false,
    'options' => array(
        'Yes' => 'I Agree/Accept the terms and conditions. ',
    )
));
?>
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
    </div>
<?php echo $this->Form->end(); ?>
    <div class="stepwizard col-md-12" style="margin-top:20px">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>DETAILS OF (+2) EXAMINATION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>COURSE SELECTION</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>RESERVATION INFORMATIONS</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p>PARENT/GUARDIAN INFORMATIONS</p>
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
     
        /*$('#CourseChoice1').on('change',function(){
            var CourseChoice1=$('#CourseChoice1').val();
            
        $('#CourseChoice2').remove('id',CourseChoice1);
        
        });
        $('#CourseChoice2').on('change',function(){
            var CourseChoice2=$('#CourseChoice2').val();
            alert(CourseChoice2);
        });
        $('#CourseChoice3').on('change',function(){
            var CourseChoice3=$('#CourseChoice3').val();
            alert(CourseChoice3);
        });*/

        
    });
</script>


<script>
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
</script>

