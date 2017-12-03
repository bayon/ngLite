'use strict'; 

angular.
  module('core.finaltest').
  factory('Finaltest', ['$resource',
    function($resource) {
    
      return $resource('https://www.sprite-pilot.com/sow/API/finaltest/finaltest-api.php?dataId=:dataId', {}, {
        query: {
          method: 'GET',
          params: {dataId: 'finaltest'},
          isArray: true
        }
      });
    }
  ]);
