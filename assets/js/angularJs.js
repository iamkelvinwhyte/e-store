var app = angular.module('myUser', ['angularUtils.directives.dirPagination']);
var Store = angular.module('myStore', ['angularUtils.directives.dirPagination']);
var Menu = angular.module('myMenu', ['angularUtils.directives.dirPagination']);
var Cate = angular.module('myCate', ['angularUtils.directives.dirPagination']);
var Stock = angular.module('myStock', ['angularUtils.directives.dirPagination']);
 $scope.currentPage = 1;
 $scope.pageSize = 10;

////// USER QUERY DETAILS///////////
app.controller("UserCtrl", function($scope, $http) {
$http.get("http://localhost/store/User/get_User")
            .then(function (response) {
               $scope.myUserData = response.data; //data call
            });
			//BY STORE////
$http.get("http://localhost/store/User/get_Userby_store")
            .then(function (response) {
               $scope.myStoreUserData = response.data; //data call
            });
   //Upadte Database
    $scope.update_data = function(personal_info_id) {
       if (confirm("Are you sure you want to Activate User?")) {
            $http.post("http://localhost/store/User/Approve_User", {
                    'personal_info_id': personal_info_id
                })
                 .then(function (response) {
                    alert(response.data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
	  
    }
	//alert Database
    $scope.delete_data = function(personal_info_id) {
        if (confirm("Are you sure you want to Deactivate User?")) {
              $http.post("http://localhost/store/User/D_Approve_User", {
                    'personal_info_id': personal_info_id
                })
                .then(function (response) {
                    alert(response.data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }
	
});


////// STORE QUERY DETAILS///////////
Store.controller("StoreCtrl", function($scope, $http) {
$http.get("http://localhost/store/Warehouse/get_Store")
            .then(function (response) {
               $scope.myUserData = response.data; //data call
            });
   
	//Delete Store
    $scope.delete_data = function(store_vid) {
        if (confirm("Are you sure you want to Delete Store ?")) {
              $http.post("http://localhost/store/User/D_Approve_User1", {
                    'store_vid': store_vid
                })
                .then(function (response) {
                    alert(response.data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }
	
});



////// MENU QUERY DETAILS///////////
Menu.controller("MenuCtrl", function($scope, $http) {
$http.get("http://localhost/store/User/get_Menu")
            .then(function (response) {
               $scope.myMenuData = response.data; //data call
            });
//BY STORE////
$http.get("http://localhost/store/User/get_Userby_store")
            .then(function (response) {
               $scope.myStoreUserData = response.data; //data call
            });
		//Store by user	
$http.get("http://localhost/store/Warehouse/get_Store")
            .then(function (response) {
               $scope.myStoreData = response.data; //data call
            });
			//Insert
			$scope.insert = function() {
        if ($scope.name == null) {
            alert("Enter Your Name");
        
        }else {
            $http.post(
                "insert.php", {
                    'name': $scope.name,
                    'email': $scope.email,
                    'age': $scope.age,
                    'btnName': $scope.btnName,
                    'id': $scope.id
                }
            ).success(function(data) {
                alert(data);
                $scope.name = null;
                $scope.email = null;
                $scope.age = null;
                $scope.btnName = "Insert";
                $scope.show_data();
            });
        }
    }
   
	//Delete Store
    $scope.delete_data = function(store_vid) {
        if (confirm("Are you sure you want to Delete Store ?")) {
              $http.post("http://localhost/store/User/D_Approve_User1", {
                    'store_vid': store_vid
                })
                .then(function (response) {
                    alert(response.data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }
	
});


////// CATE QUERY DETAILS///////////
Cate.controller("CateCtrl", function($scope, $http) {
$http.get("http://localhost/store/Dashboard/get_Cate")
            .then(function (response) {
               $scope.myCateData = response.data; //data call
            });
			
  
	//alert Database
    $scope.delete_data = function(in_cate_id) {
        if (confirm("Are you sure you want to Delete Category?")) {
              $http.post("http://localhost/store/Dashboard/Remove_Cate", {
                    'in_cate_id': in_cate_id
                })
                .then(function (response) {
                    alert(response.data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }
	
});


////// STOCK QUERY DETAILS///////////
Stock.controller("StockCtrl", function($scope, $http) {

$http.get("http://localhost/store/Dashboard/get_Stock")
            .then(function (response) {
               $scope.myStockData = response.data; //data call
			   
            });
			
   //Upadte Database
    $scope.update_data = function(personal_info_id) {
       if (confirm("Are you sure you want to Activate User?")) {
            $http.post("http://localhost/store/User/Approve_User", {
                    'personal_info_id': personal_info_id
                })
                 .then(function (response) {
                    alert(response.data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
	  
    }
	//alert Database
    $scope.delete_data = function(in_stock_id) {
        if (confirm("Are you sure you want to Delete Stock?")) {
              $http.post("http://localhost/store/Dashboard/Remove_stock", {
                    'in_stock_id': in_stock_id
                })
                .then(function (response) {
					
                    alert(response.data);
			
                    $scope.show_data();
					
                });
        } else {
            return false;
        }
    }
	
});






