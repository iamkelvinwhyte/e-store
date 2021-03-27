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
            <h3>Sub Category
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Sub Category</li>
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
            <h5>Products Sub Category</h5>
          </div>
          <div class="card-body">
            <div class="btn-popup pull-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Sub Category</button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Physical Product</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      <form class="needs-validation">
                        <div class="form">
                          <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Category Name :</label>
                            <select class="form-control"  ng-model="cate_name">
                              <option value="">Select Category</option>
                              <option ng-repeat="s in getCate " value="{{s.category_id}}"> {{s.name}}</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Sub Category Name :</label>
                            <input class="form-control"   ng-model="sub_name" type="text" placeholder="Electronic ">
                          </div>
                          <div class="form-group mb-0">
                            <label for="validationCustom02" class="mb-1">Sub Category Image :</label>
                            <input class="form-control" type="file"  accept="image/*"  id="file" type="file">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="button" ng-click="add_sub_category()"> Save</button>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <div class="user-status table-responsive latest-order-table">
                <table class="table table-bordernone">
                  <thead>
                    <tr>
                      <th scope="col">Category </th>
                      <th scope="col">Sub Category </th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody dir-paginate="x in getSubCate|orderBy:sortKey:reverse|filter:userSearch|itemsPerPage:20">
                    <tr>
                      <td>{{x.name}}</td>
                      <td >{{x.sub_name}}</td>
                      <td ></td>
                      <td >  <button class="btn-sm btn-danger" type="button"  ng-click="delete_sub_category(x.sub_category_id)">delete</button></td>
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
    $http.get("<?=base_url()?>main/getcategory")
    .then(function (response) {
      $scope.getCate = response.data; //data call
    });

    $http.get("<?=base_url()?>main/getsub_category")
    .then(function (response) {
      $scope.getSubCate = response.data; //data call
    });

  }


  $scope.add_sub_category  = function() {

    var fd = new FormData();
    var files = document.getElementById('file').files[0];
    fd.append('file',files);
    fd.append('name',$scope.cate_name);
    fd.append('sub_name',$scope.sub_name);

    if($scope.cate_name==null){
      swal("Error!", "Category name is required", "error");
      return false;
    }else{
      $("#preloader").fadeIn(800);
      // AJAX request
      $http({
        method: 'post',
        url: "<?=base_url()?>main/add_sub_category",
        data: fd,
        headers: {'Content-Type': undefined},
      }).then(function successCallback(response) {
        // Store response data
        $("#preloader").fadeOut(800);
        $scope.response = response.data;
        if ($scope.response ){
          swal("successful!", "Sub Category added ", "success");
          $scope.show_data();
        } else {
          swal("Error!", "fail action!", "error");

        }
      });
    }
  }

  //delete category
  $scope.delete_sub_category = function(category_id) {
    if (confirm("Are you sure you want to perform this action?")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/delete_sub_category", {
        'sub_category_id': category_id,
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
