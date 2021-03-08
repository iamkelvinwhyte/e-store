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
            <h3>Coupon List
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Coupon List</li>
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
        <div class="card">
          <div class="card-header">
            <h5>Coupon List </h5>
          </div>
          <div class="card-body">
            <div class="btn-popup pull-right">

            </div>
            <div class="table-responsive">
              <div class="user-status table-responsive latest-order-table">
                <table class="table table-bordernone">
                  <thead>
                    <tr>

                      <th scope="col">Name </th>
                      <th scope="col">Code</th>
                      <th scope="col">Discout</th>
                      <th scope="col">Start</th>
                      <th scope="col">End</th>
                      <th scope="col">Free Shipping</th>
                      <th scope="col">QTY</th>
                      <th scope="col"> Per Limit</th>
                      <th scope="col">Per Customer</th>

                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody dir-paginate="x in getdata|orderBy:sortKey:reverse|filter:userSearch|itemsPerPage:20">
                    <tr>

                      <td>{{x.c_title}}</td>
                      <td >{{x.c_code}}</td>
                      <td >{{x.value_discount}}
                         <span ng-show="x.discount_type==1"> % Percent</span>
                         <span ng-show="x.discount_type==2">  Fixed</span>
                      </td>
                      <td >{{x.s_date}}</td>
                      <td >{{x.e_date}}</td>
                      <td >
                         <span ng-show="x.free_ship==1"> Yes</span>
                         <span ng-show="x.free_ship==0">  No</span>
                      </td>
                      <td >{{x.qty}}</td>
                      <td >{{x.per_limit}}</td>
                      <td >{{x.per_cus}}</td>

                      <td>
                        <button class="btn-sm btn-primary" type="button"  ng-show="x.c_status==1" ng-click="lock_coupon(x.coupon_id,0)">lock</button>
                      <button class="btn-sm btn-success" type="button"  ng-show="x.c_status==0" ng-click="lock_coupon(x.coupon_id,1)">open</button>
                    </td>
                    <td >  <button class="btn-sm btn-primary" type="button"  ng-click="delete_coupon(x.coupon_id)">delete</button>
                    </td>
                    </tr>

                  </tbody>

                  <!--Pagination -->
                  <dir-pagination-controls
                  max-size="20"
                  direction-links="true"
                  boundary-links="true" >
                </dir-pagination-controls>
                <!--Pagination -->
              </table>

            </div>
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

  $scope.show_data = function() {
    $http.get("<?=base_url()?>main/get_coupon")
    .then(function (response) {
      $scope.getdata = response.data; //data call
    });

  }


  //lock and open coupon
  $scope.lock_coupon = function(coupon_id,status) {
    if (confirm("Are you sure you want to perform this action? ")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/lock_coupon", {
        'coupon_id': coupon_id,
        'status': status,
      })
      .then(function (response) {
          $("#preloader").fadeOut(800);
        swal("Successful!", "You action has been completed!", "success");
        $scope.show_data();
      });
    } else {
      return false;
    }

  }

  //delete category
  $scope.delete_coupon = function(coupon_id) {
    if (confirm("Are you sure you want to perform this action?")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/delete_coupon", {
        'coupon_id': coupon_id,
      })
      .then(function (response) {
          $("#preloader").fadeOut(800);
        swal("Successful!", "You action has been completed!", "success");
        $scope.show_data();
      });
    } else {
      return false;
    }

  }


});
</script>
<?=include 'inc/footer.php';?>
