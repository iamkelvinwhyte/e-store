<?=include 'inc/header.php';?>
<?=include 'inc/nav_bar.php';?>
<?=include 'inc/side_bar.php';?>



<div class="page-body">


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

            </div>
            <div class="table-responsive">
              <div class="user-status table-responsive latest-order-table">
                <table class="table table-bordernone">
                  <thead>
                    <tr>

                      <th scope="col">Title </th>
                      <th scope="col">Amount</th>
                      

                    </tr>
                  </thead>
                  <tbody dir-paginate="i in getdata|orderBy:sortKey:reverse|filter:userSearch|itemsPerPage:20">
                    <tr>

                      <td>{{i.title}}</td>
                      <td >{{i.price}}</td>


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


<script>


var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
  $("#preloader").fadeOut(800);

  $scope.show_data = function() {
    $http.get("<?=base_url()?>main/get_new_products")
    .then(function (response) {
      //alert("Yes");
      $scope.getdata = response.data; //data call
      console.log($scope.getdata, "gotten Products")
    });


    $http.get("<?=base_url()?>app/get_countries")
    .then(function (response) {
      $scope.get_countries = response.data; //data call
      console.log($scope.get_countries, "states");
    });

  }



});
</script>

<?=include 'inc/footer.php';?>