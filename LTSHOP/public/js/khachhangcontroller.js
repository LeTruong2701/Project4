//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('khachhangcontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/khachhangs"
        }).success(function(response) {
            $scope.khachhangs = response;
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
            $scope.modalTitle = "Thêm mới khách hàng";
            
            if ($scope.khachhang) {
                delete $scope.khachhang;
            }
           
        } else {
            $scope.modalTitle = "Sửa khách hàng";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/khachhangs/" + id
            }).success(function(response) {
                $scope.khachhang = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/khachhangs/":"http://127.0.0.1:8000/api/khachhangs/"+$scope.id;
        alert($scope.khachhang.ten_kh);
        $http({
            method: mt,
            url: url1,
            data: $scope.khachhang,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa khách hàng này hay không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/khachhangs/" + id,
                data: $scope.khachhang,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/khachhangs/" : "http://127.0.0.1:8000/api/khachhangs/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.khachhang,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.khachhang == res.data;
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