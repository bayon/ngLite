 
'use strict';

angular.
  module('App').
  config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
      $locationProvider.hashPrefix('!');

      $routeProvider.
        when('/finaltest', {
          template: '<finaltest-list></finaltest-list>'
        }).
         when('/finaltest-new', {
          template: '<finaltest-new></finaltest-new>'
        }).
         when('/finaltest-update/:dataId', {
          template: '<finaltest-update></finaltest-update>'
        }).
        otherwise({
             template: '<finaltest-list></finaltest-list>'
        });
    }
  ]);
