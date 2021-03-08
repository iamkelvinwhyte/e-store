<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

public function __construct() {
        parent::__construct();
        //load user model
        $this->load->model('Check_user');
        $this->Check_user->_is_logged_in();//CHECK SESSION LOGIN
        $this->load->model('Homepage_model');
        $this->load->model('Auth_model');

    }

public function index()
{
  $this->load->view('backend/index.php');
}


//#################### START CATEGORY #########################
public function category()
{
  $this->load->view('backend/category.php');
}

//Add category to the app
public function add_category()
{
  /* Getting file name */
  $image ="null";
  $position=0;
  if (isset($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];
    /* Location */
    $location = 'uploads/';

    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $image = time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file']['tmp_name'],$location.$image);
  }

  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }

  if (isset($_POST['position'])) {
    $position = $_POST['position'];
  }

  $data =['name' => $name,'image' => $image,"position"=>$position];
  $set_=$this->Homepage_model->insertData_("category",$data);
  if($set_){echo true;}else{echo false; }

}

//getcategory
public function getcategory(){
  $raw_data = $this->Homepage_model->single_query('category',[],'position');
  $data=$raw_data->result_array();
  $this->output->set_output(json_encode($data));
}

//delete_category
public function delete_category()
{
  $data  = json_decode(file_get_contents("php://input"));
    $category_id= $data->category_id;
  echo $this->Homepage_model->Del_Data_("category",['category_id'=>$category_id]);
}

//#################### END  START CATEGORY #########################



//#################### START SUB_category #########################
public function sub_category()
{
  $this->load->view('backend/sub_category.php');
}

//Add sub_category to the app
public function add_sub_category()
{
  /* Getting file name */
  $image ="null";
  $position=0;
  if (isset($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];
    /* Location */
    $location = 'uploads/';

    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $image = time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file']['tmp_name'],$location.$image);
  }

  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }

  if (isset($_POST['sub_name'])) {
    $sub_name = $_POST['sub_name'];
  }

  $data =['category_id' => $name,'image' => $image,"sub_name"=>$sub_name];
  $set_=$this->Homepage_model->insertData_("sub_category",$data);
  if($set_){echo true;}else{echo false; }

}

//getsub_category
public function getsub_category(){
  $action="sub_category.category_id=category.category_id";
  $data = $this->Homepage_model->DisplayJoin_("sub_category","category",[],"sub_category_id",$action,"left");
  $this->output->set_output(json_encode($data));
}

//getsubcategory by
public function getsub_category_by($category_id=0){
  $raw_data = $this->Homepage_model->single_query('sub_category',["category_id"=>$category_id],'sub_category_id');
  $data=$raw_data->result_array();
  $this->output->set_output(json_encode($data));
}

//delete_sub_category
public function delete_sub_category()
{
  $data  = json_decode(file_get_contents("php://input"));
    $sub_category_id= $data->sub_category_id;
  echo $this->Homepage_model->Del_Data_("sub_category",['sub_category_id'=>$sub_category_id]);
}

//#################### END  START SUB_category #########################


//#################### START PRODUCT #########################

public function add_product()
{
  $this->load->view('backend/add_product.php');
}

public function product_list()
{
  $this->load->view('backend/product_list.php');
}

public function product_detail($id="")
{
  $raw_data = $this->Homepage_model->single_query('product',["product_code"=>$id],'product_id');
  $data_product=$raw_data->row();
  if(empty($data_product)){
  redirect('main/product_list', 'refresh');
  }
  $data['data_product']=$data_product;
  $this->load->view('backend/product_detail.php',$data);
}


//upload new  product
public function upload_new_product()
{
  /* Location */
  $location = 'uploads/';
  $file="";   $file_1="";  $file_2="";  $file_3="";  $file_4="";  $file_5="";
  /* Getting file name */

  if (isset($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file']['tmp_name'],$location.$file);
  }
  if (isset($_FILES['file_1']['name'])) {
    $filename = $_FILES['file_1']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_1 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_1']['tmp_name'],$location.$file_1);
  }
  if (isset($_FILES['file_2']['name'])) {
    $filename = $_FILES['file_2']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_2 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_2']['tmp_name'],$location.$file_2);
  }

  if (isset($_FILES['file_3']['name'])) {
    $filename = $_FILES['file_3']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_3 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_3']['tmp_name'],$location.$file_3);
  }

  if (isset($_FILES['file_4']['name'])) {
    $filename = $_FILES['file_4']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_4 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_4']['tmp_name'],$location.$file_4);
  }

  if (isset($_FILES['file_5']['name'])) {
    $filename = $_FILES['file_5']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_5 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_5']['tmp_name'],$location.$file_5);
  }

    $product_code = $this->Auth_model->random_code(4).time();

  if (isset($_POST['title'])) {
    $title = $_POST['title'];
  }else{$title ="";}

  if (isset($_POST['cate_name'])) {
    $cate_name = $_POST['cate_name'];
  }else{$cate_name ="";}

  if (isset($_POST['sub_name'])) {
    $sub_name = $_POST['sub_name'];
  }else{$sub_name ="";}

  if (isset($_POST['price'])) {
    $price = $_POST['price'];
  }else{$price ="";}

  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
  }else{$qty ="";}

  if (isset($_POST['descrip'])) {
    $descrip = $_POST['descrip'];
  }else{$descrip ="...";}

  if (isset($_POST['size'])) {
    $size = $_POST['size'];
  }else{$size ="";}

  if (isset($_POST['color'])) {
    $color = $_POST['color'];
  }else{$color ="";}

  if (isset($_POST['discount'])) {
    $discount = $_POST['discount'];
  }else{$discount ="";}

  $institution_id=$this->session->userdata('institution_id');
  $data =['institution_id'=>$institution_id,'product_code' => $product_code,'category_id' => $cate_name,'sub_category_id' => $sub_name,'title' => $title,'qty' => $qty,'price' => $price,"discount"=>$discount,'size' => $size,'color' => $color,'descrip' => $descrip,'file' => $file,'file_1' => $file_1,'file_2' => $file_2,'file_3' => $file_3,'file_4' => $file_4,'file_5' => $file_5];
  $set_=$this->Homepage_model->insertData_("product",$data);
  if($set_){echo true;}else{echo false; }

}


//update  product
public function upload_update_product()
{
  /* Location */
  $location = 'uploads/';

  if (isset($_POST['product_code'])) {
    $product_code = $_POST['product_code'];
  }else{$product_code ="";}

  $raw_data = $this->Homepage_model->single_query('product',["product_code"=>$product_code],'product_id');
  $data_product=$raw_data->row();
  if(empty($data_product)){
  echo false;
  }

  $file=$data_product->file;   $file_1=$data_product->file_1;  $file_2=$data_product->file_2;  $file_3=$data_product->file_3;  $file_4=$data_product->file_4;  $file_5=$data_product->file_5;
  /* Getting file name */


  if (isset($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file']['tmp_name'],$location.$file);
  }
  if (isset($_FILES['file_1']['name'])) {
    $filename = $_FILES['file_1']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_1 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_1']['tmp_name'],$location.$file_1);
  }
  if (isset($_FILES['file_2']['name'])) {
    $filename = $_FILES['file_2']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_2 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_2']['tmp_name'],$location.$file_2);
  }

  if (isset($_FILES['file_3']['name'])) {
    $filename = $_FILES['file_3']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_3 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_3']['tmp_name'],$location.$file_3);
  }

  if (isset($_FILES['file_4']['name'])) {
    $filename = $_FILES['file_4']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_4 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_4']['tmp_name'],$location.$file_4);
  }

  if (isset($_FILES['file_5']['name'])) {
    $filename = $_FILES['file_5']['name'];
    $path = pathinfo($filename,PATHINFO_EXTENSION);
    $file_5 = $this->Auth_model->random_code(4).time().'.'.$path;
    /* Upload file */
    move_uploaded_file($_FILES['file_5']['tmp_name'],$location.$file_5);
  }


  if (isset($_POST['title'])) {
    $title = $_POST['title'];
  }else{$title ="";}

  if (isset($_POST['cate_name'])) {
    $cate_name = $_POST['cate_name'];
  }else{$cate_name ="";}

  if (isset($_POST['sub_name'])) {
    $sub_name = $_POST['sub_name'];
  }else{$sub_name ="";}

  if (isset($_POST['price'])) {
    $price = $_POST['price'];
  }else{$price ="";}

  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
  }else{$qty ="";}

  if (isset($_POST['descrip'])) {
    $descrip = $_POST['descrip'];
  }else{$descrip ="...";}

  if (isset($_POST['size'])) {
    $size = $_POST['size'];
  }else{$size ="";}

  if (isset($_POST['color'])) {
    $color = $_POST['color'];
  }else{$color ="";}

  if (isset($_POST['discount'])) {
    $discount = $_POST['discount'];
  }else{$discount ="";}


  $data =['category_id' => $cate_name,'sub_category_id' => $sub_name,'title' => $title,'qty' => $qty,'price' => $price,"discount"=>$discount,'size' => $size,'color' => $color,'descrip' => $descrip,'file' => $file,'file_1' => $file_1,'file_2' => $file_2,'file_3' => $file_3,'file_4' => $file_4,'file_5' => $file_5];
  $id=["product_code"=>$product_code];
  $set_=$this->Homepage_model->update_Data($id,$data,"product");
  if($set_){echo true;}else{echo false; }

}



//get product list
public function get_product_list(){
  $action="product.category_id=category.category_id";
  $action_1="product.sub_category_id=sub_category.sub_category_id";
  $data = $this->Homepage_model->Display2Join_("product","category","sub_category",[],"product_id",$action,$action_1,"left","left");
  $this->output->set_output(json_encode($data));
}


//delete_product
public function delete_product()
{
  $data  = json_decode(file_get_contents("php://input"));
    $product_code= $data->product_code;
  echo $this->Homepage_model->Del_Data_("product",['product_code'=>$product_code]);
}

//lock and open product
public function lock_product()
{
  $data  = json_decode(file_get_contents("php://input"));
    $product_code= $data->product_code;
    $status= $data->status;
    $set_=$this->Homepage_model->update_Data(["product_code"=>$product_code],["status"=>$status],"product");
    if($set_){echo true;}else{echo false; }
}



//COUPON SETTING

public function coupon_create()
{
  $this->load->view('backend/coupon_create.php');
}

public function coupon_list()
{
  $this->load->view('backend/coupon_list.php');
}


//upload new  product
public function upload_new_coupon()
{


  if (isset($_POST['c_title'])) {
    $c_title = $_POST['c_title'];
  }else{$c_title ="";}

  if (isset($_POST['c_code'])) {
    $c_code = $_POST['c_code'];
  }else{$c_code ="";}

  if (isset($_POST['s_date'])) {
    $s_date = $_POST['s_date'];
  }else{$s_date ="";}

  if (isset($_POST['e_date'])) {
    $e_date = $_POST['e_date'];
  }else{$e_date ="";}

  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
  }else{$qty =0;}

  if (isset($_POST['free_ship'])) {
    $free_ship = $_POST['free_ship'];
  }else{$free_ship ="";}

  if (isset($_POST['discount_type'])) {
    $discount_type = $_POST['discount_type'];
  }else{$discount_type ="";}

  if (isset($_POST['c_status'])) {
    $c_status = $_POST['c_status'];
  }else{$c_status ="";}

  if (isset($_POST['per_limit'])) {
    $per_limit = $_POST['per_limit'];
  }else{$per_limit ="";}

  if (isset($_POST['per_cus'])) {
    $per_cus = $_POST['per_cus'];
  }else{$per_cus ="";}

  if (isset($_POST['value_discount'])) {
    $value_discount = $_POST['value_discount'];
  }else{$value_discount ="";}



  $data =['c_title' => $c_title,'c_code' => $c_code,'s_date' => $s_date,'e_date' => $e_date,'qty' => $qty,'free_ship' => $free_ship,'discount_type' => $discount_type,"c_status"=>$c_status,'per_limit' => $per_limit,'per_cus' => $per_cus,'value_discount'=>$value_discount];
  $set_=$this->Homepage_model->insertData_("coupon",$data);
  if($set_){echo true;}else{echo false; }

}


//get coupon
public function get_coupon(){
  $raw_data = $this->Homepage_model->single_query('coupon',[],'coupon_id');
  $data=$raw_data->result_array();
  $this->output->set_output(json_encode($data));
}

public function delete_coupon()
{
  $data  = json_decode(file_get_contents("php://input"));
    $coupon_id= $data->coupon_id;
  echo $this->Homepage_model->Del_Data_("coupon",['coupon_id'=>$coupon_id]);
}


//lock and open coupon
public function lock_coupon()
{
  $data  = json_decode(file_get_contents("php://input"));
    $coupon_id= $data->coupon_id;
    $status= $data->status;
    $set_=$this->Homepage_model->update_Data(["coupon_id"=>$coupon_id],["c_status"=>$status],"coupon");
    if($set_){echo true;}else{echo false; }
}



//Page SETTING

public function page_create()
{
  $this->load->view('backend/page_create.php');
}

public function page_list()
{
  $this->load->view('backend/page_list.php');
}

public function page_detail($id="")
{
  $raw_data = $this->Homepage_model->single_query('pages',["page_code"=>$id],'pages_id');
  $data_page=$raw_data->row();
  if(empty($data_page)){
  redirect('main/page_list', 'refresh');
  }
  $data['data_page']=$data_page;
  $this->load->view('backend/page_detail.php',$data);
}


// new  page
public function upload_new_page()
{


  if (isset($_POST['page_name'])) {
    $page_name = $_POST['page_name'];
  }else{$page_name ="";}

  if (isset($_POST['page_des'])) {
    $page_des = $_POST['page_des'];
  }else{$page_des ="";}

  if (isset($_POST['meta_title'])) {
    $meta_title = $_POST['meta_title'];
  }else{$meta_title ="";}

  if (isset($_POST['meta_des'])) {
    $meta_des = $_POST['meta_des'];
  }else{$meta_des ="";}

    $page_code = $this->Auth_model->random_code(15);

  $data =['page_name' => $page_name,'page_des' => $page_des,'meta_title' => $meta_title,'meta_des' => $meta_des,'page_code' => $page_code];
  $set_=$this->Homepage_model->insertData_("pages",$data);
  if($set_){echo true;}else{echo false; }

}


//get coupon
public function get_page(){
  $raw_data = $this->Homepage_model->single_query('pages',[],'pages_id');
  $data=$raw_data->result_array();
  $this->output->set_output(json_encode($data));
}

public function delete_page()
{
  $data  = json_decode(file_get_contents("php://input"));
    $pages_id= $data->pages_id;
  echo $this->Homepage_model->Del_Data_("pages",['pages_id'=>$pages_id]);
}


//lock and open coupon
public function lock_page()
{
  $data  = json_decode(file_get_contents("php://input"));
    $pages_id= $data->pages_id;
    $status= $data->status;
    $set_=$this->Homepage_model->update_Data(["pages_id"=>$pages_id],["page_status"=>$status],"pages");
    if($set_){echo true;}else{echo false; }
}


//update page
public function update_page()
{


  if (isset($_POST['page_name'])) {
    $page_name = $_POST['page_name'];
  }else{$page_name ="";}

  if (isset($_POST['page_des'])) {
    $page_des = $_POST['page_des'];
  }else{$page_des ="";}

  if (isset($_POST['meta_title'])) {
    $meta_title = $_POST['meta_title'];
  }else{$meta_title ="";}

  if (isset($_POST['meta_des'])) {
    $meta_des = $_POST['meta_des'];
  }else{$meta_des ="";}

  if (isset($_POST['pages_id'])) {
    $pages_id = $_POST['pages_id'];
  }else{$pages_id ="";}

  $data =['page_name' => $page_name,'page_des' => $page_des,'meta_title' => $meta_title,'meta_des' => $meta_des];
  $set_=$this->Homepage_model->update_Data(["pages_id"=>$pages_id],$data,"pages");
  if($set_){echo true;}else{echo false; }


}

//USER SETTING

public function user_create()
{
  $this->load->view('backend/user_create.php');
}

public function user_list()
{
  $this->load->view('backend/user_list.php');
}

public function user_detail($id="")
{
  $action="personal_info.institution_id=permissions.institution_id";

  $raw_data = $this->Homepage_model->join_query("personal_info","permissions",["personal_info.institution_id"=>$id],'personal_info_id',$action,"left");
  $data_user=$raw_data->row();
  if(empty($data_user)){
  redirect('main/user_list', 'refresh');
  }
  $data['data_user']=$data_user;
  $this->load->view('backend/user_detail.php',$data);
}


// new  user
public function upload_new_user()
{


  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }else{$name ="";}

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }else{$email ="";}

  if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
  }else{$phone ="";}

  if (isset($_POST['password'])) {
    $password = $_POST['password'];
  }else{$password ="";}

  $institution_id = time().$this->Auth_model->random_code(7);

  $personal_data =['name' => $name,'email' => $email,'phone' => $phone,'password' => password_hash($password, PASSWORD_BCRYPT),'institution_id'=>$institution_id,'active'=>1,'account_type'=>"A1"];

  $permissions=['institution_id'=>$institution_id,'add_product'=>$_POST['add_product'],'update_product'=>$_POST['update_product'],'delete_product'=>$_POST['delete_product'],'coupon'=>$_POST['coupon'],'setting'=>$_POST['setting'],'users'=>$_POST['users'],'vendors'=>$_POST['vendors'],'pages'=>$_POST['pages'],'sales'=>$_POST['sales']];

  $is_exist=$this->Homepage_model->is_exist("personal_info",["email"=>$email]);
  if($is_exist){
    echo false;
  }else{
  $this->Homepage_model->insertData_("permissions",$permissions);
  $set_=$this->Homepage_model->insertData_("personal_info",$personal_data);
  if($set_){echo true;}else{echo false; }
}

}


//get user
public function get_user(){
  $raw_data = $this->Homepage_model->single_query('personal_info',['account_type'=>"A1"],'personal_info_id');
  $data=$raw_data->result_array();
  $this->output->set_output(json_encode($data));
}

public function delete_user()
{
  $data  = json_decode(file_get_contents("php://input"));
    $institution_id= $data->institution_id;
    $this->Homepage_model->Del_Data_("permissions",['institution_id'=>$institution_id]);
  echo $this->Homepage_model->Del_Data_("personal_info",['institution_id'=>$institution_id]);
}


//lock and open user
public function lock_user()
{
  $data  = json_decode(file_get_contents("php://input"));
    $personal_info_id= $data->personal_info_id;
    $status= $data->status;
    $set_=$this->Homepage_model->update_Data(["personal_info_id"=>$personal_info_id],["active"=>$status],"personal_info");
    if($set_){echo true;}else{echo false; }
}


//update user
public function update_user()
{

    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }else{$name ="";}

    if (isset($_POST['email'])) {
      $email = $_POST['email'];
    }else{$email ="";}

    if (isset($_POST['phone'])) {
      $phone = $_POST['phone'];
    }else{$phone ="";}

    if (isset($_POST['password'])) {
      $password = $_POST['password'];
    }else{$password ="";}

    if (isset($_POST['institution_id'])) {
      $institution_id = $_POST['institution_id'];
    }else{$institution_id ="";}

if($password==""){
    $personal_data =['name' => $name,'email' => $email,'phone' => $phone];
}else{
    $personal_data =['name' => $name,'email' => $email,'phone' => $phone,'password' => password_hash($password, PASSWORD_BCRYPT),'active'=>1];

}


    $permissions=['add_product'=>$_POST['add_product'],'update_product'=>$_POST['update_product'],'delete_product'=>$_POST['delete_product'],'coupon'=>$_POST['coupon'],'setting'=>$_POST['setting'],'users'=>$_POST['users'],'vendors'=>$_POST['vendors'],'pages'=>$_POST['pages'],'sales'=>$_POST['sales']];

   $this->Homepage_model->update_Data(["institution_id"=>$institution_id],$permissions,"permissions");
  $set_=$this->Homepage_model->update_Data(["institution_id"=>$institution_id],$personal_data,"personal_info");
  if($set_){echo true;}else{echo false; }


}




//VENDOR SETTING

public function vendor_create()
{
  $this->load->view('backend/vendor_create.php');
}

public function vendor_list()
{
  $this->load->view('backend/vendor_list.php');
}

public function vendor_detail($id="")
{
  $action="personal_info.institution_id=permissions.institution_id";

  $raw_data = $this->Homepage_model->join_query("personal_info","permissions",["personal_info.institution_id"=>$id],'personal_info_id',$action,"left");
  $data_vendor=$raw_data->row();
  if(empty($data_vendor)){
  redirect('main/vendor_list', 'refresh');
  }
  $data['data_vendor']=$data_vendor;
  $this->load->view('backend/vendor_detail.php',$data);
}


// new  vendor
public function upload_new_vendor()
{


  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }else{$name ="";}

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }else{$email ="";}

  if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
  }else{$phone ="";}

  if (isset($_POST['password'])) {
    $password = $_POST['password'];
  }else{$password ="";}

  $institution_id = time().$this->Auth_model->random_code(7);

  $personal_data =['name' => $name,'email' => $email,'phone' => $phone,'password' => password_hash($password, PASSWORD_BCRYPT),'institution_id'=>$institution_id,'active'=>1,'account_type'=>"V1"];

  $permissions=['institution_id'=>$institution_id,'add_product'=>$_POST['add_product'],'update_product'=>$_POST['update_product'],'delete_product'=>$_POST['delete_product'],'coupon'=>$_POST['coupon'],'setting'=>$_POST['setting'],'vendors'=>$_POST['vendors'],'vendors'=>$_POST['vendors'],'pages'=>$_POST['pages'],'sales'=>$_POST['sales']];

  $is_exist=$this->Homepage_model->is_exist("personal_info",["email"=>$email]);
  if($is_exist){
    echo false;
  }else{
  $this->Homepage_model->insertData_("permissions",$permissions);
  $set_=$this->Homepage_model->insertData_("personal_info",$personal_data);
  if($set_){echo true;}else{echo false; }
}

}


//get vendor
public function get_vendor(){
  $raw_data = $this->Homepage_model->single_query('personal_info',['account_type'=>"V1"],'personal_info_id');
  $data=$raw_data->result_array();
  $this->output->set_output(json_encode($data));
}

public function delete_vendor()
{
  $data  = json_decode(file_get_contents("php://input"));
    $institution_id= $data->institution_id;
    $this->Homepage_model->Del_Data_("permissions",['institution_id'=>$institution_id]);
  echo $this->Homepage_model->Del_Data_("personal_info",['institution_id'=>$institution_id]);
}


//lock and open vendor
public function lock_vendor()
{
  $data  = json_decode(file_get_contents("php://input"));
    $personal_info_id= $data->personal_info_id;
    $status= $data->status;
    $set_=$this->Homepage_model->update_Data(["personal_info_id"=>$personal_info_id],["active"=>$status],"personal_info");
    if($set_){echo true;}else{echo false; }
}


//update vendor
public function update_vendor()
{

    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }else{$name ="";}

    if (isset($_POST['email'])) {
      $email = $_POST['email'];
    }else{$email ="";}

    if (isset($_POST['phone'])) {
      $phone = $_POST['phone'];
    }else{$phone ="";}

    if (isset($_POST['password'])) {
      $password = $_POST['password'];
    }else{$password ="";}

    if (isset($_POST['institution_id'])) {
      $institution_id = $_POST['institution_id'];
    }else{$institution_id ="";}

if($password==""){
    $personal_data =['name' => $name,'email' => $email,'phone' => $phone];
}else{
    $personal_data =['name' => $name,'email' => $email,'phone' => $phone,'password' => password_hash($password, PASSWORD_BCRYPT),'active'=>1];

}


    $permissions=['add_product'=>$_POST['add_product'],'update_product'=>$_POST['update_product'],'delete_product'=>$_POST['delete_product'],'coupon'=>$_POST['coupon'],'setting'=>$_POST['setting'],'vendors'=>$_POST['vendors'],'vendors'=>$_POST['vendors'],'pages'=>$_POST['pages'],'sales'=>$_POST['sales']];

   $this->Homepage_model->update_Data(["institution_id"=>$institution_id],$permissions,"permissions");
  $set_=$this->Homepage_model->update_Data(["institution_id"=>$institution_id],$personal_data,"personal_info");
  if($set_){echo true;}else{echo false; }


}

//SYSTEM SETTING
public function system_setting ()
{
  $raw_data = $this->Homepage_model->single_query('in_setting',[],'id');
  $setting_data=$raw_data->row();
  $data['setting_data']=$setting_data;

  $this->load->view('backend/system_setting.php',$data);
}


public function setting_updated()
{
  /* Getting file name */

  if (isset($_POST['site_name'])) {
    $site_name = $_POST['site_name'];
  }

  if (isset($_POST['url'])) {
    $url = $_POST['url'];
  }
  if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
  }

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if (isset($_POST['address'])) {
    $address = $_POST['address'];
  }

  if (isset($_POST['meta_title'])) {
    $meta_title = $_POST['meta_title'];
  }

  if (isset($_POST['meta_des'])) {
    $meta_des = $_POST['meta_des'];
  }

  if (isset($_POST['tags'])) {
    $tags = $_POST['tags'];
  }



  $data =['site_name' => $site_name,'url' => $url,"phone"=>$phone,"email"=>$email,"address"=>$address,"meta_title"=>$meta_title,"meta_des"=>$meta_des,"tags"=>$tags];

  $this->Homepage_model->update_Data(["id"=>1],$data,"in_setting");
  if($set_){echo true;}else{echo false; }

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


public function withdrawalMessage($amount=0)
{
return '<div style="background-color:#F9F9F9">
<h1>Welcome to <span style="color:#FF8C00">Arcadia invest withdrawal </span></h1>

<p>
Withdrawal Request .<hr> You have requested to withdraw  $'.$amount.'  from your account
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

public function DepositlMessage($amount=0)
{
return '<div style="background-color:#F9F9F9">
<h1>Welcome to <span style="color:#FF8C00">Arcadia Invest Deposit </span></h1>

<p>
Withdrawal Request .<hr> You have made a depositof   $'.$amount.'  from your account
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





}

?>
