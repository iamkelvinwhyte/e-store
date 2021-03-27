<?=include 'inc/header.php';?>
<?=include 'inc/nav_bar.php';?>
<?=include 'inc/side_bar.php';?>

<div class="page-body">

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header-left">
            <h3>User Create
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">create User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->



  <!-- Container-fluid starts-->
  <div class="container-fluid" ng-app="myStore" ng-controller="StoreCtrl" ng-init="show_data()" ng-cloak>

    <div class="row">
      <div class="col-sm-12">
        <div class="card tab2-card">
          <div class="card-header">
            <h5> Add User</h5>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
              <li class="nav-item"><a class="nav-link active show" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Account</a></li>
              <li class="nav-item"><a class="nav-link" id="permission-tabs" data-toggle="tab" href="#permission" role="tab" aria-controls="permission" aria-selected="false" data-original-title="" title="">Permission</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                <form class="needs-validation user-add" novalidate="">
                  <h4>Account Details</h4>
                  <div class="form-group row">
                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Full Name</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" required="" ng-model="f_name">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Phone</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" required="" ng-model="phone">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="text" required="" ng-model="email">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Password</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom3" type="password" required="" ng-model="password">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Confirm Password</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom4" type="password" required="" ng-model="c_password">
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="permission" role="tabpanel" aria-labelledby="permission-tabs">
                <form class="needs-validation user-add" novalidate="">
                  <div class="permission-block">
                    <div class="attribute-blocks">
                      <h5 class="f-w-600 mb-3">Product Related permition </h5>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label>Add Product</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                            <label class="d-block" for="edo-ani1">
                              <input class="radio_animated" id="add_product" type="radio" name="add_product" value="1">
                              Allow
                            </label>
                            <label class="d-block" for="edo-ani2">
                              <input class="radio_animated" id="add_product" type="radio" name="add_product" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label>Update Product</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                            <label class="d-block" for="edo-ani3">
                              <input class="radio_animated" id="update_product" type="radio" name="update_product" value="1">
                              Allow
                            </label>
                            <label class="d-block" for="edo-ani4">
                              <input class="radio_animated" id="update_product" type="radio" name="update_product" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label>Delete Product</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                            <label class="d-block" for="edo-ani5">
                              <input class="radio_animated" id="delete_product" type="radio" name="delete_product" value="1">
                              Allow
                            </label>
                            <label class="d-block" for="edo-ani6">
                              <input class="radio_animated" id="delete_product" type="radio" name="delete_product" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="attribute-blocks">
                      <h5 class="f-w-600 mb-3"> Menu Related permition </h5>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label>Settings</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                            <label class="d-block" for="edo-ani9">
                              <input class="radio_animated" id="setting" type="radio" name="setting" value="1">
                              Allow
                            </label>
                            <label class="d-block" for="edo-ani10">
                              <input class="radio_animated" id="setting" type="radio" name="setting" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label>Users</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                            <label class="d-block" for="edo-ani11">
                              <input class="radio_animated" id="users" type="radio" name="users" value="1">
                              Allow
                            </label>
                            <label class="d-block" for="edo-ani12">
                              <input class="radio_animated" id="users" type="radio" name="users" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label>Coupons</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                            <label class="d-block" for="edo-ani13">
                              <input class="radio_animated" id="coupon" type="radio" name="coupon" value="1">
                              Allow
                            </label>
                            <label class="d-block" for="edo-ani14">
                              <input class="radio_animated" id="coupon" type="radio" name="coupon" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label class="mb-0 sm-label-radio">Vendor</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline custom-radio-ml d-flex radio-animated pb-0">
                            <label class="d-block mb-0" for="edo-ani15">
                              <input class="radio_animated" id="vendors" type="radio" name="vendors" value="1">
                              Allow
                            </label>
                            <label class="d-block mb-0" for="edo-ani16">
                              <input class="radio_animated" id="vendors" type="radio" name="vendors" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label class="mb-0 sm-label-radio">Sales</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline custom-radio-ml d-flex radio-animated pb-0">
                            <label class="d-block mb-0" for="edo-ani15">
                              <input class="radio_animated" id="sales" type="radio" name="sales" value="1">
                              Allow
                            </label>
                            <label class="d-block mb-0" for="edo-ani16">
                              <input class="radio_animated" id="sales" type="radio" name="sales" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-sm-4">
                          <label class="mb-0 sm-label-radio">Page</label>
                        </div>
                        <div class="col-xl-9 col-sm-8">
                          <div class="form-group m-checkbox-inline custom-radio-ml d-flex radio-animated pb-0">
                            <label class="d-block mb-0" for="edo-ani15">
                              <input class="radio_animated" class="pages" type="radio" name="pages" value="1">
                              Allow
                            </label>
                            <label class="d-block mb-0" for="edo-ani16">
                              <input class="radio_animated" class="pages" type="radio" name="pages" checked="" value="0">
                              Deny
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="pull-right">
              <button type="button" class="btn btn-primary" ng-click="add_user()">Save</button>
              <button type="button" class="btn btn-primary" ng-click="go_there()">Savlle</button>
              <button type="button" class="btn btn-primary" ng-click="yes()">Sooo</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  
  
  </div>
  <!-- Container-fluid Ends-->
</div>
<!-- AngularJS Script -->
<script>
function yes(){
  alert("yes");
}

var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
  $("#preloader").fadeOut(800);

 

$scope.go_there = function(){
  swal("Proceed?", {
    buttons: {
    confirm: {value:"confirm", text:$scope.f_name, className:'btn btn-success'},
  },
  icon:"warning"
})
.then((value) => {
  switch (value) {
    case "confirm":
      $("#preloader").fadeIn(800);
      setTimeout(function(){ window.location.replace("<?=base_url()?>main/miracle"); }, 3000);     
      break;
    default:
      return false;
  }
});

    
  
}
  $scope.add_user = function() {
    var fd = new FormData();

    var pages = $('input[name="pages"]:checked').val();
    var sales = $('input[name="sales"]:checked').val();
    var vendors = $('input[name="vendors"]:checked').val();
    var coupon = $('input[name="coupon"]:checked').val();
    var users = $('input[name="users"]:checked').val();
    var setting = $('input[name="setting"]:checked').val();
    var delete_product = $('input[name="delete_product"]:checked').val();
    var update_product = $('input[name="update_product"]:checked').val();
    var add_product = $('input[name="add_product"]:checked').val();



    fd.append('add_product',add_product);
    fd.append('update_product',update_product);
    fd.append('delete_product',delete_product);
    fd.append('setting',setting);
    fd.append('users',users);
    fd.append('coupon',coupon);
    fd.append('vendors',vendors);
    fd.append('sales',sales);
    fd.append('pages',pages);

    fd.append('name',$scope.f_name);
    fd.append('phone',$scope.phone);
    fd.append('email',$scope.email);
    fd.append('password',$scope.password);

    if($scope.f_name==null){
      
      swal("Error!", "Full name is required", "error");
      return false;
    }

    if($scope.email==null){
      swal("Error!", "Email is required", "error");
      return false;
    }
    if($scope.phone==null){
      swal("Error!", "Phone is required", "error");
      return false;
    }

    if($scope.password!=$scope.c_password){
      swal("Error!", "password do not match", "error");
      return false;
    }

    $("#preloader").fadeIn(800);
    // AJAX request
    $http({
      method: 'post',
      url: "<?=base_url()?>main/upload_new_user",
      data: fd,
      headers: {'Content-Type': undefined},
    }).then(function successCallback(response) {
      // Store response data
      $("#preloader").fadeOut(800);
      $scope.response = response.data;
      if ($scope.response ){
        swal("successful!", "User Created ", "success");
        $scope.show_data();
      } else {
        swal("Error!", "Fail to create user!", "error");

      }
    });
  }





});
</script>

<?=include 'inc/footer.php';?>
