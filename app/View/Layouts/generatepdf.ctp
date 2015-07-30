<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->charset(); ?>
        <title>
            M E S Mampad College PG Admission | <?php echo $title_for_layout; ?>
        </title>
        <script type="text/javascript">
            var BASEURL = "<?php echo $this->base; ?>";
            
        </script>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('bootstrap.min','style','alert/alert.min','alert/theme.min','bootstrap-datepicker.min'));
        $all_scripts = array('jquery.min','bootstrap.min','alert.min','combodate','moment','bootstrap-datepicker.min','jspdf.min');

        echo $this->Html->script($all_scripts);
        echo $this->fetch('script');
        ?> 
    </head>
<body>
<h3>please check your download folder</h3>
 <?php echo $All_result[0]['Choice']['application_no']; ?>
<script>
var imgData ='data:image/jpeg;base64,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'
var doc = new jsPDF();
doc.addImage(imgData, 'JPEG', 20, 7, 34, 36);
doc.setFont("times");
doc.setFontType("bold");
doc.setFontSize(26);
doc.text(55, 15, 'MES MAMPAD COLLGE');
doc.setFontSize(15);
doc.text(62, 20, 'Mampad College P.O (MALAPPURAM)');
doc.setFontType("normal");
doc.setFontSize(12);
doc.text(85, 25, 'Tel:04931 - 200387 / 200337');

doc.setFont("helvetica");
doc.setFontSize(10);
doc.text(57, 28, 'e-mail : info@mesmampad.org     website : www.mesmampad.org');

doc.setFontType("bold");
doc.setFontSize(11);
doc.text(68, 42, 'Application for Post Graduate Courses');
doc.text(90, 47, '(2015 - 2017)');
doc.setFont("times");
doc.setFontType("normal");

doc.rect(170, 8, 25, 28); 
doc.setFontSize(8);
doc.text(178, 17, 'Affix');
doc.text(175, 20, 'Photograph');
doc.setFontSize(7);
doc.text(171, 29, '(size 35 mm X 45 mm)');

doc.setFontType("bold");
doc.setFontSize(12);

// doc.text(10, 53, 'M.A.');
// doc.rect(20, 49, 15, 5);

// doc.text(45, 53, 'M.Sc.');
// doc.rect(56, 49, 15, 5);

doc.text(83, 53, '<?php echo $All_result[0]['Cours']['frkCourseName']; ?>');
// doc.text(90, 60, 'Programme/Main');
// doc.rect(100, 49, 15, 5);

// doc.text(125, 53, 'M.L.I.Sc.');
// doc.rect(143, 49, 15, 5);

// doc.text(163, 53, 'B.L.I.Sc.');
// doc.rect(180, 49, 15, 5);

doc.setFontType("normal");
doc.setFontSize(10);


doc.text(10, 60, 'Application No :   <?php echo $All_result[0]['Choice']['application_no']; ?>');
doc.rect(35, 56, 30, 6);

doc.text(143, 60, 'Admission No :');
doc.rect(170, 56, 30, 6);


// doc.rect(150, 56, 45, 6);

doc.rect(10, 64, 190, 225);
doc.line(18, 64, 18, 289); // vertical line

doc.text(13, 69, '1');
doc.text(20, 69, 'Name :');
doc.line(68, 80, 68, 64); // vertical line
doc.text(70, 69, '<?php echo $All_result[0]['User']['frkUserName'];  ?>');
doc.line(10, 72, 200, 72); // horizontal line

doc.text(13, 77, '2');
doc.text(20, 77, 'Gender :');
doc.line(10, 80, 200, 80); // horizontal line
doc.text(70, 77, '<?php echo $All_result[0]['User']['frkUserGender'];  ?>');

doc.text(13, 84, '3');
doc.text(20, 84, 'Nationality : <?php echo $All_result[0]['Countrie']['country_name'];  ?>');
doc.text(20, 90, 'Taluk :  <?php echo $All_result[0]['User']['Taluk'];  ?>');

doc.text(70, 84, 'State :  <?php echo $All_result[0]['State']['name']; ?>');
doc.text(70, 90, 'District : <?php echo $All_result[0]['District']['name']; ?>');

doc.text(130, 84, 'Village : <?php echo $All_result[0]['User']['Village']; ?>');
doc.text(130, 90, 'Blood Group : <?php echo $All_result[0]['User']['frkUserBloodGroup']; ?>');

doc.line(10, 92, 200, 92); // horizontal line
doc.text(20, 96, 'Address : Permanent');
doc.line(110, 92, 110, 120); // vertical line
doc.text(13, 112, '4');
doc.text(20, 102, '<?php echo $All_result[0]['User']['frkUserAddressline1']; ?>');
doc.text(20, 107, '<?php echo $All_result[0]['User']['frkUserAddressline2']; ?>');
doc.text(20, 112, 'P.O : <?php echo $All_result[0]['User']['frkUserTaluk']; ?>');
doc.text(20, 117, 'Dist : <?php echo $All_result[0]['District']['name']; ?>');
doc.text(65, 117, 'Pin code : <?php echo $All_result[0]['User']['frkUserPincode']; ?>');
doc.text(112, 96, 'Address for Communicatin');
doc.line(10, 98, 200, 98); // horizontal line
doc.text(112, 102, '<?php echo $All_result[0]['User']['frkUserCommAddressline1']; ?>');
doc.text(112, 107, '<?php echo $All_result[0]['User']['frkUserCommAddressline2']; ?>');
doc.text(112, 112, 'P.O :  <?php echo $All_result[0]['User']['frkUserTaluk']; ?>');
doc.text(112, 117, 'Dist : <?php echo $All_result[0]['DistrictComm']['name']; ?>');
doc.text(157, 117, 'Pin Code : <?php echo $All_result[0]['User']['frkUserCommPincode']; ?>');
doc.line(10, 120, 200,120); // horizontal line

doc.text(13, 125, '5');
doc.text(20, 125, 'Phone : STD Code : ');
doc.text(50, 125, '<?php echo $All_result[0]['User']['frkPhoneStd']; ?>');
doc.text(60, 125, 'No : <?php echo $All_result[0]['User']['frkPhoneNumber']; ?>');
doc.text(120, 125, 'Mobile : <?php echo $All_result[0]['User']['frkUserMobile']; ?>');
doc.line(10, 128, 200,128); // horizontal line

doc.text(13, 133, '6');
doc.text(20, 132, 'Date of Birth ');
doc.setFontType("italic");
doc.setFontSize(8);
doc.text(20, 135, '(as in SSLC book)');
doc.line(50, 128, 50, 136); // vertical line
doc.setFontType("normal");
doc.text(52, 133, '<?php echo $All_result[0]['User']['frkUserDOB']; ?> ');

doc.setFontSize(10);
doc.line(100, 128, 100, 136); // vertical line
doc.text(103, 133, 'Age ');
doc.line(115, 128, 115, 136); // vertical line
doc.text(118, 133, '<?php echo $All_result['age']; ?> ');
doc.line(126, 128, 126, 136); // vertical line
doc.text(129, 133, 'Place of Birth');
doc.line(151, 128, 151, 136); // vertical line
doc.text(155, 133, '<?php echo $All_result[0]['User']['frkUserPOB']; ?> ');
doc.line(10, 136, 200,136); // horizontal line

doc.text(13, 140, '7');
doc.text(20, 140, 'Religion :');
doc.text(20, 145, 'Community/Cast/Tribe : ');
doc.line(100, 136, 100, 147); // vertical line
doc.text(110, 140, '<?php echo $All_result[0]['Religion']['name']; ?> ');
doc.text(110, 145, '<?php echo $All_result[0]['Final_communitie']['name']; ?> /<?php echo $All_result[0]['Caste']['name']; ?>  ');
doc.line(10, 147, 200,147); // horizontal line

doc.text(13, 151, '8');
doc.text(20, 151, 'Name and address of Parent/Guardian guardian, if any  :  <?php echo $All_result[0]['User']['frkParentName']; ?>');
doc.text(20, 156, '<?php echo $All_result[0]['User']['parent_address1']; ?> ,<?php echo $All_result[0]['User']['parent_address2']; ?> ,<?php echo $All_result[0]['User']['parent_post']; ?>,<?php echo $All_result[0]['User']['parent_pin']; ?> ');
doc.text(20, 161, 'Phone : STD Code : ');
doc.text(50, 161, '');
doc.text(60, 161, 'No : ');
doc.text(120, 161, 'Mobile :  ');
doc.line(18, 163, 200,163); // horizontal line

doc.text(20, 168, 'a. Relationship to applicant');
doc.line(60, 163, 60, 171); // vertical line
doc.text(63, 168, '<?php echo $All_result[0]['User']['frkParentRelation']; ?> ');
doc.line(110, 163, 110, 171); // vertical line
doc.text(113, 166, 'Occupation and');
doc.text(113, 170, 'annual income');
doc.line(146, 163, 146, 171); // vertical line
doc.text(150, 168, '<?php echo $All_result[0]['Occupation']['name']; ?>/<?php echo $All_result[0]['User']['frkParentIncome']; ?>');
doc.line(10, 171, 200,171); // horizontal line

doc.text(13, 175, '9');
doc.text(20, 175, 'Name and address of local guardian, if any ');
doc.text(20, 180, '<?php echo $All_result[0]['User']['local_address1']; ?>, <?php echo $All_result[0]['User']['local_address2']; ?>, <?php echo $All_result[0]['User']['local_post']; ?>, <?php echo $All_result[0]['User']['local_pin']; ?>');
doc.text(20, 185, 'Phone : STD Code : ');
// doc.text(50, 185, '<?php echo $All_result[0]['District']['name']; ?>');
doc.text(60, 185, 'No : ');
doc.text(120, 185, 'Mobile : ');
doc.line(10, 187, 200,187); // horizontal line

doc.text(13, 190, '10');
doc.text(20, 190, 'Institution(s) attended for Qualifying');
doc.text(20, 194, 'Examination.');
doc.line(75, 187, 75, 196); // vertical line
doc.text(78, 192, '<?php echo $All_result[0]['Mark']['institution']; ?>');
doc.line(10, 196, 200,196); // horizontal line

doc.text(10, 200, '10(a)');
doc.text(20, 200, 'wether the above Instituation/College is');
doc.text(20, 204, 'affliated to University of Calicut');
doc.line(80, 196, 80, 205); // vertical line
doc.text(85, 200, '<?php echo $All_result[0]['Reservation']['Illiteracy']; ?>');
doc.line(10, 205, 200,205); // horizontal line

doc.text(13, 209, '11');
doc.text(20, 209, 'Instituation(s) and course(s) attended after the qualifying examination, if any');
doc.text(20, 213, '<?php echo $All_result[0]['Reservation']['frkExtra_course']; ?>');
doc.line(10, 216, 200,216); // horizontal line

doc.text(13, 220, '12');
doc.text(20, 220, 'Have you been eligible for fee concession');
doc.line(85, 216, 85, 223); // vertical line
doc.text(90, 220, '<?php echo $All_result[0]['Reservation']['frkFeeConcession']; ?>');
doc.line(10, 223, 200,223); // horizontal line

doc.text(13, 227, '13');
doc.text(20, 226, 'Are youe eligible for physically handicaped');
doc.setFontType("italic");
doc.setFontSize(8);
doc.text(20, 229, '(Attach copies of certificate)');
doc.setFontType("normal");
doc.setFontSize(10);
doc.line(85, 223, 85, 231); // vertical line
doc.text(90, 227, '<?php echo $All_result[0]['Reservation']['frkHandiCapped']; ?>');
doc.line(10, 231, 200,231); // horizontal line

doc.text(13, 235, '14');
doc.text(20, 234, 'Are youe eligible for grace marks for admission');
doc.setFontType("italic");
doc.setFontSize(8);
doc.text(20, 238, '(Please Attach the copy of certificate)');
doc.setFontType("normal");
doc.setFontSize(10);
doc.line(90, 231, 90, 239); // vertical line
// doc.text(95, 236, '<?php echo $All_result[0]['District']['name']; ?>');
doc.line(10, 239, 200,239); // horizontal line

doc.text(13, 247, '15');
doc.text(20, 247, 'Representation in sports/games');
doc.setFontType("italic");
doc.setFontSize(8);
doc.text(20, 251, '(Please Attach the copy of certificate)');
doc.setFontType("normal");
doc.setFontSize(10);
doc.line(75, 239, 75, 256); // vertical line
doc.text(80, 245, '<?php echo $All_result[0]['Reservation']['sportDis1']; ?>');
doc.text(165, 245, '<?php echo $All_result[0]['Reservation']['sportlevel1']; ?>');
doc.line(160, 239, 160, 256); // vertical line
doc.line(75, 248, 200,248); // horizontal line
doc.text(80, 253, '<?php echo $All_result[0]['Reservation']['sportDis2']; ?>');
doc.text(165, 253, '<?php echo $All_result[0]['Reservation']['sportlevel2']; ?>');
doc.line(10, 256, 200,256); // horizontal line

doc.text(13, 263, '16');
doc.text(20, 263, 'Representation in arts activities');
doc.setFontType("italic");
doc.setFontSize(8);
doc.text(20, 267, '(Please Attach the copy of certificate)');
doc.setFontType("normal");
doc.setFontSize(10);
doc.line(75, 256, 75, 279); // vertical line
doc.text(80, 260, '<?php echo $All_result[0]['Reservation']['Arts1']; ?>');
doc.text(165, 260, '<?php echo $All_result[0]['Reservation']['ArtsLevel1']; ?>');
doc.line(160, 256, 160, 279); // vertical line
doc.line(75, 263, 200,263); // horizontal line
doc.text(80, 268, '<?php echo $All_result[0]['Reservation']['Arts2']; ?>');
doc.text(165, 268, '<?php echo $All_result[0]['Reservation']['ArtsLevel2']; ?>'); 
doc.line(75, 271, 200,271); // horizontal line
doc.text(80, 276, '<?php echo $All_result[0]['Reservation']['Arts3']; ?>');
doc.text(165, 276, '<?php echo $All_result[0]['Reservation']['ArtsLevel3']; ?>'); 
doc.line(10, 279, 200,279); // horizontal line

doc.text(13, 285, '17');
doc.text(20, 285, 'Additional Information , if any'); 

doc.addPage();

doc.rect(10, 10, 190, 280);
doc.setFontType("bold");
doc.setFontSize(11);
doc.text(13, 15, '18'); 
doc.text(85, 15, 'Details of academic Qualification'); 
doc.setFontType("normal");
doc.setFontSize(10);
doc.line(10, 18, 200,18); // horizontal line
doc.line(18, 18, 18, 74); // vertical line

doc.text(13, 30, '1'); 
doc.text(23, 30, 'SSLC'); 
doc.line(40, 18, 40, 62); // vertical line
doc.text(45, 23, ''); 
doc.line(40, 26, 200,26); // horizontal line

doc.line(100, 26, 100, 40); // vertical line
doc.text(60, 30, 'School'); 
doc.line(130, 26, 130, 40); // vertical line
doc.text(110, 30, 'Reg.No'); 
doc.line(157, 26, 157, 40); // vertical line
doc.text(135, 30, 'Year of Pass'); 
// doc.line(150, 26, 150, 40); // vertical line
doc.text(169, 30, 'Percentage(%)'); 
// doc.line(170, 26, 170, 40); // vertical line
// doc.text(152, 30, 'Max Marks'); 
// doc.text(172, 30, 'Class/Grade'); 
doc.line(40, 32, 200,32); // horizontal line
var sslcschool="<?php echo $All_result[0]['Applicant']['frkTenthSchool']; ?>";
sslcschool=sslcschool.substring(0,27);
doc.text(41, 37, ''+sslcschool); 
doc.text(107, 37, '<?php echo $All_result[0]['Applicant']['frkTenthRegno']; ?>'); 
doc.text(136, 37, '<?php echo $All_result[0]['Applicant']['frlTenthYOP']; ?>'); 
doc.text(175, 37, '<?php echo $All_result[0]['Applicant']['tenthParcentage']; ?>'); 
// doc.text(158, 37, '600'); 
// doc.text(172, 37, 'Class/Grade'); 
doc.line(10, 40, 200,40); // horizontal line

doc.text(13, 48, '2'); 
doc.text(20, 48, 'Pre Degree/'); 
doc.text(20, 52, 'Plus Two'); 
// doc.line(60, 18, 60, 40); // vertical line
doc.text(45, 45, '<?php echo $All_result[0]['Board']['name']; ?>'); 
doc.line(40, 48, 200,48); // horizontal line

doc.line(90, 48, 90, 62); // vertical line
doc.text(60, 52, 'School'); 
doc.line(120, 48, 120, 62); // vertical line
doc.text(100, 52, 'Reg.No'); 
doc.line(137, 48, 137, 62); // vertical line
doc.text(125, 52, 'Year'); 
doc.line(160, 48, 160, 62); // vertical line
doc.text(139, 52, 'Percentage(%)'); 
// doc.line(190, 48, 190, 62); // vertical line
doc.text(172, 52, 'Stream'); 
// doc.text(172, 52, 'Class/Grade'); 
doc.line(40, 54, 200  ,54); // horizontal line
var plusTwoSchool="<?php echo $All_result[0]['Applicant']['plusTwoSchool']; ?>";
plusTwoSchool=plusTwoSchool.substring(0,23);
doc.text(41, 59, ''+plusTwoSchool); 
doc.text(97, 59, '<?php echo $All_result[0]['Applicant']['plusTwoRegno']; ?>'); 
doc.text(125, 59, '<?php echo $All_result[0]['Applicant']['plusTwoYOP']; ?>'); 
doc.text(145, 59, '<?php echo $All_result[0]['Applicant']['plusTwoPercentage']; ?>'); 
doc.text(172, 59, '<?php echo $All_result[0]['Stream']['name']; ?>'); 
// doc.text(172, 59, 'Class/Grade'); 
doc.line(10, 62, 200,62); // horizontal line

doc.text(13, 68, '3'); 
doc.text(20, 68, 'University :- <?php echo $All_result[0]['Universitie']['name']; ?>'); 
// doc.text(20, 71, 'Relevant Grade Card/Mark list'); 
doc.line(110, 62, 110, 74); // vertical line
doc.setFontType("bold");
doc.text(113, 68, 'Degree :- <?php echo $All_result[0]['Degree']['name']; ?>'); 
// doc.text(113, 71, 'Programme/Main Subject..................'); 
doc.line(10, 74, 200,74); // horizontal line


doc.line(10, 80, 200,80); // horizontal line
doc.line(18, 80, 18, 160); // vertical line




doc.line(10, 88, 200,88); // horizontal line

var MorG='<?php echo $All_result[0]['Mark']['mark_grade']; ?>';
var main= '<?php echo $All_result[0]['Mark']['main']; ?>';
var degree_id = '<?php echo $All_result[0]['Mark']['degree_id']; ?>';

if(MorG=="G")
    {
        doc.text(20, 78, 'Grade Stream'); 
        doc.text(20, 85, 'Course'); 
        doc.text(124, 85, 'Credit'); 
        doc.text(168, 85, 'CGPA'); 
        doc.setFontType("normal");
        doc.line(120, 80, 120, 152); // vertical line
        doc.line(165, 80, 165, 152); // vertical line
            for(i=0;i<8;i++)
            {
                doc.line(18, 88+(i*8), 200,88+(i*8)); // horizontal line
            }
            
            if(main==1 && (degree_id == 1 ||  degree_id == 2 ||  degree_id == 3))
            {
                //subject name
                doc.text(20, 92, 'common_sub :- <?php echo $All_result[0]['Mark']['common_sub']; ?>');
                doc.text(20, 100, 'com_other_sub :- <?php echo $All_result[0]['Mark']['com_other_sub']; ?>');
                var opencourse="<?php echo $All_result[0]['Mark']['open_sub']; ?>";
                opencourse=opencourse.substring(0,37);
                doc.text(20, 108, 'Open Course: :-'+opencourse);
                doc.text(20, 116, 'main1_sub :-<?php echo $All_result[0]['Mark']['main1_sub']; ?>');
                doc.text(20, 124, 'Complementary Course-I :- <?php echo $All_result[0]['Mark']['comp1_sub']; ?>');
                doc.text(20, 132, 'comp2_sub :- <?php echo $All_result[0]['Mark']['comp2_sub']; ?>');    

                //subject marks
                doc.text(130, 92, '<?php echo $All_result[0]['Mark']['common_credit']; ?>');
                doc.text(130, 100, '<?php echo $All_result[0]['Mark']['com_other_credit']; ?>');
                doc.text(130, 108, '<?php echo $All_result[0]['Mark']['open_credit']; ?>');
                doc.text(130, 116, '<?php echo $All_result[0]['Mark']['main1_credit']; ?>');
                doc.text(130, 124, '<?php echo $All_result[0]['Mark']['comp1_credit']; ?>');
                doc.text(130, 132, '<?php echo $All_result[0]['Mark']['comp2_credit']; ?>');     

                //subject cgpa
                doc.text(170, 92, '<?php echo $All_result[0]['Mark']['common_cgpa']; ?>');
                doc.text(170, 100, '<?php echo $All_result[0]['Mark']['com_other_cgpa']; ?>');
                doc.text(170, 108, '<?php echo $All_result[0]['Mark']['open_cgpa']; ?>');
                doc.text(170, 116, '<?php echo $All_result[0]['Mark']['main1_cgpa']; ?>');
                doc.text(170, 124, '<?php echo $All_result[0]['Mark']['comp1_cgpa']; ?>');
                doc.text(170, 132, '<?php echo $All_result[0]['Mark']['comp2_cgpa']; ?>');     
            }
            if(main==2 && (degree_id == 1 ||  degree_id == 2 ||  degree_id == 3))
            {   
                //subject name
                doc.text(20, 92, 'common_sub :- <?php echo $All_result[0]['Mark']['common_sub']; ?>');
                doc.text(20, 100, 'com_other_sub :- <?php echo $All_result[0]['Mark']['com_other_sub']; ?>');
                var opencourse="<?php echo $All_result[0]['Mark']['open_sub']; ?>";
                opencourse=opencourse.substring(0,37);
                doc.text(20, 108, 'Open Course: :-'+opencourse);
                doc.text(20, 116, 'main1_sub:-<?php echo $All_result[0]['Mark']['main1_sub']; ?>');
                doc.text(20, 124, 'main2_sub :-<?php echo $All_result[0]['Mark']['main2_sub']; ?>');
                doc.text(20, 132, 'Complementary Course-I :-<?php echo $All_result[0]['Mark']['comp1_sub']; ?>');     
                //subject credit
                 doc.text(130, 92, '<?php echo $All_result[0]['Mark']['common_credit']; ?>');
                doc.text(130, 100, '<?php echo $All_result[0]['Mark']['com_other_credit']; ?>');
                doc.text(130, 108, '<?php echo $All_result[0]['Mark']['open_credit']; ?>');
                doc.text(130, 116, '<?php echo $All_result[0]['Mark']['main1_credit']; ?>');
                doc.text(130, 124, '<?php echo $All_result[0]['Mark']['main2_credit']; ?>');
                doc.text(130, 132, '<?php echo $All_result[0]['Mark']['comp1_credit']; ?>');   
                //subject cgpa
                 doc.text(170, 92, '<?php echo $All_result[0]['Mark']['common_cgpa']; ?>');
                doc.text(170, 100, '<?php echo $All_result[0]['Mark']['com_other_cgpa']; ?>');
                doc.text(170, 108, '<?php echo $All_result[0]['Mark']['open_cgpa']; ?>');
                doc.text(170, 116, '<?php echo $All_result[0]['Mark']['main1_cgpa']; ?>');
                doc.text(170, 124, '<?php echo $All_result[0]['Mark']['main2_cgpa']; ?>');
                doc.text(170, 132, '<?php echo $All_result[0]['Mark']['comp1_cgpa']; ?>');   
            }
            if(main==3 && (degree_id == 1 ||  degree_id == 2 ||  degree_id == 3))
            {   
                //subject nameabduravoof@gmail.com
                doc.text(20, 92, 'common_sub :- <?php echo $All_result[0]['Mark']['common_sub']; ?>');
                doc.text(20, 100, 'com_other_sub :-<?php echo $All_result[0]['Mark']['com_other_sub']; ?>');
                var opencourse="<?php echo $All_result[0]['Mark']['open_sub']; ?>";
                opencourse=opencourse.substring(0,37);
                doc.text(20, 108, 'Open Course: :-'+opencourse);
                doc.text(20, 116, 'main1_sub :-<?php echo $All_result[0]['Mark']['main1_sub']; ?>');
                doc.text(20, 124, 'main2_sub :-<?php echo $All_result[0]['Mark']['main2_sub']; ?>');
                doc.text(20, 132, 'main3_sub :-<?php echo $All_result[0]['Mark']['main3_sub']; ?>');     
                //subject credit
                doc.text(130, 92, '<?php echo $All_result[0]['Mark']['common_credit']; ?>');
                doc.text(130, 100, '<?php echo $All_result[0]['Mark']['com_other_credit']; ?>');
                doc.text(130, 108, '<?php echo $All_result[0]['Mark']['open_credit']; ?>');
                doc.text(130, 116, '<?php echo $All_result[0]['Mark']['main1_credit']; ?>');
                doc.text(130, 124, '<?php echo $All_result[0]['Mark']['main2_credit']; ?>');
                doc.text(130, 132, '<?php echo $All_result[0]['Mark']['main3_credit']; ?>'); 
                //subject cgpa
                doc.text(170, 92, '<?php echo $All_result[0]['Mark']['common_cgpa']; ?>');
                doc.text(170, 100, '<?php echo $All_result[0]['Mark']['com_other_cgpa']; ?>');
                doc.text(170, 108, '<?php echo $All_result[0]['Mark']['open_cgpa']; ?>');
                doc.text(170, 116, '<?php echo $All_result[0]['Mark']['main1_cgpa']; ?>');
                doc.text(170, 124, '<?php echo $All_result[0]['Mark']['main2_cgpa']; ?>');
                doc.text(170, 132, '<?php echo $All_result[0]['Mark']['main3_cgpa']; ?>'); 
            }
        doc.text(20, 140, 'Overall Credit & CGPA of the Programme'); 
        doc.text(20, 148, 'Maximum CGPA'); 
        doc.text(130, 140, '<?php echo $All_result[0]['Mark']['overall_credit']; ?>'); 
        doc.text(170, 140, '<?php echo $All_result[0]['Mark']['overall_cgpa']; ?>'); 
        doc.text(130, 148, '4'); 
    }
if(MorG=="M")
    {   doc.text(20, 78, 'Marks'); 
        doc.text(20, 85, 'Subject'); 
        doc.text(124, 85, 'Marks Awarded'); 
        doc.text(168, 85, 'Max.Marks'); 
        doc.setFontType("normal");
        doc.line(120, 80, 120, 136); // vertical line
        doc.line(165, 80, 165, 136); // vertical line
            for(i=0;i<7;i++)
                {
                    doc.line(18, 88+(i*8), 200,88+(i*8)); // horizontal line   
                }

            if(main==1 && (degree_id == 1 ||  degree_id == 2 ||  degree_id == 3))
            {
                 //subject name
                doc.text(20, 92, 'part1_sub :-<?php echo $All_result[0]['Mark']['part1_sub']; ?>');
                doc.text(20, 100, 'part2_sub :-<?php echo $All_result[0]['Mark']['part2_sub']; ?>');
                doc.text(20, 108, 'main1_sub :-<?php echo $All_result[0]['Mark']['main1_sub']; ?>');
                doc.text(20, 116, 'Complementary Course-I :-<?php echo $All_result[0]['Mark']['comp1_sub']; ?>');
                doc.text(20, 124, 'comp2_sub :-<?php echo $All_result[0]['Mark']['comp2_sub']; ?>'); 
                
                //subject marks
                doc.text(130, 92, '<?php echo $All_result[0]['Mark']['part1_mark']; ?>');
                doc.text(130, 100, '<?php echo $All_result[0]['Mark']['part2_mark']; ?>');
                doc.text(130, 108, '<?php echo $All_result[0]['Mark']['main1_mark']; ?>');
                doc.text(130, 116, '<?php echo $All_result[0]['Mark']['comp1_mark']; ?>');
                doc.text(130, 124, '<?php echo $All_result[0]['Mark']['comp2_mark']; ?>'); 

                //subject max marks
                doc.text(170, 92, '<?php echo $All_result[0]['Mark']['part1_mark']; ?>');
                doc.text(170, 100, '<?php echo $All_result[0]['Mark']['part2_mark']; ?>');
                doc.text(170, 108, '<?php echo $All_result[0]['Mark']['main1_max']; ?>');
                doc.text(170, 116, '<?php echo $All_result[0]['Mark']['comp1_max']; ?>');
                doc.text(170, 124, '<?php echo $All_result[0]['Mark']['comp2_max']; ?>'); 
            }
             if(main==2 && (degree_id == 1 ||  degree_id == 2 ||  degree_id == 3))
            {
                 //subject name
                doc.text(20, 92, 'part1_sub :-<?php echo $All_result[0]['Mark']['part1_sub']; ?>');
                doc.text(20, 100, 'part2_sub :-<?php echo $All_result[0]['Mark']['part2_sub']; ?>');
                doc.text(20, 108, 'main1_sub :-<?php echo $All_result[0]['Mark']['main1_sub']; ?>');
                doc.text(20, 116, 'main2_sub :-<?php echo $All_result[0]['Mark']['main2_sub']; ?>');
                doc.text(20, 124, 'Complementary Course-I :-<?php echo $All_result[0]['Mark']['comp1_sub']; ?>'); 
                
                //subject marks
                doc.text(130, 92, '<?php echo $All_result[0]['Mark']['part1_mark']; ?>');
                doc.text(130, 100, '<?php echo $All_result[0]['Mark']['part2_mark']; ?>');
                doc.text(130, 108, '<?php echo $All_result[0]['Mark']['main1_mark']; ?>');
                doc.text(130, 116, '<?php echo $All_result[0]['Mark']['main2_mark']; ?>');
                doc.text(130, 124, '<?php echo $All_result[0]['Mark']['comp1_mark']; ?>'); 

                //subject max marks
                doc.text(170, 92, '<?php echo $All_result[0]['Mark']['part1_mark']; ?>');
                doc.text(170, 100, '<?php echo $All_result[0]['Mark']['part2_mark']; ?>');
                doc.text(170, 108, '<?php echo $All_result[0]['Mark']['main1_max']; ?>');
                doc.text(170, 116, '<?php echo $All_result[0]['Mark']['main2_max']; ?>');
                doc.text(170, 124, '<?php echo $All_result[0]['Mark']['comp1_max']; ?>'); 
            }
             if(main==3 && (degree_id == 1 ||  degree_id == 2 ||  degree_id == 3))
            {
                 //subject name
                doc.text(20, 92, 'part1_sub :-<?php echo $All_result[0]['Mark']['part1_sub']; ?>');
                doc.text(20, 100, 'part2_sub :-<?php echo $All_result[0]['Mark']['part2_sub']; ?>');
                doc.text(20, 108, 'main1_sub :-<?php echo $All_result[0]['Mark']['main1_sub']; ?>');
                doc.text(20, 116, 'main2_sub :-<?php echo $All_result[0]['Mark']['main2_sub']; ?>');
                doc.text(20, 124, 'main3_sub :-<?php echo $All_result[0]['Mark']['main3_sub']; ?>'); 
                
                //subject marks
                doc.text(130, 92, '<?php echo $All_result[0]['Mark']['part1_mark']; ?>');
                doc.text(130, 100, '<?php echo $All_result[0]['Mark']['part2_mark']; ?>');
                doc.text(130, 108, '<?php echo $All_result[0]['Mark']['main1_mark']; ?>');
                doc.text(130, 116, '<?php echo $All_result[0]['Mark']['main2_mark']; ?>');
                doc.text(130, 124, '<?php echo $All_result[0]['Mark']['main3_mark']; ?>'); 

                //subject max marks
                doc.text(170, 92, '<?php echo $All_result[0]['Mark']['part1_mark']; ?>');
                doc.text(170, 100, '<?php echo $All_result[0]['Mark']['part2_mark']; ?>');
                doc.text(170, 108, '<?php echo $All_result[0]['Mark']['main1_max']; ?>');
                doc.text(170, 116, '<?php echo $All_result[0]['Mark']['main2_max']; ?>');
                doc.text(170, 124, '<?php echo $All_result[0]['Mark']['main3_max']; ?>'); 

            }

    }

doc.line(18, 152, 200,152); // horizontal line

doc.text(20, 156, 'Index Mark'); 
doc.text(125, 156, '<?php echo $All_result[0]['Index']['index']; ?>'); 
doc.line(10, 160, 200,160); // horizontal line
doc.setFontType("normal");


doc.text(13, 164, 'Documents in original to be produced at the time of admission:'); 
doc.setFontSize(8);
// doc.rect(24,168,5,4);
doc.text(30, 170, '1. Degree Mark/Grade sheet'); 
// doc.rect(24,175,5,4);
doc.text(30, 174, '2. T.C & Conduct Certificate'); 
// doc.rect(24,181,5,4);
doc.text(30, 178, '3. Nativity, Community(for SC/CT) and Income'); 
doc.text(30, 182, '   Certificate(If eligible for the fee concession)');
doc.text(30, 186, '4. Equivalency Certificate (For students from');
doc.text(30, 190, '   outside Kerala)');
// doc.rect(114,168,5,4);
doc.text(30, 194, '5. NCC/NSS Certificate'); 
// doc.rect(114,175,5,4);
doc.text(120, 170, '6. Medical Board Certificate(For Physically)');
doc.text(120, 174, '   Handicapped Students)'); 
// doc.rect(114,181,5,4);
doc.text(120, 178, '7. Sports & Games Certificates (For Admission under '); 
    doc.text(120, 182, '   sports quota)');
    doc.text(120, 186, '8. SSLC Certificate or its equivalent(Attested Copy)');
    doc.text(120, 190, '9. Three Copies of recent Passport size Photograph');
doc.line(10, 198, 200,198); // horizontal line
doc.setFontSize(10);
doc.setFontType("bold");
doc.setFont("courier");
doc.text(95, 201, 'Declaration'); 
doc.setFontType("normal");
doc.setFont("times");
doc.setFontSize(9);
doc.text(15, 206, 'I declare that the particulars given above are correct to the best of my knowledge. I hereby undertake, if admitted, to abide by the rules of the');
doc.text(15, 210, 'college, to obey the orders and the instructions of the Teachers and Principal of the College.');
doc.text(15, 217, 'Place:');
doc.text(15, 221, 'Date:');
doc.text(150, 215, 'Signature of Applicant');
doc.text(15, 226, 'I/We do hereby guarantee the good conduct of my/our ward and the payment of all his/her dues to the college and hostel during the programme');
doc.text(15, 230, 'of study');
doc.text(15, 236, 'Signature of the Local Guardian, if any');
doc.text(150, 236, 'Signature of the Parent/Guardian');
doc.line(10, 239, 200,239); // horizontal line

////////// Office use only ///////////////

doc.setFontType("bold");
doc.text(95, 242, 'FOR OFFICE USE:');
// doc.line(10, 237, 200,237); // horizontal line
doc.setFontType("normal");
doc.text(13, 246, 'Tabulation :  ');
// doc.line(10, 257, 200,257); // horizontal line
doc.text(13, 260, 'Admitted to I Semester class in_____________________________________ on payment of fees under');
doc.text(20, 267, '1. Merit Quota:');
doc.text(47, 267, 'GM');
doc.rect(55, 264, 6, 4);
doc.text(67, 267, 'MM');
doc.rect(75, 264, 6, 4);
doc.text(87, 267, 'SC');
doc.rect(95, 264, 6, 4);
doc.text(107, 267, 'ST');
doc.rect(115, 264, 6, 4);
doc.text(127, 267, 'PH');
doc.rect(135, 264, 6, 4);
doc.text(20, 272, '2. Management Quota :');
doc.text(20, 277, '3. Sports Quota :');
doc.text(20, 283, '4. No. & Date of T C.');
doc.text(170, 283, 'PRINCIPAL');
doc.setFontSize(9);
doc.text(20, 288, 'Receipt No:_______________dated_________________Ad.No___________');
doc.setFontSize(8);
doc.text(140, 288, 'Office Assistant');
doc.save('<?php echo $All_result[0]['User']['frkUserName'];  ?>.pdf');


</script>

</body>
</html>
