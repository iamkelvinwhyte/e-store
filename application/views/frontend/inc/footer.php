
<!-- AngularJS Script -->
<script>


var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
  $("#preloader").fadeOut(800);
  $scope.btnName = "Create";
  $scope.qty=1;
  $scope.show_data = function() {
    $http.get("<?=base_url()?>app/get_product_list/<?=$this->uri->segment(3)?>")
    .then(function (response) {
      $scope.get_product = response.data; //data call
    });

    $http.get("<?=base_url()?>app/get_all_product_list/")
    .then(function (response) {
      $scope.get_all_product = response.data; //data call
      
    });

  }



  //Add Item to cart
  $scope.AllItemCheck=JSON.parse(localStorage.getItem("AllItemList"));
  $scope.AllWishCheck=JSON.parse(localStorage.getItem("AllWishList"));

  console.log($scope.AllItemCheck)
  $scope.cart_no=0;
  if($scope.AllItemCheck==null){
    $scope.AllItemList=[]
  }else{
    $scope.AllItemList=$scope.AllItemCheck;
    $scope.cart_no=$scope.AllItemList.length;
  }
  //WishList
  if($scope.AllWishCheck==null){
    $scope.AllWishList=[]
  }else{
    $scope.AllWishList=$scope.AllWishCheck;

  }

  // Remotes an item from the invoice
  $scope.removeItem = function(item) {
    $scope.AllItemList.splice($scope.AllItemList.indexOf(item), 1);
    localStorage.setItem("AllItemList", JSON.stringify($scope.AllItemList));

    $scope.cart_no=$scope.AllItemList.length;
    $scope.show_data();
  };

  // Calculates the sub total of the invoice
  $scope.invoiceSubTotal = function() {
    var total = 0.00;
    angular.forEach($scope.AllItemList, function(item, key) {
      total += (item.qty * item.cost  );
    });
    // return total-$scope.coupon_p;
        return total;
  };


});
</script>
<!-- Shop Cart -->
<div class="cart-wrapper">
<a href="#" class="shop-cart-close"></a>
<div class="cart-header">
    <h3 class="shop-cart-title">SHOPPING CART</h3>
    <ul class="shop_table shop_table_cart">
        <li class="cart_item clearfix" ng-repeat="item in AllItemList track by $index">
            <div class="product-thumbnail">
                <a href="<?=base_url()?>app/shop_page/{{item.product_id}}"><img src="<?=base_url()?>uploads/{{item.photo}}" alt="Product 1"/></a>
            </div>
            <div class="product-info">
                <div class="product-name">
                    <a href="">{{item.description}}</a>  <a title="Remove item" style="color:red; font-size:20px;" href="#" ng-click="removeItem(item)">×</a>
                </div>
                <div class="product-size-color">
                    <span>{{item.size  | uppercase}}/{{item.color | uppercase}}</span>
                </div>
                  <div class="col-md-3">
                <div class="product-quantity spinner" data-trigger="spinner">
                    <input type="text" class="qty" value="{{item.qty}}" data-rule="quantity"/>
                    <div class="spinner-controls">
                        <a href="javascript:;" data-spin="up" class="spin-up">+</a>
                        <a href="javascript:;" data-spin="down" class="spin-down">-</a>
                    </div>
                </div>
              </div>
                <div class="product-subtotal">
                    X  <span>{{item.cost   | currency : "" }}</span>
                </div>
            </div>
        </li>

    </ul>
</div>
<div class="cart-footer">
    <div class="cart-wrap-total-checkout clearfix">
        <div class="cart_total clearfix">
            <span class="cart-total-text">Subtotal</span>
            <span class="cart-total">{{invoiceSubTotal() | currency : "" }}</span>
        </div>
        <div class="proceed-to-checkout">
            <a href="<?=base_url()?>app/check_out_product" class="checkout-button"><span>Check Out</span></a>
        </div>
    </div>
</div>
</div>
<!-- End Shop Cart -->
<!-- main JS libs  -->
<script src="<?=base_url()?>assets/frontend/js/lib/jquery-1.12.2.min.js"></script>
<script src="<?=base_url()?>assets/frontend/js/lib/bootstrap.min.js"></script>
<!-- Modernizr Library -->
<script src="<?=base_url()?>assets/frontend/js/lib/modernizr.min.js"></script>

<!-- Input Number 'Spinner' -->
<script src="<?=base_url()?>assets/frontend/js/jquery.spinner.js"></script>
<!-- Slider Touch Swipe -->
<script src="<?=base_url()?>assets/frontend/js/jquery.touchSwipe.min.js"></script>

<!-- Selectize plugin -->
<script src="<?=base_url()?>assets/frontend/js/selectize.min.js"></script>
<!--General JS-->
<script src="<?=base_url()?>assets/frontend/js/general.js"></script>
</body>
</html>
