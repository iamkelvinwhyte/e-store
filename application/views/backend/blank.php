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
            <h3>Product List
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">Physical</li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->



  <!-- Container-fluid starts-->
  <div class="container-fluid" ng-app="myStore" ng-controller="StoreCtrl" ng-init="show_data()" ng-cloak>

  </div>
  <!-- Container-fluid Ends-->
</div>
<!-- AngularJS Script -->
<script>


var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
$("#preloader").fadeOut(800);

  $scope.show_data = function() {
    $http.get("<?=base_url()?>main/getPlan")
    .then(function (response) {
      $scope.getPlan = response.data; //data call
    });

  }


  $scope.add_category  = function() {

    var fd = new FormData();
    var files = document.getElementById('file').files[0];
    var name = document.getElementById('cate_name').value;

    fd.append('file',files);
    fd.append('name',name);

    if(!name){
      swal("Error!", "Category name is required", "error");
      return false;
    }else{
      $scope.loading=true
      // AJAX request
      $http({
        method: 'post',
        url: "<?=base_url()?>main/add_category",
        data: fd,
        headers: {'Content-Type': undefined},
      }).then(function successCallback(response) {
        // Store response data
        $scope.loading=false
        $scope.response = response.data;
        if ($scope.response ){
          swal("succesful!", "Category added ", "success");
        } else {
          swal("Error!", "fail action!", "error");

        }
      });
    }
  }




});
</script>
<?=include 'inc/footer.php';?>
