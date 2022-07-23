//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('billdetailnhapcontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/billdetailnhaps"
        }).success(function(response) {
            $scope.billdetailnhaps = response;
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
            $scope.modalTitle = "Thêm mới chi tiết bills nhập";
            
            if ($scope.billdetailnhap) {
                delete $scope.billdetailnhap;
            }
           
        } else {
            $scope.modalTitle = "Sua chi tiết bills nhập";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/billdetailnhaps/" + id
            }).success(function(response) {
                $scope.billdetailnhap = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/billdetailnhaps/":"http://127.0.0.1:8000/api/billdetailnhaps/"+$scope.id;
        alert($scope.billdetailnhap.id_bill_nhap);
        $http({
            method: mt,
            url: url1,
            data: $scope.billdetailnhap,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa chi tiết bills nhập này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/billdetailnhaps/" + id,
                data: $scope.billdetailnhap,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/billdetailnhaps/" : "http://127.0.0.1:8000/api/billdetailnhaps/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.billdetailnhap,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.billdetailnhap == res.data;
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