//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('usercontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/users/"
        }).success(function(response) {
            $scope.users = response;
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
            $scope.modalTitle = "Them moi nhan vien";
            
            if ($scope.user) {
                delete $scope.user;
            }
           
        } else {
            $scope.modalTitle = "Sua nhan vien";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/users/" + id
            }).success(function(response) {
                $scope.user = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/users/":"http://127.0.0.1:8000/api/users/"+$scope.id;
        alert($scope.user.ten_user);
        $http({
            method: mt,
            url: url1,
            data: $scope.user,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Ban co muon xoa nhan vien nay khong?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/users/" + id,
                data: $scope.user,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/users/" : "http://127.0.0.1:8000/api/users/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.user,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.user == res.data;
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