<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        //load user model
        $this->load->model('Homepage_model');
        $this->load->model('Auth_model');

    }
    
//POST
    public function v1_post() {

    $email=$this->post('email');
    $password=$this->post('password');
    if(!empty($email) && !empty($password)){
            //send email  user data

         $query=$this->UserLogin($email,$password);
            //check if the user data inserted
            if($query!=FALSE){

                //set the response and exit
                $this->response([
                    'data'=>$query,
                    'status' => TRUE,
                    'message' => 'Login was succefull.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response(['status' => FALSE,'message' =>'Incorrect login details.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response("Provide complete  information to login.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

################################################################
# FRONT SITE LOGIN FUNCTIONS                              #
################################################################


//login private function 
private  function UserLogin($email,$password)
{
    
          $user_select = array('email' => $email);
          $duplcate = $this->Homepage_model->DisplayAll_('personal_info',$user_select,'personal_info_id');
          if(empty($duplcate)){ return FALSE;}else{$duplcate;}

          $hash=$this->Homepage_model->doSelect_($duplcate,'password');
          $hash=$this->Homepage_model->doSelect_($duplcate,'password');
          $query=$this->Auth_model->Login_2('personal_info',$email);
           if(password_verify($password , $hash) &&  $query){
        
            $session_data = [
           'email' => $query[0]->email,
           'first_name' => $query[0]->first_name,
           'last_name' => $query[0]->last_name,
           'phone' => $query[0]->phone,
           'personal_info_id' => $query[0]->personal_info_id,
           'logged_in'=>TRUE,
                 ];
     $this->session->set_userdata($session_data);
     return $session_data;}else{return FALSE;}
    
  }


  //FRONT END LOGIN 

//API FUNCTION TO GET MENU DATA
    public function Menu_post()
  {
      $personal_info_id=$this->post('personal_info_id');
      if(!empty($personal_info_id)){
      $querydata =['in_user_menu.personal_info_id'=>$personal_info_id];

     $action="in_user_menu.parent_id=menu.parent_id";
     $action2="in_user_menu.submenu_id=submenu.submenu_id";
     $query=$this->Homepage_model->Display2Join_('in_user_menu','menu','submenu',$querydata,'in_user_menu_id',$action,$action2,'left','left');        
      $this->response([
                    'data'=>$query,
                    'status' => TRUE,
                ], REST_Controller::HTTP_OK);
       }else{
            //set the response and exit
            $this->response("Provide complete  information to access menu.", REST_Controller::HTTP_BAD_REQUEST);
        }
    
    }
  
    

 
}

?>