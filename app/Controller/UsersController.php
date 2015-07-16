<?php

App::uses('AppController', 'Controller');

//use Cake\Network\Email\Email;
/**
 * Created By:Jeena.P
 * Created On:04-05-2015
 * * */
class UsersController extends AppController {

    var $name = 'Users';
    var $uses = array('User');
    public $components = array('Paginator', 'Email');

    function _sendNewUserMail() {

        $to = 'jeenamadhavan@gmail.com';


        $subject = 'the subject';
        $message = 'hello';
        $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
    public function register(){
        
        echo "hi";
    }

    public function registeruser() {echo "hi";

        //$this->_sendNewUserMail();

        /* $Email = new CakeEmail('gmail');



          $Email->from('info@mentorperformance.in');
          $Email->to('jeena@mentorperformance.in');
          $Email->subject('Account Activation');
          $Email->send("Click here"); */

       /* if ($this->request->is('post')) {pr($this->request->data);die();

            $this->User->create();
            $this->request->data['User']['frkUserPassword'] = AuthComponent::password($this->request->data['User']['frkUserPassword']);


            $user = $this->User->save($this->request->data);

            if (!empty($user)) {
                $this->Session->setFlash(__('The user has been saved.'));


            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }else{
            die(1);
        }*/
    }

    /*public function login() {


        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));



            if ($this->Auth->user()) {
                if (!empty($this->request->data['User']) && $this->request->data['remember'] == 'on') {
                    $cookie = array();
                    $cookie['frkUserEmail'] = $this->request->data['User']['frkUserEmail'];
                    $cookie['frkUserPassword'] = $this->request->data['User']['frkUserPassword'];
                    $this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
                    unset($this->data['remember']);
                }
                $this->redirect($this->Auth->redirect());
            }if (empty($this->data)) {
                $cookie = $this->Cookie->read('Auth.User');
                if (!is_null($cookie)) {
                    if ($this->Auth->login($cookie)) {
                        //  Clear auth message, just in case we use it.
                        $this->Session->del('Message.auth');
                        $this->redirect($this->Auth->redirect());
                    } else { // Delete invalid Cookie
                        $this->Cookie->del('Auth.User');
                    }
                }
            }
        }
    }*/

    public function confirmEmail($id = NULL) {


        $randstr = $this->randStrGen(20);
        $user_id = base64_decode($id);

        // echo $randstr;
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function randStrGen($len) {
        $result = "";
        $chars = "abcdefghijklmnopqrstuvwxyz?!-0123456789";
        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .= "" . $charArray[$randItem];
        }
        return $result;
    }
    

}

?>
