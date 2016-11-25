(function () {
    'use strict';

    var app= angular.module('Crud');
    app.controller('PageController', ['$scope', '$http', function($scope, $http) {

        $scope.form = {};
        $scope.pages = [];
        $scope.links = [];
        $scope.pictures = [];
        $scope.page = [];

        $scope.show = function(id)
        {
            $http.get("/pages/show/" + id)
            .then(function(response) {
                $scope.page = response.data.data.page;
                $scope.links = response.data.data.links;
                $scope.pictures = response.data.data.pictures;
            });
        }

        $scope.index = function() {
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
                $scope.form.page = [];
                $scope.index();
            });
        }

        $scope.delete = function(id) {
            var request = {
                method: 'POST',
                url: '/pages/delete/' + id,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }

            $http(request).then(function() {
                $scope.index();
            });
        }

        $scope.update = function($event) {

            var request = {
                method: 'POST',
                url: '/pages',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    id: $scope.page.id,
                    name: $scope.page.name
                }
            }

            $http(request).then(function(response) {
                $scope.page = response.data.data.page;
            });

            $event.stopPropagation();
            $event.preventDefault();
        }

        $scope.createLink = function() {

            var request = {
                method: 'POST',
                url: '/links',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    page_id: $scope.page.id,
                    name: $scope.form.link.name,
                    link: $scope.form.link.link
                }
            }

            $http(request).then(function(response) {

                if ( response.data.success == true ) {
                    angular.element('#linkCreateModal').modal('toggle');
                    $scope.form.link = [];
                    $scope.links = response.data.data.links;
                }

            });

        }

        $scope.createPicture = function() {

            var request = {
                method: 'POST',
                url: '/pictures',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    page_id: $scope.page.id,
                    source: $scope.form.picture.source
                }
            }

            $http(request).then(function(response) {

                if ( response.data.success == true ) {
                    angular.element('#pictureCreateModal').modal('toggle');
                    $scope.form.picture = [];
                    $scope.pictures = response.data.data.pictures;
                }

            });

        }

    }]);
}());
