var app = angular.module('myApp', ["ngRoute"], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
  .constant('API_URL', 'http://localhost/larademo/api/v1/');

app.config(function ($routeProvider) {
    $routeProvider 
    .when('/projects', {
      templateUrl: 'resources/views/project.blade.php',
    })
    .when('/steps', {
      templateUrl: 'resources/views/step.blade.php',
    })
  });