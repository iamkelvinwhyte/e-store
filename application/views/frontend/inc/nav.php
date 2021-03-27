<!-- Theme Menu -->
<style>
#currencyType {
  position: fixed;
  left: 0;
  top: 15%;
  width: 8em;
  margin-top: -2.5em;
  z-index:99;
  background:#3c336af2;
  border-radius: 10px;
  padding:0px!important;
  color:ghostwhite;
}
</style>
<div class="theme-menu">
    <a href="#" class="menu-header-close-button-mobile"></a>
    <div class="menu-header">
        <h3 class="menu-title">MENU</h3>
        <nav class="menu">
            <ul>

                <li class="menu-item-has-children">
                    <a href="#" class="menu-icon"></a>

                    <a href="<?=base_url()?>app">HOME</a>

                </li>
                <li class="menu-item-has-children">
                    <a href="#" class="menu-icon"></a>
                    <a href="<?=base_url()?>app/shop_menu">SHOP</a>
                    <ul class="sub-menu">
                      <?php foreach ($data_menu as $menu): ?>
                        <li><a href="<?=base_url()?>app/shop/<?=$menu['category_id']?>/<?=strtolower($menu['name'])?>"><?=strtoupper($menu['name'])?></a></li>
                      <?php endforeach ?>

                    </ul>
                </li>
                  <?php foreach ($data_page as $page): ?>
                  <li><a href=""><?=strtoupper($page['page_name'])?></a></li>
                  <?php endforeach ?>


            </ul>
        </nav>
        <div class="menu-log-in"><a href="<?=base_url()?>app/app_login">LOG IN</a></div>
    </div>
    <div class="menu-footer">
        <ul class="menu-social">
            <li class="social-icon">
                <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="social-icon">
                <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="social-icon">
                <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a>
            <li class="social-icon">
                <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
            </li>
        </ul>
    </div>
</div>
<!-- End Theme Menu -->
<div id="page" class="site invisible" >
    <!-- Header -->
    <header class="header">
        <div class="menu-link-wrap">
            <a href="#" class="menu-link">
                <span></span>
            </a>
        </div>
        <div class="logo-wrap">
            <a href="" class="theme-logo"><img src="<?=base_url()?>uploads/logo.png" height="35px"></a>
        </div>

        <!-- <div class="col-8">
            
                <select>
                    <option>NGN</option>
                    <option>USD</option>
                </select>
        </div> -->

        <div class="header-cart">
            <a href="#" class="cart-link">
                <strong>CART</strong>
                <span>{{cart_no}}</span></a>
        </div>
       

    </header>
   
    <!-- <ul id="currencyType">
<li><a href="#L384">Section 1</a>
<li><a href="#details">Section 2</a>
<li><a href="#FAQ">Section 3</a>
</ul> -->
    <!-- End Header -->
