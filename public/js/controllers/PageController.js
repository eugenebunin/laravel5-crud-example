(function () {
    'use strict';

    var app= angular.module('Crud');
    app.controller('PageController', ['$scope', '$http', function($scope, $http) {

        $scope.form.page = {};

        $scope.init = function() {
            $http.get("/posts")
            .then(function(response) {
                $scope.pages = response.data;
            });
        }

        $scope.create = function() {
            var request = {
                method: 'POST',
                url: '/posts',
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
