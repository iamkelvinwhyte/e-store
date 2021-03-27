<?php include 'inc/header2.php';?>

<?php include 'inc/nav.php';?>

<?php
$string_color=$data_product->color;
$string_size=$data_product->size;
$array_size = explode(',', $string_size);
$array_color = explode(',', $string_color);
$rate=$this->session->userdata('rate');
$currency=$this->session->userdata('currency');
?>

<!--Shop Page-->
<div class="site-main clearfix" >
  <div class="col-md-7">
    <div class="row">
      <div id="shop-product-slider" class=" shop-product-slider carousel slide">
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="<?=base_url()?>uploads/<?=isset($data_product->file) ? $data_product->file:" "?>" alt="Product details slide 1"/>
          </div>
          <div class="item">
            <img src="<?=base_url()?>uploads/<?=isset($data_product->file_1) ? $data_product->file_1:" "?>" />
          </div>
          <?php if(empty($data_product->file_2)){}else{?>
            <div class="item">
              <img src="<?=base_url()?>uploads/<?=isset($data_product->file_2) ? $data_product->file_2:" "?>" />
            </div>
          <?php }?>
          <?php if(empty($data_product->file_3)){}else{?>
            <div class="item">
              <img src="<?=base_url()?>uploads/<?=isset($data_product->file_3) ? $data_product->file_3:" "?>" />
            </div>
          <?php }?>
          <?php if(empty($data_product->file_4)){}else{?>
            <div class="item">
              <img src="<?=base_url()?>uploads/<?=isset($data_product->file_4) ? $data_product->file_4:" "?>" />
            </div>
          <?php }?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#shop-product-slider" role="button" data-slide="prev">
          <img src="<?=base_url()?>assets/frontend/images//Shop/shop-slider-arrow-left.png" alt="arrow-left"/>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#shop-product-slider" role="button" data-slide="next">
          <img src="<?=base_url()?>assets/frontend/images/Shop/shop-slider-arrow-right.png" alt="arrow-right"/>
          <span class="sr-only">Next</span>
        </a>
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#shop-product-slider" data-slide-to="0" class="active"></li>
          <li data-target="#shop-product-slider" data-slide-to="1"></li>
          <li data-target="#shop-product-slider" data-slide-to="2"></li>
          <li data-target="#shop-product-slider" data-slide-to="3"></li>
          <li data-target="#shop-product-slider" data-slide-to="4"></li>
        </ol>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="row">
      <div class="product">
        <div class="itable">
          <div class="icell">
            <div class="entry-summary">
              <h1 class="product_title"><?=isset($data_product->title) ? $data_product->title:" "?></h1>
              <div class="total-price">
                <p class="price">
                  <span class="Price-amount">
                    <span class="Price-currencySymbol" ng-repeat="c in active_currency">{{c.symbol}}</span>
                    <?=isset($data_product->price) ? $data_product->price:" "?>
                  </span>
                </p>
              </div>
              <div class="description">
                <div class="panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title text_limit" >
                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?=isset($data_product->descrip) ? $data_product->descrip:" "?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <?=isset($data_product->descrip) ? $data_product->descrip:" "?>
                    </div>
                  </div>
                  <ul class="details">
                    <a href="#collapseOne" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                      <li></li>
                      <li></li>
                      <li></li>
                    </a>
                  </ul>
                </div>
              </div>

              <div class="wrap-select row">
                <div class="col-md-4">
                <div class="product-quantity spinner select-color" data-trigger="spinner">
                  <input type="text" class="qty" ng-model="qty" value="1" data-rule="quantity" id="qty"/>
                  <div class="spinner-controls">
                    <a href="javascript:;" data-spin="up" class="spin-up">+</a>
                    <a href="javascript:;" data-spin="down" class="spin-down">-</a>
                  </div>
                </div>
              </div>
                <div class="col-md-4">
                <select name="size"  class="" id="size">
                  <option value="NA" selected>Select Size</option>
                  <?php foreach ($array_size as $key ): ?>
                    <option value="<?=$key?>"><?=$key?></option>
                  <?php endforeach; ?>
                </select>
              </div>
                <div class="col-md-4">
                <select name="color"  class="" id="color">
                  <option value="NA" selected>Select Color</option>
                  <?php foreach ($array_color as $key ): ?>
                    <option value="<?=$key?>"><?=$key?></option>
                  <?php endforeach; ?>
                </select>
                </div>
              </div>


              <p class="button">
                <input type="submit" class="button" ng-click="addItem('<?=$data_product->product_code?>','<?=$data_product->title?>','<?=($data_product->price * $rate)-($data_product->discount * $rate)?>','<?=$data_product->file?>')" value="add to cart" />
              </p>
              <p class="free-shipping">
                <a href="#">FREE SHIPPING ON ORDERS 70USD+</a>
              </p>
              <p class="link-for-size-guide">
                <a href="size-guide.html">size guide</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<footer class="footer">
  <!-- <div class="col-sm-12">
  <div class="share-product">
  <span>Share Product</span>
  <a href="https://www.facebook.com/" target="_blank">
  <i class="fa fa-facebook"></i>
</a>
<a href="https://twitter.com/" target="_blank">
<i class="fa fa-twitter"></i>
</a>
<a href="https://ru.pinterest.com/" target="_blank">
<i class="fa fa-pinterest"></i>
</a>
</div>
</div> -->

<div class="row">
  <div class=" col-md-12 col-sm-12">
    <!--Coments Area-->
    <div class="comment-area">
      <h3 class="comment-title"> comments</h3>
      <ol class="comment-list">
        <!--Coments 1-->
        <li class="comment depth-1 ">
          <article class="comment-body">
            <div class="comment-avatar">
              <div class="avatar">
                <img src="<?=base_url()?>assets/frontend/images/Post/coments-avatar.jpg" alt="Avatar"/>
              </div>
            </div>
            <div class="comment-aside">
              <div class="comment-meta">
                <span class="comment-autaor">
                  <a href="#" class="link-author">Emilie Carman</a>
                </span>
              </div>

              <div class="comment-content">
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                  Vestibulum tempus congue varius. Donec posuere consectetur lorem non vulputate.
                  Donec tincidunt eget lectus quis elementum. Phasellus a tristique elit.
                  In sagittis lacus non congue fringilla.
                </p>
              </div>
            </div>
          </article>
        </li>

      </ol>
      <!--Form-->
      <form action="#" class="comment-form">
        <p class="comment-form-comment">
          <input type="text" class="required" placeholder="name"/>
        </p>

        <p class="comment-form-comment">
          <textarea class="required" placeholder="message"></textarea>
        </p>
        <p class="form-submit">
          <button type="submit" class="submit btn btn-1">Send Comment</button>
        </p>
      </form>
    </div>
  </div>
</div>

</footer>
</div>


<!-- AngularJS Script -->
<script>


var Stock = angular.module('myStore', ['angularUtils.directives.dirPagination']);
Stock.controller("StoreCtrl", function($scope, $http) {
  $("#preloader").fadeOut(800);

  $scope.btnName = "Create";
  $scope.qty=1;
  $scope.delivery =localStorage.getItem("delivery");
  $scope.coupon_p =localStorage.getItem("ccp");

  $scope.show_data = function() {
    $http.get("<?=base_url()?>app/get_product_list/<?=$this->uri->segment(3)?>")
    .then(function (response) {
      $scope.get_product = response.data; //data call

      
    });


    $http.get("<?=base_url()?>app/get_active_currency/")
    .then(function (response) {
      $scope.active_currency = response.data; //data call
      console.log($scope.active_currency, "Currency")
      
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

  $scope.color="";
  $scope.size="";

  $scope.addItem = function(product_id,title,sell,photo) {
    //set new store ID
    var qty = document.getElementById('qty').value;
    var color = document.getElementById('color').value;
    var size = document.getElementById('size').value;
    $scope.product_id=product_id;
    $scope.title=title;
    $scope.sell=sell;
    $scope.photo=photo;
    var found = false;
    
    $scope.AllItemList.forEach(function (item) {
      if (item.product_id === product_id) {
        item.qty++;
        found = true;
      }
    });
    
    if (!found) {
      $scope.AllItemList.push({ qty: qty, cost: sell, description: title,  product_id: product_id, photo: photo,color:color,size:size});
    }
    localStorage.setItem("AllItemList", JSON.stringify($scope.AllItemList));
    $scope.cart_no=$scope.AllItemList.length;
    console.log($scope.AllItemList)
    swal({
      title: "Item Added To Cart",
      // text: "You clicked the button!",
      icon: "success",
      button: "OK",
    });


  };

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

  // Calculates the tax of the invoice
  $scope.calculateTax = function() {
    return (($scope.vat * $scope.invoiceSubTotal())/100);
  };


  $scope.addWishList = function(product_id,p_name,sell,photo) {
    //set new store ID
    $scope.product_id=product_id;
    $scope.p_name=p_name;
    $scope.sell=sell;
    $scope.photo=photo;

    var found = false;
    $scope.AllWishList.forEach(function (item) {
      if (item.product_id === product_id) {
        item.qty++;
        found = true;
      }
    });
    if (!found) {
      $scope.AllWishList.push({ qty: $scope.qty, cost: sell, description: p_name,  product_id: product_id, photo: photo});
    }
    localStorage.setItem("AllWishList", JSON.stringify($scope.AllWishList));
    console.log($scope.AllWishList)
    swal({
      title: "Item Added To Your WishList",
      // text: "You clicked the button!",
      icon: "success",
      button: "OK",
    });


  };




});
</script>
<?php include 'inc/footer2.php';?>
