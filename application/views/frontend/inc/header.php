<!DOCTYPE html>
<html lang="en">

<head>
    <title>ShopTMO |</title>
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Style CSS -->
    <link href="<?=base_url()?>assets/frontend/css/bootstrap.css" media="screen" rel="stylesheet">
    <link href="<?=base_url()?>assets/frontend/css/font-awesome.css" media="screen" rel="stylesheet">
    <!-- Selectize -->
      <link href="<?=base_url()?>assets/frontend/css/selectize.css" media="screen" rel="stylesheet">
    <link href="<?=base_url()?>assets/frontend/css/style.css" media="screen" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/frontend/css/admin.css">
    
    <!-- <link href="<?=base_url()?>assets/transactions/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/transactions/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?=base_url()?>assets/transactions/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" /> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!--AgularJS-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="<?= base_url() ?>assets/js/angularJs.js"></script>
<script src="<?= base_url() ?>assets/js/angularjs/dirPagination.js"></script>



<style type="text/css">
[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
  display: none !important;
}

.swal-btn {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: red;
  font-size: 12px;
  border: none!important;
  color:ghostwhite;
}
</style>

</head>

<body  ng-app="myStore" ng-controller="StoreCtrl" ng-init="show_data()" ng-cloak>
<!-- Spinner -->
<div class="spinner-container">
    <div class="spinner-dot"></div>
    <div class="spinner-dot"></div>
    <div class="spinner-dot"></div>
</div>
<!-- /Spinner -->
