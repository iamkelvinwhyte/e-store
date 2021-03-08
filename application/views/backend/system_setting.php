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
            <h3>System Setting
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">System Setting </li>
            <li class="breadcrumb-item active">System Setting</li>
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

          </div>
          <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
              <li class="nav-item"><a class="nav-link active show" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">App</a></li>
              <li class="nav-item"><a class="nav-link" id="permission-tabs" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false" data-original-title="" title="">Payment</a></li>
                  <li class="nav-item"><a class="nav-link" id="permission-tabs" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false" data-original-title="" title="">Email</a></li>
              <li class="nav-item"><a class="nav-link" id="permission-tabs" data-toggle="tab" href="#permission" role="tab" aria-controls="permission" aria-selected="false" data-original-title="" title="">Meta Tags</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                <form class="needs-validation user-add" novalidate="">
                  <h4>App Details</h4>
                  <div class="form-group row">
                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Site Name</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" required="" ng-model="site_name">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Url</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" required="" ng-model="url">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="text" required="" ng-model="email">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Phone</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom3" type="text" required="" ng-model="phone">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Address</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom4" type="text" required="" ng-model="address">
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="permission-tabs">
                <form class="needs-validation user-add" novalidate="">
                  <h4>Payment Setting</h4>
                  <div class="form-group row">
                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Meta Title</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" required="" ng-model="meta_title">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Meta Description</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" required="" ng-model="meta_des">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Tags</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="text" required="" ng-model="tags">
                  </div>

                </form>
              </div>
              <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="permission-tabs">
                <form class="needs-validation user-add" novalidate="">
                  <h4>Email Setting</h4>
                  <div class="form-group row">
                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Meta Title</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" required="" ng-model="meta_title">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Meta Description</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" required="" ng-model="meta_des">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Tags</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="text" required="" ng-model="tags">
                  </div>

                </form>
              </div>
              <div class="tab-pane fade" id="permission" role="tabpanel" aria-labelledby="permission-tabs">
                <form class="needs-validation user-add" novalidate="">
                  <h4>System Setting</h4>
                  <div class="form-group row">
                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Meta Title</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" required="" ng-model="meta_title">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Meta Description</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" required="" ng-model="meta_des">
                  </div>
                  <div class="form-group row">
                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Tags</label>
                    <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="text" required="" ng-model="tags">
                  </div>

                </form>
              </div>
            </div>
            <div class="pull-right">
              <button type="button" class="btn btn-primary" ng-click="update_setting()">Save</button>
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


var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
  $("#preloader").fadeOut(800);
  $scope.site_name="<?=isset($setting_data->site_name) ? $setting_data->site_name:""?>"
  $scope.url="<?=isset($setting_data->url) ? $setting_data->url:""?>"
  $scope.phone="<?=isset($setting_data->phone) ? $setting_data->phone:""?>"
  $scope.email="<?=isset($setting_data->email) ? $setting_data->email:""?>"
  $scope.address="<?=isset($setting_data->address) ? $setting_data->address:""?>"
  $scope.meta_title="<?=isset($setting_data->meta_title) ? $setting_data->meta_title:""?>"
  $scope.meta_des="<?=isset($setting_data->meta_des) ? $setting_data->meta_des:""?>"
  $scope.tags="<?=isset($setting_data->tags) ? $setting_data->tags:""?>"

  $scope.show_data = function() {
    $http.get("")
    .then(function (response) {
      $scope.getPlan = response.data; //data call
    });

  }


  $scope.update_setting  = function() {
    var fd = new FormData();
    fd.append('site_name',$scope.site_name);
    fd.append('url',$scope.url);
    fd.append('phone',$scope.phone);
    fd.append('email',$scope.email);
    fd.append('address',$scope.address);
    fd.append('meta_title',$scope.meta_title);
    fd.append('meta_des',$scope.meta_des);
    fd.append('tags',$scope.tags);



    if($scope.site_name==null){
      swal("Error!", "Site Name is required", "error");
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

    $("#preloader").fadeIn(800);
    // AJAX request
    $http({
      method: 'post',
      url: "<?=base_url()?>main/setting_updated",
      data: fd,
      headers: {'Content-Type': undefined},
    }).then(function successCallback(response) {
      // Store response data
      $("#preloader").fadeOut(800);
      $scope.response = response.data;
      if ($scope.response ){
        swal("successful!", "Setting Updated  ", "success");
        $scope.show_data();
      } else {
        swal("Error!", "Fail to create user!", "error");

      }
    });
  }





});
</script>

<?=include 'inc/footer.php';?>
