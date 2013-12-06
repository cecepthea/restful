<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    function user_get()  
    {  
        if(!$this->get('id'))  
        {  
            $this->response(NULL, 400);  
        }  
  
        $users = array(
                        1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
                        2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
                        3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
                );
                
            $user = @$users[$this->get('id')];
            
        if($user)  
        {  
            $this->response($user, 200); // 200 being the HTTP response code  
        }  
  
        else  
        {  
            $this->response(NULL, 404);  
        }  
    }  
      
    function user_post()  
    {  
        $result = $this->user_model->update( $this->post('id'), array(  
            'name' => $this->post('name'),  
            'email' => $this->post('email')  
        ));  
          
        if($result === FALSE)  
        {  
            $this->response(array('status' => 'failed'));  
        }  
          
        else  
        {  
            $this->response(array('status' => 'success'));  
        }  
          
    }  
      
    function users_get()  
    {  
        $users = array(
                        1 => array('id' => 1, 'name' => 'Joy Marlow', 'email' => 'example1@example.com', 'fact' => 'Some guy from the back who just loves swimming'),
                        2 => array('id' => 2, 'name' => 'Marilyn Manson', 'email' => 'example2@example.com', 'fact' => 'Doesn\'t like to drive trucks'),
                        3 => array('id' => 3, 'name' => 'Scott Carol', 'email' => 'example3@example.com', 'fact' => 'Mama still calls him Scotty', array('hobbies' => array('fartings', 'bikes'))),
                );
          
        if($users)  
        {  
            $this->response($users, 200);  
        }  
  
        else  
        {  
            $this->response(NULL, 404);  
        }  
    }  
}