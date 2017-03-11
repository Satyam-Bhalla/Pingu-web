app.controller("AuthController", function($scope, $http, $window, $location, $rootScope){
	$('ul.tabs').tabs();

	$scope.login = {
		"username":"",
		"password":""
	}
	$rootScope.user  = {
		"id":"",
		"username":"",
		"email":""
	}
	$scope.signin = {
		"username":"",
		"password":"",
		"email":"",
	}

	$scope.go_login = function() {
		if ($scope.login.username && $scope.login.password) {
			$http({
				method: "POST",
				url: "api/login.php",
	  			data: $scope.login
	  		})
			.then(function(data, status, headers, config) {
				if (data.data.response) {
					Materialize.toast(data.data.response, 1000,"" ,function() {
						if (data.data.status) {
							$rootScope.user.id = data.data.id
							$rootScope.user.username = data.data.name
							$rootScope.user.email = data.data.email
							$location.path('/chat/')
							$rootScope.$apply()
							
						}
					})
				}
			})
		}

		else {
			 Materialize.toast('Something is Empty!', 3000)
		}
	}


	$scope.go_signin = function() {

		if ($scope.signin.username && $scope.signin.password && $scope.signin.email) {
			$http({
				method: "POST",
				url: "api/signin.php",
	  			data: $scope.signin
	  		})
			.then(function(data, status, headers, config) {
				console.log(data)
				if (data.data.response) {
					Materialize.toast(data.data.response, 2000,"" ,function() {
						if (data.data.status) {
							Materialize.toast("Please Wait....", 2000)
							$rootScope.user.id = data.data.id
							$rootScope.user.username = data.data.name
							$rootScope.user.email = data.data.email
							$location.path('/chat/')
							$rootScope.$apply()
						}
					})
				}
			})
		}

		else {
			if ($scope.signin.email==undefined) {
				Materialize.toast('Oops! The email seems wrong!', 3000)
			}
			else {
			 Materialize.toast('Something is Empty!', 3000)
			}
		}
	}
})



app.controller("ChatController", function($scope, $rootScope, $http, $window, $location) {
	
})


var checkRoute = function ($q, $rootScope, $location) {
    var defer = $q.defer();
  	if (typeof $rootScope.user.id==undefined) {
        defer.reject()
        $location.path("/")
        $rootScope.$apply()
  	}
  	else {
    	defer.resolve(true); 
  	}	
  	return defer.promise;
}
