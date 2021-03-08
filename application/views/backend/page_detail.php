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
            <h3>Page Create
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">Page</li>
            <li class="breadcrumb-item active">create Page</li>
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
            <h5>Add Page</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" data-original-title="" title="">General</a></li>
                <li class="nav-item"><a class="nav-link" id="seo-tabs" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false" data-original-title="" title="">SEO</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form class="needs-validation">
                        <h4>General</h4>
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Name</label>
                            <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" ng-model="page_name">
                        </div>
                        <div class="form-group row editor-label">
                            <label class="col-xl-3 col-md-4"><span>*</span> Description</label>
                            <div class="col-xl-8 col-md-7 editor-space">
                                <textarea id="editor1" name="editor1" rows="10" cols="80"><?=$data_page->page_des?></textarea>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
                    <form class="needs-validation">
                        <h4>SEO</h4>
                        <div class="form-group row">
                            <label for="validationCustom2" class="col-xl-3 col-md-4">Meta Title</label>
                            <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="text" ng-model="meta_title " >
                        </div>
                        <div class="form-group row editor-label">
                            <label class="col-xl-3 col-md-4">Meta Description</label>
                            <textarea rows="4" class="col-xl-8 col-md-7" ng-model="meta_des" id="meta_des"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" ng-click="add_page()">Save</button>
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

$scope.page_name="<?=$data_page->page_name?>"
$scope.meta_title="<?=$data_page->meta_title?>"
$scope.meta_des="<?=$data_page->meta_des?>"
$scope.pages_id="<?=$data_page->pages_id?>"


  $scope.show_data = function() {
    $http.get("")
    .then(function (response) {
      $scope.getPlan = response.data; //data call
    });

  }


  $scope.add_page = function() {
    var fd = new FormData();

    var editor1 = CKEDITOR.instances.editor1.getData();
    var meta_des = document.getElementById('meta_des').value;
    fd.append('page_name',$scope.page_name);
    fd.append('page_des',editor1);
    fd.append('meta_title',$scope.meta_title);
    fd.append('meta_des',meta_des);
    fd.append('pages_id',$scope.pages_id);


    if($scope.page_name==null){
      swal("Error!", "Page Name is required", "error");
      return false;
    }
      $("#preloader").fadeIn(800);
      // AJAX request
      $http({
        method: 'post',
        url: "<?=base_url()?>main/update_page",
        data: fd,
        headers: {'Content-Type': undefined},
      }).then(function successCallback(response) {
        // Store response data
        $("#preloader").fadeOut(800);
        $scope.response = response.data;
        if ($scope.response ){
          swal("successful!", "Page  Updated ", "success");
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
<!-- CK Editor -->
      <script src="<?=base_url()?>assets/backend/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
      <!-- Bootstrap WYSIHTML5 -->

      <script type="text/javascript">
          $(function() {
              // Replace the <textarea id="editor1"> with a CKEditor
              // instance, using default configuration.
              CKEDITOR.replace('editor1');
              //bootstrap WYSIHTML5 - text editor
              $(".textarea").wysihtml5();
          });
      </script>
