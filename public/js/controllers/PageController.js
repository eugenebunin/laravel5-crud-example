(function () {
    'use strict';

    var app= angular.module('Crud');
    app.controller('PageController', ['$scope', '$http', function($scope, $http) {

        $scope.form = {};
        $scope.pages = [];

        $scope.init = function() {
            $http.get("/pages/json")
            .then(function(response) {
                $scope.pages = response.data.data;
            });
        }

        $scope.create = function() {
            var request = {
                method: 'POST',
                url: '/pages',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    name: $scope.form.page.name
                }
            }

            $http(request).then(function() {
                $scope.init();
            });
        }
    }]);
}());
