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

    <?php echo $this->Form->create('PrimaryRegister', array('id' => 'myForm', 'name' => 'PrimaryRegisterForm')) ?> 
        <div class="row" id="">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <h4>APPLICATION NUMBER : <?php echo $applicantdata['applicationnumber']; ?></h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="6" class="success">PRIMARY INFORMATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="info"><strong>Name</strong></td>
                                <td><?php echo $applicantdata['name']; ?></td>
                                <td class="info"><strong>Gender</strong></td>
                                <td>
                                    <?php echo $applicantdata['gender']; ?>
                                </td>
                                <td class="info"><strong>Email</strong></td>
                                <td><?php echo $applicantdata['email']; ?></td>
                            </tr>
                            <tr>
                                <td class="info"><strong>Mobile</strong></td>
                                <td><?php echo $applicantdata['mobile']; ?></td>
                                <td class="info"><strong>Adhaar Number</strong></td>
                                <td><?php echo $applicantdata['adhaar']; ?></td>
                                <td class="info"><strong>Nationality</strong></td>
                                <td><?php echo $applicantdata['nationality']; ?></td>
                            </tr>
                            <tr>
                                <td class="info"><strong>Blood Group</strong></td>
                                <td><?php echo $applicantdata['blood']; ?></td>
                                <td class="info"><strong>Category</strong></td>
                                <td><?php echo $applicantdata['community']; ?></td>
                                <td class="info"><strong>Religion</strong></td>
                                <td><?php echo $applicantdata['religion']; ?></td>
                            </tr>
                            <tr>
                                <td class="info"><strong>Place of Birth</strong></td>
                                <td><?php echo $applicantdata['placeofbirth']; ?></td>
                                <td class="info"><strong>Date of Birth</strong></td>
                                <td><?php echo $applicantdata['dob']; ?></td>
                                <td class="info"><strong>Father's Name</strong></td>
                                <td><?php echo $applicantdata['fathername']; ?></td>
                            </tr>
                            <tr>
                                <td class="info"><strong>Father's Qualification</strong></td>
                                <td><?php echo $applicantdata['fatherqualification']; ?></td>
                                <td class="info"><strong>Father's Occupation</strong></td>
                                <td><?php echo $applicantdata['fatheroccupation']; ?></td>
                                <td class="info"><strong>Mother's Name</strong></td>
                                <td><?php echo $applicantdata['mothername']; ?></td>
                            </tr>
                            <tr>
                                <td class="info"><strong>Mother's Qualification*</strong></td>
                                <td><?php echo $applicantdata['motherqualification']; ?></td>
                                <td class="info"><strong>Mother's Occupation</strong></td>
                                <td><?php echo $applicantdata['motheroccupation']; ?></td>

                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="4" class="success">ADDRESS INFORMATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="info"><strong>Permanent Address</strong></td>
                                <td class="info"><strong>Address for Communication</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $applicantdata['perma-addline1']; ?><br>
                                    <?php echo $applicantdata['perma-addline2']; ?><br>
                                    <?php echo $applicantdata['perma-post']; ?><br>
                                    <?php echo $applicantdata['perma-district']; ?><br>
                                    <?php echo $applicantdata['perma-state']; ?><br>
                                    PIN:<?php echo $applicantdata['perma-pin']; ?><br>
                                    <?php echo $applicantdata['perma-country']; ?><br>
                                    
                                </td>
                                <td>
                                    <?php echo $applicantdata['comm-addline1']; ?><br>
                                    <?php echo $applicantdata['comm-addline2']; ?><br>
                                    <?php echo $applicantdata['comm-post']; ?><br>
                                    <?php echo $applicantdata['comm-district']; ?><br>
                                    <?php echo $applicantdata['comm-state']; ?><br>
                                    PIN:<?php echo $applicantdata['comm-pin']; ?><br>
                                    <?php echo $applicantdata['comm-country']; ?><br>
                                </td>
                            </tr>
                            <tr>

                                <td colspan="2" class="info"><strong>Phone Number</strong></td>
                            </tr>
                            <tr>
                                <td colspan="2"><?php echo $applicantdata['phone']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="5" class="success">DETAILS OF TENTH EXAMINATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="info"><strong>Examination (10) Passed</strong></td>
                                <td class="info"><strong>Institution Attended</strong></td>
                                <td class="info"><strong>Year of Study</strong></td>
                                <td class="info"><strong>Register Number</strong></td>
                                <td class="info"><strong>Year of Pass</strong></td>
                            </tr>
                            <tr>
                                <td><?php echo $applicantdata['tenth']; ?></td>
                                <td><?php echo $applicantdata['tenthschool']; ?></td>
                                <td><?php echo $applicantdata['tenthyos']; ?></td>
                                <td><?php echo $applicantdata['tenthregno']; ?></td>
                                <td><?php echo $applicantdata['tenthyop']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" class="success">OTHER INFORMATIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="info"><strong>Career Ambition</strong></td>
                                <td class="info"><strong>Appeared for Entrance Examination</strong></td>
                            </tr>
                            <tr>
                                <td><?php echo $applicantdata['career-ambition']; ?></td>
                                <td>
                                    <?php 
                                    foreach ($applicantdata['entrance'] as $entrance)
                                    echo $entrance.','
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <p class="text-center"><?php echo $this->Html->link(__('EDIT APPLICATION'), "/pages/primary_registration", array('escape' => false,'class'=>'btn btn-primary')) ?></p>
                </div>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>


