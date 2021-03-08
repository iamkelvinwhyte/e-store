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
            <h3>Page List
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Page List</li>
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
            <h5>Page List </h5>
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
                      <th scope="col">Meta title</th>
                      <th scope="col">Meta Description</th>

                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody dir-paginate="x in getdata|orderBy:sortKey:reverse|filter:userSearch|itemsPerPage:20">
                    <tr>

                      <td>{{x.page_name}}</td>
                      <td >{{x.meta_title}}</td>
                      <td >{{x.meta_des}}  </td>


                      <td>
                        <button class="btn-sm btn-primary" type="button"  ng-show="x.page_status==1" ng-click="lock_page(x.pages_id,0)">lock</button>
                      <button class="btn-sm btn-success" type="button"  ng-show="x.page_status==0" ng-click="lock_page(x.pages_id,1)">open</button>
                    </td>
                    <td > <a  href="<?=base_url()?>main/page_detail/{{x.page_code}}" class="btn-sm btn-info" type="button" >edit</a>- <button class="btn-sm btn-primary" type="button"  ng-click="delete_page(x.pages_id)">delete</button>
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
    $http.get("<?=base_url()?>main/get_page")
    .then(function (response) {
      $scope.getdata = response.data; //data call
    });

  }


  //lock and open page
  $scope.lock_page = function(pages_id,status) {
    if (confirm("Are you sure you want to perform this action? ")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/lock_page", {
        'pages_id': pages_id,
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

  //delete page
  $scope.delete_page = function(pages_id) {
    if (confirm("Are you sure you want to perform this action?")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/delete_page", {
        'pages_id': pages_id,
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
