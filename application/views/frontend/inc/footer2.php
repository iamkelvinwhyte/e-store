<!-- Shop Cart -->
<div class="cart-wrapper">
<a href="#" class="shop-cart-close"></a>
<div class="cart-header">
    <h3 class="shop-cart-title">SHOPPING CART</h3>
    <ul class="shop_table shop_table_cart">
        <li class="cart_item clearfix" ng-repeat="item in AllItemList track by $index">
            <div class="product-thumbnail">
                <a href="<?=base_url()?>app/shop_page/{{item.product_id}}"><img src="<?=base_url()?>uploads/{{item.photo}}" alt="{{item.description}}"/></a>
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
                    X  <span>  {{item.cost   | currency : "" }}</span>
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
