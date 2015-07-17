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
App::uses('CakeEmail', 'Network/Email');
App::import('Controller', 'Indexes');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
     public $uses = array(
        'Country',
        'Religion',
        'Qualification',
        'Occupation',
        'Community',
        'Final_community',
        'State',
        'Caste',
        'User',
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
        'Streamsubject',
        'Markdetail',
        'Choice',
        'User',
        'Payment',
        'Stream',
        'University',
        'Degree',
        'Subjects',
        'Mark',
        'Completedpayment',
        'Final_community',
        'Undetectedpayment'
    );
    var $name = 'Pages';
    public $helpers = array('Html', 'Form', 'Session');

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function index() {
        
    }

    public function register() {
         //$this->render('register', 'register');
        if ($this->request->is('post')) {
            $validates = array();
            $msg = "";
            // $name = $this->request->data['UserForm']['Name'];
            $dob = date('Y-m-d', strtotime($this->request->data['frkUserDOB']));
            //echo $dob; exit;
            $mobile = $this->request->data['UserForm']['frkUserMobile'];
            $email = $this->request->data['UserForm']['frkUserEmail'];
            $password = $this->request->data['UserForm']['frkUserPassword'];
            $name = $this->request->data['UserForm']['frkUserName'];
            $repeatpassword = $this->request->data['UserForm']['frkRepeatUserPassword'];
            if (!is_numeric($mobile)) {
                $validates[8] = 'Mobile number should be numeric';
            }
            if (strlen($mobile) != 10) {
                $validates[7] = 'Mobile number should have only 10 digits';
            }
            if ($name == null) {
                $validates[6] = 'Name Should Not Be Empty';
            }
            if ($email == null) {
                $validates[1] = 'Email Should Not Be Empty';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validates[2] = "Invalid email format";
            }
            if ($password == null) {
                $validates[3] = 'Password Should Not Be Empty';
            }
            if ($repeatpassword == null) {
                $validates[4] = 'Password Repeat Should Not Be Empty';
            }
            if ($repeatpassword != $password) {
                $validates[5] = 'Password does not Matches';
            }
            $checkexist = $this->User->find('first', array(
                'conditions' => array(
                    'User.frkUserEmail' => $email
                )
                    ));
            if (count($checkexist) != 0) {
                $validates[6] = 'User with this Email Already Exist';
            }
            if ($validates != null) {
                foreach ($validates as $messages) {
                    $msg = $messages . '. ' . $msg . "<br>";
                }
                $this->Session->setFlash(__($msg));
                return $this->redirect(array('action' => 'register'));
            } else {
                $savedata = array(
                    'frkUserName' => $name,
                    'frkUserDOB' => $dob,
                    'frkUserMobile' => $mobile,
                    'frkUserEmail' => $email,
                    'frkUserPassword' => base64_encode($password),
                    'frkRandomString' => $this->randStrGen(20),
                    'frkUserCreatedDate' => date('Y-m-d'),
                );
                $this->User->create();
                $user = $this->User->save($savedata);
                if (!empty($user)) {
                    $this->_sendNewUserMail($user['User']['frkRandomString'], $user['User']['frkUserID'], $user['User']['frkUserEmail']);
                    $this->Session->setFlash(__('We have sent one confirmation link to your email Address,kindly confirm your Account.Thank you!'));
                    return $this->redirect(array('action' => 'login'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
    }

    public function checkpasswords() {

        if (strcmp($this->request->data['User']['frkUserPassword'], $this->request->data['User']['frkRepeatUserPassword']) == 0) {
            return true;
        }
        return false;
    }

    public function randStrGen($len) {
        $result = "";
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .= "" . $charArray[$randItem];
        }
        return $result;
    }

    public function _sendNewUserMail($randomstring, $id, $to) {

        $baseurl = Router::url('/', true);
        $link = $baseurl . "pages/confirmationlink/" . $randomstring . "/" . $id;
        //echo $this->Html->link('dfgdgdg');die();

        $subject = 'Confirm Your Email-MES-MAMPAD PG Admission';
        // $message1 = "Hello User,<br> You signed up at this site,Your account is almost ready,but before you can login you need to confirm your email address by visiting the link below";
        //$message2 = "Once you have visited the verification URL your account will be activated Thanks, Team.";
        $message1 = "Hello User,  You signed up at this site,Your account is almost ready,but before you can login you need to <br> confirm your email address by visiting the link below ";
        $message2 = " Once you have visited the verification URL your account will be activated. Thanks, Team.";
        $message = $message1 . '  ' . $link . '  ' . $message2;
        // $message = $message1 . $link. $message2;
        $headers = 'From: admission@mesmampadadmission.com' . "\r\n" .
                'Reply-To: admission@mesmampadadmission.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        //mail($to, $subject, $message, $headers);
        CakeEmail::deliver($to, $subject, $message, array(
            'transport' => 'Smtp',
            'from' => array('admission@mesmampadadmission.com' => 'MES-MAMPAD PG Admission'),
            'host' => 'email-smtp.us-west-2.amazonaws.com',
            'tls' => true,
            'port' => 587,
            'timeout' => 30,
            'username' => 'AKIAI246XOASKA3FLHBA',
            'password' => 'AoC1MuBsLsgW4RWMOerwbq3qWrbFNoG1IZOFzjdooB6M',
            'client' => null,
            'log' => false,
                //'charset' => 'utf-8',
                //'headerCharset' => 'utf-8',
        ));
    }

    public function confirmationlink($randomstring = NULL, $id = NULL) {

        $result = $this->User->find('first', array(
            'conditions' => array('frkUserID' => $id),
                ));
        if ($result['User']['frkUserStatus']) {
            $this->Session->setFlash(__('This Account Already Verified!. Please Login'));
            $this->redirect(array('action' => 'login', 'controller' => 'pages'));
        }

        if (isset($result['User']['frkRandomString']) && $result['User']['frkRandomString'] != " ") {
            $sql = "UPDATE `mespg_db`.`users` SET `frkUserStatus` = '1', `frkRandomString` = 'verified' WHERE `users`.`frkUserID` = " . $id . "; ";
            $usercredentials = $this->User->query($sql);
            $this->Session->setFlash(__('Congratulation,Your Account is Activated!. Please Login'));
            $this->redirect(array('action' => 'login', 'controller' => 'pages'));
        } else {
            $this->Session->setFlash(__('You can access the link only once'));
        }
    }

    public function login() {
        //$this->render('login', 'login');
        if ($this->request->is('post')) {

            $encryptpassword = base64_encode($this->request->data['UserLogin']['password']);
            $usersDetails = $this->User->find('first', array(
                'conditions' => array(
                    'User.frkUserEmail' => $this->request->data['UserLogin']['email'],
                    'User.frkUserPassword' => $encryptpassword,
                    'User.frkUserStatus' => 1,
                )
                    ));
            if (count($usersDetails) == 0) {
                $this->Session->setFlash(__('The User Not Found or User Not Verfied or Incorrect Password.'));
                return $this->redirect(array('action' => 'login'));
            } else {
                //create new session varialble
                $this->Session->write('User.userid', $usersDetails['User']['frkUserID']);
                $this->Session->write('User.email', $usersDetails['User']['frkUserEmail']);
                $this->Session->write('User.name', $usersDetails['User']['frkUserName']);
                $applicantdetails = $this->Applicant->find('first', array(
                    'conditions' => array(
                        'Applicant.frkUserID' => $usersDetails['User']['frkUserID']
                    )
                        ));
                /* if ($applicantdetails == null) {
                  return $this->redirect(array('action' => 'maininstruction'));
                  } else { */
                return $this->redirect(array('action' => 'choice_select'));
                //}
            }
        }
    }

    public function logout() {
        $this->Session->delete('User');
        $this->Session->setFlash(__('Good bye!'));
        return $this->redirect(array('action' => 'index'));
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
       // if ($this->request->is('post')) {pr($this->request->data);}
        
        $userid = $this->Session->read('User.userid');
        if (!isset($userid)) {
            $this->Session->setFlash(__('Please Login!.'));
            return $this->redirect(array('action' => 'login'));
        } else {
            $paymentUndetected=$this->Undetectedpayment->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
            $paymentCompleted=$this->Completedpayment->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
            if(empty($paymentCompleted) && empty($paymentUndetected)) {
                $this->Session->setFlash(__('Your Payment is pending! For further details, please contact admission@farookcollege.ac.in'));
                return $this->redirect(array('action' => 'choice_select'));
            }

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
            $reservations = $this->Reservation->find('first', array(
                'conditions' => array(
                    'frkUserID' => $userid
                )
                    ));

            $markTest=$this->Mark->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
        
            if(count($markTest)>0) {
                $markDetails=$this->Mark->find('first',array(
                    'conditions'=>array('user_id'=>$this->Session->read('User.userid')),
                    'joins'=>array(array(
                        'table'=>'universities',
                        'alias'=>'University',
                        'type'=>'INNER',
                        'conditions'=>array('Mark.university_id=University.id')
                        ),array(
                        'table'=>'degrees',
                        'alias'=>'Degree',
                        'type'=>'INNER',
                        'conditions'=>array('Mark.degree_id=Degree.id')
                        ),/*array(
                        'table'=>'subjects',
                        'alias'=>'Subject',
                        'type'=>'INNER',
                        'conditions'=>array('Subject.id=Degree.id')
                        )*/),
                    'fields'=>array(
                        'Mark.*',
                        'University.name',
                        'Degree.name'
                        )
                    ));
                //pr($markDetails); exit;
                $this->set('marks',$markDetails);
                $this->set('mark_entered',1);
            }

            
            
            $appenddata = array();
            $appenddata['PrimaryRegister']['name'] = $users['User']['frkUserName'];
            $appenddata['PrimaryRegister']['email'] = $users['User']['frkUserEmail'];
            //$appenddata['PrimaryRegister']['adhaar'] = $users['User']['frkUserAdhaarNo'];
            $appenddata['PrimaryRegister']['blood'] = $users['User']['frkUserBloodGroup'];
            $appenddata['PrimaryRegister']['religion'] = $users['User']['frkUserReligion'];
            //$appenddata['PrimaryRegister']['religion-other'] = $users['User']['frkUserReligion'];
            if ($users['User']['frkUserDOB'] != '0000-00-00') {
                $appenddata['PrimaryRegister']['dob'] = date("d/m/Y", strtotime($users['User']['frkUserDOB']));
            }
            $appenddata['PrimaryRegister']['parent-name'] = $users['User']['frkParentName'];
            $appenddata['PrimaryRegister']['parent-occupation'] = $users['User']['frkParentOccupation'];
            $appenddata['PrimaryRegister']['parent-income'] = $users['User']['frkParentIncome'];
            $appenddata['PrimaryRegister']['parent-occupation-other'] = $users['User']['frkParentOccupation'];
            //$appenddata['PrimaryRegister']['father-occupation-other'] = $users['User']['frkFatherOccupation'];
            $appenddata['PrimaryRegister']['gender'] = $users['User']['frkUserGender'];
            $appenddata['PrimaryRegister']['mobile'] = $users['User']['frkUserMobile'];
            $appenddata['PrimaryRegister']['nationality'] = $users['User']['frkUserNationality_ID'];
            $appenddata['PrimaryRegister']['community'] = $users['User']['frkUserCommunity'];
            $appenddata['PrimaryRegister']['caste'] = $users['User']['frkUserCasteID'];
            //$appenddata['PrimaryRegister']['community-other'] = $users['User']['frkUserCommunity'];
            $appenddata['PrimaryRegister']['placeofbirth'] = $users['User']['frkUserPOB'];
            //$appenddata['PrimaryRegister']['mother-name'] = $users['User']['frkMotherName'];
            //$appenddata['PrimaryRegister']['mother-qualification'] = $users['User']['frkMotherQualification'];
            //$appenddata['PrimaryRegister']['mother-qualification-other'] = $users['User']['frkMotherQualification'];
            //$appenddata['PrimaryRegister']['mother-occupation'] = $users['User']['frkMotherOccupation'];
            //$appenddata['PrimaryRegister']['mother-occupation-other'] = $users['User']['frkMotherOccupation'];
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
                //$appenddata['PrimaryRegister']['qualifyingexam'] = $applicant['Applicant']['frkTenth'];
                //$appenddata['PrimaryRegister']['otherqualifyingexam'] = $applicant['Applicant']['frkTenth'];
                $appenddata['PrimaryRegister']['ten-school'] = $applicant['Applicant']['frkTenthSchool'];
                //$appenddata['PrimaryRegister']['tenyearofstudy'] = $applicant['Applicant']['frkTenthYOS'];
                $appenddata['PrimaryRegister']['TenYearofPassing'] = $applicant['Applicant']['frlTenthYOP'];
                $appenddata['PrimaryRegister']['tenthRegno'] = $applicant['Applicant']['frkTenthRegno'];
                $appenddata['PrimaryRegister']['tenthRegno'] = $applicant['Applicant']['frkTenthRegno'];
                $appenddata['PrimaryRegister']['tenthRegno'] = $applicant['Applicant']['frkTenthRegno'];
                $appenddata['PrimaryRegister']['tenthParcentage'] = $applicant['Applicant']['tenthParcentage'];
                //$appenddata['PrimaryRegister']['tenthMaxMarks'] = $applicant['Applicant']['TenthMaxMarks'];
                $appenddata['PrimaryRegister']['caste'] = $users['User']['frkUserCasteID'];

                $appenddata['PrimaryRegister']['plusTwo-school'] = $applicant['Applicant']['plusTwoSchool'];
                $appenddata['PrimaryRegister']['plusTwoStream'] = $applicant['Applicant']['plusTwoStream'];
                $appenddata['PrimaryRegister']['plusTwoRegno'] = $applicant['Applicant']['plusTwoRegno'];
                $appenddata['PrimaryRegister']['plusTwoBoard'] = $applicant['Applicant']['plusTwoBoard'];
                //$appenddata['PrimaryRegister']['plusTwoTotalMarks'] = $applicant['Applicant']['plusTwoTotalMarks'];
                $appenddata['PrimaryRegister']['plusTwoPercentage'] = $applicant['Applicant']['plusTwoPercentage'];
                $appenddata['PrimaryRegister']['plusTwoYearofPassing'] = $applicant['Applicant']['plusTwoYOP'];
                




//$appenddata['PrimaryRegister']['carrer-ambition'] = $applicant['Applicant']['frkApplicantAmbition'];
                //$appenddata['PrimaryRegister']['other-carrer-ambition'] = $applicant['Applicant']['frkApplicantAmbition'];
            }
            $countries = $this->Country->find('list', array('fields' => array('id', 'country_name')));
            $religions = $this->Religion->find('list', array('fields' => array('id', 'name')));
            $qualifications = $this->Qualification->find('list', array('fields' => array('id', 'name')));
            $occupations = $this->Occupation->find('list', array('fields' => array('id', 'name')));
            $communities = $this->Final_community->find('list', array('fields' => array('id', 'name')));
            $states = $this->State->find('list', array('fields' => array('id', 'name')));
            $districts = $this->District->find('list', array('fields' => array('id', 'name')));
            $ambitions = $this->Ambition->find('list', array('fields' => array('id', 'name')));
            $streams = $this->Stream->find('list', array('fields' => array('id', 'name')));
            $boards= $this->Board->find('list', array('fields' => array('id', 'name')));
            $universities=$this->University->find('list',array('fields'=>array('id','name')));
            $degrees=$this->Degree->find('list',array('fields'=>array('id','name')));


            //$communities['other'] = 'Other';
            //$religions['other'] = 'Other';
            //$qualifications['other'] = 'Other';
            $occupations['other'] = 'Other';
            $states['other'] = 'Other';
            $districts['other'] = 'Other';
            //$universities['other']='Other';
            
            //$ambitions['other'] = 'Other';
            if ($this->request->is('post')) {
                //pr($this->request->data); exit;
                $userRelegion = $this->request->data['PrimaryRegister']['religion'];
                $userCommunity = $this->request->data['PrimaryRegister']['community'];

                if ($this->request->data['PrimaryRegister']['parent-occupation'] != 'other') {
                    $frkParentOccupation = $this->request->data['PrimaryRegister']['parent-occupation'];
                } else {
                    $frkParentOccupation = $this->request->data['PrimaryRegister']['parent-occupation-other'];
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
                    'frkUserName' => "'" . $this->request->data['PrimaryRegister']['name'] . "'",
                    //'frkUserEmail' => "'" . $this->request->data['PrimaryRegister']['email'] . "'",
                    //'frkUserAdhaarNo' => "'" . $this->request->data['PrimaryRegister']['adhaar'] . "'",
                    'frkUserBloodGroup' => "'" . $this->request->data['PrimaryRegister']['blood'] . "'",
                    'frkUserReligion' => "'" . $userRelegion . "'",
                    'frkUserDOB' => "'" . $newdob . "'",
                    'frkParentName' => "'" . $this->request->data['PrimaryRegister']['parent-name'] . "'",
                    'frkParentOccupation' => "'" . $frkParentOccupation . "'",
                    'frkParentIncome' => "'" . $this->request->data['PrimaryRegister']['parent-income'] . "'",
                    'frkUserGender' => "'" . $this->request->data['PrimaryRegister']['gender'] . "'",
                    'frkUserMobile' => "'" . $this->request->data['PrimaryRegister']['mobile'] . "'",
                    'frkUserNationality_ID' => $this->request->data['PrimaryRegister']['nationality'],
                    'frkUserCommunity' => "'" . $userCommunity . "'",
                    'frkUserCasteID' => $this->request->data['PrimaryRegister']['caste'],
                    'frkUserPOB' => "'" . $this->request->data['PrimaryRegister']['placeofbirth'] . "'",
                    //'frkMotherName' => "'" . $this->request->data['PrimaryRegister']['mother-name'] . "'",
                    //'frkMotherQualification' => "'" . $userMotherQualification . "'",
                    //'frkMotherOccupation' => "'" . $userMotherOccupation . "'",
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
                
                $applicantdetails = $this->Applicant->find('first', array(
                    'conditions' => array(
                        'Applicant.frkUserID' => $userid
                    )
                        ));
                

                $cnd = array(
                    'User.frkUserID' => $userid,
                );
                $cnd2 = array(
                    'Applicant.frkUserID' => $userid,
                );
                $usersaved=$this->User->updateAll($userTabaleSaveData, $cnd);
                /*if (!$this->User->updateAll($userTabaleSaveData, $cnd)) {
                    $this->Session->setFlash(__('Could not Save Application Data'));
                    return $this->redirect(array('action' => 'primary_registration'));
                }*/




                if ($this->request->data['PrimaryRegister']['plusTwoBoard'] != 'other') {
                    $plusTwoBoard = $this->request->data['PrimaryRegister']['plusTwoBoard'];
                } else {
                    $plusTwoBoard = $this->request->data['PrimaryRegister']['otherPlusTwoBoard'];
                }




                if (count($applicantdetails) > 0) {
                        $frkTenthSchool=str_replace("'","",$this->request->data['PrimaryRegister']['ten-school']);
                        $plusTwoSchool=str_replace("'","",$this->request->data['PrimaryRegister']['plusTwo-school']);
                    $ApplicantTableData = array(
                        //'frkApplicantAmbition' => "'" . $careerAmbition . "'",
                        'frkTenthSchool' => "'".$frkTenthSchool."'",
                        'frkTenthRegno' => "'".$this->request->data['PrimaryRegister']['tenthRegno']."'",
                        //'frkTenthYOS' => "'" . $this->request->data['PrimaryRegister']['tenyearofstudy'] . "'",
                        'frlTenthYOP' => "'".$this->request->data['PrimaryRegister']['TenYearofPassing']."'",
                        //'TenthTotalMarks' => "'" . $this->request->data['PrimaryRegister']['tenthTotalMarks'] . "'",
                        'tenthParcentage' => "'".$this->request->data['PrimaryRegister']['tenthParcentage']."'",
                        'plusTwoSchool' => "'".$plusTwoSchool."'",
                        'plusTwoStream' => "'".$this->request->data['PrimaryRegister']['plusTwoStream']."'",
                        'plusTwoRegno' => "'".$this->request->data['PrimaryRegister']['plusTwoRegno']."'",
                        'plusTwoBoard' => "'".$plusTwoBoard."'",
                        //'plusTwoTotalMarks' => $this->request->data['PrimaryRegister']['plusTwoTotalMarks'],
                        'plusTwoPercentage' => "'".$this->request->data['PrimaryRegister']['plusTwoPercentage']."'",
                        'plusTwoYOP' => "'".$this->request->data['PrimaryRegister']['plusTwoYearofPassing']."'",

                    );
                    $applicantsaved=$this->Applicant->updateAll($ApplicantTableData, $cnd2);
                    /*if (!$this->Applicant->updateAll($ApplicantTableData, $cnd2)) {
                        $this->Session->setFlash(__('Could not Save Application Data'));
                        return $this->redirect(array('action' => 'primary_registration'));
                    }*/
                } else {
                    $result=$this->Choice->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid')),
                        'fields'=>array('application_no')
                        ));
                    $ApplicationNumber=$result['Choice']['application_no'];
                    $frkTenthSchool=str_replace("'","",$this->request->data['PrimaryRegister']['ten-school']);
                    $plusTwoSchool=str_replace("'","",$this->request->data['PrimaryRegister']['plusTwo-school']);

                    $ApplicantTableData = array(
                        'frkUserID' => $userid,
                        //'frkApplicantAmbition' => $careerAmbition,
                        'frkApplicationNumber' => $ApplicationNumber,
                        'frkTenthSchool' =>$frkTenthSchool,
                        'frkTenthRegno' => $this->request->data['PrimaryRegister']['tenthRegno'],
                        //'frkTenthYOS' => "'" . $this->request->data['PrimaryRegister']['tenyearofstudy'] . "'",
                        'frlTenthYOP' => $this->request->data['PrimaryRegister']['TenYearofPassing'],
                        //'TenthTotalMarks' => $this->request->data['PrimaryRegister']['tenthTotalMarks'],
                        'tenthParcentage' => $this->request->data['PrimaryRegister']['tenthParcentage'],
                        'plusTwoSchool' => $plusTwoSchool,
                        'plusTwoStream' => $this->request->data['PrimaryRegister']['plusTwoStream'],
                        'plusTwoRegno' => $this->request->data['PrimaryRegister']['plusTwoRegno'],
                        'plusTwoBoard' => $plusTwoBoard,
                        //'plusTwoTotalMarks' => $this->request->data['PrimaryRegister']['plusTwoTotalMarks'],
                        'plusTwoPercentage' => $this->request->data['PrimaryRegister']['plusTwoPercentage'],
                        'plusTwoYOP' => $this->request->data['PrimaryRegister']['plusTwoYearofPassing'],
                    );
                    $this->Applicant->create();
                    $applicantsaved=$this->Applicant->save($ApplicantTableData);
                     
                }

                $marks=$this->Mark->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
                
                if(empty($marks)) {
                    if($this->request->data['mark_grade']=='M') {
                        if($this->request->data['main_system']==1) {
                            if($this->request->data['PrimaryRegister']['degree']==2 || $this->request->data['PrimaryRegister']['degree']==4 || $this->request->data['PrimaryRegister']['degree']==5) { // B com or bba or bmmc
                            $markSaveData=array(
                                'user_id'=>$this->Session->read('User.userid'),
                                'university_id'=>$this->request->data['PrimaryRegister']['University'],
                                'degree_id'=>$this->request->data['PrimaryRegister']['degree'],
                                'mark_grade'=>$this->request->data['mark_grade'],
                                'main'=>$this->request->data['main_system'],
                                'main1_sub'=>'Core',
                                'main1_mark'=>$this->request->data['core_marks'],
                                'main1_max'=>$this->request->data['core_max'],
                                'comp1_sub'=>'Complementary',
                                'comp1_mark'=>$this->request->data['comp1_marks'],
                                'comp1_max'=>$this->request->data['comp1_max'],
                                'part1_sub'=>$this->request->data['PrimaryRegister']['part_one_subject'],
                                'part1_mark'=>$this->request->data['part_one_marks'],
                                'part1_max'=>$this->request->data['part_one_max'],
                                'part2_sub'=>$this->request->data['PrimaryRegister']['part_two_subject'],
                                'part2_mark'=>$this->request->data['part_two_marks'],
                                'part2_max'=>$this->request->data['part_two_max'],

                                );
                        
                        
                    } else {
                        $markSaveData=array(
                                'user_id'=>$this->Session->read('User.userid'),
                                'university_id'=>$this->request->data['PrimaryRegister']['University'],
                                'degree_id'=>$this->request->data['PrimaryRegister']['degree'],
                                'mark_grade'=>$this->request->data['mark_grade'],
                                'main'=>$this->request->data['main_system'],
                                'main1_sub'=>$this->request->data['PrimaryRegister']['singleMainSubject1'],
                                'main1_mark'=>$this->request->data['core_marks'],
                                'main1_max'=>$this->request->data['core_max'],
                                'comp1_sub'=>$this->request->data['PrimaryRegister']['singleCompSubject1'],
                                'comp1_mark'=>$this->request->data['comp1_marks'],
                                'comp1_max'=>$this->request->data['comp1_max'],
                                'comp2_sub'=>$this->request->data['PrimaryRegister']['singleCompSubject2'],
                                'comp2_mark'=>$this->request->data['comp2_marks'],
                                'comp2_max'=>$this->request->data['comp2_max'],
                                'part1_sub'=>$this->request->data['PrimaryRegister']['part_one_subject'],
                                'part1_mark'=>$this->request->data['part_one_marks'],
                                'part1_max'=>$this->request->data['part_one_max'],
                                'part2_sub'=>$this->request->data['PrimaryRegister']['part_two_subject'],
                                'part2_mark'=>$this->request->data['part_two_marks'],
                                'part2_max'=>$this->request->data['part_two_max'],

                                );
                    }
                        $this->Mark->create();
                        $marksaved=$this->Mark->save($markSaveData);

                        } else if($this->request->data['main_system']==2) {
                            $markSaveData=array(
                                'user_id'=>$this->Session->read('User.userid'),
                                'university_id'=>$this->request->data['PrimaryRegister']['University'],
                                'degree_id'=>$this->request->data['PrimaryRegister']['degree'],
                                'mark_grade'=>$this->request->data['mark_grade'],
                                'main'=>$this->request->data['main_system'],
                                'main1_sub'=>$this->request->data['PrimaryRegister']['doubleMainSubject1'],
                                'main1_mark'=>$this->request->data['core1_marks'],
                                'main1_max'=>$this->request->data['core1_max'],
                                'main2_sub'=>$this->request->data['PrimaryRegister']['doubleMainSubject2'],
                                'main2_mark'=>$this->request->data['core2_marks'],
                                'main2_max'=>$this->request->data['core2_max'],
                                'comp1_sub'=>$this->request->data['PrimaryRegister']['doubleCompSubject1'],
                                'comp1_mark'=>$this->request->data['comp1_marks'],
                                'comp1_max'=>$this->request->data['comp1_max'],
                                'part1_sub'=>$this->request->data['PrimaryRegister']['part_one_subject'],
                                'part1_mark'=>$this->request->data['part_one_marks'],
                                'part1_max'=>$this->request->data['part_one_max'],
                                'part2_sub'=>$this->request->data['PrimaryRegister']['part_two_subject'],
                                'part2_mark'=>$this->request->data['part_two_marks'],
                                'part2_max'=>$this->request->data['part_two_max'],

                                );
                            $this->Mark->create();
                            $marksaved=$this->Mark->save($markSaveData);
                            
                        } else if($this->request->data['main_system']==3) {
                            $markSaveData=array(
                                'user_id'=>$this->Session->read('User.userid'),
                                'university_id'=>$this->request->data['PrimaryRegister']['University'],
                                'degree_id'=>$this->request->data['PrimaryRegister']['degree'],
                                'mark_grade'=>$this->request->data['mark_grade'],
                                'main'=>$this->request->data['main_system'],
                                'main1_sub'=>$this->request->data['PrimaryRegister']['tripleMainSubject1'],
                                'main1_mark'=>$this->request->data['core1_marks'],
                                'main1_max'=>$this->request->data['core1_max'],
                                'main2_sub'=>$this->request->data['PrimaryRegister']['tripleMainSubject2'],
                                'main2_mark'=>$this->request->data['core2_marks'],
                                'main2_max'=>$this->request->data['core2_max'],
                                'main3_sub'=>$this->request->data['PrimaryRegister']['tripleMainSubject3'],
                                'main3_mark'=>$this->request->data['core3_marks'],
                                'main3_max'=>$this->request->data['core3_max'],
                                'part1_sub'=>$this->request->data['PrimaryRegister']['part_one_subject'],
                                'part1_mark'=>$this->request->data['part_one_marks'],
                                'part1_max'=>$this->request->data['part_one_max'],
                                'part2_sub'=>$this->request->data['PrimaryRegister']['part_two_subject'],
                                'part2_mark'=>$this->request->data['part_two_marks'],
                                'part2_max'=>$this->request->data['part_two_max'],

                                );
                            $this->Mark->create();
                            $marksaved=$this->Mark->save($markSaveData);
                            
                        }
                    } else if($this->request->data['mark_grade']=='G') {
                        if($this->request->data['main_system']==1) {
                            //if($this->request->data['PrimaryRegister']['degree']!=2 && $this->request->data['PrimaryRegister']['degree']!=4 && $this->request->data['PrimaryRegister']['degree']!=5) { // Not B com, bba and bmmc
                            $markSaveData=array();
                                $markSaveData['user_id']=$this->Session->read('User.userid');
                                $markSaveData['university_id']=$this->request->data['PrimaryRegister']['University'];
                                $markSaveData['degree_id']=$this->request->data['PrimaryRegister']['degree'];
                                $markSaveData['mark_grade']=$this->request->data['mark_grade'];
                                $markSaveData['main']=$this->request->data['main_system'];
                                if($this->request->data['PrimaryRegister']['degree']!=2 && $this->request->data['PrimaryRegister']['degree']!=4 && $this->request->data['PrimaryRegister']['degree']!=5 && $this->request->data['PrimaryRegister']['degree']!=6) { // Not B com, bba, bca and bmmc
                                    if($this->request->data['PrimaryRegister']['University']!=4) {
                                        $markSaveData['main1_sub']=$this->request->data['PrimaryRegister']['singleMainSubject1'];
                                        $markSaveData['main1_credit']=$this->request->data['core_credit'];
                                        $markSaveData['main1_cgpa']=$this->request->data['core_cgpa'];
                                        $markSaveData['comp1_sub']=$this->request->data['PrimaryRegister']['singleCompSubject1'];
                                        $markSaveData['comp1_credit']=$this->request->data['comp1_credit'];
                                        $markSaveData['comp1_cgpa']=$this->request->data['comp1_cgpa'];
                                        $markSaveData['comp2_sub']=$this->request->data['PrimaryRegister']['singleCompSubject2'];
                                        $markSaveData['comp2_credit']=$this->request->data['comp2_credit'];
                                        $markSaveData['comp2_cgpa']=$this->request->data['comp2_cgpa'];
                                        if($this->request->data['PrimaryRegister']['University']!=5) {
                                            $markSaveData['open_sub']=$this->request->data['PrimaryRegister']['open_course'];
                                            $markSaveData['open_credit']=$this->request->data['open_course_credit'];
                                            $markSaveData['open_cgpa']=$this->request->data['open_course_cgpa'];
                                        }

                                        $markSaveData['common_sub']=$this->request->data['PrimaryRegister']['common_course'];
                                        $markSaveData['common_credit']=$this->request->data['common_course_credit'];
                                        $markSaveData['common_cgpa']=$this->request->data['common_course_cgpa'];
                                        $markSaveData['com_other_sub']=$this->request->data['PrimaryRegister']['common_course_other'];
                                        $markSaveData['com_other_credit']=$this->request->data['common_course_other_credit'];
                                        $markSaveData['com_other_cgpa']=$this->request->data['common_course_other_cgpa'];
                                        $markSaveData['add_common_course_sub']=$this->request->data['PrimaryRegister']['additional_common_course'];
                                        $markSaveData['add_common_course_credit']=$this->request->data['add_common_course_credit'];
                                        $markSaveData['add_common_course_cgpa']=$this->request->data['add_common_course_cgpa'];
                                        $markSaveData['overall_credit']=$this->request->data['overall_credit'];
                                        $markSaveData['overall_cgpa']=$this->request->data['overall_cgpa'];
                                    } else {
                                        $markSaveData['main1_sub']=$this->request->data['PrimaryRegister']['part_three_main'];
                                        $markSaveData['main1_credit']=$this->request->data['core_credit'];
                                        $markSaveData['main1_cgpa']=$this->request->data['core_cgpa'];
                                        $markSaveData['comp1_sub']=$this->request->data['PrimaryRegister']['part_three_sub1'];
                                        $markSaveData['comp1_credit']=$this->request->data['comp1_credit'];
                                        $markSaveData['comp1_cgpa']=$this->request->data['comp1_cgpa'];
                                        $markSaveData['comp2_sub']=$this->request->data['PrimaryRegister']['part_three_sub2'];
                                        $markSaveData['comp2_credit']=$this->request->data['comp2_credit'];
                                        $markSaveData['comp2_cgpa']=$this->request->data['comp2_cgpa'];

                                        $markSaveData['common_sub']=$this->request->data['PrimaryRegister']['part_one_english'];
                                        $markSaveData['common_credit']=$this->request->data['part_one_credit'];
                                        $markSaveData['common_cgpa']=$this->request->data['part_one_cgpa'];
                                        $markSaveData['com_other_sub']=$this->request->data['PrimaryRegister']['part_two_lang'];
                                        $markSaveData['com_other_credit']=$this->request->data['part_two_lang_credit'];
                                        $markSaveData['com_other_cgpa']=$this->request->data['part_two_lang_cgpa'];
                                        $markSaveData['add_common_course_sub']=$this->request->data['PrimaryRegister']['part_two_other'];
                                        $markSaveData['add_common_course_credit']=$this->request->data['part_two_other_credit'];
                                        $markSaveData['add_common_course_cgpa']=$this->request->data['part_two_other_cgpa'];
                                        $markSaveData['overall_credit']=$this->request->data['overall_credit'];
                                        $markSaveData['overall_cgpa']=$this->request->data['overall_cgpa'];

                                    }

                                    
                                    
                                } else if($this->request->data['PrimaryRegister']['degree']==2 || $this->request->data['PrimaryRegister']['degree']==4 || $this->request->data['PrimaryRegister']['degree']==5 || $this->request->data['PrimaryRegister']['degree']==6) { // B com or bba or bmmc or bca
                                    if($this->request->data['PrimaryRegister']['University']!=4) {
                                        $markSaveData['main1_sub']='Core';
                                        $markSaveData['main1_credit']=$this->request->data['core_credit'];
                                        $markSaveData['main1_cgpa']=$this->request->data['core_cgpa'];
                                        $markSaveData['comp1_sub']='Complementary';
                                        $markSaveData['comp1_credit']=$this->request->data['comp1_credit'];
                                        $markSaveData['comp1_cgpa']=$this->request->data['comp1_cgpa'];
                                        if($this->request->data['PrimaryRegister']['University']!=5) {
                                            $markSaveData['open_sub']=$this->request->data['PrimaryRegister']['open_course'];
                                            $markSaveData['open_credit']=$this->request->data['open_course_credit'];
                                            $markSaveData['open_cgpa']=$this->request->data['open_course_cgpa'];
                                        }

                                        $markSaveData['common_sub']=$this->request->data['PrimaryRegister']['common_course'];
                                        $markSaveData['common_credit']=$this->request->data['common_course_credit'];
                                        $markSaveData['common_cgpa']=$this->request->data['common_course_cgpa'];
                                        $markSaveData['com_other_sub']=$this->request->data['PrimaryRegister']['common_course_other'];
                                        $markSaveData['com_other_credit']=$this->request->data['common_course_other_credit'];
                                        $markSaveData['com_other_cgpa']=$this->request->data['common_course_other_cgpa'];
                                        $markSaveData['add_common_course_sub']=$this->request->data['PrimaryRegister']['additional_common_course'];
                                        $markSaveData['add_common_course_credit']=$this->request->data['add_common_course_credit'];
                                        $markSaveData['add_common_course_cgpa']=$this->request->data['add_common_course_cgpa'];
                                        $markSaveData['overall_credit']=$this->request->data['overall_credit'];
                                        $markSaveData['overall_cgpa']=$this->request->data['overall_cgpa'];
                                    } else {
                                        $markSaveData['main1_sub']=$this->request->data['PrimaryRegister']['com_part_three_main'];
                                        $markSaveData['main1_credit']=$this->request->data['core_credit'];
                                        $markSaveData['main1_cgpa']=$this->request->data['core_cgpa'];
                                        $markSaveData['comp1_sub']=$this->request->data['PrimaryRegister']['com_part_three_sub1'];
                                        $markSaveData['comp1_credit']=$this->request->data['comp1_credit'];
                                        $markSaveData['comp1_cgpa']=$this->request->data['comp1_cgpa'];
                                        $markSaveData['comp2_sub']=$this->request->data['PrimaryRegister']['com_part_three_sub2'];
                                        $markSaveData['comp2_credit']=$this->request->data['comp2_credit'];
                                        $markSaveData['comp2_cgpa']=$this->request->data['comp2_cgpa'];

                                        $markSaveData['add_common_course_sub']=$this->request->data['PrimaryRegister']['part_two_other'];
                                        $markSaveData['add_common_course_credit']=$this->request->data['part_two_other_credit'];
                                        $markSaveData['add_common_course_cgpa']=$this->request->data['part_two_other_cgpa'];
                                        $markSaveData['common_sub']=$this->request->data['PrimaryRegister']['part_one_english'];
                                        $markSaveData['common_credit']=$this->request->data['part_one_credit'];
                                        $markSaveData['common_cgpa']=$this->request->data['part_one_cgpa'];
                                        $markSaveData['com_other_sub']=$this->request->data['PrimaryRegister']['part_two_lang'];
                                        $markSaveData['com_other_credit']=$this->request->data['part_two_lang_credit'];
                                        $markSaveData['com_other_cgpa']=$this->request->data['part_two_lang_cgpa'];
                                        $markSaveData['overall_credit']=$this->request->data['overall_credit'];
                                        $markSaveData['overall_cgpa']=$this->request->data['overall_cgpa'];
                                        
                                    }
                                    
                                    
                                }
                                

                            $this->Mark->create();
                            $marksaved=$this->Mark->save($markSaveData);

                        } else if($this->request->data['main_system']==2) {
                            $markSaveData=array();

                                $markSaveData['user_id']=$this->Session->read('User.userid');
                                $markSaveData['university_id']=$this->request->data['PrimaryRegister']['University'];
                                $markSaveData['degree_id']=$this->request->data['PrimaryRegister']['degree'];
                                $markSaveData['mark_grade']=$this->request->data['mark_grade'];
                                $markSaveData['main']=$this->request->data['main_system'];
                                $markSaveData['main1_sub']=$this->request->data['PrimaryRegister']['doubleMainSubject1'];
                                $markSaveData['main1_credit']=$this->request->data['core1_credit'];
                                $markSaveData['main1_cgpa']=$this->request->data['core1_cgpa'];
                                $markSaveData['main2_sub']=$this->request->data['PrimaryRegister']['doubleMainSubject2'];
                                $markSaveData['main2_credit']=$this->request->data['core2_credit'];
                                $markSaveData['main2_cgpa']=$this->request->data['core2_cgpa'];
                                $markSaveData['comp1_sub']=$this->request->data['PrimaryRegister']['doubleCompSubject1'];
                                $markSaveData['comp1_credit']=$this->request->data['comp1_credit'];
                                $markSaveData['comp1_cgpa']=$this->request->data['comp1_cgpa'];
                                $markSaveData['common_sub']=$this->request->data['PrimaryRegister']['common_course'];
                                $markSaveData['common_credit']=$this->request->data['common_course_credit'];
                                $markSaveData['common_cgpa']=$this->request->data['common_course_cgpa'];
                                $markSaveData['com_other_sub']=$this->request->data['PrimaryRegister']['common_course_other'];
                                $markSaveData['com_other_credit']=$this->request->data['common_course_other_credit'];
                                $markSaveData['com_other_cgpa']=$this->request->data['common_course_other_cgpa'];
                                $markSaveData['add_common_course_sub']=$this->request->data['PrimaryRegister']['additional_common_course'];
                                $markSaveData['add_common_course_credit']=$this->request->data['add_common_course_credit'];
                                $markSaveData['add_common_course_cgpa']=$this->request->data['add_common_course_cgpa'];
                                if($this->request->data['PrimaryRegister']['University']!=5) {
                                    $markSaveData['open_sub']=$this->request->data['PrimaryRegister']['open_course'];
                                    $markSaveData['open_credit']=$this->request->data['open_course_credit'];
                                    $markSaveData['open_cgpa']=$this->request->data['open_course_cgpa'];
                                }
                                $markSaveData['overall_credit']=$this->request->data['overall_credit'];
                                $markSaveData['overall_cgpa']=$this->request->data['overall_cgpa'];

                            $this->Mark->create();
                            $marksaved=$this->Mark->save($markSaveData);

                        } else if($this->request->data['main_system']==3) {
                            $markSaveData=array();
                                $markSaveData['user_id']=$this->Session->read('User.userid');
                                $markSaveData['university_id']=$this->request->data['PrimaryRegister']['University'];
                                $markSaveData['degree_id']=$this->request->data['PrimaryRegister']['degree'];
                                $markSaveData['mark_grade']=$this->request->data['mark_grade'];
                                $markSaveData['main']=$this->request->data['main_system'];
                                $markSaveData['main1_sub']=$this->request->data['PrimaryRegister']['tripleMainSubject1'];
                                $markSaveData['main1_credit']=$this->request->data['core1_credit'];
                                $markSaveData['main1_cgpa']=$this->request->data['core1_cgpa'];
                                $markSaveData['main2_sub']=$this->request->data['PrimaryRegister']['tripleMainSubject2'];
                                $markSaveData['main2_credit']=$this->request->data['core2_credit'];
                                $markSaveData['main2_cgpa']=$this->request->data['core2_cgpa'];
                                $markSaveData['main3_sub']=$this->request->data['PrimaryRegister']['tripleMainSubject3'];
                                $markSaveData['main3_credit']=$this->request->data['core3_credit'];
                                $markSaveData['main3_cgpa']=$this->request->data['core3_cgpa'];
                                $markSaveData['common_sub']=$this->request->data['PrimaryRegister']['common_course'];
                                $markSaveData['common_credit']=$this->request->data['common_course_credit'];
                                $markSaveData['common_cgpa']=$this->request->data['common_course_cgpa'];
                                $markSaveData['com_other_sub']=$this->request->data['PrimaryRegister']['common_course_other'];
                                $markSaveData['com_other_credit']=$this->request->data['common_course_other_credit'];
                                $markSaveData['com_other_cgpa']=$this->request->data['common_course_other_cgpa'];
                                $markSaveData['add_common_course_sub']=$this->request->data['PrimaryRegister']['additional_common_course'];
                                $markSaveData['add_common_course_credit']=$this->request->data['add_common_course_credit'];
                                $markSaveData['add_common_course_cgpa']=$this->request->data['add_common_course_cgpa'];
                                if($this->request->data['PrimaryRegister']['University']!=5) {
                                    $markSaveData['open_sub']=$this->request->data['PrimaryRegister']['open_course'];
                                    $markSaveData['open_credit']=$this->request->data['open_course_credit'];
                                    $markSaveData['open_cgpa']=$this->request->data['open_course_cgpa'];
                                }
                                $markSaveData['overall_credit']=$this->request->data['overall_credit'];
                                $markSaveData['overall_cgpa']=$this->request->data['overall_cgpa'];
                                

                            $this->Mark->create();
                            $marksaved=$this->Mark->save($markSaveData);
                        }

                    } //grade
                    
                } else if(!empty($marks) && isset($_GET['edit_marks'])) { //if marks exists

                    $cond_marks=array('user_id'=>$this->Session->read('User.userid'));

                    if($this->request->data['mark_grade']=='M') {
                        if($this->request->data['main_system']==1) {
                            if($this->request->data['PrimaryRegister']['degree']!=2 && $this->request->data['PrimaryRegister']['degree']!=4 && $this->request->data['PrimaryRegister']['degree']!=5) { // Not B com, bba and bmmc
                            $markSaveData=array(
                                'user_id'=>"'".$this->Session->read('User.userid')."'",
                                'university_id'=>"'".$this->request->data['PrimaryRegister']['University']."'",
                                'degree_id'=>"'".$this->request->data['PrimaryRegister']['degree']."'",
                                'mark_grade'=>"'".$this->request->data['mark_grade']."'",
                                'main'=>"'".$this->request->data['main_system']."'",
                                'main1_sub'=>"'".$this->request->data['PrimaryRegister']['singleMainSubject1']."'",
                                'main1_mark'=>"'".$this->request->data['core_marks']."'",
                                'main1_max'=>"'".$this->request->data['core_max']."'",
                                'comp1_sub'=>"'".$this->request->data['PrimaryRegister']['singleCompSubject1']."'",
                                'comp1_mark'=>"'".$this->request->data['comp1_marks']."'",
                                'comp1_max'=>"'".$this->request->data['comp1_max']."'",
                                'comp2_sub'=>"'".$this->request->data['PrimaryRegister']['singleCompSubject2']."'",
                                'comp2_mark'=>"'".$this->request->data['comp2_marks']."'",
                                'comp2_max'=>"'".$this->request->data['comp2_max']."'",
                                'part1_sub'=>"'".$this->request->data['PrimaryRegister']['part_one_subject']."'",
                                'part1_mark'=>"'".$this->request->data['part_one_marks']."'",
                                'part1_max'=>"'".$this->request->data['part_one_max']."'",
                                'part2_sub'=>"'".$this->request->data['PrimaryRegister']['part_two_subject']."'",
                                'part2_mark'=>"'".$this->request->data['part_two_marks']."'",
                                'part2_max'=>"'".$this->request->data['part_two_max']."'",

                                );
                        
                    } else if($this->request->data['PrimaryRegister']['degree']==2 || $this->request->data['PrimaryRegister']['degree']==4 || $this->request->data['PrimaryRegister']['degree']==5) { // B com or bba or bmmc
                        $core='Core';
                        $comp='Complementary';
                        $markSaveData=array(
                                'user_id'=>"'".$this->Session->read('User.userid')."'",
                                'university_id'=>"'".$this->request->data['PrimaryRegister']['University']."'",
                                'degree_id'=>"'".$this->request->data['PrimaryRegister']['degree']."'",
                                'mark_grade'=>"'".$this->request->data['mark_grade']."'",
                                'main'=>"'".$this->request->data['main_system']."'",
                                'main1_sub'=>"'".$core."'",
                                'main1_mark'=>"'".$this->request->data['core_marks']."'",
                                'main1_max'=>"'".$this->request->data['core_max']."'",
                                'comp1_sub'=>"'".$comp."'",
                                'comp1_mark'=>"'".$this->request->data['comp1_marks']."'",
                                'comp1_max'=>"'".$this->request->data['comp1_max']."'",
                                'part1_sub'=>"'".$this->request->data['PrimaryRegister']['part_one_subject']."'",
                                'part1_mark'=>"'".$this->request->data['part_one_marks']."'",
                                'part1_max'=>"'".$this->request->data['part_one_max']."'",
                                'part2_sub'=>"'".$this->request->data['PrimaryRegister']['part_two_subject']."'",
                                'part2_mark'=>"'".$this->request->data['part_two_marks']."'",
                                'part2_max'=>"'".$this->request->data['part_two_max']."'",

                                );
                    }
                        $marksaved=$this->Mark->updateAll($markSaveData,$cond_marks);

                        } else if($this->request->data['main_system']==2) {
                            $markSaveData=array(
                                'user_id'=>"'".$this->Session->read('User.userid')."'",
                                'university_id'=>"'".$this->request->data['PrimaryRegister']['University']."'",
                                'degree_id'=>"'".$this->request->data['PrimaryRegister']['degree']."'",
                                'mark_grade'=>"'".$this->request->data['mark_grade']."'",
                                'main'=>"'".$this->request->data['main_system']."'",
                                'main1_sub'=>"'".$this->request->data['PrimaryRegister']['doubleMainSubject1']."'",
                                'main1_mark'=>"'".$this->request->data['core1_marks']."'",
                                'main1_max'=>"'".$this->request->data['core1_max']."'",
                                'main2_sub'=>"'".$this->request->data['PrimaryRegister']['doubleMainSubject2']."'",
                                'main2_mark'=>"'".$this->request->data['core2_marks']."'",
                                'main2_max'=>"'".$this->request->data['core2_max']."'",
                                'comp1_sub'=>"'".$this->request->data['PrimaryRegister']['doubleCompSubject1']."'",
                                'comp1_mark'=>"'".$this->request->data['comp1_marks']."'",
                                'comp1_max'=>"'".$this->request->data['comp1_max']."'",
                                'part1_sub'=>"'".$this->request->data['PrimaryRegister']['part_one_subject']."'",
                                'part1_mark'=>"'".$this->request->data['part_one_marks']."'",
                                'part1_max'=>"'".$this->request->data['part_one_max']."'",
                                'part2_sub'=>"'".$this->request->data['PrimaryRegister']['part_two_subject']."'",
                                'part2_mark'=>"'".$this->request->data['part_two_marks']."'",
                                'part2_max'=>"'".$this->request->data['part_two_max']."'",

                                );
                            $marksaved=$this->Mark->updateAll($markSaveData,$cond_marks);
                            
                        } else if($this->request->data['main_system']==3) {
                            $markSaveData=array(
                                'user_id'=>"'".$this->Session->read('User.userid')."'",
                                'university_id'=>"'".$this->request->data['PrimaryRegister']['University']."'",
                                'degree_id'=>"'".$this->request->data['PrimaryRegister']['degree']."'",
                                'mark_grade'=>"'".$this->request->data['mark_grade']."'",
                                'main'=>"'".$this->request->data['main_system']."'",
                                'main1_sub'=>"'".$this->request->data['PrimaryRegister']['tripleMainSubject1']."'",
                                'main1_mark'=>"'".$this->request->data['core1_marks']."'",
                                'main1_max'=>"'".$this->request->data['core1_max']."'",
                                'main2_sub'=>"'".$this->request->data['PrimaryRegister']['tripleMainSubject2']."'",
                                'main2_mark'=>"'".$this->request->data['core2_marks']."'",
                                'main2_max'=>"'".$this->request->data['core2_max']."'",
                                'main3_sub'=>"'".$this->request->data['PrimaryRegister']['tripleMainSubject3']."'",
                                'main3_mark'=>"'".$this->request->data['core3_marks']."'",
                                'main3_max'=>"'".$this->request->data['core3_max']."'",
                                'part1_sub'=>"'".$this->request->data['PrimaryRegister']['part_one_subject']."'",
                                'part1_mark'=>"'".$this->request->data['part_one_marks']."'",
                                'part1_max'=>"'".$this->request->data['part_one_max']."'",
                                'part2_sub'=>"'".$this->request->data['PrimaryRegister']['part_two_subject']."'",
                                'part2_mark'=>"'".$this->request->data['part_two_marks']."'",
                                'part2_max'=>"'".$this->request->data['part_two_max']."'",

                                );
                            $marksaved=$this->Mark->updateAll($markSaveData,$cond_marks);
                            
                        }
                    } else if($this->request->data['mark_grade']=='G') {
                        if($this->request->data['main_system']==1) {
                            $core='Core';
                            $comp='Complementary';
                            $markSaveData=array();
                                $markSaveData['user_id']="'".$this->Session->read('User.userid')."'";
                                $markSaveData['university_id']="'".$this->request->data['PrimaryRegister']['University']."'";
                                $markSaveData['degree_id']="'".$this->request->data['PrimaryRegister']['degree']."'";
                                $markSaveData['mark_grade']="'".$this->request->data['mark_grade']."'";
                                $markSaveData['main']="'".$this->request->data['main_system']."'";
                                if($this->request->data['PrimaryRegister']['degree']!=2 && $this->request->data['PrimaryRegister']['degree']!=4 && $this->request->data['PrimaryRegister']['degree']!=5 && $this->request->data['PrimaryRegister']['degree']!=6) { // Not B com, bba and bmmc
                                    if($this->request->data['PrimaryRegister']['University']!=4) {
                                        $markSaveData['main1_sub']="'".$this->request->data['PrimaryRegister']['singleMainSubject1']."'";
                                        $markSaveData['main1_credit']="'".$this->request->data['core_credit']."'";
                                        $markSaveData['main1_cgpa']="'".$this->request->data['core_cgpa']."'";
                                        $markSaveData['comp1_sub']="'".$this->request->data['PrimaryRegister']['singleCompSubject1']."'";
                                        $markSaveData['comp1_credit']="'".$this->request->data['comp1_credit']."'";
                                        $markSaveData['comp1_cgpa']="'".$this->request->data['comp1_cgpa']."'";
                                        $markSaveData['comp2_sub']="'".$this->request->data['PrimaryRegister']['singleCompSubject2']."'";
                                        $markSaveData['comp2_credit']="'".$this->request->data['comp2_credit']."'";
                                        $markSaveData['comp2_cgpa']="'".$this->request->data['comp2_cgpa']."'";
                                        if($this->request->data['PrimaryRegister']['University']!=5) {
                                            $markSaveData['open_sub']="'".$this->request->data['PrimaryRegister']['open_course']."'";
                                            $markSaveData['open_credit']="'".$this->request->data['open_course_credit']."'";
                                            $markSaveData['open_cgpa']="'".$this->request->data['open_course_cgpa']."'";
                                        }

                                        $markSaveData['common_sub']="'".$this->request->data['PrimaryRegister']['common_course']."'";
                                        $markSaveData['common_credit']="'".$this->request->data['common_course_credit']."'";
                                        $markSaveData['common_cgpa']="'".$this->request->data['common_course_cgpa']."'";
                                        $markSaveData['com_other_sub']="'".$this->request->data['PrimaryRegister']['common_course_other']."'";
                                        $markSaveData['com_other_credit']="'".$this->request->data['common_course_other_credit']."'";
                                        $markSaveData['com_other_cgpa']="'".$this->request->data['common_course_other_cgpa']."'";
                                        $markSaveData['add_common_course_sub']="'".$this->request->data['PrimaryRegister']['additional_common_course']."'";
                                        $markSaveData['add_common_course_credit']="'".$this->request->data['add_common_course_credit']."'";
                                        $markSaveData['add_common_course_cgpa']="'".$this->request->data['add_common_course_cgpa']."'";
                                        $markSaveData['overall_credit']="'".$this->request->data['overall_credit']."'";
                                        $markSaveData['overall_cgpa']="'".$this->request->data['overall_cgpa']."'";
                                    } else {
                                        $markSaveData['main1_sub']="'".$this->request->data['PrimaryRegister']['part_three_main']."'";
                                        $markSaveData['main1_credit']="'".$this->request->data['core_credit']."'";
                                        $markSaveData['main1_cgpa']="'".$this->request->data['core_cgpa']."'";
                                        $markSaveData['comp1_sub']="'".$this->request->data['PrimaryRegister']['part_three_sub1']."'";
                                        $markSaveData['comp1_credit']="'".$this->request->data['comp1_credit']."'";
                                        $markSaveData['comp1_cgpa']="'".$this->request->data['comp1_cgpa']."'";
                                        $markSaveData['comp2_sub']="'".$this->request->data['PrimaryRegister']['part_three_sub2']."'";
                                        $markSaveData['comp2_credit']="'".$this->request->data['comp2_credit']."'";
                                        $markSaveData['comp2_cgpa']="'".$this->request->data['comp2_cgpa']."'";

                                        $markSaveData['common_sub']="'".$this->request->data['PrimaryRegister']['part_one_english']."'";
                                        $markSaveData['common_credit']="'".$this->request->data['part_one_credit']."'";
                                        $markSaveData['common_cgpa']="'".$this->request->data['part_one_cgpa']."'";
                                        $markSaveData['com_other_sub']="'".$this->request->data['PrimaryRegister']['part_two_lang']."'";
                                        $markSaveData['com_other_credit']="'".$this->request->data['part_two_lang_credit']."'";
                                        $markSaveData['com_other_cgpa']="'".$this->request->data['part_two_lang_cgpa']."'";
                                        $markSaveData['add_common_course_sub']="'".$this->request->data['PrimaryRegister']['part_two_other']."'";
                                        $markSaveData['add_common_course_credit']="'".$this->request->data['part_two_other_credit']."'";
                                        $markSaveData['add_common_course_cgpa']="'".$this->request->data['part_two_other_cgpa']."'";
                                        $markSaveData['overall_credit']="'".$this->request->data['overall_credit']."'";
                                        $markSaveData['overall_cgpa']="'".$this->request->data['overall_cgpa']."'";
                                    }
                                    
                                    
                                } else if($this->request->data['PrimaryRegister']['degree']==2 || $this->request->data['PrimaryRegister']['degree']==4 || $this->request->data['PrimaryRegister']['degree']==5 || $this->request->data['PrimaryRegister']['degree']==6) { // B com or bba or bmmc or bca
                                    if($this->request->data['PrimaryRegister']['University']!=4) {
                                        $markSaveData['main1_sub']="'".$core."'";
                                        $markSaveData['main1_credit']="'".$this->request->data['core_credit']."'";
                                        $markSaveData['main1_cgpa']="'".$this->request->data['core_cgpa']."'";
                                        $markSaveData['comp1_sub']="'".$comp."'";
                                        $markSaveData['comp1_credit']="'".$this->request->data['comp1_credit']."'";
                                        $markSaveData['comp1_cgpa']="'".$this->request->data['comp1_cgpa']."'";
                                        if($this->request->data['PrimaryRegister']['University']!=5) {
                                            $markSaveData['open_sub']="'".$this->request->data['PrimaryRegister']['open_course']."'";
                                            $markSaveData['open_credit']="'".$this->request->data['open_course_credit']."'";
                                            $markSaveData['open_cgpa']="'".$this->request->data['open_course_cgpa']."'";
                                        }

                                        $markSaveData['common_sub']="'".$this->request->data['PrimaryRegister']['common_course']."'";
                                        $markSaveData['common_credit']="'".$this->request->data['common_course_credit']."'";
                                        $markSaveData['common_cgpa']="'".$this->request->data['common_course_cgpa']."'";
                                        $markSaveData['com_other_sub']="'".$this->request->data['PrimaryRegister']['common_course_other']."'";
                                        $markSaveData['com_other_credit']="'".$this->request->data['common_course_other_credit']."'";
                                        $markSaveData['com_other_cgpa']="'".$this->request->data['common_course_other_cgpa']."'";
                                        $markSaveData['add_common_course_sub']="'".$this->request->data['PrimaryRegister']['additional_common_course']."'";
                                        $markSaveData['add_common_course_credit']="'".$this->request->data['add_common_course_credit']."'";
                                        $markSaveData['add_common_course_cgpa']="'".$this->request->data['add_common_course_cgpa']."'";
                                        $markSaveData['overall_credit']="'".$this->request->data['overall_credit']."'";
                                        $markSaveData['overall_cgpa']="'".$this->request->data['overall_cgpa']."'";
                                    } else {
                                        $markSaveData['main1_sub']="'".$this->request->data['PrimaryRegister']['com_part_three_main']."'";
                                        $markSaveData['main1_credit']="'".$this->request->data['core_credit']."'";
                                        $markSaveData['main1_cgpa']="'".$this->request->data['core_cgpa']."'";
                                        $markSaveData['comp1_sub']="'".$this->request->data['PrimaryRegister']['com_part_three_sub1']."'";
                                        $markSaveData['comp1_credit']="'".$this->request->data['comp1_credit']."'";
                                        $markSaveData['comp1_cgpa']="'".$this->request->data['comp1_cgpa']."'";
                                        $markSaveData['comp2_sub']="'".$this->request->data['PrimaryRegister']['com_part_three_sub2']."'";
                                        $markSaveData['comp2_credit']="'".$this->request->data['comp2_credit']."'";
                                        $markSaveData['comp2_cgpa']="'".$this->request->data['comp2_cgpa']."'";

                                        $markSaveData['common_sub']="'".$this->request->data['PrimaryRegister']['part_one_english']."'";
                                        $markSaveData['common_credit']="'".$this->request->data['part_one_credit']."'";
                                        $markSaveData['common_cgpa']="'".$this->request->data['part_one_cgpa']."'";
                                        $markSaveData['com_other_sub']="'".$this->request->data['PrimaryRegister']['part_two_lang']."'";
                                        $markSaveData['com_other_credit']="'".$this->request->data['part_two_lang_credit']."'";
                                        $markSaveData['com_other_cgpa']="'".$this->request->data['part_two_lang_cgpa']."'";
                                        $markSaveData['add_common_course_sub']="'".$this->request->data['PrimaryRegister']['part_two_other']."'";
                                        $markSaveData['add_common_course_credit']="'".$this->request->data['part_two_other_credit']."'";
                                        $markSaveData['add_common_course_cgpa']="'".$this->request->data['part_two_other_cgpa']."'";
                                        $markSaveData['overall_credit']="'".$this->request->data['overall_credit']."'";
                                        $markSaveData['overall_cgpa']="'".$this->request->data['overall_cgpa']."'";
                                    }
                                    // common
                                    
                                    
                                }
                                
                        
                            $marksaved=$this->Mark->updateAll($markSaveData,$cond_marks);

                        } else if($this->request->data['main_system']==2) {
                            $markSaveData=array();

                                $markSaveData['user_id']="'".$this->Session->read('User.userid')."'";
                                $markSaveData['university_id']="'".$this->request->data['PrimaryRegister']['University']."'";
                                $markSaveData['degree_id']="'".$this->request->data['PrimaryRegister']['degree']."'";
                                $markSaveData['mark_grade']="'".$this->request->data['mark_grade']."'";
                                $markSaveData['main']="'".$this->request->data['main_system']."'";
                                $markSaveData['main1_sub']="'".$this->request->data['PrimaryRegister']['doubleMainSubject1']."'";
                                $markSaveData['main1_credit']="'".$this->request->data['core1_credit']."'";
                                $markSaveData['main1_cgpa']="'".$this->request->data['core1_cgpa']."'";
                                $markSaveData['main2_sub']="'".$this->request->data['PrimaryRegister']['doubleMainSubject2']."'";
                                $markSaveData['main2_credit']="'".$this->request->data['core2_credit']."'";
                                $markSaveData['main2_cgpa']="'".$this->request->data['core2_cgpa']."'";
                                $markSaveData['comp1_sub']="'".$this->request->data['PrimaryRegister']['doubleCompSubject1']."'";
                                $markSaveData['comp1_credit']="'".$this->request->data['comp1_credit']."'";
                                $markSaveData['comp1_cgpa']="'".$this->request->data['comp1_cgpa']."'";
                                $markSaveData['common_sub']="'".$this->request->data['PrimaryRegister']['common_course']."'";
                                $markSaveData['common_credit']="'".$this->request->data['common_course_credit']."'";
                                $markSaveData['common_cgpa']="'".$this->request->data['common_course_cgpa']."'";
                                $markSaveData['com_other_sub']="'".$this->request->data['PrimaryRegister']['common_course_other']."'";
                                $markSaveData['com_other_credit']="'".$this->request->data['common_course_other_credit']."'";
                                $markSaveData['com_other_cgpa']="'".$this->request->data['common_course_other_cgpa']."'";
                                $markSaveData['add_common_course_sub']="'".$this->request->data['PrimaryRegister']['additional_common_course']."'";
                                $markSaveData['add_common_course_credit']="'".$this->request->data['add_common_course_credit']."'";
                                $markSaveData['add_common_course_cgpa']="'".$this->request->data['add_common_course_cgpa']."'";
                                if($this->request->data['PrimaryRegister']['University']!=5) {
                                    $markSaveData['open_sub']="'".$this->request->data['PrimaryRegister']['open_course']."'";
                                    $markSaveData['open_credit']="'".$this->request->data['open_course_credit']."'";
                                    $markSaveData['open_cgpa']="'".$this->request->data['open_course_cgpa']."'";
                                }
                                $markSaveData['overall_credit']="'".$this->request->data['overall_credit']."'";
                                $markSaveData['overall_cgpa']="'".$this->request->data['overall_cgpa']."'";

                            $marksaved=$this->Mark->updateAll($markSaveData,$cond_marks);

                        } else if($this->request->data['main_system']==3) {
                            $markSaveData=array();
                                $markSaveData['user_id']="'".$this->Session->read('User.userid')."'";
                                $markSaveData['university_id']="'".$this->request->data['PrimaryRegister']['University']."'";
                                $markSaveData['degree_id']="'".$this->request->data['PrimaryRegister']['degree']."'";
                                $markSaveData['mark_grade']="'".$this->request->data['mark_grade']."'";
                                $markSaveData['main']="'".$this->request->data['main_system']."'";
                                $markSaveData['main1_sub']="'".$this->request->data['PrimaryRegister']['tripleMainSubject1']."'";
                                $markSaveData['main1_credit']="'".$this->request->data['core1_credit']."'";
                                $markSaveData['main1_cgpa']="'".$this->request->data['core1_cgpa']."'";
                                $markSaveData['main2_sub']="'".$this->request->data['PrimaryRegister']['tripleMainSubject2']."'";
                                $markSaveData['main2_credit']="'".$this->request->data['core2_credit']."'";
                                $markSaveData['main2_cgpa']="'".$this->request->data['core2_cgpa']."'";
                                $markSaveData['main3_sub']="'".$this->request->data['PrimaryRegister']['tripleMainSubject3']."'";
                                $markSaveData['main3_credit']="'".$this->request->data['core3_credit']."'";
                                $markSaveData['main3_cgpa']="'".$this->request->data['core3_cgpa']."'";
                                $markSaveData['common_sub']="'".$this->request->data['PrimaryRegister']['common_course']."'";
                                $markSaveData['common_credit']="'".$this->request->data['common_course_credit']."'";
                                $markSaveData['common_cgpa']="'".$this->request->data['common_course_cgpa']."'";
                                $markSaveData['com_other_sub']="'".$this->request->data['PrimaryRegister']['common_course_other']."'";
                                $markSaveData['com_other_credit']="'".$this->request->data['common_course_other_credit']."'";
                                $markSaveData['com_other_cgpa']="'".$this->request->data['common_course_other_cgpa']."'";
                                $markSaveData['add_common_course_sub']="'".$this->request->data['PrimaryRegister']['additional_common_course']."'";
                                $markSaveData['add_common_course_credit']="'".$this->request->data['add_common_course_credit']."'";
                                $markSaveData['add_common_course_cgpa']="'".$this->request->data['add_common_course_cgpa']."'";
                                $markSaveData['open_sub']="'".$this->request->data['PrimaryRegister']['open_course']."'";
                                $markSaveData['open_credit']="'".$this->request->data['open_course_credit']."'";
                                $markSaveData['open_cgpa']="'".$this->request->data['open_course_cgpa']."'";
                                $markSaveData['overall_credit']="'".$this->request->data['overall_credit']."'";
                                $markSaveData['overall_cgpa']="'".$this->request->data['overall_cgpa']."'";
                                

                            $marksaved=$this->Mark->updateAll($markSaveData,$cond_marks);
                        }

                    } //grade
                }
                $Indexes = new IndexesController;
                // Call a method from
                
                if(isset($_GET['edit_marks']) || empty($marks)) {
                    if($usersaved && $applicantsaved && $marksaved) {
                        if($Indexes->indexing($this->Session->read('User.userid'))){
                            $this->Session->setFlash(__('Data have been saved successfully, Now you can enter your Additional Information'));
                            return $this->redirect(array('action' => 'reservations'));
                        }
                        } else {
                            $this->Session->setFlash(__('Could not Save entered Details'));
                            return $this->redirect(array('action' => 'primary_registration'));
                                
                    }
                } else {
                    if($usersaved && $applicantsaved) {
                        if($Indexes->indexing($this->Session->read('User.userid'))){
                            $this->Session->setFlash(__('Data have been saved successfully, Now you can enter your Additional Information'));
                            return $this->redirect(array('action' => 'reservations'));
                        }
                        } else {
                            $this->Session->setFlash(__('Could not Save entered Details'));
                            return $this->redirect(array('action' => 'primary_registration'));
                                
                    }
                }
                
                
                
                

            } //post
            if (!$this->request->data) {
                $this->request->data = $appenddata;
            }
        } //if user exists

        $setarry = array(
            'countries' => $countries,
            'religions' => $religions,
            'qualifications' => $qualifications,
            'occupations' => $occupations,
            'communities' => $communities,
            'states' => $states,
            'districts' => $districts,
            'reservations' => $reservations,
            'ambitions' => $ambitions,
            'streams' => $streams,
            'boards' => $boards,
        );
        $this->set('universities',$universities);
        $this->set('degrees',$degrees);
        $this->set($setarry);
    }
    
    

    
    public function reservations() {
        
        $userid=$this->Session->read('User.userid');
        if (!isset($userid)) {
            $this->Session->setFlash(__('Please Login!.'));
            return $this->redirect(array('action' => 'login'));
        } else {
            $reservations = $this->Reservation->find('first', array(
                'conditions' => array(
                    'frkUserID' => $userid
                )
                    ));
        
        if(!empty($reservations)){
            $appenddata['SecondaryRegister']['HandiCapped'] = $reservations['Reservation']['frkHandiCapped'];
            $appenddata['SecondaryRegister']['NCC/NSS'] = $reservations['Reservation']['frkNcc/Nss'];
            $appenddata['SecondaryRegister']['Ex-ServiceMan'] = $reservations['Reservation']['frkEx-ServiceMan'];
            
            $appenddata['SecondaryRegister']['NCC_Certificate_A'] = $reservations['Reservation']['NCC_Certificate_A'];
            $appenddata['SecondaryRegister']['NCC_Certificate_B'] = $reservations['Reservation']['NCC_Certificate_B'];
            $appenddata['SecondaryRegister']['NCC_Certificate_C'] = $reservations['Reservation']['NCC_Certificate_C'];
            
            
            $appenddata['SecondaryRegister']['None'] = $reservations['Reservation']['None'];
            $appenddata['SecondaryRegister']['Illiteracy'] = $reservations['Reservation']['Illiteracy'];
            
            $appenddata['SecondaryRegister']['Sports1'] = $reservations['Reservation']['sportDis1'];
            $appenddata['SecondaryRegister']['SportsLevel1'] = $reservations['Reservation']['sportlevel1'];
            $appenddata['SecondaryRegister']['Sports2'] = $reservations['Reservation']['sportDis2'];
            $appenddata['SecondaryRegister']['SportsLevel2'] = $reservations['Reservation']['sportlevel2'];
            $appenddata['SecondaryRegister']['Sports3'] = $reservations['Reservation']['sportDis3'];
            $appenddata['SecondaryRegister']['SportsLevel3'] = $reservations['Reservation']['sportlevel3'];
            
            
            $appenddata['SecondaryRegister']['Arts1'] = $reservations['Reservation']['Arts1'];
            $appenddata['SecondaryRegister']['ArtsLevel1'] = $reservations['Reservation']['ArtsLevel1'];
            $appenddata['SecondaryRegister']['Arts2'] = $reservations['Reservation']['Arts2'];
            $appenddata['SecondaryRegister']['ArtsLevel2'] = $reservations['Reservation']['ArtsLevel2'];
            $appenddata['SecondaryRegister']['Arts3'] = $reservations['Reservation']['Arts3'];
            $appenddata['SecondaryRegister']['ArtsLevel3'] = $reservations['Reservation']['ArtsLevel3'];
            
            $appenddata['SecondaryRegister']['extra_course'] = $reservations['Reservation']['frkExtra_course'];
            $appenddata['SecondaryRegister']['FeeConcession'] = $reservations['Reservation']['frkFeeConcession'];
            
            }
        
        if($this->request->is('post')) {
            if(!empty($this->request->data['SecondaryRegister'])){
                if (!empty($reservations)) {
                    $extraCourse=str_replace("'","",$this->request->data['SecondaryRegister']['extra_course']);
                    $Sports1=str_replace("'","",$this->request->data['SecondaryRegister']['Sports1']);
                    $Sports2=str_replace("'","",$this->request->data['SecondaryRegister']['Sports2']);
                    $Sports3=str_replace("'","",$this->request->data['SecondaryRegister']['Sports3']);
                    $Arts1=str_replace("'","",$this->request->data['SecondaryRegister']['Arts1']);
                    $Arts2=str_replace("'","",$this->request->data['SecondaryRegister']['Arts2']);
                    $Arts3=str_replace("'","",$this->request->data['SecondaryRegister']['Arts3']);

                    $ReservationTableData = array(
                     'frkHandiCapped' => "'" .$this->request->data['SecondaryRegister']['HandiCapped']."'" ,
                   
                    'frkNcc/Nss' => "'" .$this->request->data['SecondaryRegister']['NCC/NSS']."'",
                    'frkEx-ServiceMan' => "'" .$this->request->data['SecondaryRegister']['Ex-ServiceMan']."'",
                    'NCC_Certificate_A' => "'" .$this->request->data['SecondaryRegister']['NCC_Certificate_A']."'",
                    'NCC_Certificate_B' => "'" .$this->request->data['SecondaryRegister']['NCC_Certificate_B']."'",
                    'NCC_Certificate_C' => "'" .$this->request->data['SecondaryRegister']['NCC_Certificate_C']."'",
                    'None' => "'" .$this->request->data['SecondaryRegister']['None']."'",
                    'Illiteracy' => "'" .$this->request->data['SecondaryRegister']['Illiteracy']."'",
                    'frkExtra_course' => "'" .$extraCourse."'",
                    'frkFeeConcession' => "'" .$this->request->data['SecondaryRegister']['FeeConcession']."'",

                    'sportDis1' => "'" .$Sports1."'",
                    'sportlevel1' => "'" .$this->request->data['SecondaryRegister']['SportsLevel1']."'",
                    'sportDis2' => "'" .$Sports2."'",
                    'sportlevel2' => "'" .$this->request->data['SecondaryRegister']['SportsLevel2']."'",
                    'sportDis3' => "'" .$Sports3."'",
                    'sportlevel3' => "'" .$this->request->data['SecondaryRegister']['SportsLevel3']."'",
                    'Arts1' => "'" .$Arts1."'",
                    'ArtsLevel1' => "'" .$this->request->data['SecondaryRegister']['ArtsLevel1']."'",
                    'Arts2' => "'" .$Arts2."'",
                    'ArtsLevel2' => "'" .$this->request->data['SecondaryRegister']['ArtsLevel2']."'",
                    'Arts3' => "'" .$Arts3."'",
                    'ArtsLevel3' => "'" .$this->request->data['SecondaryRegister']['ArtsLevel3']."'"

                    );
                    $cnd3 = array(
                        'Reservation.frkUserID' => $userid,
                    );
                    $Indexes = new IndexesController;

                    if (!$this->Reservation->updateAll($ReservationTableData, $cnd3)) {
                        $this->Session->setFlash(__('Could not Save Application Data'));
                        return $this->redirect(array('action' => 'reservations'));
                    } else {
                        if($Indexes->indexing($this->Session->read('User.userid'))){
                            $this->Session->setFlash(__('Additional Information have been saved'));
                            return $this->redirect(array('action' => 'choice_select'));
                        }
                    }
                } else{

                    $extraCourse=str_replace("'","",$this->request->data['SecondaryRegister']['extra_course']);
                    $Sports1=str_replace("'","",$this->request->data['SecondaryRegister']['Sports1']);
                    $Sports2=str_replace("'","",$this->request->data['SecondaryRegister']['Sports2']);
                    $Sports3=str_replace("'","",$this->request->data['SecondaryRegister']['Sports3']);
                    $Arts1=str_replace("'","",$this->request->data['SecondaryRegister']['Arts1']);
                    $Arts2=str_replace("'","",$this->request->data['SecondaryRegister']['Arts2']);
                    $Arts3=str_replace("'","",$this->request->data['SecondaryRegister']['Arts3']);

                $reservations1 = array(
                    'frkHandiCapped' => $this->request->data['SecondaryRegister']['HandiCapped'],
                    'frkUserID' => $userid,
                    'frkNcc/Nss' => $this->request->data['SecondaryRegister']['NCC/NSS'],
                    'frkEx-ServiceMan' => $this->request->data['SecondaryRegister']['Ex-ServiceMan'],
                    'NCC_Certificate_A' => $this->request->data['SecondaryRegister']['NCC_Certificate_A'],
                    'NCC_Certificate_B' => $this->request->data['SecondaryRegister']['NCC_Certificate_B'],
                    'NCC_Certificate_C' => $this->request->data['SecondaryRegister']['NCC_Certificate_C'],
                    'None' => $this->request->data['SecondaryRegister']['None'],
                    'Illiteracy' => $this->request->data['SecondaryRegister']['Illiteracy'],
                    'frkExtra_course' => $extraCourse,
                    'frkFeeConcession' => $this->request->data['SecondaryRegister']['FeeConcession'],

                    'sportDis1' => $Sports1,
                    'sportlevel1' => $this->request->data['SecondaryRegister']['SportsLevel1'],
                    'sportDis2' => $Sports2,
                    'sportlevel2' => $this->request->data['SecondaryRegister']['SportsLevel2'],
                    'sportDis3' => $Sports3,
                    'sportlevel3' => $this->request->data['SecondaryRegister']['SportsLevel3'],
                    'Arts1' => $Arts1,
                    'ArtsLevel1' => $this->request->data['SecondaryRegister']['ArtsLevel1'],
                    'Arts2' => $Arts2,
                    'ArtsLevel2' => $this->request->data['SecondaryRegister']['ArtsLevel2'],
                    'Arts3' => $Arts3,
                    'ArtsLevel3' => $this->request->data['SecondaryRegister']['ArtsLevel3']
                ); 
                $Indexes = new IndexesController;
                $this->Reservation->create();
                if ($this->Reservation->save($reservations1)) { 
                    if($Indexes->indexing($this->Session->read('User.userid'))){                 
                        $this->Session->setFlash(__('Your Application has been successfully saved!'));
                        return $this->redirect(array('action' => 'choice_select'));
                    }
                } else {
                    $this->Session->setFlash(__('Your Additional Information could not be saved. Please, try again.'));
                     return $this->redirect(array('action' => 'reservations'));
                }
                }
                }
        }
        if(!empty($reservations)) {
            if (!$this->request->data) {
                $this->request->data = $appenddata;
            }
        }
    }
        
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
                $sql = "UPDATE `users` SET `frkPasswordReset` =  '" . $key . "'  WHERE `users`.`frkUserID` = " . $data['User']['frkUserID'] . " ";
                $this->User->query($sql);

                $id = $data['User']['frkUserID'];
                $to = $data['User']['frkUserEmail'];


                $baseurl = Router::url('/', true);
                $link = $baseurl . "pages/reset/" . $key . "/" . $id;

                $subject = 'Reset password';

                $message1 = "Hello " . $to . "";
                $message2 = "\n Someone has requested a link to change your password. You can do this through the link below.";
                $message3 = "\n <a href='" . $link . "'></a>";
                $message4 = "\n If you didn't request this, please ignore this email.";
                $message5 = "\n Your password won't change until you access the link above and create a new one.";
                $message = $message1 . $message2 . $message3 . $message4 . $message5;


                $headers = 'From: info@farookadmission.in' . "\r\n" .
                        'Reply-To: info@farookadmission.in' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                CakeEmail::deliver($to, $subject, $message, array(
            'transport' => 'Smtp',
            'from' => array('admission@farookcollege.ac.in' => 'Farook College PG Admission'),
            'host' => 'email-smtp.us-west-2.amazonaws.com',
            'tls' => true,
            'port' => 587,
            'timeout' => 30,
            'username' => 'AKIAJJ62UMBPAOB3AAQA',
            'password' => 'Ar12GanG4JddabSgQOQrQk0KFetnHANF5dwFx2vs/GmX',
            'client' => null,
            'log' => false,
                //'charset' => 'utf-8',
                //'headerCharset' => 'utf-8',
        ));

                //$action = mail($to, $subject, $message, $headers);


                /*                 * ************* */

                    $msg = 'Please check your email for reset instructions';
                    $this->Session->setFlash(__($msg));
                /*if ($action) {

                    
                } else {
                    $msg = 'Something went wrong with activation mail. Please try later';

                    $this->Session->setFlash(__($msg));
                }*/
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
            $this->Session->setFlash($message);
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
                    $sql = "UPDATE `mespg_db`.`users` SET `frkUserPassword` = '" . $frkUserPassword . "', `frkPasswordReset` = ' ' WHERE `users`.`frkUserID` = " . $id . " AND `users`.`frkPasswordReset` = '" . $randstring . "'; ";
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
 public function choice_select() {
        $userid = $this->Session->read('User.userid');
        $choice=$this->Choice->find('all',array('conditions'=>array('user_id'=>$userid)));
        
       
        if(!empty($choice)) {
            $choice_result=$this->Choice->find('all',array(
            'conditions'=>array('Choice.user_id'=>$userid),
            'joins'=>array(array(
                'table'=>'users',
                'alias'=>'User',
                'type'=>'INNER',
                'conditions'=>array('User.frkUserID=Choice.user_id')
                ),
                array(
                    'table'=>'final_communities',
                    'alias'=>'Community',
                    'type'=>'INNER',
                    'conditions'=>array('Community.id=User.frkUserCommunity')
                    ),
               array(
                    'table'=>'religions',
                    'alias'=>'Religion',
                    'type'=>'INNER',
                    'conditions'=>array('Religion.id=User.frkUserReligion')
                    )
            ),
            'fields'=>array('Choice.*','Community.name','Religion.name','User.frkUserName','User.frkUserGender','User.frkUserDOB')
            ));
            //pr($choice_result); exit;
        
        $choice_subjects=array();
        $choice_str=$choice_result[0]['Choice']['choices'];
        $choice_arr=explode(',',$choice_str);
        $choice_count=count($choice_arr);

        $choices_name=array();
        for($i=0;$i<$choice_count;$i++) {
            $result=$this->Course->find('first',array('conditions'=>array('frkCourseID'=>$choice_arr[$i])));
            $choices_name[$i+1]=$result['Course']['frkCourseName'];
        }
        $payment=$this->Payment->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
        if(count($payment)>0) {
            $this->set('reference_entered',1);
            $this->set('reference_no',$payment['Payment']['transaction_id']);
        }
        // allowing undetected payments to fill the form
        $paymentUndetected=$this->Undetectedpayment->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
        $paymentCompleted=$this->Completedpayment->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
        if(empty($paymentCompleted) && empty($paymentUndetected)) {
            $this->set('cannot_fill',1);
        }
        // if marks exists, allowing to edit
        $markExists=$this->Mark->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
        if(!empty($markExists)) {
            $this->set('edit_form',1);
        }

        $this->set('choices_name',$choices_name);
        
            $this->set('choices',$choice_result);
            $this->render('view_choice');
            
        }
        if($this->request->is('post')) {
            $course_count=$this->Course->find('count');
            $choices='';

            for($i=0;$i<$course_count;$i++) {
                if(isset($this->request->data['course'][$i])&&$this->request->data['course'][$i]!=0) {
                    $choices=$choices.','.$this->request->data['course'][$i];
                }
            }

            $choices=ltrim($choices,',');
            $choices=rtrim($choices,',');
            $choices=preg_replace('/,+/', ',', $choices);
            //echo $choices; exit;
            if($choices==0) {
                $validates[0]='Atleast one choice is required';

            }
            if (isset($validates) && $validates != null) {
                    //foreach ($validates as $messages) {
                        $msg = $validates[0]."<br>";
                   // }
                    $this->Session->setFlash(__($msg));
                    return $this->redirect(array('action' => 'choice_select'));
                }
            //calculate the fees
            $choice_arr=explode(',',$choices);
            $count_choices = count($choice_arr);

            $result=$this->Final_community->find('first',array(
                'conditions'=>array('id'=>$this->request->data['choice']['community']),
                'fields'=>array(
                    'Final_community.fees'
                    )
                ));
            $amount=$count_choices*$result['Final_community']['fees'];

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
            //$userCond=array('frkUserID'=>$this->Session->read('User.userid'));
            
            $savedata=array(
                'user_id'=>$this->Session->read('User.userid'),
                'application_no'=>$ApplicationNumber,
                'choices'=>$choices,
                'amount'=>$amount,
                'date'=>date('Y-m-d')
                );
             $user_cnd = array(
                    'User.frkUserID' => $this->Session->read('User.userid'),
                );
                
                $userUpdateData=array(
                    'frkUserName'=>"'".$this->request->data['choice']['name']."'",
                    'frkUserGender'=>"'".$this->request->data['choice']['gender']."'",
                    'frkUserReligion'=>$this->request->data['choice']['religion'],
                    'frkUserCommunity'=>$this->request->data['choice']['community']
                    );
                $this->User->updateAll($userUpdateData,$user_cnd);
            
            $this->Choice->set($savedata);
            if($this->Choice->validates()) {

                $this->Choice->create();
                    if(!$this->Choice->save($savedata)) {
                        $this->Session->setFlash('An error occured, please try again');
                    }
                    else {
                        return $this->redirect(array('controller'=>'pages','action'=>'choice_select'));
                    }
                    

            }

            
            
        }
        $user=$this->User->find('first',array(
            'conditions'=>array('frkUserID'=>$this->Session->read('User.userid')),
            'fields'=>array(
                'User.frkUserName','User.frkUserDOB'
                )
            ));
        
        $communities=$this->Final_community->find('list',array('fields'=>array('id','name')));
        $religions=$this->Religion->find('list',array('fields'=>array('id','name')));
        $courses=$this->Course->find('list',array('fields'=>array('frkCourseID','frkCourseName')));
        $courses[0]='-- select the choice --';
        ksort($courses);
        $this->set('communities',$communities);
        $this->set('religions',$religions);
        $this->set('courses',$courses);
        $this->set('user',$user);
    }

    public function add_transaction() {
        $this->autoRender=false;
        if($this->request->is('post')){
            $choices=$this->Choice->find('first',array('conditions'=>array('user_id'=>$this->Session->read('User.userid'))));
        
            $application_no=$choices['Choice']['application_no'];
            $amount=$choices['Choice']['amount'];

            $paymentData=array(
                    'user_id'=>$this->Session->read('User.userid'),
                    'application_no'=>$application_no,
                    'transaction_id'=>$this->request->data['transaction_id_form']['ref_no'],
                    'amount'=>$amount,
                    'date'=>date('Y-m-d')
                );
            $this->Payment->create();
            if($this->Payment->save($paymentData)) {
                $this->Session->setFlash('The Reference Number has been submitted successfully. You will recieve an automated confirmation mail within 48 Hrs. You can fill the application only after recieving the confirmation mail.');
                return $this->redirect(array('controller'=>'pages','action'=>'choice_select'));
            }
        }
        
    }

    public function choice_select1() {
        $userid = $this->Session->read('User.userid');
        $choice = $this->Choice->find('all', array('conditions' => array('user_id' => $userid)));


        if (count($choice) != 0) {
            $choice_result = $this->Choice->find('all', array(
                'conditions' => array('Choice.user_id' => $userid),
                'joins' => array(array(
                        'table' => 'users',
                        'alias' => 'User',
                        'type' => 'INNER',
                        'conditions' => array('User.frkUserID=Choice.user_id')
                    ),
                    array(
                        'table' => 'final_communities',
                        'alias' => 'Community',
                        'type' => 'INNER',
                        'conditions' => array('Community.id=User.frkUserCommunity')
                    ),
                    array(
                        'table' => 'religions',
                        'alias' => 'Religion',
                        'type' => 'INNER',
                        'conditions' => array('Religion.id=User.frkUserReligion')
                    )
                ),
                'fields' => array('Choice.*', 'Community.name', 'Religion.name', 'User.frkUserName', 'User.frkUserGender','User.frkUserDOB')
                    ));
            //pr($choice_result); exit;

            $choice_subjects = array();
            $choice_str = $choice_result[0]['Choice']['choices'];
            $choice_arr = explode(',', $choice_str);
            $choice_count = count($choice_arr);

            $choices_name = array();
            for ($i = 0; $i < $choice_count; $i++) {
                $result = $this->Course->find('first', array('conditions' => array('frkCourseID' => $choice_arr[$i])));
                $choices_name[$i + 1] = $result['Course']['frkCourseName'];
            }

            /*$payment = $this->Payment->find('first', array('conditions' => array('u_id' => $this->Session->read('User.userid'))));
            if (count($payment) > 0) {
                $this->set('cannot_edit', 1);
            }*/
            $this->set('choices_name', $choices_name);

            $this->set('choices', $choice_result);
            $this->render('view_choice');
        }
        if ($this->request->is('post')) {
            $course_count = $this->Course->find('count');
            $choices = '';

            for ($i = 0; $i < $course_count; $i++) {
                if (isset($this->request->data['course'][$i]) && $this->request->data['course'][$i] != 0) {
                    $choices = $choices . ',' . $this->request->data['course'][$i];
                }
            }

            $choices = ltrim($choices, ',');
            $choices = rtrim($choices, ',');
            $choices = preg_replace('/,+/', ',', $choices);
            //echo $choices; exit;
            if ($choices == 0) {
                $validates[0] = 'Atleast one choice is required';
            }
            if (isset($validates) && $validates != null) {
                //foreach ($validates as $messages) {
                $msg = $validates[0] . "<br>";
                // }
                $this->Session->setFlash(__($msg));
                return $this->redirect(array('action' => 'choice_select'));
            }
            //calculate the fees
            $choice_arr = explode(',', $choices);
            $count_choices = count($choice_arr);

            $result = $this->Final_community->find('first', array(
                'conditions' => array('id' => $this->request->data['choice']['community']),
                'fields' => array(
                    'Final_community.fees'
                )
                    ));
            $amount = $count_choices * $result['Final_community']['fees'];

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
            //$userCond=array('frkUserID'=>$this->Session->read('User.userid'));

            $savedata = array(
                'user_id' => $this->Session->read('User.userid'),
                'application_no' => $ApplicationNumber,
                'choices' => $choices,
                'amount' => $amount,
                'date' => date('Y-m-d')
            );
            $user_cnd = array(
                'User.frkUserID' => $this->Session->read('User.userid'),
            );
            $dob = date('Y-m-d', strtotime($this->request->data['choice']['dob']));
            $userUpdateData = array(
                'frkUserDOB' => "'" . $dob . "'",
                'frkUserName' => "'" . $this->request->data['choice']['name'] . "'",
                'frkUserGender' => "'" . $this->request->data['choice']['gender'] . "'",
                'frkUserReligion' => $this->request->data['choice']['religion'],
                'frkUserCommunity' => $this->request->data['choice']['community']
            );
            $this->User->updateAll($userUpdateData, $user_cnd);

            $this->Choice->set($savedata);
            if ($this->Choice->validates()) {

                $this->Choice->create();
                if (!$this->Choice->save($savedata)) {
                    $this->Session->setFlash('An error occured, please try again');
                } else {
                    return $this->redirect(array('controller' => 'pages', 'action' => 'choice_select'));
                }
            }
        }
        $user = $this->User->find('first', array(
            'conditions' => array('frkUserID' => $this->Session->read('User.userid')),
            'fields' => array(
                'User.frkUserName'
            )
                ));

        $communities = $this->Final_community->find('list', array('fields' => array('id', 'name')));
        $religions = $this->Religion->find('list', array('fields' => array('id', 'name')));
        $courses = $this->Course->find('list', array('fields' => array('frkCourseID', 'frkCourseName')));
        $courses[0] = '-- select the choice --';
        ksort($courses);
        $this->set('communities', $communities);
        $this->set('religions', $religions);
        $this->set('courses', $courses);
        $this->set('user', $user);
    }
    
    
    
    
     public function get_castes() {
        $community_id=$this->data['cummunity_id'];
        $castes=$this->Caste->find('list',array('conditions'=>array('reservation_category_id'=>$community_id),'fields'=>array('id','name')));
        $result=$this->User->find('first',array(
            'conditions'=>array('frkUserID'=>$this->Session->read('User.userid')),
            'fields'=>array('User.frkUserCasteID')));
        if($result['User']['frkUserCasteID']>0) {
            $this->set('caste',$result['User']['frkUserCasteID']);
            
        }
        $this->set('castes',$castes);
        $this->render('get_castes','ajax');
      }
      
      
      public function get_subjects() {
        /*$universities=$this->University->find('list',array('fields'=>array('id','name')));
        $degrees=$this->Degree->find('list',array('fields'=>array('id','name')));
        $universities['other']='Other';
        $this->set('universities',$universities);
        $this->set('degrees',$degrees);*/

        if($this->request->is('ajax')) {
            //pr($this->data); exit;
            $degree_id=$this->data['degree_id'];
            $subjects=$this->Subjects->find('list',array(
                'conditions'=>array('degree_id'=>$degree_id),
                'fields'=>array('id','name'),
                ));
            $subjects['Nil']='Nil';
            $this->set('subjects',$subjects);
            $this->render('subjects','ajax');
        }
    }
public function choice_edit() {

        /*$payment=$this->Payment->find('first',array('conditions'=>array('u_id'=>$this->Session->read('User.userid'))));
        if(!empty($payment)) {
            $this->Session->setFlash(__('You cannot edit your choice further'));
            return $this->redirect(array('action' => 'choice_select'));
        }*/

        if($this->request->is('post')) {
            $course_count=$this->Course->find('count');
            $choices='';
            //echo $course_count; exit;
            for($i=0;$i<$course_count;$i++) {
                if(isset($this->request->data['course'][$i])&&$this->request->data['course'][$i]!=0) {
                    $choices=$choices.','.$this->request->data['course'][$i];
                }
            }
            $choices=ltrim($choices,',');
            $choices=rtrim($choices,',');
            $choices=preg_replace('/,+/', ',', $choices);

            //calculate the amount
            $choice_arr=explode(',',$choices);
            $count_choices = count($choice_arr);
            
            if($choices==0) {
                $validates[0]='Atleast one choice is required';

            }
            if (isset($validates) && $validates != null) {
                    //foreach ($validates as $messages) {
                        $msg = $validates[0]."<br>";
                   // }
                    $this->Session->setFlash(__($msg));
                    return $this->redirect(array('action' => 'choice_edit'));
                }
                else {
                    $result=$this->Final_community->find('first',array(
                        'conditions'=>array('id'=>$this->request->data['choice']['community']),
                        'fields'=>array(
                            'Final_community.fees'
                            )
                        ));
                    $amount=$count_choices*$result['Final_community']['fees'];

                    $cond=array(
                        'user_id'=>$this->Session->read('User.userid')
                        );
                    $condUser=array(
                        'frkUserID'=>$this->Session->read('User.userid')
                        );
                    $updateChoicedata=array(
                        'choices'=>"'".$choices."'",
                        'amount'=>$amount
                        );
                    
                    $updateUserData=array(
                        'frkUserName'=>"'".$this->request->data['choice']['name']."'",
                        'frkUserGender'=>"'".$this->request->data['choice']['gender']."'",
                        'frkUserCommunity'=>$this->request->data['choice']['community'],
                        'frkUserReligion'=>$this->request->data['choice']['religion'],
                        'frkUserDOB'=>"'".$this->request->data['dob']."'"
                        );
                    $this->User->updateAll($updateUserData,$condUser);
                    
                    $this->Choice->set($updateChoicedata);
                    if($this->Choice->validates()) {
                        //$this->Choice->create();
                            if(!$this->Choice->updateAll($updateChoicedata,$cond)) {
                                $this->Session->setFlash('An error occured, please try again');
                            }
                            else {
                                $this->Session->setFlash('The details have been updated');
                                return $this->redirect(array('controller'=>'pages','action'=>'choice_select'));
                            }
                }

            
            }
        }
        
        $userid=$this->Session->read('User.userid');
        $choices=$this->Choice->find('all',array('conditions'=>array('user_id'=>$userid),
            'joins'=>array(array(
                'table'=>'users',
                'alias'=>'User',
                'type'=>'INNER',
                'conditions'=>array('User.frkUserID=Choice.user_id')
                ),
                array(
                    'table'=>'final_communities',
                    'alias'=>'Community',
                    'type'=>'INNER',
                    'conditions'=>array('Community.id=User.frkUserCommunity')
                    ),
               array(
                    'table'=>'religions',
                    'alias'=>'Religion',
                    'type'=>'INNER',
                    'conditions'=>array('Religion.id=User.frkUserReligion')
                    )
            ),
            'fields'=>array('Choice.*','User.frkUserCommunity','User.frkUserReligion','User.frkUserName','User.frkUserGender','User.frkUserDOB')
            ));
        //pr($choices); exit;
        $communities=$this->Final_community->find('list',array('fields'=>array('id','name')));
        $religions=$this->Religion->find('list',array('fields'=>array('id','name')));
        $courses=$this->Course->find('list',array('fields'=>array('frkCourseID','frkCourseName')));
        $courses[0]='-- select the choice --';
        ksort($courses);
        //test
        $this->set('communities',$communities);
        $this->set('religions',$religions);
        $this->set('courses',$courses);
        $this->set('choices',$choices);
    }
    
    public function choice_edit1() {
        if ($this->request->is('post')) {
            $course_count = $this->Course->find('count');
            $choices = '';
            //echo $course_count; exit;
            for ($i = 0; $i < $course_count; $i++) {
                if (isset($this->request->data['course'][$i]) && $this->request->data['course'][$i] != 0) {
                    $choices = $choices . ',' . $this->request->data['course'][$i];
                }
            }




            $choices = ltrim($choices, ',');
            $choices = rtrim($choices, ',');
            $choices = preg_replace('/,+/', ',', $choices);

            //calculate the amount
            $choice_arr = explode(',', $choices);
            $count_choices = count($choice_arr);

            if ($choices == 0) {
                $validates[0] = 'Atleast one choice is required';
            }
            if (isset($validates) && $validates != null) {
                //foreach ($validates as $messages) {
                $msg = $validates[0] . "<br>";
                // }
                $this->Session->setFlash(__($msg));
                return $this->redirect(array('action' => 'choice_edit'));
            } else {
                $result = $this->Community->find('first', array(
                    'conditions' => array('id' => $this->request->data['choice']['community']),
                    'fields' => array(
                        'Community.fees'
                    )
                        ));
                $amount = $count_choices * $result['Community']['fees'];

                $cond = array(
                    'user_id' => $this->Session->read('User.userid')
                );
                $condUser = array(
                    'frkUserID' => $this->Session->read('User.userid')
                );
                $updateChoicedata = array(
                    'choices' => "'" . $choices . "'",
                    'amount' => $amount
                );
                $dob = date('Y-m-d', strtotime($this->request->data['choice']['dob']));
                $updateUserData = array(
                    'frkUserName' => "'" . $this->request->data['choice']['name'] . "'",
                    'frkUserDOB' => "'" . $dob . "'",
                    'frkUserGender' => "'" . $this->request->data['choice']['gender'] . "'",
                    'frkUserCommunity' => $this->request->data['choice']['community'],
                    'frkUserReligion' => $this->request->data['choice']['religion'],
                );
                $this->User->updateAll($updateUserData, $condUser);

                $this->Choice->set($updateChoicedata);
                if ($this->Choice->validates()) {
                    //$this->Choice->create();
                    if (!$this->Choice->updateAll($updateChoicedata, $cond)) {
                        $this->Session->setFlash('An error occured, please try again');
                    } else {
                        $this->Session->setFlash('The details have been updated');
                        return $this->redirect(array('controller' => 'pages', 'action' => 'choice_select'));
                    }
                }
            }
        }

        $userid = $this->Session->read('User.userid');
        $choices = $this->Choice->find('all', array('conditions' => array('user_id' => $userid),
            'joins' => array(array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'INNER',
                    'conditions' => array('User.frkUserID=Choice.user_id')
                ),
                array(
                    'table' => 'communities',
                    'alias' => 'Community',
                    'type' => 'INNER',
                    'conditions' => array('Community.id=User.frkUserCommunity')
                ),
                array(
                    'table' => 'religions',
                    'alias' => 'Religion',
                    'type' => 'INNER',
                    'conditions' => array('Religion.id=User.frkUserReligion')
                )
            ),
            'fields' => array('Choice.*', 'User.frkUserCommunity', 'User.frkUserReligion', 'User.frkUserName', 'User.frkUserGender','User.frkUserDOB')
                ));
        //pr($choices); exit;
        $communities = $this->Community->find('list', array('fields' => array('id', 'name')));
        $religions = $this->Religion->find('list', array('fields' => array('id', 'name')));
        $courses = $this->Course->find('list', array('fields' => array('frkCourseID', 'frkCourseName')));
        $courses[0] = '-- select the choice --';
        ksort($courses);
        //test
        $this->set('communities', $communities);
        $this->set('religions', $religions);
        $this->set('courses', $courses);
        $this->set('choices', $choices);
    }

    public function update_list() {
        $course_id = $this->data['course_id'];
        $courses = $this->Course->find('list', array('fields' => array('frkCourseID', 'frkCourseName')));
        unset($courses[$course_id]);
        pr($courses);
        exit;
    }

    

    
    
}