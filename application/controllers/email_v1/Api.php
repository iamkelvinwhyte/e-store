<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

    public function __construct() { 
        parent::__construct();

    }
    
//POST
    public function v1_post() {

    $to=$this->post('to');
    $cc=$this->post('cc');
    $bcc=$this->post('bcc');
   $subject=$this->post('subject');
   $message=$this->post('message');
   $site_name=$this->post('site_name');
   $from=$this->post('from');
    if(!empty($to) && !empty($subject)&& !empty($message)&& !empty($site_name)&& !empty($from) ){
            //send email  user data
            
$this->load->library('email');
$this->email->initialize(array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.sendgrid.net',
  'smtp_user' => 'xsaytech',
  'smtp_pass' => 'micheal9920',
  'smtp_port' => 587,
  'crlf' => "\r\n",
  'newline' => "\r\n"
));
$config=array(
'charset'=>'utf-8',
'wordwrap'=> TRUE,
'mailtype' => 'html'
);

$this->email->initialize($config);
$this->email->from($from, $site_name);
$this->email->to($to);
$this->email->cc($cc);
$this->email->bcc($bcc);
$this->email->subject($subject);
$this->email->message($message);
$sent=$this->email->send();

$this->email->print_debugger();



            //check if the user data inserted
            if($sent){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'Email sent successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response("Provide complete email information to send.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

  
    

 
}

?>