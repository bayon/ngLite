'use strict';

// Register component, along with its associated controller and template 

angular.
module('finaltestUpdate').
component('finaltestUpdate', {
    templateUrl: 'finaltest-update/finaltest-update.template.html',
    controller: ['$scope', '$http', '$routeParams', 'Finaltest', function($scope, $http, $routeParams, Finaltest) {
        $scope.method = 'na';
        $scope.fields = [];
        $scope.entity = {};
        $scope.current_id = '';
        var self = this;
        self.finaltest = Finaltest.get({
            dataId: $routeParams.dataId
        }, function(finaltest) {

            $scope.fields.id = self.finaltest.id;
            $scope.fields.fk = self.finaltest.fk;
            $scope.fields.name = self.finaltest.name;
            $scope.fields.description = self.finaltest.description;
            $scope.fields.type = self.finaltest.type;

            $scope.method = 'update';

            $scope.fields.push({
                id: $scope.fields.id,
                fk: $scope.fields.fk,
                name: $scope.fields.name,
                description: $scope.fields.description,
                type: $scope.fields.type,
                editable: true
            })
            console.log('  $scope.fields', $scope.fields);
            $scope.entity = $scope.fields[0];
            $scope.entity.index = 0;
            $scope.entity.editable = true;
        });


        $scope.endpoint = 'https://www.sprite-pilot.com/sow/API/finaltest/finaltest-crud.php';

        $scope.fields.name = self.finaltest.name;
        $scope.fields.description = self.finaltest.description;
        $scope.edit = function() {
            $scope.method = 'update';
            console.log('finaltest-update-component:EDIT');
            $scope.fields.push({
                   id: $scope.id,
                   fk: $scope.fk,
                   name: $scope.name,
                   description: $scope.description,
                   type: $scope.type,
                    id: $scope.current_id,
                    editable: true
                })
            $scope.entity = $scope.fields[0];
            $scope.entity.index = 0;
            $scope.entity.editable = true;
        }

        $scope.delete = function(index) {
            $scope.method = 'delete';
            console.log('finaltest-update-component:DELETE');
            var obj = $scope.fields[index];
            var data = {
                method: $scope.method,
                id: obj.id,
                fk: obj.fk,
                name: obj.name,
                description: obj.description,
                type: obj.type
            };
            var endpoint = $scope.endpoint;
            $http.post(endpoint, data).then(function(msg) {
                if (msg.loginSucceeded === 'true') {
                    console.log(msg)
                } else {
                    console.log(msg);
                }
            });

            $scope.fields.splice(index, 1);
            //go back to list
            window.location.href = '#!/finaltest/';
        }

        $scope.save = function(index) {
            $scope.fields[index].editable = false;
            console.log('finaltest-update-component:SAVE');
            var obj = $scope.fields[index];
            var data = {
                method: $scope.method,
                id: obj.id,
                fk: obj.fk,
                name: obj.name,
                description: obj.description,
                type: obj.type
            };
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
            //go back to list
            window.location.href = '#!/finaltest/';
        }

        $scope.add = function() {

            $scope.method = 'add_details';
            console.log('finaltest-update-component:ADD');
            $scope.fields.push({
                id: $scope.current_id,
                id: $scope.id,
                fk: $scope.fk,
                name: $scope.name,
                description: $scope.description,
                type: $scope.type,

                editable: true
            })
        }

        var init = function() {
            //purpose: to have the form open and ready to create a new record.
            console.log('finaltest-update-component:INIT');
            $(document).ready(function() {
                var field_DATA = null;
                var url = window.location.href;
                var url_str_array = url.split('/');
                var url_id = url_str_array[url_str_array.length - 1];
                $scope.current_id = url_id;
            });

        };
        init();
    }]
});

