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
    <input type="text"  class="form-control" placeholder="Quick  Search.." ng-model="product_search">
    <br>
    <div class="row products-admin ratio_asos">
        <div class="col-xl-3 col-sm-6" dir-paginate="x in get_product_list|orderBy:sortKey:reverse|filter:product_search|itemsPerPage:20">
            <div class="card">
                <div class="card-body product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="#"><img src="<?=base_url()?>uploads/{{x.file}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            <div class="product-hover">
                                <ul>
                                    <li>
                                        <button class="btn" type="button" data-original-title="" title=""><i class="ti-pencil-alt"></i></button>
                                    </li>
                                    <li>
                                        <button class="btn" type="button" data-toggle="modal" data-target="#exampleModalCenter" data-original-title="" title=""><i class="ti-trash"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </div>

                            <h6 class="text_limit">{{x.title}}</h6>

                        <h5>{{x.price | currency:""}} <del>{{x.price | currency:""}}</del></h5>
    <a  href="<?=base_url()?>main/product_detail/{{x.product_code}}" class="btn-sm btn-info" type="button" >edit</a>  -
      <a href="#" class="btn-sm btn-primary" type="button"  ng-click="lock_product(x.product_code,0)" ng-show="x.status==1">lock</a>
      <a href="#" class="btn-sm btn-success" type="button"  ng-click="lock_product(x.product_code,1)" ng-show="x.status==0">open</a>

       -
    <a href="#" class="btn-sm btn-warning" type="button"  ng-click="delete_product(x.product_code)">delete</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Pagination -->
    <dir-pagination-controls
    max-size="20"
    direction-links="true"
    boundary-links="true" >
  </dir-pagination-controls>
  <!--Pagination -->
  </div>
  <!-- Container-fluid Ends-->
</div>
<!-- AngularJS Script -->
<script>


var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
$("#preloader").fadeOut(800);

  $scope.show_data = function() {
    $http.get("<?=base_url()?>main/get_product_list")
    .then(function (response) {
      $scope.get_product_list = response.data; //data call
    });

  }


  //delete product
  $scope.delete_product = function(product_code) {
    if (confirm("Are you sure you want to perform this action? you can't revert back ")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/delete_product", {
        'product_code': product_code,
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


  //lock and open product
  $scope.lock_product = function(product_code,status) {
    if (confirm("Are you sure you want to perform this action? ")) {
        $("#preloader").fadeIn(800);
      $http.post("<?=base_url()?>main/lock_product", {
        'product_code': product_code,
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




});
</script>
<?=include 'inc/footer.php';?>
