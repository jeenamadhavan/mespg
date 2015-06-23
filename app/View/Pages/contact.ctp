<?php 
$randnum=rand ( 1 ,5 );
?>
<div class="container banner">
    <div class="jumbotron fk-jumbotron banner-<?php echo $randnum; ?>">
        <h1>Contact</h1>
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
    <div class="col-md-6">
        <h3>ADDRESS INFORMATION</h3>
        <hr style="border-top:1px dashed #ccc;">
        <p>If you want to know more about Farook College please reach us on following address or visit our Website.</p>
        <br>
        <p><strong>Farook College</strong></p>
        <p>P.O Farook College, Kozhikode</p>
        <p>Kerala, India.</p>
        <p>email: <a href="mailto:admission@farookcollege">admission@farookcollege.ac.in</a></p>
        <p>Phone: +91 495 4050995, +91 9656291111, +91 9656223366</p> 
        <p>for admission queries: <a href="mailto:admission@farookcollege">admission@farookcollege@farookcollege.ac.in</a></p>
        <p>College Website: <a href="http://www.farookcollege.ac.in" target="_blank">www.farookcollege.ac.in</a></p>
    </div>
    <div class="col-md-6">
        <h3>SEND A MESSAGE</h3>
        <hr style="border-top:1px dashed #ccc;">
        <form role="form" action="" method="post" >
                <div class="form-group">
                    <label for="InputName">Your Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Your Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Message</label>
                    <div class="input-group"
                         >
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <div class="form-group">
                    <?php 
                    $rand1=rand ( 1 ,10 );
                    $rand2=rand ( 1 ,10 );
                    $rand=$rand1+$rand2;
                    
                    ?>
                    <label for="InputReal">What is <?php echo $rand1 ?>+<?php echo $rand2 ?>? (Simple Spam Checker)</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputReal" id="InputReal" required>
                        <input type="hidden"  name="InputRealActual" value="<?php echo $rand; ?>">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
        </form>
    </div>
    <div class="col-md-12" style="margin-top: 30px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15655.642002677654!2d75.85257595!3d11.19425755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba65a7d44f38971%3A0x3e4f202596bc766b!2sFarook+College%2C+Kerala+673632!5e0!3m2!1sen!2sin!4v1430985418881" style="width: 100%" height="450" frameborder="0" style="border:0"></iframe>
    </div>
</div>
<script type="text/javascript">
//jQuery(document).ready(function(){ 
//        var actualkey='<?php echo $rand; ?>'
//        jQuery('#InputReal').mouseout(function() {
//            
//            var key=$(this).val();
//            if(key!=actualkey){
//                $.alert.open('error','Invalid Calculation');
//            }
//        });
//        
//        
// });
</script>


