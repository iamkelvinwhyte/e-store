<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

public function __construct() {
        parent::__construct();
        //load user model
        $this->load->model('Homepage_model');
        $this->load->model('Auth_model');

    }

public function test($value='')
{
echo $this->Auth_model->random_code(20);
}

public function index()
{
  $this->load->view('backend/login.php');
}

//login private function
private  function UserLogin($email,$password)
{
  $user_select = ['email' => $email];
  $raw_duplcate = $this->Homepage_model->single_query('personal_info',$user_select,'personal_info_id');
  $duplcate=$raw_duplcate->row();
  if(empty($duplcate)){ return FALSE;}else{$duplcate;}
  $hash=$duplcate->password;

  $query=$this->Auth_model->login_auth('personal_info',$email);
  if(password_verify($password , $hash) &&  $query){
    return $query;
  }else{
    return FALSE;
  }

}

//Admin login
public function activ_login_admin(){
  /* Load form helper */
  $this->form_validation->set_rules('password', 'Password', 'required');
  $this->form_validation->set_rules('email', 'Email', 'required');

  // Validate Operation
  if ($this->form_validation->run() == FALSE) {
    $this->load->view('backend/login.php');
  }
  else {
		  $email=$this->input->post('email');
      $password = $this->input->post('password');
		  $query=$this->UserLogin($email,$password);

    if( $query!= false){
      $session_data = [
        'phone' => $query[0]->phone,
        'name' => $query[0]->name,
        'email' => $query[0]->email,
        'store_vid' => $query[0]->store_vid,
        'institution_id' => $query[0]->institution_id,
        'account_type' => $query[0]->account_type,
        'menu' => $query[0]->menu,
        'date' => $query[0]->date,
        'active' => $query[0]->active,
        'logged_in'=>TRUE,
      ];

      $login_data = [
        'email' => $query[0]->email,
        'personal_info_id' => $query[0]->personal_info_id,
        'token' => $this->session->userdata('token'),
        'ip_address'=>$this->input->ip_address(),];
      $userID_data = ['personal_info_id' => $query[0]->personal_info_id];
      $update_data = ['first_login' => $query[0]->first_login+1];

      $this->session->set_userdata($session_data);
      $this->session->set_flashdata('success', 'Login sucessful');
      redirect('main', 'refresh');
      }else{
      $this->session->set_flashdata('error', 'Incorrect login details, please try again later ');
        redirect('auth', 'refresh');
      }

    }

  }


  //verify account
  public function verify_auth_account($activation_code){

      $data = ['activation_code' => 'done','active' => 1,'email_validated' => 1];
      $data2 =['activation_code' => $activation_code,'active' => 0];

      $query=$this->Homepage_model->DisplayAll_("personal_info",$data2,"personal_info_id");
      if($query){
        $this->Homepage_model->update_Data($data2,$data,"personal_info");
        $this->session->set_flashdata('success', 'congratulations your account has been activated');
        redirect('auth', 'refresh');
      }else{
        $this->session->set_flashdata('error', 'Invalid activation link');
        redirect('auth', 'refresh');
      }


  }

  // Logout from admin page
  public function logout() {

  // Removing session data
  $sess_array = array(
  'personal_info_id',
  'email' ,
  'phone' ,
  'name' ,
  );
  $this->session->unset_userdata('logged_in', $sess_array);
  $this->session->sess_destroy();
  redirect('Auth', 'refresh');
  }



  public function password_change(){
    $this->form_validation->set_rules('email', 'Email', 'required');
    $code=$this->Auth_model->random_code(20);
    // Validate Operation
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('main/password');
    }
    else {
      $data=['activation_code' => $code];

      $query_array = ['email' => $this->input->post('email')];

      $email=$this->input->post('email');
      $query=$this->Homepage_model->DisplayAll_("personal_info",$query_array,"personal_info_id");

      if( $query!= false){
        $this->Homepage_model->update_Data($query_array,$data,"personal_info");

        $subject="Password Reset: Arcadia invest";
        $htmlContent=$this->PassWordMessage($code);
        $this->send_email($email,$htmlContent,$subject);

        $this->session->set_flashdata('success', 'An email reset link has been sent to your email . click your email to reset your password');
        redirect('auth/password', 'refresh');
      }else{
        $this->session->set_flashdata('error', 'User details not found ');
        redirect('auth/password', 'refresh');
      }

    }

  }



  public function AuthLogin($personal_info_id){

    $data = array
    (
      'personal_info_id' => $personal_info_id,
      'active' => 1,
    );
    $query=$this->Auth_model->Login_Auto($data);

    // $query2=$this->Auth_model->UpdateUser_($query_array, $data);
    if( $query!= false){
      $session_data = array(
        'phone' => $query[0]->phone,
        'f_name' => $query[0]->f_name,
        'l_name' => $query[0]->l_name,
        'email' => $query[0]->email,
        'bank' => $query[0]->bank,
        'state' => $query[0]->state,
        'street' => $query[0]->street,
        'acct' => $query[0]->acct,
        'email_validated' => $query[0]->email_validated,
        'institution_id' => $query[0]->institution_id,
        'phone_validated' => $query[0]->phone_validated,
        'personal_info_id' => $query[0]->personal_info_id,
        'bit_vid' => $query[0]->bit_vid,
        'wallet_status' => $query[0]->wallet_status,
        'btc_address' => $query[0]->btc_address,
          'eth_address' => $query[0]->eth_address,
        'pin' =>$query[0]->temp_password,
        'date' => $query[0]->reg_date,
        'active' => $query[0]->active,
        'logged_in'=>TRUE,
        'ref'=> $query[0]->ref,
        'account_type'=>$query[0]->account_type,
      );

      $login_data = array(
        'email' => $query[0]->email,
        'personal_info_id' => $query[0]->personal_info_id,
        // 'token' => $this->session->userdata('token'),
        // 'browser_type'=>$this->agent->browser(),
        'ip_address'=>$this->input->ip_address(),
        // 'op_system'=>$this->agent->platform(),
      );
      $userID_data = array(
        'personal_info_id' => $query[0]->personal_info_id,
      );
      $update_data = array(
        'first_login' => $query[0]->first_login+1,
      );
      $this->Auth_model->UpdateLog_($login_data); // Insert & Update Login_session With Token
      $this->Auth_model->UpdateUser_($userID_data, $update_data);//Update number of succesfull login
      $this->session->set_userdata($session_data);
      $this->session->set_flashdata('success', 'Login sucessful...');
      redirect('main', 'refresh');

      ;        }else{
        $this->session->set_flashdata('error', 'Incorrect Login Details!!');
        redirect('auth', 'refresh');
      }



    }


  //password account
  public function password_auth_account($activation_code=""){

      $data = ['activation_code' => 'done'];
      $data2 =['activation_code' => $activation_code];

      $query=$this->Homepage_model->DisplayAll_("personal_info",$data2,"personal_info_id");
      if($query){
          $this->load->view('main/password_change.php');
      }else{
        $this->session->set_flashdata('error', 'Invalid activation link to reset password');
        redirect('auth', 'refresh');
      }


  }

  //change password
  public function password_account_change($activation_code=""){

      $data = ['activation_code' => 'done','password' => $this->input->post('password')];
      $data2 =['activation_code' => $activation_code];

      $query=$this->Homepage_model->DisplayAll_("personal_info",$data2,"personal_info_id");
      if($query){
        $this->Homepage_model->update_Data($data2,$data,"personal_info");
        $this->session->set_flashdata('success', 'you have successfully reset your password. Login to your account');
        redirect('auth', 'refresh');
      }else{
        $this->session->set_flashdata('error', 'Unable to reset password please try again later');
        redirect('auth/password_auth_account'.$activation_code, 'refresh');
      }


  }



  //Admin Login

  public function AdminLogin(){
    /* Load form helper */

    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');


    // Validate Operation
     if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/index');
     }
     else {
      $data = array
      (
     'email' => $this->input->post('email'),
     'password' => $this->input->post('password'),
     );
      $query=$this->Auth_model->AdminLogin_($data);

     // $query2=$this->Auth_model->UpdateUser_($query_array, $data);
      if( $query!= false){
        $session_data = array(
       'phone' => $query[0]->phone,
       'user_id' => $query[0]->user_id,
       'email' => $query[0]->email,
       'fname' => $query[0]->fname,
       'lname' => $query[0]->lname,
       'date' => $query[0]->date,
       'logged_in'=>TRUE,
       );

      $this->session->set_userdata($session_data);
      $this->session->set_flashdata('success', 'Login sucessful...');
      redirect('Admin/Dashboard', 'refresh');

  ;    }else{
      $this->session->set_flashdata('error', 'Incorrect Login Details!!');
      redirect('Admin/login', 'refresh');
     }

     }

  }




  public function send_email($email,$htmlContent,$subject)
  {
      $from_email = $this->config->item('email');
      $to_email = $email;
      //Load email library
      $this->load->library('email');
      $config['mailtype'] = 'html';
       $this->email->initialize($config);
       $this->email->to($to_email);
      $this->email->from($from_email, 'Arcadia Invest ');
       $this->email->subject($subject);
      $this->email->message($htmlContent);

      //Send mail
      $this->email->send();

     }


public function ActivationMessage($code)
{
  return '<div style="background-color:#F9F9F9">
  <h1>Welcome to <span style="color:#FF8C00">Arcadia invest</span></h1>

  <p>
  You are receiving this email because your address was entered during the signup process.
  If you did not signup for this account please contact our support department using the information at the bottom of this email.
  </p>

  <p>
  Thank you for creating a new wallet and choosing to join the exciting world of cryptocurrency investment.
  </p>

  <p>
  This is your unique activation Link: <a href="'.base_url().'auth/verify_auth_account/'.$code.'">'.base_url().'auth/verify_auth_account/'.$code.'</a></p>
  click on the link to activate your account, this enable you to start using our platform.
  </p>

  <br>
  If you have any questions please feel free to reach out to us using the information on our contact  page.
  <br>
  <i>Sincerely,
  The Arcadia Team
  </i>
  </p>
  </div>';
}

public function ReferralMessage()
{
return '<div style="background-color:#F9F9F9">
<h1>Welcome to <span style="color:#FF8C00">Arcadia invest Referral </span></h1>

<p>
  You recently have a new refferal downliner on your account .
</p>
<p>
  Login to your  Arcadia wallet to view your new referral details .
</p>

<br>
If you have any questions please feel free to reach out to us using the information on our contact page.
<br>
<i>Sincerely,
The Arcadia Team
</i>
</p>
</div>';
}

public function PassWordMessage($code)
{
  return '<div style="background-color:#F9F9F9">
  <h1>Welcome to <span style="color:#FF8C00">Arcadia invest</span></h1>

  <p>
  You are receiving this email because you recently request for a change of password  .
  If you did not request for this  please contact our support department using the information at the bottom of this email.
  </p>

  <p>
  This is your unique reset Link: <a href="'.base_url().'auth/password_auth_account/'.$code.'">'.base_url().'auth/password_auth_account/'.$code.'</a></p>
  click on the link to change your password.
  </p>

  <br>
  If you have any questions please feel free to reach out to us using the information on our contact  page.
  <br>
  <i>Sincerely,
  The Arcadia Team
  </i>
  </p>
  </div>';
}



}

?>
