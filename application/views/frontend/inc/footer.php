
<!-- AngularJS Script -->
<script>


var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
  $("#preloader").fadeOut(800);
  $('input[name="billing_Email_Address"]').val("");
  $('input[name="billing_Phone"]').val("");
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

    $http.get("<?=base_url()?>app/get_active_currency/")
    .then(function (response) {
      $scope.active_currency = response.data; //data call      
    });


    $http.get("<?=base_url()?>app/get_all_currency/")
    .then(function (response) {
      $scope.all_currency = response.data; //data call
      console.log($scope.all_currency, "All Currency")
      
    });
    

  }

  function isNullOrEmpty(str){
    if(str === null || str === ""){
      return true
    }
    return false;
}

  $scope.add_checkout_info = function(){
    var fd = new FormData();
    var first_name = $('input[name="billing_first_name"]').val();
    var last_name = $('input[name="billing_last_name"]').val();
    var email = $('input[name="billing_Email_Address"]').val();
    var phone = $('input[name="billing_Phone"]').val();
    var country = $('input[name="select-country"]').val();
    var address = $('input[name="billing_Address"]').val();
    var city = $('input[name="billing_Town_City"]').val();
    var payment_method = $('input[name="payment-method"]').val();
    var fullname = first_name + " " + last_name;


if(isNullOrEmpty(last_name) || isNullOrEmpty(email) || isNullOrEmpty(phone) || isNullOrEmpty(address) || isNullOrEmpty(city)){
  swal("Attention!", "All Fields are required", "info");
  return false;
}


    
fd.append('fullname', fullname);
fd.append('email', email);
fd.append('phone', phone);
fd.append('country_id', country);
fd.append('delivery_address', address);
fd.append('town/city', city);
fd.append('payment_method_id', parseInt(payment_method));
fd.append('user_id', 0);

    swal("Proceed with the provided information?", {
    title:"Confirm",
    buttons: {
    confirm: {value:"confirm", text:"Confirm"},
    dangerMode: {
    text: "Cancel",
    visible: true,
    closeModal: true,
    className:'swal-btn'
  },
  },
  icon:"warning",
})
.then((value) => {
  switch (value) {
    case "confirm":
      $http({
      method: 'post',
      url: "<?=base_url()?>app/add_checkout_details",
      data: fd,
      headers: {'Content-Type': undefined},
    }).then(function successCallback(response) {
      $("#preloader").fadeOut(800);
      $scope.response = response.data;
      if ($scope.response && parseInt(payment_method) == 1){
        $("#preloader").fadeIn(800);
   
        setTimeout(function(){ window.location.replace("<?=base_url()?>app/bank_transfer_invoice"); }, 3000); 
      } else {
        swal("Error!", "Fail to resolve checkout details", "error");

      }
    });
    break;
    default:
      return false;
  }
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


  $("#currency_select").change(function(){
    var fd = new FormData();
    var s_currency = $("#currency_select").val();
    fd.append("currency", s_currency)
    $("#preloader").fadeIn(400);
    //alert(cc)

    $http({
        method: 'post',
        url: "<?=base_url()?>app/activate_currency",
        data: fd,
        headers: {'Content-Type': undefined},
      }).then(function successCallback(response) {
        window.location.reload(true);
        
      });
 })

});

</script>
<div id="preloader">
    <div class="preloader-position">
        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>
</div>
<!-- Shop Cart -->
<div id="currencyType" >
            
            <select id="currency_select">
                <option selected value="">Currency</option>
                <option value="NGN">NGN</option>
                <option value="USD">USD</option>
            </select>
  

    </div>
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
                <span class="simbol" ng-repeat="c in active_currency">{{c.symbol}}</span>  <span>{{item.cost   | currency : "" }}</span>
                </div>
            </div>
        </li>

    </ul>
</div>
<div class="cart-footer">
    <div class="cart-wrap-total-checkout clearfix">
        <div class="cart_total clearfix">
            <span class="cart-total-text">Subtotal</span>
            <span class="cart-total"><span class="simbol" ng-repeat="c in active_currency">{{c.symbol}}</span>{{invoiceSubTotal() | currency : "" }}</span>
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
