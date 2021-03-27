
var Stock = angular.module('myTrade', ['angularUtils.directives.dirPagination']);
var base_url= "http://localhost/job2021/Arca/wallet/";
Stock.controller("TradeCtrl", function($scope, $http) {
$scope.btnName = "http://localhost/job2021/Arca/wallet/";

$scope.show_data = function() {
  $http.get(base_url+"main/getPlan")
  .then(function (response) {
    $scope.getPlan = response.data; //data call

  });

  $http.get(base_url+"main/getMyPlan")
  .then(function (response) {
    $scope.getMyPlan = response.data; //data call
  });

  $http.get(base_url+"main/getTransaction")
  .then(function (response) {
    $scope.getTrans = response.data; //data call

  });

  $http.get(base_url+"main/getReferral")
  .then(function (response) {
    $scope.getReferral = response.data; //data call
  });

//ADMIN
$http.get(base_url+"main/getUser")
.then(function (response) {
  $scope.getUser = response.data; //data call
});

$http.get(base_url+"main/getAllTransaction")
.then(function (response) {
  $scope.getAdminTrans = response.data; //data call
});



    }

$scope.country_change =function(country_id) {
 $("#preloader").fadeIn(800);
$http.get("<?=base_url()?>Rate/getBank/"+$scope.country_id)
           .then(function (response) {
              $("#preloader").fadeOut(800);
              $scope.BankData = response.data; //data call

           });
}


$scope.income=function() {

return $scope.amount=2+$scope.precent

}

$scope.myCopy=function() {
  /* Get the text field */
  var copyText = document.getElementById("wallet");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  swal("Copied!", "successfully Copied!", "success");

}


//Admin

$scope.users_action = function(personal_info_id,type) {
   if (confirm("Are you sure you want to perform this action?")) {
        $http.post(base_url+"main/UserAction", {
                'personal_info_id': personal_info_id,
                  'type': type
            })
             .then(function (response) {
                  swal("Successful!", "You action has been completed!", "success");
                $scope.show_data();
            });
    } else {
        return false;
    }

}


$scope.transac_action = function(in_transaction_id,type,duration) {
   if (confirm("Are you sure you want to perform this action?")) {
        $http.post(base_url+"main/TransactionAction", {
                'in_transaction_id': in_transaction_id,
                  'type': type,
                  'duration':duration
            })
             .then(function (response) {
                  swal("Successful!", "You action has been completed!", "success");
                $scope.show_data();
            });
    } else {
        return false;
    }

}


$scope.uploadPayment  = function() {

  var fd = new FormData();
  var files = document.getElementById('file').files[0];

  fd.append('file',files);

  if(files==null){
    swal("Error!", "Upload proof of payment!", "error");
    return false;
  }else{
    $scope.loading=true
    // AJAX request
    $http({
      method: 'post',
      url: base_url+"main/paymentUpload",
      data: fd,
      headers: {'Content-Type': undefined},
    }).then(function successCallback(response) {
      // Store response data
      $scope.loading=false
      $scope.response = response.data;
      if ($scope.response ){
        swal("succesful!", "Payment upload was successful , your payment will be confirm within 15mins", "success");
      } else {
          swal("Error!", "Unable to upload payment!", "error");

      }
    });
  }
}




});
