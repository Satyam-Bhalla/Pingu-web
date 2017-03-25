'use strict';

var app = angular.module('offChat', ['ngRoute']);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/", {
    	title : "Login - Pingu",
        templateUrl : "views/signin.html",
        controller: 'AuthController',
    })
    .when("/chat/", {
    	title : "Home - Pingu",
        templateUrl : "views/chat.php",
        controller: 'ChatController',
      //   resolve: {
      //       factory: checkRoute
      // }
    })
    .otherwise({
		redirectTo: '/'
  	});

  	$locationProvider.hashPrefix('!');
});
