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
            <h3>User List
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">User List</li>
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
            <h5>User List </h5>
          </div>
          <div class="card-body">
            <div class="btn-popup pull-right">
                <a href="<?=base_url()?>main/user_create" class="btn btn-secondary">Create User</a>
            </div>
            <div class="btn-popup pull-right">

            </div>
            <div class="table-responsive">
              <div class="user-status table-responsive latest-order-table">
                <table class="table table-bordernone">
                  <thead>
                    <tr>

                      <th scope="col">Full Name </th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>

                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody dir-paginate="x in getdata|orderBy:sortKey:reverse|filter:userSearch|itemsPerPage:20">
                    <tr>

                      <td>{{x.name}}</td>
                      <td >{{x.email}}</td>
                      <td >{{x.phone}}  </td>


                      <td>
                        <button class="btn-sm btn-primary" type="button"  ng-show="x.active==1" ng-click="lock_page(x.personal_info_id,0)">lock</button>
                      <button class="btn-sm btn-success" type="button"  ng-show="x.active==0" ng-click="lock_page(x.personal_info_id,1)">open</button>
                    </td>
                    <td > <a  href="<?=base_url()?>main/user_detail/{{x.institution_id}}" class="btn-sm btn-info" type="button" >edit</a>- <button class="btn-sm btn-primary" type="button"  ng-click="delete_page(x.institution_id)">delete</button>
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
    $http.get("<?=base_url()?>main/get_user")
    .then(function (response) {
      $scope.getdata = response.data; //data call
    });

  }


  //lock and open user
  $scope.lock_page = function(personal_info_id,status) {
    if (confirm("Are you sure you want to perform this action? ")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/lock_user", {
        'personal_info_id': personal_info_id,
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

  //delete user
  $scope.delete_page = function(institution_id) {
    if (confirm("Are you sure you want to perform this action?")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/delete_user", {
        'institution_id': institution_id,
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
