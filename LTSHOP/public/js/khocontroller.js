//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('khocontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/khos"
        }).success(function(response) {
            $scope.khos = response;
            console.log(response);
        });
    }
    $scope.loaddata();
    $scope.modalHide = function(){
        $('#modelId').modal('hide');
    }
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm mới kho";
            
            if ($scope.kho) {
                delete $scope.kho;
            }
           
        } else {
            $scope.modalTitle = "Sửa kho";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/khos/" + id
            }).success(function(response) {
                $scope.kho = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/khos/":"http://127.0.0.1:8000/api/khos/"+$scope.id;
        alert($scope.kho.id_sp);
        $http({
            method: mt,
            url: url1,
            data: $scope.kho,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa kho này hay không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/khos/" + id,
                data: $scope.kho,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/khos/" : "http://127.0.0.1:8000/api/khos/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.kho,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.kho == res.data;
        }, err => console.log(err));
        $('#modelId').modal('hide');
         $scope.loaddata();
    }

    
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 5;
});