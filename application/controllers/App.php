<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


	public function __construct() {
	        parent::__construct();

	        $this->load->model('Homepage_model');
	        $this->load->model('Auth_model');

	    }

public function page_data()
{
	$get_currency=["rate"=>460,"currency"=>"currency"];
	$this->session->set_userdata($get_currency);

	$raw_data = $this->Homepage_model->single_query_asc('category',[],'position');
	$data_menu=$raw_data->result_array();
	$raw_data_page = $this->Homepage_model->single_query_asc('pages',["page_status"=>1],'pages_id');
	$data_page=$raw_data_page->result_array();
	$data["data_menu"]=$data_menu;
	$data["data_page"]=$data_page;
	return $data;
}


	public function index()
	{
		$data=$this->page_data();
		$this->load->view('frontend/index',$data);
	}

	public function shop($category_id="",$category_name="")
	{
		$raw_data_sub = $this->Homepage_model->single_query_asc('sub_category',["category_id"=>$category_id],'sub_category_id');
		$data_submenu=$raw_data_sub->result_array();

		 $data=$this->page_data();
		$data["data_submenu"]=$data_submenu;
		$this->load->view('frontend/shop',$data);
	}

	public function shop_menu($category_id="",$category_name="")
	{
		$raw_data_sub = $this->Homepage_model->single_query_asc('sub_category',[],'sub_category_id');
		$data_submenu=$raw_data_sub->result_array();

		 $data=$this->page_data();
		$data["data_submenu"]=$data_submenu;
		$this->load->view('frontend/shop_all',$data);
	}



	public function shop_page($product_code="")
	{
		$raw_data_product = $this->Homepage_model->single_query_asc('product',["product_code"=>$product_code,"status"=>1,"out_stock_status"=>0],'product_id');
		$data_product=$raw_data_product->row();

		$data=$this->page_data();
		$data["data_product"]=$data_product;
			if(empty($data_product)){ redirect("app","refresh");}
		$this->load->view('frontend/product_page',$data);
	}


	//get product by category
	public function get_product_list($category_id=""){
		$action="product.category_id=category.category_id";
		$action2="product.sub_category_id=sub_category.sub_category_id";
		$data_product = $this->Homepage_model->Display2Join_("product","category","sub_category",["status"=>1,"product.category_id"=>$category_id],"product_id",$action,$action2,"left","left");
	  $this->output->set_output(json_encode($data_product));
	}

	//get product all
	public function get_all_product_list(){
		$action="product.category_id=category.category_id";
		$action2="product.sub_category_id=sub_category.sub_category_id";
		$data_product = $this->Homepage_model->Display2Join_("product","category","sub_category",["status"=>1],"product_id",$action,$action2,"left","left");
	  $this->output->set_output(json_encode($data_product));
	}

	public function check_out_product()
	{
		$data=$this->page_data();
		$this->load->view('frontend/check_out',$data);
	}
	public function app_login()
	{
		$data=$this->page_data();
		$this->load->view('frontend/login',$data);
	}
	public function app_register()
	{
		$data=$this->page_data();
		$this->load->view('frontend/register',$data);
	}
	public function app_password()
	{
		$data=$this->page_data();
		$this->load->view('frontend/password',$data);
	}


	//login private function
	private  function UserLogin($email,$password)
	{
	  $user_select = ['email' => $email];
	  $raw_duplcate = $this->Homepage_model->single_query('user',$user_select,'user_id');
	  $duplcate=$raw_duplcate->row();
	  if(empty($duplcate)){ return FALSE;}else{$duplcate;}
	  $hash=$duplcate->password;

	  $query=$this->Auth_model->user_login_auth('user',$email);
	  if(password_verify($password , $hash) &&  $query){
	    return $query;
	  }else{
	    return FALSE;
	  }

	}

	//User login
	public function activ_login_user(){
	  /* Load form helper */
	  $this->form_validation->set_rules('password', 'Password', 'required');
	  $this->form_validation->set_rules('email', 'Email', 'required');

	  // Validate Operation
	  if ($this->form_validation->run() == FALSE) {
	    $this->load->view('frontend/login.php');
	  }
	  else {
			  $email=$this->input->post('email');
	      $password = $this->input->post('password');
			  $query=$this->UserLogin($email,$password);

	    if( $query!= false){
	      $session_data = [
	        'phone' => $query[0]->phone,
	        'first_name' => $query[0]->first_name,
					'last_name' => $query[0]->last_name,
	        'email' => $query[0]->email,
	        'user_id' => $query[0]->user_id,
	        'logged_in'=>TRUE,
	      ];

	      $userID_data = ['user_id' => $query[0]->user_id];

	      $this->session->set_userdata($session_data);
	      $this->session->set_flashdata('success', 'Login sucessful');
	      redirect('app', 'refresh');
	      }else{
	      $this->session->set_flashdata('error', 'Incorrect login details, please try again later ');
	        redirect('app/app_login', 'refresh');
	      }

	    }

	  }

		//User Create
		public function register_user(){
		  /* Load form helper */
		  $this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
		  $this->form_validation->set_rules('email', 'Email', 'required');

		  // Validate Operation
		  if ($this->form_validation->run() == FALSE) {
		    $this->load->view('frontend/register.php');
		  }
		  else {

				$email=$this->input->post('email');
				$password = $this->input->post('password');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');

				$user_data =['first_name' => $first_name,'last_name' => $last_name,'email' => $email,'password' => password_hash($password, PASSWORD_BCRYPT)];

				$is_exist=$this->Homepage_model->is_exist("user",["email"=>$email]);
			  if($is_exist){
					$this->session->set_flashdata('error', 'Account already exist ');
					 redirect('app/app_register', 'refresh');
			  }else{
			  $set_=$this->Homepage_model->insertData_("user",$user_data);
			  if($set_)
				{
					  $query=$this->UserLogin($email,$password);
						if( $query!= false){
						 $session_data = [
							 'phone' => $query[0]->phone,
							 'first_name' => $query[0]->first_name,
							 'last_name' => $query[0]->last_name,
							 'email' => $query[0]->email,
							 'user_id' => $query[0]->user_id,
							 'logged_in'=>TRUE,
						 ];

						 $userID_data = ['user_id' => $query[0]->user_id];

						 $this->session->set_userdata($session_data);
						 $this->session->set_flashdata('success', 'Login sucessful');

						 redirect('app/check_out_product', 'refresh');
				}
				else{
					$this->session->set_flashdata('success', 'Registartion was successful , login .. ');
 redirect('app/app_login', 'refresh');
				 }
			}

}

		  }
	}




}
