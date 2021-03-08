<?php include 'inc/header.php';?>
<?php include 'inc/nav.php';?>
<!--Checkout Page-->
<div class="site-main clearfix">
    <div class="container">
        <div class="row">
            <div class="shop-checkout" style="margin-top: 5em;">
                <div class="col-sm-12" >


                </div>
                <div class="col-sm-12">
                    <form action="#" class="checkout" method="POST">
                        <div class="col2-set" id="customer_details">
                          <div class="col-1 ">
                              <div class="shipping-fields">
                                  <h3>Your Order</h3>
                                  <table class="checkout-review-order-table">
                                      <thead>
                                          <!-- <tr>
                                            <th>Image</th>
                                              <th>Product</th>
                                              <th>Total</th>

                                          </tr> -->
                                      </thead>
                                      <tbody>
                                          <tr class="cart_item" ng-repeat="item in AllItemList track by $index">
                                            <td class="product">
                                              <div class="product-thumbnail">
                                                  <a href="<?=base_url()?>app/shop_page/{{item.product_id}}"><img src="<?=base_url()?>uploads/{{item.photo}}" alt="{{item.description}}"/></a>
                                              </div>
                                            </td>
                                              <td  class="product">

                                                  <div class="product-info">
                                                      <div class="product-name">
                                                          <a href="<?=base_url()?>app/shop_page/{{item.product_id}}">{{item.description}}   x {{item.qty}}</a>
                                                      </div>
                                                      <div class="product-size-color">
                                                        <span>{{item.size  | uppercase}}/{{item.color | uppercase}}</span>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td  class="product">
                                                  <span class="Price-amount">
                                                      <span class="Price-currencySymbol"></span>
                                                      <span>  {{item.cost   | currency : "" }}</span>
                                                  </span>
                                              </td>
                                          </tr>

                                      </tbody>
                                      <tfoot>
                                          <tr class="cart-subtotal">
                                              <th>Subtotal</th>
                                              <td>
                                                  <span class="Price-amount">
                                                      <span class="Price-currencySymbol"></span>
                                                    {{invoiceSubTotal() | currency : "" }}
                                                  </span>
                                              </td>
                                          </tr>

                                          <tr class="order-total">
                                              <th>Total</th>
                                              <td>
                                                  <span class="Price-amount">
                                                      <span class="Price-currencySymbol"></span>
                                                    {{invoiceSubTotal() | currency : "" }}
                                                  </span>
                                              </td>
                                          </tr>
                                      </tfoot>
                                  </table>

                              </div>
                          </div>
                            <div class="col-2 ">
                                <div class="billing-fields">
                                    <h3>Billing details</h3>
                                    <p class="form-row">
                                        <label for="billing_first_name">
                                            First Name
                                        </label>
                                        <input type="text" class="input-text" name="billing_first_name" id="billing_first_name" placeholder=" First Name" value="<?=$this->session->userdata('first_name')?>"/>
                                    </p>
                                    <p class="form-row">
                                        <label for="billing_last_name">
                                            Last Name
                                        </label>
                                        <input type="text" class="input-text" name="billing_last_name" id="billing_last_name" placeholder="Last Name"  value="<?=$this->session->userdata('last_name')?>" />
                                    </p>

                                    <p class="form-row">
                                        <label for="billing_Email_Address">
                                            Email Address
                                        </label>
                                        <input type="email" class="input-text" name="billing_Email_Address" id="billing_Email_Address" placeholder=" Email Address" value="<?=$this->session->userdata('email')?>" readonly/>
                                    </p>
                                    <p class="form-row">
                                        <label for="billing_Phone">
                                            Phone
                                        </label>
                                        <input type="number" class="input-text" name="billing_Phone" id="billing_Phone" placeholder=" Phone" value="<?=$this->session->userdata('phone')?>"/>
                                    </p>
                                    <p class="form-row">
                                        <label for="select-country">
                                            Country
                                        </label>
                                        <select name="select-country" class="select-country" id="select-country">
                                            <option value="" disabled selected>Select your option</option>

                                            <option value="ZWE">Zimbabwe</option>
                                        </select>
                                    </p>
                                    <p class="form-row">
                                        <label for="billing_Address">
                                            Address
                                        </label>
                                        <input type="text" class="input-text" name="billing_Address" id="billing_Address" placeholder=" Address" value="<?=$this->session->userdata('address')?>"/>
                                    </p>
                                    <p class="form-row">
                                        <label for="billing_Town_City">
                                            Town / City
                                        </label>
                                        <input type="text" class="input-text" name="billing_Town_City" id="billing_Town_City" placeholder=" Town / City" value="<?=$this->session->userdata('state')?>"/>
                                    </p>

                                    <p class="form-row">
                                        <label for="billing_Postcode">
                                            Postcode
                                        </label>
                                        <input type="text" class="input-text" name="billing_Postcode" id="billing_Postcode" placeholder=" Postcode" value="<?=$this->session->userdata('post_code')?>"/>
                                    </p>
                                </div>
                                <div class="shipping-fields">


                                    <p class="form-row">
                                        <label for="Ship_Order_Notes">
                                            Order Notes
                                        </label>
                                        <textarea type="text" class="input-text" name="Ship_Order_Notes" id="Ship_Order_Notes" placeholder=" Order Notes"></textarea>
                                    </p>
                                </div>

                                <div class="checkout-review-order">

                                    <div class="checkout-payment">
                                        <ul class="payment_methods">
                                            <li class="payment_method payment_method_transfer_banck">
                                                <input type="radio" class="input-checkbox" checked name="payment-method" id="payment_method_transfer_banck"/>
                                                <label for="payment_method_transfer_banck">
                                                        Direct bank Transfer
                                                </label>
                                            </li>
                                            <li class="payment_method payment_method-cheque">
                                                <input type="radio" class="input-radio" name="payment-method" id="payment_method-cheque"/>
                                                <label for="payment_method-cheque">
                                                    Cheque Payment
                                                </label>
                                            </li>

                                        </ul>
                                    </div>
                                    <input type="submit" class="button"/>
                                </div>


                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'inc/footer.php';?>
