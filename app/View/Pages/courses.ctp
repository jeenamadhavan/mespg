<?php 
$randnum=rand ( 1 ,5 );
?>
<div class="container banner">
    <div class="jumbotron fk-jumbotron banner-<?php echo $randnum; ?>">
        <h1>Courses</h1>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Programme /Course</th>
                                <th>Duration</th>
                                <th>Eligibility</th>
                                <th>Intake</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>B.sc. Physics</td>
                                <td>3 Years</td>
                                <td>+2 Science group  or its Equivalent</td>
                                <td>42</td>
                            </tr>
                            <tr>
                                <td>B.sc. Physics</td>
                                <td>3 Years</td>
                                <td>+2 Science group  or its Equivalent</td>
                                <td>42</td>
                            </tr>
                            <tr>
                                <td>B.sc. Physics</td>
                                <td>3 Years</td>
                                <td>+2 Science group  or its Equivalent</td>
                                <td>42</td>
                            </tr>
                            <tr>
                                <td>B.sc. Physics</td>
                                <td>3 Years</td>
                                <td>+2 Science group  or its Equivalent</td>
                                <td>42</td>
                            </tr>
                            <tr>
                                <td>B.sc. Physics</td>
                                <td>3 Years</td>
                                <td>+2 Science group  or its Equivalent</td>
                                <td>42</td>
                            </tr>
                            <tr>
                                <td>B.sc. Physics</td>
                                <td>3 Years</td>
                                <td>+2 Science group  or its Equivalent</td>
                                <td>42</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>


