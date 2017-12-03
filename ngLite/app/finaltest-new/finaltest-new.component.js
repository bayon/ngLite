'use strict';

// Register  component, along with its associated controller and template
angular.
module('finaltestNew').
component('finaltestNew', {
    templateUrl: 'finaltest-new/finaltest-new.template.html',
    controller: ['$scope', '$http', function($scope, $http) {
        $scope.method = 'na';
        $scope.endpoint = 'https://www.sprite-pilot.com/sow/API/finaltest/finaltest-crud.php';
        $scope.fields = [];
        $scope.entity = {}
       
        $scope.save = function(index) {
            $scope.fields[index].editable = false;
            console.log('$scope.fields[index]:', $scope.fields[index]);
            var obj = $scope.fields[index];
            var data = {
                method: $scope.method,
                id: obj.id,
                fk: obj.fk,
                name: obj.name,
                description: obj.description,
                type: obj.type            };
            var endpoint = $scope.endpoint;
            $http.post(endpoint, data).then(function(msg) {
                if (msg.loginSucceeded === 'true') {
                    console.log(msg)
                } else {
                    console.log(msg);
                }
            });
            // remove from UI after adding successfully
            $scope.fields.splice(index, 1);

            //GO TO ADD Details
            window.location.href = '#!/finaltest';
        }

        $scope.add = function() {
            $scope.method = 'add';
            $scope.fields.push({
                id: '',
                fk: '',
                name: '',
                description: '',
                type: '',
                editable: true
            })
        }
        var init = function() {
            //purpose: to have the form open and ready to create a new record.
            $scope.add();
        };
        init();
    }]
});
