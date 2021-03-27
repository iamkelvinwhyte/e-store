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
            <h3>Coupon Create
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">Coupon</li>
            <li class="breadcrumb-item active">create Coupon</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->



  <!-- Container-fluid starts-->
  <div class="container-fluid" ng-app="myStore" ng-controller="StoreCtrl" ng-init="show_data()" ng-cloak>

    <div class="card tab2-card">
        <div class="card-header">
            <h5>Discount Coupon Details</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" data-original-title="" title="">General</a></li>
                <li class="nav-item"><a class="nav-link" id="usage-tab" data-toggle="tab" href="#usage" role="tab" aria-controls="usage" aria-selected="false" data-original-title="" title="">Usage</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form class="needs-validation" novalidate="">
                        <h4>General</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Coupan Title</label>
                                    <input class="form-control col-md-7"  type="text" required="" ng-model="c_title">
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Coupan Code</label>
                                    <input class="form-control col-md-7" ng-model="c_code" type="text" required="" >
                                    <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Start Date</label>
                                    <input class="datepicker-here form-control digits col-md-7" type="date" ng-model="s_date" placeholder="yyyy-MM-dd">
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">End Date</label>
                                    <input class="datepicker-here form-control digits col-md-7" type="date" ng-model="e_date" placeholder="yyyy-MM-dd">
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Free Shipping</label>
                                    <div class="checkbox-primary col-md-7">
                                        <input id="checkbox-primary-1" type="checkbox" data-original-title="" ng-model="free_ship" ng-checked="check_ship" ng-click="isCheckShip()">
                                        <label for="checkbox-primary-1">Allow Free Shipping</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Quantity</label>
                                    <input class="form-control col-md-7" type="number" required="" ng-model="qty">
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Discount Type</label>
                                    <select class="custom-select col-md-7" required="" ng-model="discount_type">
                                        <option value="">--Select--</option>
                                        <option value="1">Percent</option>
                                        <option value="2">Fixed</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Percent/Fixed Value</label>
                                    <input class="form-control col-md-7" type="number" required="" ng-model="value_discount">
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Status</label>
                                    <div class="checkbox-primary col-md-7">
                                        <input  type="checkbox"  ng-model="c_status"  ng-checked="check" ng-click="isCheckStatus()">
                                        <label for="checkbox-primary-2">Enable the Coupon</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                    <form class="needs-validation" novalidate="">
                        <h4>Usage Limits</h4>
                        <div class="form-group row">
                            <label for="validationCustom6" class="col-xl-3 col-md-4">Per Limit</label>
                            <input class="form-control col-md-7" id="validationCustom6" type="number" ng-model="per_limit" >
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom7" class="col-xl-3 col-md-4">Per Customer</label>
                            <input class="form-control col-md-7" id="validationCustom7" type="number" ng-model="per_cus" >
                        </div>
                    </form>
                </div>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" ng-click="add_coupon()">Save</button>
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

  $scope.show_data = function() {
    $http.get("")
    .then(function (response) {
      $scope.getPlan = response.data; //data call
    });

  }


  $scope.add_coupon = function() {
    var fd = new FormData();

    fd.append('c_title',$scope.c_title);
    fd.append('c_code',$scope.c_code);
    fd.append('s_date',$scope.convert($scope.s_date));
    fd.append('e_date',$scope.convert($scope.e_date));
    fd.append('free_ship',$scope.free_ship);
    fd.append('qty',$scope.qty);
    fd.append('discount_type',$scope.discount_type);
    fd.append('c_status',$scope.c_status);
    fd.append('per_limit',$scope.per_limit);
    fd.append('per_cus',$scope.per_cus);
    fd.append('value_discount',$scope.value_discount);


    if($scope.c_title==null){
      swal("Error!", "Coupon title is required", "error");
      return false;
    }
    if($scope.c_code==null){
      swal("Error!", "Coupon code  is required", "error");
      return false;
    }
    if($scope.s_date==null){
      swal("Error!", "Coupon start date is required", "error");
      return false;
    }
    if($scope.e_date==null){
      swal("Error!", "Coupon end date is required", "error");
      return false;
    }

    if($scope.convert($scope.s_date) > $scope.convert($scope.e_date)){
      swal("Error!", "Your start date can not be greater than the end date ", "error");
      return false;
    }

    if($scope.value_discount==null){
      swal("Error!", "Coupon Percent/Fixed Value is required", "error");
      return false;
    }

      $("#preloader").fadeIn(800);
      // AJAX request
      $http({
        method: 'post',
        url: "<?=base_url()?>main/upload_new_coupon",
        data: fd,
        headers: {'Content-Type': undefined},
      }).then(function successCallback(response) {
        // Store response data
        $("#preloader").fadeOut(800);
        $scope.response = response.data;
        if ($scope.response ){
          swal("successful!", "Product  Added ", "success");
          $scope.show_data();
        } else {
          swal("Error!", "failed action!", "error");

        }
      });
  }


  $scope.convert=function(str) {
    var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
    return [date.getFullYear(), mnth, day].join("-");
  }

  $scope.isCheckStatus=function(){
    if (!$scope.check) {
      $scope.check = 1;
      $scope.c_status=1
    } else {
      $scope.check = 0;
      $scope.c_status=0
    }
  }

  $scope.isCheckShip=function(){
    if (!$scope.check_ship) {
      $scope.check_ship = 1;
      $scope.free_ship=1
    } else {
      $scope.check_ship = 0;
      $scope.free_ship=0
    }
  }



});
</script>
<?=include 'inc/footer.php';?>
