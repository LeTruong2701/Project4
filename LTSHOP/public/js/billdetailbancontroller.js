//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('billdetailbancontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/billdetailbans"
        }).success(function(response) {
            $scope.billdetailbans = response;
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
            $scope.modalTitle = "Thêm mới chi tiết bills bán";
            
            if ($scope.billdetailban) {
                delete $scope.billdetailban;
            }
           
        } else {
            $scope.modalTitle = "Sửa chi tiết bills bán";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/billdetailbans/" + id
            }).success(function(response) {
                $scope.billdetailban = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/billdetailbans/":"http://127.0.0.1:8000/api/billdetailbans/"+$scope.id;
        alert($scope.billdetailban.id_bill_ban);
        $http({
            method: mt,
            url: url1,
            data: $scope.billdetailban,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa chi tiết bills bán này hay không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/billdetailbans/" + id,
                data: $scope.billdetailban,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/billdetailbans/" : "http://127.0.0.1:8000/api/billdetailbans/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.billdetailban,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.billdetailban == res.data;
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