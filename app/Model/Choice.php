<?php

App::uses('AppModel', 'Model');
/*
 * Author : Ashifa TK
 * Purpose : Paymentterm Database operatons.
 * Date : 8/25/2014
 */

class Choice extends AppModel {
     
     public $validate = array(
        'name' => array(
            'required'=> array(
                'rule' => array('notEmpty'),
                'message' => array('Name is required')
            )
        ),
        'gender' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Gender is required'
            )
        ),
        'community' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Community is required'
            )
        ),
        'religion' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Religion is required'
            )
        ),
        'choices' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Atleast one choice is required'
            )
        )
        );
    
}

?>