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
            <h3>Dashboard
              <small><?=$this->config->item('site_name');?></small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->

  <!-- Container-fluid starts-->
  <div class="container-fluid" ng-app="myStore" ng-controller="StoreCtrl" ng-init="show_data()" ng-cloak>
    <div class="row">
      <div class="col-xl-3 col-md-6 xl-50">
        <div class="card o-hidden widget-cards">
          <div class="bg-warning card-body">
            <div class="media static-top-widget row">
              <div class="icons-widgets col-4">
                <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
              </div>
              <div class="media-body col-8"><span class="m-0">Earnings</span>
                <h3 class="mb-0">$ <span class="counter">6659</span><small> This Month</small></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 xl-50">
        <div class="card o-hidden  widget-cards">
          <div class="bg-secondary card-body">
            <div class="media static-top-widget row">
              <div class="icons-widgets col-4">
                <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
              </div>
              <div class="media-body col-8"><span class="m-0">Products</span>
                <h3 class="mb-0">$ <span class="counter">9856</span><small> This Month</small></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 xl-50">
        <div class="card o-hidden widget-cards">
          <div class="bg-primary card-body">
            <div class="media static-top-widget row">
              <div class="icons-widgets col-4">
                <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
              </div>
              <div class="media-body col-8"><span class="m-0">Messages</span>
                <h3 class="mb-0">$ <span class="counter">893</span><small> This Month</small></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 xl-50">
        <div class="card o-hidden widget-cards">
          <div class="bg-danger card-body">
            <div class="media static-top-widget row">
              <div class="icons-widgets col-4">
                <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
              </div>
              <div class="media-body col-8"><span class="m-0">New Vendors</span>
                <h3 class="mb-0">$ <span class="counter">45631</span><small> This Month</small></h3>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Sales Status</h5>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left"></i></li>
                <li><i class="view-html fa fa-code"></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
                <li><i class="icofont icofont-error close-card"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-xl-3 col-sm-6 xl-50">
                <div class="order-graph">
                  <h6>Orders By Location</h6>
                  <div class="chart-block chart-vertical-center">
                    <canvas id="myDoughnutGraph"></canvas>
                  </div>
                  <div class="order-graph-bottom">
                    <div class="media">
                      <div class="order-color-primary"></div>
                      <div class="media-body">
                        <h6 class="mb-0">Saint Lucia <span class="pull-right">$157</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-color-secondary"></div>
                      <div class="media-body">
                        <h6 class="mb-0">Kenya <span class="pull-right">$347</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-color-danger"></div>
                      <div class="media-body">
                        <h6 class="mb-0">Liberia<span class="pull-right">$468</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-color-warning"></div>
                      <div class="media-body">
                        <h6 class="mb-0">Christmas Island<span class="pull-right">$742</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-color-success"></div>
                      <div class="media-body">
                        <h6 class="mb-0">Saint Helena <span class="pull-right">$647</span></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 xl-50">
                <div class="order-graph sm-order-space">
                  <h6>Sales By Location</h6>
                  <div class="peity-chart-dashboard text-center">
                    <span class="pie-colours-1">4,7,6,5</span>
                  </div>
                  <div class="order-graph-bottom sales-location">
                    <div class="media">
                      <div class="order-shape-primary"></div>
                      <div class="media-body">
                        <h6 class="mb-0 mr-0">Germany <span class="pull-right">25%</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-shape-secondary"></div>
                      <div class="media-body">
                        <h6 class="mb-0 mr-0">Brasil <span class="pull-right">10%</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-shape-danger"></div>
                      <div class="media-body">
                        <h6 class="mb-0 mr-0">United Kingdom<span class="pull-right">34%</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-shape-warning"></div>
                      <div class="media-body">
                        <h6 class="mb-0 mr-0">Australia<span class="pull-right">5%</span></h6>
                      </div>
                    </div>
                    <div class="media">
                      <div class="order-shape-success"></div>
                      <div class="media-body">
                        <h6 class="mb-0 mr-0">Canada <span class="pull-right">25%</span></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 xl-100">
                <div class="order-graph xl-space">
                  <h6>Revenue for last month</h6>
                  <div class="ct-4 flot-chart-container"></div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>




      <div class="col-xl-12 xl-100">
        <div class="card">
          <div class="card-header">
            <h5>Latest Orders</h5>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left"></i></li>
                <li><i class="view-html fa fa-code"></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
                <li><i class="icofont icofont-error close-card"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="user-status table-responsive latest-order-table">
              <table class="table table-bordernone">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Total</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td class="digits">$120.00</td>
                    <td class="font-danger">Bank Transfers</td>
                    <td class="digits">On Way</td>
                  </tr>

                </tbody>
              </table>
              <a href="order.html" class="btn btn-primary">View All Orders</a>
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


  }





});
</script>
<?=include 'inc/footer.php';?>
