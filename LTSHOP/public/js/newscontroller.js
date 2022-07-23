
app.controller('newscontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/newss"
        }).success(function(response) {
            $scope.newss = response;
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
            $scope.modalTitle = "Thêm mới tin tức";
            
            if ($scope.news) {
                delete $scope.news;
            }
           
        } else {
            $scope.modalTitle = "Sửa tin tức";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/newss/" + id
            }).success(function(response) {
                $scope.news = response;
                $('.ck-content p').text($scope.news.content);
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/newss/":"http://127.0.0.1:8000/api/newss/"+$scope.id;
        alert($scope.news.ten_ncc);
        $http({
            method: mt,
            url: url1,
            data: $scope.news,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa tin tức này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/newss/" + id,
                data: $scope.id_new,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        const content =  $('.ck-content p').text();
        $scope.news.content = content;
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/newss/" : "http://127.0.0.1:8000/api/newss/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.news,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.news == res.data;
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