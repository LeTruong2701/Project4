var app = angular.module('searchapp', ['angularUtils.directives.dirPagination']);
app.controller('searchcontroller', ['$scope', '$http', mycontrol]);
function mycontrol($scope, $http) {

    $scope.Search = function (keyword) {
        sessionStorage.setItem('keyword', keyword);
        window.location.href = "/shop";
    }

    $scope.Searchgiay = function () {
        $scope.keyword='Giay';
        console.log( $scope.keyword);
        sessionStorage.setItem('keyword', $scope.keyword);
        window.location.href = "/shop";
    }

}