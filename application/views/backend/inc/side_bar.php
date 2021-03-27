
    <!-- Page Body Start-->
<div class="page-body-wrapper">
<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="<?=base_url()?>assets/backend/images/dashboard/multikart-logo.png" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="<?=base_url()?>assets/backend/images/dashboard/man.png" alt="#">
            </div>
            <h6 class="mt-3 f-14">JOHN</h6>
            <p>general manager.</p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="<?=base_url()?>main"><i data-feather="home"></i><span>Dashboard</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="fa fa-circle"></i>
                            <span>Physical</span> <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?=base_url()?>main/category"><i class="fa fa-circle"></i>Category</a></li>
                            <li><a href="<?=base_url()?>main/sub_category"><i class="fa fa-circle"></i>Sub Category</a></li>
                            <li><a href="<?=base_url()?>main/product_list"><i class="fa fa-circle"></i>Product List</a></li>
                            <li><a href="<?=base_url()?>main/add_product"><i class="fa fa-circle"></i>Add Product</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="order.html"><i class="fa fa-circle"></i>Orders</a></li>
                    <li><a href="transactions.html"><i class="fa fa-circle"></i>Transactions</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="tag"></i><span>Coupons</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="<?=base_url()?>main/coupon_list"><i class="fa fa-circle"></i>List Coupons</a></li>
                    <li><a href="<?=base_url()?>main/coupon_create"><i class="fa fa-circle"></i>Create Coupons </a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Pages</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="<?=base_url()?>main/page_list"><i class="fa fa-circle"></i>List Page</a></li>
                  <li><a href="<?=base_url()?>main/page_create"><i class="fa fa-circle"></i>Create Page </a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="media.html"><i data-feather="camera"></i><span>Media</span></a></li>

            <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                  <li><a href="<?=base_url()?>main/user_list"><i class="fa fa-circle"></i>List Page</a></li>
                  <li><a href="<?=base_url()?>main/user_create"><i class="fa fa-circle"></i>Create Page </a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="users"></i><span>Vendors</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="<?=base_url()?>main/vendor_list"><i class="fa fa-circle"></i>Vendor List</a></li>
                    <li><a href="<?=base_url()?>main/vendor_create"><i class="fa fa-circle"></i>Create Vendor</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Localization</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="translations.html"><i class="fa fa-circle"></i>Translations</a></li>
                    <li><a href="currency-rates.html"><i class="fa fa-circle"></i>Currency Rates</a></li>
                    <li><a href="taxes.html"><i class="fa fa-circle"></i>Taxes</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="reports.html"><i data-feather="bar-chart"></i><span>Reports</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="<?=base_url()?>main/system_setting"><i class="fa fa-circle"></i>System Setting</a></li>
                </ul>
            </li>

            <li><a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>Login</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
