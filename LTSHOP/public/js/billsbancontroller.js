//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('billsbancontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/billsbans"
        }).success(function(response) {
            $scope.billsbans = response;
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
            $scope.modalTitle = "Thêm mới bills bán";
            
            if ($scope.billsban) {
                delete $scope.billsban;
            }
           
        } else {
            $scope.modalTitle = "Sửa bills bán";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/billsbans/" + id
            }).success(function(response) {
                $scope.billsban = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/billsbans/":"http://127.0.0.1:8000/api/billsbans/"+$scope.id;
        alert($scope.billsban.id_kh);
        $http({
            method: mt,
            url: url1,
            data: $scope.billsban,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa bills bán này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/billsbans/" + id,
                data: $scope.billsban,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/billsbans/" : "http://127.0.0.1:8000/api/billsbans/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.billsban,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.billsban == res.data;
        }, err => console.log(err));
        $('#modelId').modal('hide');
         $scope.loaddata();
    }


    $scope.getDetailbill = function(id) {

        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/billdetailbans"
        }).success(function(response) {
            $scope.billdetailbans = response;
            $scope.detailbill = $scope.billdetailbans.filter(item => item.id_bill_ban == id);
            console.log(response);
        });

        
        $('#modaldetail').modal('show');
    }


    
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 5;
});