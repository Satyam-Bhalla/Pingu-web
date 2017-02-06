'use strict';   

var app = angular.module('offChat', ['ngRoute']);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/", {
    	title : "Login - OffChat",
        templateUrl : "views/signin.html"
    }).
    otherwise({
		redirectTo: '/'
  	});
    $locationProvider.hashPrefix('!');
});