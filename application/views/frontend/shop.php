<?php include 'inc/header.php';?>
<?php include 'inc/nav.php';?>

<!--Shop Page-->
<div class="site-main clearfix" style="margin-top: 5em;">
  <div class="shop-product-list shop-product-list-2-columns clearfix col-sm-12">
    <div class="row">
      <div class="col-sm-12">
        <div class="categories-list">
          <ul class="categories-list-nav">
            <li class="active-category">
              <a href="#" data-category="all">all</a>
            </li>
            <?php foreach ($data_submenu as $submenu): ?>
              <li>
                <a href="#" data-category="<?=strtolower($submenu["sub_name"])?>"><?=$submenu["sub_name"]?></a>
              </li>
            <?php endforeach ?>

          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <ul class="products clearfix">
        <!--Product 1-->
        <li class="col-sm-4 col-xs-4 product" data-category="all,{{x.sub_name}}" dir-paginate="x in get_product|orderBy:sortKey:reverse|filter:product_search|itemsPerPage:20">
          <a href="<?=base_url()?>app/shop_page/{{x.product_code}}" class="loop-product-link">
            <img src="<?=base_url()?>uploads/{{x.file}}" alt="image"/>
            <img class="image-hover" src="<?=base_url()?>uploads/{{x.file_1}}" alt="image"/>
            <h3>{{x.title}}</h3>
            <span class="price">
              <span class="amount">
                <span class="simbol">$</span>
                {{x.price | currency:""}}
              </span>
            </span>
          </a>
        </li>

      </ul>

      <!--Pagination -->
      <dir-pagination-controls
      max-size="20"
      direction-links="true"
      boundary-links="true" >
    </dir-pagination-controls>
    <!--Pagination -->

  </div>
</div>
</div>
</div>


<?php include 'inc/footer.php';?>
