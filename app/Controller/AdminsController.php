<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AdminsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array(
        'Country',
        'Religion',
        'Choice',
        'Qualification',
        'Occupation',
        'Community',
        'State',
        'User',
        'Page',
        'Applicant',
        'Generatenumber',
        'District',
        'Ambition',
        'Course',
        'Board',
        'Academicdetail',
        'Coursedetail',
        'Secondlanguage',
        'Reservation',
        'Guardian',
        'Otherdetail',
        'Grade',
        'Temp',
        'Stream',
        'Payment',
        'Streamsubject',
        'Markdetail'
    );
    var $name = 'Pages';
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session', 'RequestHandler');

    /**
     * This controller does not use a model
     *
     * @var array
     */

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function index() {
        
    }
   
    public function checkpasswords() {

        if (strcmp($this->request->data['User']['frkUserPassword'], $this->request->data['User']['frkRepeatUserPassword']) == 0) {
            return true;
        }
        return false;
    }

    public function dashboard() {
        if ($this->Session->read('User.admin') == 1) {
            $no_of_applications = $this->User->find('count');
            $no_of_pending = $this->Payment->find('count', array('conditions' => array('status' => 'P')));
            $no_of_confirmed = $this->Payment->find('count', array('conditions' => array('status' => 'C')));
            $no_of_rejected = $this->Payment->find('count', array('conditions' => array('status' => 'R')));
            $this->set('no_of_rejected', $no_of_rejected);
            $this->set('no_of_confirmed', $no_of_confirmed);
            $this->set('no_of_pending', $no_of_pending);
            $this->set('no_of_applications', $no_of_applications);
            $this->render('dashboard', 'admin');
        } else {
            return $this->redirect(array('action' => 'adminlogin', 'controller' => 'admins'));
        }
    }

    public function viewpaymentdetails() {

        if ($this->Session->read('User.admin') == 1) {

            $Choices = $this->User->find('all', array(
                'limit' => 10,
                'fields' => array('Choices.*, User.frkName,Communities.name,Religions.name,Payments.id ,Payments.transaction_id,Payments.date,Payments.status'),
                'joins' => array(
                    array(
                        'alias' => 'Communities',
                        'table' => 'communities',
                        'conditions' => 'Communities.`id` = `User`.`frkUserCommunity`'
                    ),
                    array(
                        'alias' => 'Choices',
                        'table' => 'choices',
                        'conditions' => 'Choices.`user_id` = `User`.`frkUserID`'
                    ), array(
                        'alias' => 'Religions',
                        'table' => 'religions',
                        'conditions' => 'Religions.`id` = `User`.`frkUserReligion`'
                    ),
                    array(
                        'alias' => 'Payments',
                        'table' => 'payments',
                        'type' => 'left',
                        'conditions' => 'Payments.`u_id` = `User`.`frkUserID`'
                    )
                )
                    ));


            $this->set('Choices', $Choices);

            $this->render('viewpaymentdetails', 'admin');
        } else {
            return $this->redirect(array('action' => 'adminlogin', 'controller' => 'admins'));
        }
    }

     public function uploadexcel() {
        $this->render('uploadexcel', 'admin');

        if ($this->request->is('post')) {
            $fname = $_FILES['file']['name'];
            $ar1 = explode('.', $fname);

            $newfile1 = $ar1[0] . "_" . date('Y-m-d');
            $newfile2 = $newfile1 . "." . $ar1[1];

            $filename = WWW_ROOT . DS . 'documents' . DS . $newfile2;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $filename)) {
                return $this->redirect(array('action' => 'uploadexcel', 'controller' => 'admins'));
            } else {
                return $this->redirect(array('action' => 'dashboard', 'controller' => 'admins'));
            }
            
            
            
        }
    }
    /*****Make Employee Active********/
    public function changestatus() {
        $ids = $this->request->data["action"];
        $status = $this->request->data["status"];

        for ($i = 0; $i < count($ids); $i++) {
            $ids[$i];
            $this->Payment->id = $ids[$i];
            if (!$this->Payment->exists()) {
                throw new NotFoundException(__('Invalid Payment'));
            }
            if ($this->request->is(array('post', 'put'))) {

                if ($this->Payment->save(array('status' => $status))) {
                    $this->Session->setFlash(__('The status has been changed.'));
                    //return $this->redirect(array('action' => 'employees'));
                } else {
                    $this->Session->setFlash(__('The status could not be changed. Please, try again.'));
                }
            }
        }
        echo "ok";
        exit();
    }
public function upload(){ 
    $message = null;

$allowed_extensions = array('csv','xlsx','xls');

$upload_path = WWW_ROOT . DS . 'documents' . DS;

if (!empty($_FILES['file'])) {

        if ($_FILES['file']['error'] == 0) {
                        
                // check extension
                $file = explode(".", $_FILES['file']['name']);
                $extension = array_pop($file);
                
                if (in_array($extension, $allowed_extensions)) {
        
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path.'/'.$_FILES['file']['name'])) {
                
                                if (($handle = fopen($upload_path.'/'.$_FILES['file']['name'], "r")) !== false) {
                                        
                                        $keys = array();
                                        $out = array();
                                        
                                        $insert = array();
                                        
                                        $line = 1;
                                        
                                        while (($row = fgetcsv($handle, 0, ',', '"')) !== FALSE) {
                                        
                                        foreach($row as $key => $value) {
                                                if ($line === 1) {
                                                        $keys[$key] = $value;
                                                } else {
                                                        $out[$line][$key] = $value;
                                                        
                                                }
                                        }
                                        
                                        $line++;
                                      
                                    }
                                    
                                    fclose($handle);    
                                    
                                    if (!empty($keys) && !empty($out)) {
                                      echo  $keys = mb_convert_encoding($keys[0], "SJIS","UTF-8");
                                       //pr($keys);
                                       die();
                                        $db = new PDO('mysql:host=localhost;dbname=farookad_ugadmission','root');
                                                $db->exec("SET CHARACTER SET utf8");
                                    
                                        foreach($out as $key => $value) {
                                                
                                
                                        echo    $sql  = "INSERT INTO `excels` (`";
                                                $sql .= implode("`, `", $keys);
                                                $sql .= "`) VALUES (";
                                                $sql .= implode(", ", array_fill(0, count($keys), "?"));
                                                $sql .= ")";
                                                $statement = $db->prepare($sql);
                                                $statement->execute($value);
                                                
                                                }
                                                
                                                $message = '<span class="green">File has been uploaded successfully</span>';
                                                
                                        }       
                                    
                                }
                                
                        }
                        
                } else {
                        $message = '<span class="red">Only .csv file format is allowed</span>';
                }
                
        } else {
                $message = '<span class="red">There was a problem with your file</span>';
        }
        
}
}
    public function adminlogin() {
        if ($this->request->is('post')) {

            $encryptpassword = base64_encode($this->request->data['UserLogin']['password']);
            $usersDetails = $this->User->find('first', array(
                'conditions' => array(
                    'User.frkUserName' => $this->request->data['UserLogin']['username'],
                    'User.frkUserPassword' => $encryptpassword,
                    'User.frkUserStatus' => 1,
                )
                    ));
            if (count($usersDetails) == 0) {
                $this->Session->setFlash(__('The User Not Found or User Not Verfied.'));
                return $this->redirect(array('action' => 'adminlogin', 'controller' => 'admins'));
            } else {
                //create new session varialble
                $this->Session->write('User.userid', $usersDetails['User']['frkUserID']);
                $this->Session->write('User.admin', 1);

                $this->Session->write('User.username', $usersDetails['User']['frkUserName']);

                return $this->redirect(array('action' => 'dashboard', 'controller' => 'admins'));
            }
        }
    }

    public function logout() {
        $this->Session->delete('User');
        $this->Session->setFlash(__('Good bye!'));
        return $this->redirect(array('action' => 'adminlogin', 'controller' => 'admins'));
    }

    public function maininstruction() {
        
    }

    public function courses() {
        
    }

    public function contact() {
        if ($this->request->is('post')) {
            if ($this->request->data['InputReal'] != $this->request->data['InputRealActual']) {
                $this->Session->setFlash(__('Message Not Sent!.Your Calculation Incorrect!'));
            } else {
                $name = $this->request->data['InputName'];
                $email = $this->request->data['InputEmail'];
                $subject = 'Contact From Submission';
                $message = $this->request->data['InputMessage'];
                $to = 'info@farookadmission.in';
                $headers = 'From: ' . $email . "\r\n" .
                        'Name: ' . $name . "\r\n" .
                        'Reply-To: ' . $email . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
                $this->Session->setFlash(__('Your Message Sent We will get Back you Soon!'));
                return $this->redirect(array('action' => 'contact'));
            }
        }
    }

    public function primary_registration() {
        $userid = $this->Session->read('User.userid');
        if (!isset($userid)) {
            $this->Session->setFlash(__('Please Login!.'));
            return $this->redirect(array('action' => 'login'));
        } else {
            $users = $this->User->find('first', array(
                'conditions' => array(
                    'frkUserID' => $userid
                )
                    ));
            $applicant = $this->Applicant->find('first', array(
                'conditions' => array(
                    'frkUserID' => $userid
                )
                    ));

            @$entranceData = array(
                'med' => $applicant['Applicant']['frkApplicantEntranceMedical'],
                'eng' => $applicant['Applicant']['frkApplicantEntranceEngineering'],
                'iit' => $applicant['Applicant']['frkApplicantEntranceIIT'],
                'jee' => $applicant['Applicant']['frkApplicantEntranceJEE'],
                'aitmt' => $applicant['Applicant']['frkAITMT'],
                'aiims' => $applicant['Applicant']['frkAILMS'],
                'jitmer' => $applicant['Applicant']['frkJITMER'],
                'ali' => $applicant['Applicant']['frkALIGARH'],
                'wardhah' => $applicant['Applicant']['frkWARDHAH'],
                'amrita' => $applicant['Applicant']['frkAMRITA'],
                'manipal' => $applicant['Applicant']['frkMANIPAL'],
                'vellore' => $applicant['Applicant']['frkVELLORE'],
                'other' => $applicant['Applicant']['frkOTHER'],
            );
            $appenddata = array();
            $appenddata['PrimaryRegister']['name'] = $users['User']['frkName'];
            $appenddata['PrimaryRegister']['email'] = $users['User']['frkUserEmail'];
            $appenddata['PrimaryRegister']['adhaar'] = $users['User']['frkUserAdhaarNo'];
            $appenddata['PrimaryRegister']['blood'] = $users['User']['frkUserBloodGroup'];
            $appenddata['PrimaryRegister']['religion'] = $users['User']['frkUserReligion'];
            $appenddata['PrimaryRegister']['religion-other'] = $users['User']['frkUserReligion'];
            if ($users['User']['frkUserDOB'] != '0000-00-00') {
                $appenddata['PrimaryRegister']['dob'] = date("d/m/Y", strtotime($users['User']['frkUserDOB']));
            }
            $appenddata['PrimaryRegister']['father-name'] = $users['User']['frkFatherName'];
            $appenddata['PrimaryRegister']['father-qualification'] = $users['User']['frkFatherQualification'];
            $appenddata['PrimaryRegister']['father-qualification-other'] = $users['User']['frkFatherQualification'];
            $appenddata['PrimaryRegister']['father-occupation'] = $users['User']['frkFatherOccupation'];
            $appenddata['PrimaryRegister']['father-occupation-other'] = $users['User']['frkFatherOccupation'];
            $appenddata['PrimaryRegister']['gender'] = $users['User']['frkUserGender'];
            $appenddata['PrimaryRegister']['mobile'] = $users['User']['frkUserMobile'];
            $appenddata['PrimaryRegister']['nationality'] = $users['User']['frkUserNationality_ID'];
            $appenddata['PrimaryRegister']['community'] = $users['User']['frkUserCommunity'];
            $appenddata['PrimaryRegister']['community-other'] = $users['User']['frkUserCommunity'];
            $appenddata['PrimaryRegister']['placeofbirth'] = $users['User']['frkUserPOB'];
            $appenddata['PrimaryRegister']['mother-name'] = $users['User']['frkMotherName'];
            $appenddata['PrimaryRegister']['mother-qualification'] = $users['User']['frkMotherQualification'];
            $appenddata['PrimaryRegister']['mother-qualification-other'] = $users['User']['frkMotherQualification'];
            $appenddata['PrimaryRegister']['mother-occupation'] = $users['User']['frkMotherOccupation'];
            $appenddata['PrimaryRegister']['mother-occupation-other'] = $users['User']['frkMotherOccupation'];
            $appenddata['PrimaryRegister']['perma-addline1'] = $users['User']['frkUserAddressline1'];
            $appenddata['PrimaryRegister']['perma-addline2'] = $users['User']['frkUserAddressline2'];
            $appenddata['PrimaryRegister']['perma-postoffice'] = $users['User']['frkUserTaluk'];
            $appenddata['PrimaryRegister']['perma-pincode'] = $users['User']['frkUserPincode'];
            $appenddata['PrimaryRegister']['perma-city'] = $users['User']['frkUserDistrict'];
            $appenddata['PrimaryRegister']['perma-city-other'] = $users['User']['frkUserDistrict'];
            $appenddata['PrimaryRegister']['perma-state'] = $users['User']['frkUserState'];
            $appenddata['PrimaryRegister']['perma-state-other'] = $users['User']['frkUserState'];
            $appenddata['PrimaryRegister']['perma-country'] = $users['User']['frkUserCountry_ID'];
            $appenddata['PrimaryRegister']['comm-addline1'] = $users['User']['frkUserCommAddressline1'];
            $appenddata['PrimaryRegister']['comm-addline2'] = $users['User']['frkUserCommAddressline2'];
            $appenddata['PrimaryRegister']['comm-postoffice'] = $users['User']['frkUserCommTaluk'];
            $appenddata['PrimaryRegister']['comm-pincode'] = $users['User']['frkUserCommPincode'];
            $appenddata['PrimaryRegister']['comm-city'] = $users['User']['frkUserCommDistrict'];
            $appenddata['PrimaryRegister']['comm-city-other'] = $users['User']['frkUserCommDistrict'];
            $appenddata['PrimaryRegister']['comm-state'] = $users['User']['frkUserCommState'];
            $appenddata['PrimaryRegister']['comm-state-other'] = $users['User']['frkUserCommState'];
            $appenddata['PrimaryRegister']['comm-country'] = $users['User']['frkUserCommCountryID'];
            $appenddata['PrimaryRegister']['phonestd'] = $users['User']['frkPhoneStd'];
            $appenddata['PrimaryRegister']['phonenumber'] = $users['User']['frkPhoneNumber'];
            if ($applicant != null) {
                $appenddata['PrimaryRegister']['qualifyingexam'] = $applicant['Applicant']['frkTenth'];
                $appenddata['PrimaryRegister']['otherqualifyingexam'] = $applicant['Applicant']['frkTenth'];
                $appenddata['PrimaryRegister']['ten-school'] = $applicant['Applicant']['frkTenthSchool'];
                $appenddata['PrimaryRegister']['tenyearofstudy'] = $applicant['Applicant']['frkTenthYOS'];
                $appenddata['PrimaryRegister']['TenYearofPassing'] = $applicant['Applicant']['frlTenthYOP'];
                $appenddata['PrimaryRegister']['tenthRegno'] = $applicant['Applicant']['frkTenthRegno'];
                $appenddata['PrimaryRegister']['carrer-ambition'] = $applicant['Applicant']['frkApplicantAmbition'];
                $appenddata['PrimaryRegister']['other-carrer-ambition'] = $applicant['Applicant']['frkApplicantAmbition'];
            }
            $countries = $this->Country->find('list', array('fields' => array('id', 'country_name')));
            $religions = $this->Religion->find('list', array('fields' => array('id', 'name')));
            $qualifications = $this->Qualification->find('list', array('fields' => array('id', 'name')));
            $occupations = $this->Occupation->find('list', array('fields' => array('id', 'name')));
            $communities = $this->Community->find('list', array('fields' => array('id', 'name')));
            $states = $this->State->find('list', array('fields' => array('id', 'name')));
            $districts = $this->District->find('list', array('fields' => array('id', 'name')));
            $ambitions = $this->Ambition->find('list', array('fields' => array('id', 'name')));


            $communities['other'] = 'Other';
            $religions['other'] = 'Other';
            $qualifications['other'] = 'Other';
            $occupations['other'] = 'Other';
            $states['other'] = 'Other';
            $districts['other'] = 'Other';
            $ambitions['other'] = 'Other';
            if ($this->request->is('post')) {
                if ($this->request->data['PrimaryRegister']['religion'] != 'other') {
                    $userRelegion = $this->request->data['PrimaryRegister']['religion'];
                } else {
                    $userRelegion = $this->request->data['PrimaryRegister']['religion-other'];
                }
                if ($this->request->data['PrimaryRegister']['father-qualification'] != 'other') {
                    $userFatherQualification = $this->request->data['PrimaryRegister']['father-qualification'];
                } else {
                    $userFatherQualification = $this->request->data['PrimaryRegister']['father-qualification-other'];
                }
                if ($this->request->data['PrimaryRegister']['father-occupation'] != 'other') {
                    $userFatherOccupation = $this->request->data['PrimaryRegister']['father-occupation'];
                } else {
                    $userFatherOccupation = $this->request->data['PrimaryRegister']['father-occupation-other'];
                }
                if ($this->request->data['PrimaryRegister']['community'] != 'other') {
                    $userCommunity = $this->request->data['PrimaryRegister']['community'];
                } else {
                    $userCommunity = $this->request->data['PrimaryRegister']['community-other'];
                }
                if ($this->request->data['PrimaryRegister']['mother-qualification'] != 'other') {
                    $userMotherQualification = $this->request->data['PrimaryRegister']['mother-qualification'];
                } else {
                    $userMotherQualification = $this->request->data['PrimaryRegister']['mother-qualification-other'];
                }
                if ($this->request->data['PrimaryRegister']['mother-occupation'] != 'other') {
                    $userMotherOccupation = $this->request->data['PrimaryRegister']['mother-occupation'];
                } else {
                    $userMotherOccupation = $this->request->data['PrimaryRegister']['mother-occupation-other'];
                }
                if ($this->request->data['PrimaryRegister']['perma-state'] != 'other') {
                    $PermaState = $this->request->data['PrimaryRegister']['perma-state'];
                } else {
                    $PermaState = $this->request->data['PrimaryRegister']['perma-state-other'];
                }
                if ($this->request->data['PrimaryRegister']['comm-state'] != 'other') {
                    $CommState = $this->request->data['PrimaryRegister']['comm-state'];
                } else {
                    $CommState = $this->request->data['PrimaryRegister']['comm-state-other'];
                }
                if ($this->request->data['PrimaryRegister']['comm-city'] != 'other') {
                    $CommCity = $this->request->data['PrimaryRegister']['comm-city'];
                } else {
                    $CommCity = $this->request->data['PrimaryRegister']['comm-city-other'];
                }
                if ($this->request->data['PrimaryRegister']['perma-city'] != 'other') {
                    $PermaCity = $this->request->data['PrimaryRegister']['perma-city'];
                } else {
                    $PermaCity = $this->request->data['PrimaryRegister']['perma-city-other'];
                }
                $dob = $this->request->data['PrimaryRegister']['dob'];
                $date = str_replace('/', '-', $dob);
                $newdob = date('Y-m-d', strtotime($date));
                $userTabaleSaveData = array(
                    'frkName' => "'" . $this->request->data['PrimaryRegister']['name'] . "'",
                    'frkUserEmail' => "'" . $this->request->data['PrimaryRegister']['email'] . "'",
                    'frkUserAdhaarNo' => "'" . $this->request->data['PrimaryRegister']['adhaar'] . "'",
                    'frkUserBloodGroup' => "'" . $this->request->data['PrimaryRegister']['blood'] . "'",
                    'frkUserReligion' => "'" . $userRelegion . "'",
                    'frkUserDOB' => "'" . $newdob . "'",
                    'frkFatherName' => "'" . $this->request->data['PrimaryRegister']['father-name'] . "'",
                    'frkFatherQualification' => "'" . $userFatherQualification . "'",
                    'frkFatherOccupation' => "'" . $userFatherOccupation . "'",
                    'frkUserGender' => "'" . $this->request->data['PrimaryRegister']['gender'] . "'",
                    'frkUserMobile' => "'" . $this->request->data['PrimaryRegister']['mobile'] . "'",
                    'frkUserNationality_ID' => $this->request->data['PrimaryRegister']['nationality'],
                    'frkUserCommunity' => "'" . $userCommunity . "'",
                    'frkUserPOB' => "'" . $this->request->data['PrimaryRegister']['placeofbirth'] . "'",
                    'frkMotherName' => "'" . $this->request->data['PrimaryRegister']['mother-name'] . "'",
                    'frkMotherQualification' => "'" . $userMotherQualification . "'",
                    'frkMotherOccupation' => "'" . $userMotherOccupation . "'",
                    'frkUserAddressline1' => "'" . $this->request->data['PrimaryRegister']['perma-addline1'] . "'",
                    'frkUserAddressline2' => "'" . $this->request->data['PrimaryRegister']['perma-addline2'] . "'",
                    'frkUserTaluk' => "'" . $this->request->data['PrimaryRegister']['perma-postoffice'] . "'",
                    'frkUserDistrict' => "'" . $PermaCity . "'",
                    'frkUserState' => "'" . $PermaState . "'",
                    'frkUserPincode' => "'" . $this->request->data['PrimaryRegister']['perma-pincode'] . "'",
                    'frkUserCountry_ID' => $this->request->data['PrimaryRegister']['perma-country'],
                    'frkUserCommAddressline1' => "'" . $this->request->data['PrimaryRegister']['comm-addline1'] . "'",
                    'frkUserCommAddressline2' => "'" . $this->request->data['PrimaryRegister']['comm-addline2'] . "'",
                    'frkUserCommTaluk' => "'" . $this->request->data['PrimaryRegister']['comm-postoffice'] . "'",
                    'frkUserCommDistrict' => "'" . $CommCity . "'",
                    'frkUserCommState' => "'" . $CommState . "'",
                    'frkUserCommPincode' => "'" . $this->request->data['PrimaryRegister']['comm-pincode'] . "'",
                    'frkUserCommCountryID' => $this->request->data['PrimaryRegister']['comm-country'],
                    'frkPhoneStd' => "'" . $this->request->data['PrimaryRegister']['phonestd'] . "'",
                    'frkPhoneNumber' => "'" . $this->request->data['PrimaryRegister']['phonenumber'] . "'",
                );
                if ($this->request->data['PrimaryRegister']['carrer-ambition'] != 'other') {
                    $careerAmbition = $this->request->data['PrimaryRegister']['carrer-ambition'];
                } else {
                    $careerAmbition = $this->request->data['PrimaryRegister']['other-carrer-ambition'];
                }
                if ($this->request->data['PrimaryRegister']['qualifyingexam'] != 'other') {
                    $QualiExamTenth = $this->request->data['PrimaryRegister']['qualifyingexam'];
                } else {
                    $QualiExamTenth = $this->request->data['PrimaryRegister']['otherqualifyingexam'];
                }
                $applicantdetails = $this->Applicant->find('first', array(
                    'conditions' => array(
                        'Applicant.frkUserID' => $userid
                    )
                        ));
                $numbergen = $this->Generatenumber->find('first', array(
                    'conditions' => array(
                        'Generatenumber.typecode' => 1
                    )
                        ));
                $tempAppNumber = $numbergen['Generatenumber']['currvalue'] + 1;
                $remindigits = 6 - strlen($tempAppNumber);
                if ($remindigits == 5) {
                    $ApplicationNumber = 'FKUG00000' . $tempAppNumber;
                } elseif ($remindigits == 4) {
                    $ApplicationNumber = 'FKUG0000' . $tempAppNumber;
                } elseif ($remindigits == 3) {
                    $ApplicationNumber = 'FKUG000' . $tempAppNumber;
                } elseif ($remindigits == 2) {
                    $ApplicationNumber = 'FKUG00' . $tempAppNumber;
                } elseif ($remindigits == 1) {
                    $ApplicationNumber = 'FKUG0' . $tempAppNumber;
                } else {
                    $ApplicationNumber = 'FKUG' . $tempAppNumber;
                }
                $cnd3 = array(
                    'Generatenumber.typecode' => 1,
                );
                $fld3 = array(
                    'currvalue' => $tempAppNumber,
                );
                if (!$this->Generatenumber->updateAll($fld3, $cnd3)) {
                    $this->Session->setFlash(__('Application Number Not Generated'));
                    return $this->redirect(array('action' => 'primary_registration'));
                }

                $cnd = array(
                    'User.frkUserID' => $userid,
                );
                $cnd2 = array(
                    'Applicant.frkUserID' => $userid,
                );
                if (!$this->User->updateAll($userTabaleSaveData, $cnd)) {
                    $this->Session->setFlash(__('Could not Save Application Data'));
                    return $this->redirect(array('action' => 'primary_registration'));
                }








                if (isset($this->request->data['PrimaryRegister']['keralmedical'][0])) {
                    $keralamedical = 'Yes';
                } else {
                    $keralamedical = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['keralengg'][0])) {
                    $keralaengg = 'Yes';
                } else {
                    $keralaengg = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['iit'][0])) {
                    $iit = 'Yes';
                } else {
                    $iit = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['jee'][0])) {
                    $jee = 'Yes';
                } else {
                    $jee = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['aitmt'][0])) {
                    $aitmt = 'Yes';
                } else {
                    $aitmt = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['aiims'][0])) {
                    $aiims = 'Yes';
                } else {
                    $aiims = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['jitmer'][0])) {
                    $jitmer = 'Yes';
                } else {
                    $jitmer = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['ali'][0])) {
                    $ali = 'Yes';
                } else {
                    $ali = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['wardhah'][0])) {
                    $wardhah = 'Yes';
                } else {
                    $wardhah = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['amrita'][0])) {
                    $amrita = 'Yes';
                } else {
                    $amrita = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['manipal'][0])) {
                    $manipal = 'Yes';
                } else {
                    $manipal = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['vellore'][0])) {
                    $vellore = 'Yes';
                } else {
                    $vellore = 'No';
                }
                if (isset($this->request->data['PrimaryRegister']['other'][0])) {
                    $other = 'Yes#' . $this->request->data['PrimaryRegister']['entrance-other'];
                } else {
                    $other = 'No';
                }











                if (count($applicantdetails) > 0) {
                    $ApplicantTableData = array(
                        'frkApplicantAmbition' => "'" . $careerAmbition . "'",
                        'frkTenthSchool' => "'" . $this->request->data['PrimaryRegister']['ten-school'] . "'",
                        'frkTenthRegno' => "'" . $this->request->data['PrimaryRegister']['tenthRegno'] . "'",
                        'frkTenthYOS' => "'" . $this->request->data['PrimaryRegister']['tenyearofstudy'] . "'",
                        'frlTenthYOP' => "'" . $this->request->data['PrimaryRegister']['TenYearofPassing'] . "'",
                        'frkTenth' => "'" . $QualiExamTenth . "'",
                        'frkApplicantEntranceMedical' => "'" . $keralamedical . "'",
                        'frkApplicantEntranceEngineering' => "'" . $keralaengg . "'",
                        'frkApplicantEntranceIIT' => "'" . $iit . "'",
                        'frkApplicantEntranceJEE' => "'" . $jee . "'",
                        'frkAITMT' => "'" . $aitmt . "'",
                        'frkAILMS' => "'" . $aiims . "'",
                        'frkJITMER' => "'" . $jitmer . "'",
                        'frkALIGARH' => "'" . $ali . "'",
                        'frkWARDHAH' => "'" . $wardhah . "'",
                        'frkAMRITA' => "'" . $amrita . "'",
                        'frkMANIPAL' => "'" . $manipal . "'",
                        'frkVELLORE' => "'" . $vellore . "'",
                        'frkOTHER' => "'" . $other . "'",
                    );
                    if (!$this->Applicant->updateAll($ApplicantTableData, $cnd2)) {
                        $this->Session->setFlash(__('Could not Save Application Data'));
                        return $this->redirect(array('action' => 'primary_registration'));
                    }
                } else {
                    $ApplicantTableData = array(
                        'frkUserID' => $userid,
                        'frkApplicantAmbition' => $careerAmbition,
                        'frkApplicationNumber' => $ApplicationNumber,
                        'frkTenthSchool' => $this->request->data['PrimaryRegister']['ten-school'],
                        'frkTenthRegno' => $this->request->data['PrimaryRegister']['tenthRegno'],
                        'frkTenthYOS' => $this->request->data['PrimaryRegister']['tenyearofstudy'],
                        'frlTenthYOP' => $this->request->data['PrimaryRegister']['TenYearofPassing'],
                        'frkTenth' => $QualiExamTenth,
                        'frkApplicantEntranceMedical' => $keralamedical,
                        'frkApplicantEntranceEngineering' => $keralaengg,
                        'frkApplicantEntranceIIT' => $iit,
                        'frkApplicantEntranceJEE' => $jee,
                        'frkAITMT' => $aitmt,
                        'frkAILMS' => $aiims,
                        'frkJITMER' => $jitmer,
                        'frkALIGARH' => $ali,
                        'frkWARDHAH' => $wardhah,
                        'frkAMRITA' => $amrita,
                        'frkMANIPAL' => $manipal,
                        'frkVELLORE' => $vellore,
                        'frkOTHER' => $other,
                    );
                    $this->Applicant->create();
                    if (!$this->Applicant->save($ApplicantTableData)) {
                        $this->Session->setFlash(__('Could not Save Application Data'));
                        return $this->redirect(array('action' => 'primary_registration'));
                    }
                }
                $applicantdetails2 = $this->Applicant->find('first', array(
                    'conditions' => array(
                        'Applicant.frkUserID' => $userid
                    )
                        ));
                $AppNum = $applicantdetails2['Applicant']['frkApplicationNumber'];
                $subject = 'Application has been Entered';
                $message = 'Hello, ' . $this->request->data['PrimaryRegister']['name'] . ' . Thank you for completing Step 1 and Step 2. Please login again for the completion of Step 3, Step 4 and to submit final application the page will be open when Kerala HSE results are declared. Your Application Number is ' . $AppNum;
                $to = $this->request->data['PrimaryRegister']['email'];
                $headers = 'From: info@farookadmission.in' . "\r\n" .
                        'Name: Farook College UG Admission' . "\r\n" .
                        'Reply-To: info@farookadmission.in' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
                $this->Session->setFlash(__('Thankyou for completing Step 1 and Step 2. Please login again for the completion of Step 3, Step 4 and to submit final application the page will be open when Kerala HSE results are declared.!'));
                return $this->redirect(array('action' => 'applicantinfo'));
            }
            if (!$this->request->data) {
                $this->request->data = $appenddata;
            }
        }

        $setarry = array(
            'countries' => $countries,
            'religions' => $religions,
            'qualifications' => $qualifications,
            'occupations' => $occupations,
            'communities' => $communities,
            'states' => $states,
            'districts' => $districts,
            'entranceData' => $entranceData,
            'ambitions' => $ambitions,
        );
        $this->set($setarry);
    }

    public function test() {
        $randnum = rand(1, 5);
        pr($randnum);
        exit();
    }

    public function applicantinfo() {
        $userid = $this->Session->read('User.userid');
        if (!isset($userid)) {
            $this->Session->setFlash(__('Please Login!.'));
            return $this->redirect(array('action' => 'login'));
        } else {
            $userdata = $this->User->find('first', array(
                'conditions' => array(
                    'User.frkUserID' => $userid
                )
                    ));
//            pr($userdata);
//            exit();
            $applicantdata = array();
            $applicantdata['name'] = $userdata['User']['frkName'];

            if ($userdata['User']['frkUserGender'] == 'M') {
                $applicantdata['gender'] = 'MALE';
            } elseif ($userdata['User']['frkUserGender'] == 'F') {
                $applicantdata['gender'] = 'FEMALE';
            } elseif ($userdata['User']['frkUserGender'] == 'N') {
                $applicantdata['gender'] = 'NUETRAL';
            }
            $applicantdata['email'] = $userdata['User']['frkUserEmail'];
            $applicantdata['mobile'] = $userdata['User']['frkUserMobile'];
            $applicantdata['adhaar'] = $userdata['User']['frkUserAdhaarNo'];
            $getcountry = $this->Country->find('first', array(
                'conditions' => array(
                    'Country.id' => $userdata['User']['frkUserNationality_ID']
                )
                    ));
            $applicantdata['nationality'] = $getcountry['Country']['country_name'];
            if ($userdata['User']['frkUserBloodGroup'] == 'Oplus') {
                $applicantdata['blood'] = 'O+';
            } elseif ($userdata['User']['frkUserBloodGroup'] == 'Oneg') {
                $applicantdata['blood'] = 'O-';
            } elseif ($userdata['User']['frkUserBloodGroup'] == 'Aplus') {
                $applicantdata['blood'] = 'A+';
            } elseif ($userdata['User']['frkUserBloodGroup'] == 'Aneg') {
                $applicantdata['blood'] = 'A-';
            } elseif ($userdata['User']['frkUserBloodGroup'] == 'Bplus') {
                $applicantdata['blood'] = 'B+';
            } elseif ($userdata['User']['frkUserBloodGroup'] == 'Bneg') {
                $applicantdata['blood'] = 'B-';
            } elseif ($userdata['User']['frkUserBloodGroup'] == 'ABplus') {
                $applicantdata['blood'] = 'AB+';
            } elseif ($userdata['User']['frkUserBloodGroup'] == 'ABneg') {
                $applicantdata['blood'] = 'AB-';
            }
            $getcommunity = $this->Community->find('first', array(
                'conditions' => array(
                    'Community.id' => $userdata['User']['frkUserCommunity']
                )
                    ));
            if ($getcommunity == null) {
                $applicantdata['community'] = $userdata['User']['frkUserCommunity'];
            } else {
                $applicantdata['community'] = $getcommunity['Community']['name'];
            }
            $getrelegion = $this->Religion->find('first', array(
                'conditions' => array(
                    'Religion.id' => $userdata['User']['frkUserReligion']
                )
                    ));
            if ($getrelegion == null) {
                $applicantdata['religion'] = $userdata['User']['frkUserReligion'];
            } else {
                $applicantdata['religion'] = $getrelegion['Religion']['name'];
            }
            $applicantdata['placeofbirth'] = $userdata['User']['frkUserPOB'];
            $applicantdata['dob'] = date("d/m/Y", strtotime($userdata['User']['frkUserDOB']));
            $applicantdata['fathername'] = $userdata['User']['frkFatherName'];
            $getfatherqali = $this->Qualification->find('first', array(
                'conditions' => array(
                    'Qualification.id' => $userdata['User']['frkFatherQualification']
                )
                    ));
            if ($getfatherqali == null) {
                $applicantdata['fatherqualification'] = $userdata['User']['frkFatherQualification'];
            } else {
                $applicantdata['fatherqualification'] = $getfatherqali['Qualification']['name'];
            }
            $getfatherocc = $this->Occupation->find('first', array(
                'conditions' => array(
                    'Occupation.id' => $userdata['User']['frkFatherOccupation']
                )
                    ));
            if ($getfatherocc == null) {
                $applicantdata['fatheroccupation'] = $userdata['User']['frkFatherOccupation'];
            } else {
                $applicantdata['fatheroccupation'] = $getfatherocc['Occupation']['name'];
            }
            $applicantdata['mothername'] = $userdata['User']['frkMotherName'];
            $getmotherqali = $this->Qualification->find('first', array(
                'conditions' => array(
                    'Qualification.id' => $userdata['User']['frkMotherQualification']
                )
                    ));
            if ($getmotherqali == null) {
                $applicantdata['motherqualification'] = $userdata['User']['frkMotherQualification'];
            } else {
                $applicantdata['motherqualification'] = $getmotherqali['Qualification']['name'];
            }
            $getmotherocc = $this->Occupation->find('first', array(
                'conditions' => array(
                    'Occupation.id' => $userdata['User']['frkMotherOccupation']
                )
                    ));
            if ($getmotherocc == null) {
                if ($userdata['User']['frkMotherOccupation'] == '0') {
                    $applicantdata['motheroccupation'] = 'House Wife';
                } else {
                    $applicantdata['motheroccupation'] = $userdata['User']['frkMotherOccupation'];
                }
            } else {
                $applicantdata['motheroccupation'] = $getmotherocc['Occupation']['name'];
            }
            $applicantdata['perma-addline1'] = $userdata['User']['frkUserAddressline1'];
            $applicantdata['perma-addline2'] = $userdata['User']['frkUserAddressline2'];
            $applicantdata['perma-post'] = $userdata['User']['frkUserTaluk'];
            $getpermadistrict = $this->District->find('first', array(
                'conditions' => array(
                    'District.id' => $userdata['User']['frkUserDistrict']
                )
                    ));
            if ($getpermadistrict == null) {
                $applicantdata['perma-district'] = $userdata['User']['frkUserDistrict'];
            } else {
                $applicantdata['perma-district'] = $getpermadistrict['District']['name'];
            }

            $getpermastate = $this->State->find('first', array(
                'conditions' => array(
                    'State.id' => $userdata['User']['frkUserState']
                )
                    ));
            if ($getpermastate == null) {
                $applicantdata['perma-state'] = $userdata['User']['frkUserState'];
            } else {
                $applicantdata['perma-state'] = $getpermastate['State']['name'];
            }
            $getpermacountry = $this->Country->find('first', array(
                'conditions' => array(
                    'Country.id' => $userdata['User']['frkUserCountry_ID']
                )
                    ));
            if ($getpermacountry == null) {
                $applicantdata['perma-country'] = $userdata['User']['frkUserCountry_ID'];
            } else {
                $applicantdata['perma-country'] = $getpermacountry['Country']['country_name'];
            }
            $applicantdata['perma-pin'] = $userdata['User']['frkUserPincode'];






            $applicantdata['comm-addline1'] = $userdata['User']['frkUserCommAddressline1'];
            $applicantdata['comm-addline2'] = $userdata['User']['frkUserCommAddressline2'];
            $applicantdata['comm-post'] = $userdata['User']['frkUserCommTaluk'];
            $getcommdistrict = $this->District->find('first', array(
                'conditions' => array(
                    'District.id' => $userdata['User']['frkUserCommDistrict']
                )
                    ));
            if ($getcommdistrict == null) {
                $applicantdata['comm-district'] = $userdata['User']['frkUserCommDistrict'];
            } else {
                $applicantdata['comm-district'] = $getcommdistrict['District']['name'];
            }

            $getcommstate = $this->State->find('first', array(
                'conditions' => array(
                    'State.id' => $userdata['User']['frkUserCommState']
                )
                    ));
            if ($getcommstate == null) {
                $applicantdata['comm-state'] = $userdata['User']['frkUserCommState'];
            } else {
                $applicantdata['comm-state'] = $getcommstate['State']['name'];
            }
            $getcommcountry = $this->Country->find('first', array(
                'conditions' => array(
                    'Country.id' => $userdata['User']['frkUserCommCountryID']
                )
                    ));
            if ($getcommcountry == null) {
                $applicantdata['comm-country'] = $userdata['User']['frkUserCommCountryID'];
            } else {
                $applicantdata['comm-country'] = $getcommcountry['Country']['country_name'];
            }
            $applicantdata['comm-pin'] = $userdata['User']['frkUserCommPincode'];
            $applicantdata['phone'] = $userdata['User']['frkPhoneStd'] . " " . $userdata['User']['frkPhoneNumber'];
            $otherdata = $this->Applicant->find('first', array(
                'conditions' => array(
                    'Applicant.frkUserID' => $userid
                )
                    ));
            $applicantdata['tenth'] = $otherdata['Applicant']['frkTenth'];
            $applicantdata['tenthschool'] = $otherdata['Applicant']['frkTenthSchool'];
            $applicantdata['tenthregno'] = $otherdata['Applicant']['frkTenthRegno'];
            $applicantdata['tenthyos'] = $otherdata['Applicant']['frkTenthYOS'];
            $applicantdata['tenthyop'] = $otherdata['Applicant']['frlTenthYOP'];

            $getambition = $this->Ambition->find('first', array(
                'conditions' => array(
                    'Ambition.id' => $otherdata['Applicant']['frkApplicantAmbition']
                )
                    ));
            if ($getambition == null) {
                $applicantdata['career-ambition'] = $otherdata['Applicant']['frkApplicantAmbition'];
            } else {
                $applicantdata['career-ambition'] = $getambition['Ambition']['name'];
            }
            $entrance = array();
            if ($otherdata['Applicant']['frkApplicantEntranceMedical'] == 'Yes') {
                $entrance[1] = 'Kerala Medical';
            }
            if ($otherdata['Applicant']['frkApplicantEntranceEngineering'] == 'Yes') {
                $entrance[2] = 'Kerala Enginerring';
            }
            if ($otherdata['Applicant']['frkApplicantEntranceIIT'] == 'Yes') {
                $entrance[3] = 'IIT';
            }
            if ($otherdata['Applicant']['frkApplicantEntranceJEE'] == 'Yes') {
                $entrance[4] = 'NEST';
            }
            if ($otherdata['Applicant']['frkAITMT'] == 'Yes') {
                $entrance[5] = 'AIPMT';
            }
            if ($otherdata['Applicant']['frkAILMS'] == 'Yes') {
                $entrance[6] = 'AIIMS';
            }
            if ($otherdata['Applicant']['frkJITMER'] == 'Yes') {
                $entrance[7] = 'JIPMER';
            }
            if ($otherdata['Applicant']['frkALIGARH'] == 'Yes') {
                $entrance[8] = 'AMU Medical';
            }
            if ($otherdata['Applicant']['frkWARDHAH'] == 'Yes') {
                $entrance[9] = 'WARDAH';
            }
            if ($otherdata['Applicant']['frkAMRITA'] == 'Yes') {
                $entrance[10] = 'CUSAT';
            }
            if ($otherdata['Applicant']['frkMANIPAL'] == 'Yes') {
                $entrance[11] = 'IIST';
            }
            if ($otherdata['Applicant']['frkVELLORE'] == 'Yes') {
                $entrance[12] = 'IISER';
            }

            $otherentrance = explode("#", $otherdata['Applicant']['frkOTHER']);
            if ($otherentrance[0] == 'Yes') {
                $entrance[13] = $otherentrance[1];
            }
            $applicantdata['entrance'] = $entrance;
            $applicantdata['applicationnumber'] = $otherdata['Applicant']['frkApplicationNumber'];
        }
        $setArray = array(
            'applicantdata' => $applicantdata
        );
        $this->set($setArray);
    }

    public function photo_upload() {
        if ($this->request->is('post')) {
            if (count($this->request->data['SecondaryRegister']['Photo']) > 0) {
                $fileData[] = $this->request->data['SecondaryRegister']['Photo'];
            }
            $permitted = array('image/jpeg', 'image/pjpeg', 'image/png');
            $fileOK = $this->uploadFiles('img/profile', $fileData, "", "250", "300", "30", $permitted);
            if (!array_key_exists('urls', $fileOK)) {
                $this->Session->setFlash(__('Please Upload Valid Profile Photo.'));
                return $this->redirect(array('action' => 'secondary_registration'));
            }
            if (array_key_exists('urls', $fileOK)) {

                $this->request->data['SecondaryRegister']['Photo'] = $fileOK['urls'][0];
            } else if (array_key_exists('errors', $fileOK)) {
                $retArr['errors']['SecondaryRegister']['Photo'] = $fileOK['errors'];
                $isCommit = 0;
            } else if (array_key_exists('nofiles', $fileOK)) {
                $this->request->data['SecondaryRegister']['Photo'] = 'avatar.png';
            }
            $sql = "UPDATE users set frkUserPhoto='$this->request->data['SecondaryRegister']['Photo']' where frkUserID='$userid' ";
            $this->User->query($sql);
        }
    }

    public function secondary_registration() {

        //$userid = $this->Session->read('User.userid');

        $userid = 1;
        if (!isset($userid)) {
            $this->Session->setFlash(__('Please Login!.'));
            return $this->redirect(array('action' => 'login'));
        } else {
            if ($this->request->is('post')) {
                $subjectstructure = explode(',', $this->request->data['SecondaryRegister']['subject_structure']);
                $count1 = $subjectstructure[0];
                $count2 = $subjectstructure[1];
                $count3 = $subjectstructure[2];
                $count = $count1 + $count2 + $count3;


                $mark = array();

                $j = 0;
                for ($i = 0; $i < $count1; $i++) {

                    $mark[$j]['subject'] = $this->request->data['SecondaryRegister']['part1subject' . $i];
                    $mark[$j]['grade'] = $this->request->data['SecondaryRegister']['part1grade' . $i];
                    $mark[$j]['mark'] = $this->request->data['SecondaryRegister']['part1mark' . $i];
                    $mark[$j]['frkUserID'] = $userid;
                    $mark[$j]['part'] = 1;
                    $mark[$j]['boardID'] = $this->request->data['SecondaryRegister']['qualifyingexam'];
                    $mark[$j]['stream'] = $this->request->data['SecondaryRegister']['stream'];


                    $j++;
                }
                for ($i = 0; $i < $count2; $i++) {

                    $mark[$j]['subject'] = $this->request->data['SecondaryRegister']['part2subject' . $i];
                    $mark[$j]['grade'] = $this->request->data['SecondaryRegister']['part2grade' . $i];
                    $mark[$j]['mark'] = $this->request->data['SecondaryRegister']['part2mark' . $i];
                    $mark[$j]['frkUserID'] = $userid;
                    $mark[$j]['part'] = 2;
                    $mark[$j]['boardID'] = $this->request->data['SecondaryRegister']['qualifyingexam'];
                    $mark[$j]['stream'] = $this->request->data['SecondaryRegister']['stream'];

                    $j++;
                }

                for ($i = 0; $i < $count3; $i++) {

                    $mark[$j]['subject'] = $this->request->data['SecondaryRegister']['part3subject' . $i];
                    $mark[$j]['grade'] = $this->request->data['SecondaryRegister']['part3grade' . $i];
                    $mark[$j]['mark'] = $this->request->data['SecondaryRegister']['part3mark' . $i];
                    $mark[$j]['frkUserID'] = $userid;
                    $mark[$j]['part'] = 3;
                    $mark[$j]['boardID'] = $this->request->data['SecondaryRegister']['qualifyingexam'];
                    $mark[$j]['stream'] = $this->request->data['SecondaryRegister']['stream'];

                    $j++;
                }

                for ($k = 0; $k < count($mark); $k++) {

                    $sql = "INSERT INTO  markdetails (frkUserID,stream,boardID,part,subject,grade,mark)   VALUES('" . $mark[$k]['frkUserID'] . "','" . $mark[$k]['stream'] . "','" . $mark[$k]['boardID'] . "','" . $mark[$k]['part'] . "','" . $mark[$k]['subject'] . "','" . $mark[$k]['grade'] . "','" . $mark[$k]['mark'] . "') ";

                    $this->Markdetail->query($sql);
                }exit;
                /*                 * *****Academic Details********* */
                $academicdetails = array(
                    'boardID' => $this->request->data['SecondaryRegister']['qualifyingexam'],
                    'frkUserID' => $userid,
                    'institution' => $this->request->data['SecondaryRegister']['institution'],
                    'yearOfstudy' => $this->request->data['SecondaryRegister']['yearOfstudy'],
                    'registerNumber' => $this->request->data['SecondaryRegister']['registerNumber'],
                    'yearOfPass' => $this->request->data['SecondaryRegister']['yearOfPass'],
                    'noOfChances' => $this->request->data['SecondaryRegister']['NumberofChances'],
                    'TcnoDate' => $this->request->data['SecondaryRegister']['TcnoDate'],
                );
                /*                 * *****Academic Details********* */


                /*                 * *****Course Details********* */
                $coursedetails = array(
                    'frkUserID' => $userid,
                    'frkCourseChoice1' => $this->request->data['SecondaryRegister']['CourseChoice1'],
                    'frkCourseChoice2' => $this->request->data['SecondaryRegister']['CourseChoice2'],
                    'frkCourseChoice3' => $this->request->data['SecondaryRegister']['CourseChoice3'],
                    'frkCourseChoice4' => $this->request->data['SecondaryRegister']['CourseChoice4'],
                    'frkCourseChoice5' => $this->request->data['SecondaryRegister']['CourseChoice5'],
                    'frkSLanguageID' => $this->request->data['SecondaryRegister']['frkSLanguageID']
                );

                /*                 * *****Course Details********* */


                /*                 * *****Reservation Details********* */
                $reservations = array(
                    'frkHandiCapped' => $this->request->data['SecondaryRegister']['HandiCapped'],
                    'frkUserID' => $userid,
                    'frkNcc/Nss' => $this->request->data['SecondaryRegister']['NCC/NSS'],
                    'frkEx-ServiceMan' => $this->request->data['SecondaryRegister']['Ex-ServiceMan'],
                    'NCC_Certificate_A' => $this->request->data['SecondaryRegister']['NCC_Certificate_A'],
                    'NCC_Certificate_B' => $this->request->data['SecondaryRegister']['NCC_Certificate_B'],
                    'NCC_Certificate_C' => $this->request->data['SecondaryRegister']['NCC_Certificate_C'],
                    'None' => $this->request->data['SecondaryRegister']['None'],
                    'Illiteracy' => $this->request->data['SecondaryRegister']['Illiteracy'],
                    'sportDis1' => $this->request->data['SecondaryRegister']['Sports1'],
                    'sportlevel1' => $this->request->data['SecondaryRegister']['SportsLevel1'],
                    'sportDis2' => $this->request->data['SecondaryRegister']['Sports2'],
                    'sportlevel2' => $this->request->data['SecondaryRegister']['SportsLevel2'],
                    'sportDis3' => $this->request->data['SecondaryRegister']['Sports3'],
                    'sportlevel3' => $this->request->data['SecondaryRegister']['SportsLevel3'],
                    'Arts1' => $this->request->data['SecondaryRegister']['Arts1'],
                    'ArtsLevel1' => $this->request->data['SecondaryRegister']['ArtsLevel1'],
                    'Arts2' => $this->request->data['SecondaryRegister']['Arts2'],
                    'ArtsLevel2' => $this->request->data['SecondaryRegister']['ArtsLevel2'],
                    'Arts3' => $this->request->data['SecondaryRegister']['Arts3'],
                    'ArtsLevel3' => $this->request->data['SecondaryRegister']['ArtsLevel3']
                );


                $guardiandetails = array(
                    'frkParentName' => $this->request->data['SecondaryRegister']['parent-name'],
                    'frkParentAddressline2' => $this->request->data['SecondaryRegister']['parent-addline2'],
                    'frkParentPincode' => $this->request->data['SecondaryRegister']['parent-pincode'],
                    'frkParentState' => $this->request->data['SecondaryRegister']['parent-state'],
                    'frkParentPhoneStd' => $this->request->data['SecondaryRegister']['parent-phonestd'],
                    'frkParentMobileNumber' => $this->request->data['SecondaryRegister']['parent-mobilenumber'],
                    'frkParentAddressline1' => $this->request->data['SecondaryRegister']['parent-addline1'],
                    'frkParentPO' => $this->request->data['SecondaryRegister']['parent-postoffice'],
                    'frkParentCity' => $this->request->data['SecondaryRegister']['parent-city'],
                    'frkParentCountryID' => $this->request->data['SecondaryRegister']['parent-country'],
                    'frkParentPhoneNumber' => $this->request->data['SecondaryRegister']['parent-phonenumber'],
                    'frkParentEmail' => $this->request->data['SecondaryRegister']['parent-email'],
                    'frkParentRelation' => $this->request->data['SecondaryRegister']['parent-relationship'],
                    'frkParentIncome' => $this->request->data['SecondaryRegister']['parent-income'],
                    'frkGuardName' => $this->request->data['SecondaryRegister']['guard-name'],
                    'frkGuardAddress2' => $this->request->data['SecondaryRegister']['guard-addline2'],
                    'frkGuardPincode' => $this->request->data['SecondaryRegister']['guard-pincode'],
                    'frkGuardState' => $this->request->data['SecondaryRegister']['guard-state'],
                    'frkGuardPhonestd' => $this->request->data['SecondaryRegister']['guard-phonestd'],
                    'frkGuardMobile' => $this->request->data['SecondaryRegister']['guard-mobilenumber'],
                    'frkGuardAddress1' => $this->request->data['SecondaryRegister']['guard-addline1'],
                    'frkGuardPO' => $this->request->data['SecondaryRegister']['guard-postoffice'],
                    'frkGuardAddress1' => $this->request->data['SecondaryRegister']['guard-city'],
                    'frkGuardCity' => $this->request->data['SecondaryRegister']['guard-city'],
                    'frkGuardCountry' => $this->request->data['SecondaryRegister']['guard-country'],
                    'frkGuardPhone' => $this->request->data['SecondaryRegister']['guard-phonenumber'],
                    'frkGuardEmail' => $this->request->data['SecondaryRegister']['guard-email'],
                );

                $otherdetails = array(
                    'Hostel' => $this->request->data['SecondaryRegister']['Hostel'],
                    'frkUserBankName' => $this->request->data['SecondaryRegister']['BankName'],
                    'frkUserbankbranch' => $this->request->data['SecondaryRegister']['bankbranch'],
                    'frkUserBankAcnr' => $this->request->data['SecondaryRegister']['BankAccNumber'],
                );
                /*                 * *****Reservation Details********* */
                $validates = array();
                $msg = "";
                if ($this->request->data['SecondaryRegister']['CourseChoice1'] == $this->request->data['SecondaryRegister']['CourseChoice2']) {
                    $msg = 'Choice1 and Choice 2 are same';
                } else if ($this->request->data['SecondaryRegister']['CourseChoice1'] == $this->request->data['SecondaryRegister']['CourseChoice3']) {
                    $msg = 'Choice1 and Choice 3 are same';
                } else if ($this->request->data['SecondaryRegister']['CourseChoice2'] == $this->request->data['SecondaryRegister']['CourseChoice3']) {
                    $msg = 'Choice2 and Choice 3 are same';
                }

                if ($validates != null) {
                    foreach ($validates as $messages) {
                        $msg = $messages . '. ' . $msg . "<br>";
                    }
                    $this->Session->setFlash(__($msg));
                    return $this->redirect(array('action' => 'secondary_registration'));
                } else {
                    $this->Coursedetail->save($coursedetails);
                }
                if ($this->Academicdetail->save($academicdetails) && $this->Reservation->save($reservations)) {
                    if ($this->Guardian->save($guardiandetails) && $this->Otherdetail->save($otherdetails)) {
                        $this->Applicantmark->save($applicantmarks);
                        $this->photo_upload();

                        $this->Session->setFlash(__('Saved Application Data'));
                        return $this->redirect(array('action' => 'secondary_registration'));
                    }
                } else {
                    $this->Session->setFlash(__('Could not Save Application Data'));
                    return $this->redirect(array('action' => 'secondary_registration'));
                }
            }
        }
        $courses = $this->Course->find('list', array('fields' => array('frkCourseID', 'frkCourseName')));
        $this->set('courses', $courses);

        $b = $this->Board->find('list', array('fields' => array('id', 'name')));
        array_push($b, 'Other');
        $this->set('examboards', $b);
        $secondlanguages = $this->Secondlanguage->find('list', array('fields' => array('frkSLanguageID', 'frkSLanguageName')));
        $this->set('secondlanguages', $secondlanguages);
        $countries = $this->Country->find('list', array('fields' => array('id', 'country_name')));
        $this->set('countries', $countries);
        $states = $this->State->find('list', array('fields' => array('id', 'name')));
        $this->set('states', $states);
        $grades = $this->Grade->find('list', array('fields' => array('frkGradeID', 'frkGrade')));
        $this->set('grades', $grades);
    }

    public function downloadprospectus() {
        $this->response->file(WWW_ROOT . 'files/Prospectus2015-16.pdf', array('download' => true, 'name' => 'Farook College Prospectus 2015-16.pdf'));
    }

    public function encriptpassword() {
        $users = $this->User->find('all', array(
            'fields' => array(
                'User.frkUserID',
                'User.frkUserName',
                'User.frkUserPassword',
            )
                ));
        $temp = array();
        $i = 1;
        foreach ($users as $user) {
            $temp[$i]['id'] = $user['User']['frkUserID'];
            $temp[$i]['name'] = $user['User']['frkUserName'];
            $temp[$i]['password'] = base64_decode($user['User']['frkUserPassword']);
            $savedata = array(
                'id' => $temp[$i]['id'],
                'name' => $temp[$i]['name'],
                'password' => $temp[$i]['password'],
            );
            $this->Temp->create();
            $this->Temp->save($savedata);
            $i++;
        }
        pr($temp);

        exit();
    }

    public function forgotpassword() {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            $mail = $this->request->data['UserForgotPassword']['frkUserEmail'];

            $data = $this->User->find('first', array(
                'conditions' => array('frkUserEmail' => $mail),
                'fields' => array('frkUserEmail', 'frkUserID')
                    ));

            if (!$data) {

                $msg = 'No Such E-mail address registerd with us';
                $this->Session->setFlash(__($msg));
                return $this->redirect(array('action' => 'forgotpassword'));
            } else {
                $key = $this->randStrGen(20);
                $sql = "UPDATE `farook`.`users` SET `frkPasswordReset` =  '" . $key . "'  WHERE `users`.`frkUserID` = " . $data['User']['frkUserID'] . " ";
                $this->User->query($sql);

                $id = $data['User']['frkUserID'];
                $to = $data['User']['frkUserEmail'];


                $baseurl = Router::url('/', true);
                $link = $baseurl . "pages/reset/" . $key . "/" . $id;

                $subject = 'Reset password';
                $message1 = "<p>Please click on the link below to reset your password</p>";
                $message2 = "<a href='" . $link . "'>Click here to reset your account password</a>";
                $message3 = "<p>Alternatively, you can also copy paste the below link into your browser:
</p><p>$link</p><p>This email was sent by Farook College Team.</p>";
                $message = $message1 . $message2 . $message3;
                $headers = 'From: admissions@example.com' . "\r\n" .
                        'Reply-To: admissions@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                $action = mail($to, $subject, $message, $headers);


                /*                 * ************* */


                if ($action) {

                    $msg = 'Please check your email for reset instructions';
                    $this->Session->setFlash(__($msg));
                } else {
                    $msg = 'Something went wrong with activation mail. Please try later';

                    $this->Session->setFlash(__($msg));
                }
            }
            $this->redirect('/');
        }
    }

    public function reset($randstring = NULL, $id = NULL) {

        $data = $this->User->find('first', array(
            'conditions' => array('frkUserID' => $id, 'frkPasswordReset' => $randstring),
            'fields' => array('frkUserID')
                ));
        if (!$data) {
            $message = __('No Such User exists ');
            $this->Session->setFlash($message, 'flash', array('alert' => 'error'));
        } else {
            if ($this->request->is('post')) {
                $password = $this->request->data['UserResetPassword']['frkUserPassword'];
                $confpassword = $this->request->data['UserResetPassword']['frkRepeatUserPassword'];
                $msg = "";
                if ($password == null) {
                    $validates[1] = 'Password Should Not Be Empty';
                }
                if ($confpassword == null) {
                    $validates[2] = 'Confirm Password Should Not Be Empty';
                }
                if ($confpassword != $password) {
                    $validates[3] = 'Password does not Matches';
                }

                if (isset($validates) && $validates != null) {
                    foreach ($validates as $messages) {
                        $msg = $messages . '. ' . $msg . "<br>";
                    }
                    $this->Session->setFlash(__($msg));
                    return $this->redirect(array('action' => 'reset/' . $randstring . '/' . $id));
                } else {
                    $frkUserPassword = base64_encode($password);
                    $sql = "UPDATE `farook`.`users` SET `frkUserPassword` = '" . $frkUserPassword . "', `frkPasswordReset` = ' ' WHERE `users`.`frkUserID` = " . $id . " AND `users`.`frkPasswordReset` = '" . $randstring . "'; ";
                    $this->User->query($sql);
                    $this->Session->setFlash(__('You have changed your password successfully'));
                    return $this->redirect(array('action' => 'index'));
                }
            }
        }
    }

    public function getstream() {
        $id = $this->request->data["id"];
        $stream = $this->Stream->find('list', array('fields' => array('id', 'name'), 'conditions' => array('board_id' => $id)));

        echo json_encode($stream);
        exit();
    }

    public function getsubjectstructure() {
        $id = $this->request->data["id"];

        $structure = $this->Board->find('first', array('fields' => array('subject_structure'), 'conditions' => array('id' => $id)));
        echo $structure['Board']['subject_structure'];

        exit();
    }

    public function getsubjects() {
        $id = $this->request->data["id"];

        $structure = $this->Streamsubject->find('all', array('fields' => array('id', 'stream_id', 'name', 'part', 'max_marks'), 'conditions' => array('stream_id' => $id)));

        $data = array();
        foreach ($structure as $key => $value) {

            $data[$key]['id'] = $value['Streamsubject']['id'];
            $data[$key]['stream_id'] = $value['Streamsubject']['stream_id'];
            $data[$key]['name'] = $value['Streamsubject']['name'];
            $data[$key]['part'] = $value['Streamsubject']['part'];
            $data[$key]['max_marks'] = $value['Streamsubject']['max_marks'];
        } echo json_encode($data);
        exit();
    }

    public function getTotal($stream_id, $board_id) {
        
    }

    public function getmaxmarks() {
        $id = $this->request->data["id"];
        //$stream_id = $this->request->data["stream_id"];

        $structure = $this->Streamsubject->find('all', array('fields' => array('id', 'max_marks'), 'conditions' => array('id' => $id)));

        $data = array();
        foreach ($structure as $key => $value) {

            $data[$key]['id'] = $value['Streamsubject']['id'];

            $data[$key]['max_marks'] = $value['Streamsubject']['max_marks'];
        } echo json_encode($data);
        exit();
    }

    public function ajax_otherview() {
        $id = $this->request->data["id"];
        $this->layout = "ajax";
        $grades = $this->Grade->find('list', array('fields' => array('frkGradeID', 'frkGrade')));
        $this->set('grades', $grades);
        echo $this->render('ajax_otherview', 'ajax');
        exit;
    }

    public function ajax_view() {
        $id = $this->request->data["id"];
        $this->layout = "ajax";
        $grades = $this->Grade->find('list', array('fields' => array('frkGradeID', 'frkGrade')));


        $structure = $this->Board->find('first', array('fields' => array('subject_structure'), 'conditions' => array('id' => $id)));

        $setarray = array('grades' => $grades, 'subject_structure' => $structure['Board']['subject_structure']);
        $this->set('setarray', $setarray);
        echo $this->render('ajax_view', 'ajax');
        exit;
    }

    public function befor_payment() {
        $userid = $this->Session->read('User.userid');
        if (!isset($userid)) {
            $this->Session->setFlash(__('Please Login!.'));
            return $this->redirect(array('action' => 'login'));
        } else {
            $this->loadModel('User');
            $userdata = $this->User->find('all', array(
                'joins' => array(
                    array('table' => 'choices',
                        'alias' => 'Choices',
                        'type' => 'INNER',
                        'foreignKey' => false,
                        'conditions' => array('Choices.user_id = User.frkUserID')
                    ),
                    array('table' => 'communities',
                        'alias' => 'Communities',
                        'type' => 'INNER',
                        'foreignKey' => false,
                        'conditions' => array('Choices.community = Communities.id')
                    )
                ),
                'fields' => array(
                    'Choices.application_no',
                    'Choices.name',
                    'User.frkUserEmail',
                    'User.frkUserDOB',
                    'User.frkUserMobile',
                    'Communities.*'
                    )));

            // pr($userdata);
            // exit;





            $this->set('userdata', $userdata);
            pr($userdata);
            exit;
        }


        $communities = $this->Community->find('list', array('fields' => array('id', 'name')));
        $religions = $this->Religion->find('list', array('fields' => array('id', 'name')));
        $courses = $this->Course->find('list', array('fields' => array('frkCourseID', 'frkCourseName')));
        $this->set('communities', $communities);
        $this->set('religions', $religions);
        $this->set('courses', $courses);
    }

    public function choice_select() {
        if ($this->request->is('post')) {
            //pr($this->request->data); exit;
            $course_count = $this->Course->find('count');
            $choices = '';
            //echo $course_count; exit;
            for ($i = 0; $i < $course_count; $i++) {
                if (isset($this->request->data['course'][$i])) {
                    $choices = $choices . ',' . $this->request->data['course'][$i];
                }
            }
            $choices = ltrim($choices, ',');
            $choices = rtrim($choices, ',');
            $choices = preg_replace('/,+/', ',', $choices);

            $numbergen = $this->Generatenumber->find('first', array(
                'conditions' => array(
                    'Generatenumber.typecode' => 1
                )
                    ));
            $tempAppNumber = $numbergen['Generatenumber']['currvalue'] + 1;
            $remindigits = 6 - strlen($tempAppNumber);
            if ($remindigits == 5) {
                $ApplicationNumber = 'FKPG00000' . $tempAppNumber;
            } elseif ($remindigits == 4) {
                $ApplicationNumber = 'FKPG0000' . $tempAppNumber;
            } elseif ($remindigits == 3) {
                $ApplicationNumber = 'FKPG000' . $tempAppNumber;
            } elseif ($remindigits == 2) {
                $ApplicationNumber = 'FKPG00' . $tempAppNumber;
            } elseif ($remindigits == 1) {
                $ApplicationNumber = 'FKPG0' . $tempAppNumber;
            } else {
                $ApplicationNumber = 'FKPG' . $tempAppNumber;
            }
            $cnd3 = array(
                'Generatenumber.typecode' => 1,
            );
            $fld3 = array(
                'currvalue' => $tempAppNumber,
            );
            if (!$this->Generatenumber->updateAll($fld3, $cnd3)) {
                $this->Session->setFlash(__('Application Number Not Generated'));
                return $this->redirect(array('action' => 'choice_select'));
            }

            $savedata = array(
                'user_id' => $this->Session->read('User.userid'),
                'name' => $this->request->data['choice']['name'],
                'application_no' => $ApplicationNumber,
                'gender' => $this->request->data['choice']['gender'],
                'community' => $this->request->data['choice']['community'],
                'religion' => $this->request->data['choice']['religion'],
                'choices' => $choices,
                'date' => date('Y-m-d')
            );
            $this->Choice->set($savedata);
            if ($this->Choice->validates()) {
                $this->Choice->create();
                if (!$this->Choice->save($savedata)) {
                    $this->Session->setFlash('An error occured, please try again');
                } else {
                    return $this->redirect(array('controller' => 'pages', 'action' => 'payment'));
                }
            }
        }

        $communities = $this->Community->find('list', array('fields' => array('id', 'name')));
        $religions = $this->Religion->find('list', array('fields' => array('id', 'name')));
        $courses = $this->Course->find('list', array('fields' => array('frkCourseID', 'frkCourseName')));
        $this->set('communities', $communities);
        $this->set('religions', $religions);
        $this->set('courses', $courses);
    }

    public function update_list() {
        $course_id = $this->data['course_id'];
        $courses = $this->Course->find('list', array('fields' => array('frkCourseID', 'frkCourseName')));
        unset($courses[$course_id]);
        pr($courses);
        exit;
    }

    public function after_payment() {

        $userid = $this->Session->read('User.userid');
        pr($userid);
        exit;
        if (!isset($userid)) {
            $this->Session->setFlash(__('Please Login!.'));
            return $this->redirect(array('action' => 'login'));
        } else {
            $userdata = $this->User->find('first', array(
                'conditions' => array(
                    'User.frkUserID' => $userid
                )
                    ));
        }
    }

    public function after_payment_verify() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            echo $ApplicationNumber = $this->request->data['ApplicationNumber'];
            echo $transaction_id = $this->request->data['transaction_id'];
            echo $transactionDate = date('Y/m/d', strtotime($this->request->data['transactionDate']));
        }
    }

}
