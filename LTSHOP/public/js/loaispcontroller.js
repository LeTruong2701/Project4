//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('loaispcontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/loaisps"
        }).success(function(response) {
            $scope.loaisps = response;
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
            $scope.modalTitle = "Thêm mới loại sản phẩm";
            
            if ($scope.loaisp) {
                delete $scope.loaisp;
            }
           
        } else {
            $scope.modalTitle = "Sửa loại sản phẩm";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/loaisps/" + id
            }).success(function(response) {
                $scope.loaisp = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/loaisps/":"http://127.0.0.1:8000/api/loaisps/"+$scope.id;
        alert($scope.loaisp.tenloai);
        $http({
            method: mt,
            url: url1,
            data: $scope.loaisp,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa loại sản phẩm này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/loaisps/" + id,
                data: $scope.loaisp,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/loaisps/" : "http://127.0.0.1:8000/api/loaisps/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.loaisp,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.loaisp == res.data;
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