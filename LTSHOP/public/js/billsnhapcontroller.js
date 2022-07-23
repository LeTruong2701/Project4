//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('billsnhapcontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/billsnhaps"
        }).success(function(response) {
            $scope.billsnhaps = response;
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
            $scope.modalTitle = "Thêm mới bills nhập";
            
            if ($scope.billsnhap) {
                delete $scope.billsnhap;
            }
           
        } else {
            $scope.modalTitle = "Sửa bills nhập";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/billsnhaps/" + id
            }).success(function(response) {
                $scope.billsnhap = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/billsnhaps/":"http://127.0.0.1:8000/api/billsnhaps/"+$scope.id;
        alert($scope.billsnhap.id_ncc);
        $http({
            method: mt,
            url: url1,
            data: $scope.billsnhap,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa bills nhập này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/billsnhaps/" + id,
                data: $scope.billsnhap,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/billsnhaps/" : "http://127.0.0.1:8000/api/billsnhaps/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.billsnhap,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.billsnhap == res.data;
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