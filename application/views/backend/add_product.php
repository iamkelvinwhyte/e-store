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
            <h3>Add Product
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Add Product</li>
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
                        <h5>Add Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="row product-adding">
                            <div class="col-xl-5">
                                <div class="add-product">
                                    <div class="row">
                                        <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                          <div class="row">
                          <div class="col-md-6">  <img src=""  id="myImg"  alt="" class="img-fluid"></div>
                          <div class="col-md-6">  <img src=""  id="myImg_1"  alt="" class="img-fluid "></div>
                          <div class="col-md-6">  <img src=""  id="myImg_2"  alt="" class="img-fluid "></div>
                          <div class="col-md-6">  <img src=""  id="myImg_3"  alt="" class="img-fluid "></div>
                          <div class="col-md-6">  <img src=""  id="myImg_4"  alt="" class="img-fluid "></div>
                          <div class="col-md-6">  <img src=""  id="myImg_5"  alt="" class="img-fluid "></div>

                                          </div>


                                        </div>
                      <div class="col-xl-3 xl-50 col-sm-6 col-3">
                          <ul class="file-upload-product">
                              <li><div class="box-input-file"><input class="upload" id="file" type="file"><i class="fa fa-plus" ></i></div></li>
                              <li><div class="box-input-file"><input class="upload" id="file_1" type="file"><i class="fa fa-plus"></i></div></li>
                              <li><div class="box-input-file"><input class="upload" id="file_2" type="file"><i class="fa fa-plus"></i></div></li>
                              <li><div class="box-input-file"><input class="upload" id="file_3" type="file"><i class="fa fa-plus"></i></div></li>
                              <li><div class="box-input-file"><input class="upload" id="file_4" type="file"><i class="fa fa-plus"></i></div></li>
                              <li><div class="box-input-file"><input class="upload" id="file_5" type="file"><i class="fa fa-plus"></i></div></li>
                          </ul>
                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <form class="needs-validation add-product-form" novalidate="">
                                    <div class="form">

                                      <div class="form-group mb-3 row">
                                          <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category :</label>
                                          <select class="form-control col-xl-8 col-sm-7"  ng-model="cate_name" ng-change="get_sub_category()">
                                            <option value="">Select Category</option>
                                            <option ng-repeat="x in get_cate"  value="{{x.category_id}}"> {{x.name}}</option>
                                          </select>
                                      </div>

                                    
                                      <div class="form-group mb-3 row">
                                          <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub :</label>
                                          <select class="form-control col-xl-8 col-sm-7"  ng-model="sub_name">
                                            <option value="">Select Sub Category</option>
                                            <option ng-repeat="z in getSubCate " value="{{z.sub_category_id}}"> {{z.sub_name}}</option>
                                          </select>
                                      </div>
                                        <div class="form-group mb-3 row">
                                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                                            <input class="form-control col-xl-8 col-sm-7"  ng-model="title"  type="text" required="">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price :</label>
                                            <input class="form-control col-xl-8 col-sm-7" id="validationCustom02" ng-model="price" type="text" required="">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>

                                        <div class="form-group mb-3 row">
                                            <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Discount :</label>
                                            <input class="form-control col-xl-8 col-sm-7" id="validationCustom02" ng-model="discount" type="text" required="">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>

                                        <div class="form-group mb-3 row">
                                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Size :</label>
                                            <input class="form-control col-xl-8 col-sm-7"  ng-model="size"  type="text">
                                          <small style="color:red" class="col-md-12">Add size seprated by comma eg: L,XL,XXL</small>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Color :</label>

                                            <input class="form-control col-xl-8 col-sm-7"  ng-model="color"  type="text">
                                              <small style="color:red" class="col-md-12">Add colors seprated by comma eg: Red,Black,White</small>
                                          </div>
                                    </div>
                                    <div class="form">
                                      <div class="form-group row">
                                          <label class="col-xl-3 col-sm-4 mb-0">Quantity :</label>
                                          <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                              <div class="input-group">
                                                  <input class="form-control col-xl-8 col-sm-7"  type="text"  ng-model="qty" value="1">
                                              </div>
                                          </fieldset>
                                      </div>


                                        <div class="form-group row">
                                            <label class="col-xl-3 col-sm-4">Add Description :</label>
                                            <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                <textarea id="editor1" name="editor1" cols="50" rows="3" ng-model="descrip" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-xl-3 offset-sm-4">
                                        <button type="submit" class="btn btn-primary" ng-click="add_new_product()">Add</button>
                                        <button type="button" class="btn btn-light">Discard</button>
                                    </div>
                                </form>
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
  $scope.qty=1
  $scope.show_data = function() {
    $http.get("<?=base_url()?>main/getcategory")
    .then(function (response) {
      $scope.get_cate = response.data; //data call

    });
  }


  $scope.get_sub_category = function() {
  $("#preloader").fadeIn(800);
  $http.get("<?=base_url() ?>main/getsub_category_by/"+$scope.cate_name)
  .then(function (response) {
  $("#preloader").fadeOut(800);
  $scope.getSubCate = response.data; //data call

  });

  }


  $scope.add_new_product  = function() {

    var fd = new FormData();
    var files = document.getElementById('file').files[0];
    var files_1 = document.getElementById('file_1').files[0];
    var files_2 = document.getElementById('file_2').files[0];
    var files_3 = document.getElementById('file_3').files[0];
    var files_4 = document.getElementById('file_4').files[0];
    var files_5 = document.getElementById('file_5').files[0];

    fd.append('file',files);
    fd.append('file_1',files_1);
    fd.append('file_2',files_2);
    fd.append('file_3',files_3);
    fd.append('file_4',files_4);
    fd.append('file_5',files_5);

    fd.append('cate_name',$scope.cate_name);
    fd.append('sub_name',$scope.sub_name);
    fd.append('title',$scope.title);
    fd.append('price',$scope.price);
    fd.append('discount',$scope.discount);
    fd.append('qty',$scope.qty);
    fd.append('descrip',$scope.descrip);
    fd.append('size',$scope.size);
    fd.append('color',$scope.color);

    if(!files){
      swal("Error!", "A minimum of one image is required  to continue", "error");
      return false;
    }
    if($scope.title==null){
      swal("Error!", "Product title is required", "error");
      return false;
    }
    if($scope.price==null){
      swal("Error!", "Product Price is required", "error");
      return false;
    }
    if($scope.qty==null){
      swal("Error!", "Product quantity is required", "error");
      return false;
    }

      $("#preloader").fadeIn(800);
      // AJAX request
      $http({
        method: 'post',
        url: "<?=base_url()?>main/upload_new_product",
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


//IMAGE UPLOADS SCRIPT
window.addEventListener('load', function() {
  //FILE1
  document.querySelector('#file').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('#myImg');  // $('img')[0]
          img.src = URL.createObjectURL(this.files[0]); // set src to blob url

      }
  });

  //FILE1
  document.querySelector('#file_1').addEventListener('change', function() {
      if (this.files && this.files[0]) {
          var img = document.querySelector('#myImg_1');  // $('img')[0]
          img.src = URL.createObjectURL(this.files[0]); // set src to blob url

      }
  });
   //FILE2
    document.querySelector('#file_2').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var img = document.querySelector('#myImg_2');  // $('img')[0]
            img.src = URL.createObjectURL(this.files[0]); // set src to blob url

        }
    });

    //FILE3
     document.querySelector('#file_3').addEventListener('change', function() {
         if (this.files && this.files[0]) {
             var img = document.querySelector('#myImg_3');  // $('img')[0]
             img.src = URL.createObjectURL(this.files[0]); // set src to blob url

         }
     });
     //FILE4
      document.querySelector('#file_4').addEventListener('change', function() {
          if (this.files && this.files[0]) {
              var img = document.querySelector('#myImg_4');  // $('img')[0]
              img.src = URL.createObjectURL(this.files[0]); // set src to blob url

          }
      });

      //FILE5
       document.querySelector('#file_5').addEventListener('change', function() {
           if (this.files && this.files[0]) {
               var img = document.querySelector('#myImg_5');  // $('img')[0]
               img.src = URL.createObjectURL(this.files[0]); // set src to blob url

           }
       });

});

</script>
<?=include 'inc/footer.php';?>
