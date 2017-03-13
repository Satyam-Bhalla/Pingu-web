'use strict';

var app = angular.module('offChat', ['ngRoute']);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/", {
    	title : "Login - OffChat",
        templateUrl : "views/signin.html",
        controller: 'AuthController',
    })
    .when("/chat/", {
    	title : "Home - OffChat",
        templateUrl : "views/chat.html",
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
