<div class="col-md-12">
                <div class="panel panel-default panel-fk">
                    <div class="panel-heading">
                        <h3 class="panel-title">Transaction Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            
                            <label for="QualifyingExam" class="control-label">Select Stream<sup class="madadatory">*</sup></label><br>
<!--                            <select id="stream"  name="SecondaryRegister.stream" class='form-control' required='required' label="false" empty="Select Stream">
                                
                            </select> -->
                           <?php
                            echo $this->Form->input('SecondaryRegister.stream', array(
                                'options' => ' ',
                                'empty' => '-- select one --',
                                'class' => 'form-control',
                                'id' => 'stream',
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
                        <div class="col-md-12 beforetable">
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
                        <div class="col-md-12" id="marktable"></div>


                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Next</button>
            </div>