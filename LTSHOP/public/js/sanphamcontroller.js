//var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', ['$scope', '$http', mycontrol]);
function mycontrol($scope, $http) {
    $scope.q = "";
    
    $scope.product_id = sessionStorage.getItem('seletedProduct') ?? undefined;

    $scope.product_keyword = sessionStorage.getItem('keyword');

    $scope.Image=[];


    $scope.loaddata = function (id_loai) {

        console.log( $scope.product_keyword)
        if($scope.product_keyword){
            var list={name:$scope.product_keyword};
            $http({
                method: "post",
                url: "http://127.0.0.1:8000/api/search",
                data: list
            }).success(function (response) {
                $scope.sanphams = response;
                sessionStorage.removeItem('keyword');

                console.log(response);
            });
        }
        else{

            if (id_loai) {
                $http({
                    Method: "GET",
                    url: "http://127.0.0.1:8000/api/sanphams"
                }).success(function (response) {
                    $scope.sanphams = response.filter(item => item.id_loai_sp == id_loai);
                });
            }
            else {
                $http({
                    Method: "GET",
                    url: "http://127.0.0.1:8000/api/sanphams"
                }).success(function (response) {
                    $scope.sanphams = response;
                    $scope.quanaos = $scope.sanphams.filter(item => item.id_loai_sp == 14);
                    $scope.quanaocungloai = $scope.quanaos.slice(0, 4);
                    $scope.giays = $scope.sanphams.filter(item => item.id_loai_sp == 16);
                    $scope.giaycungloai = $scope.giays.slice(0, 4);

                    $scope.tuis = $scope.sanphams.filter(item => item.id_loai_sp == 17);
    
    
                    
                    console.log($scope.giaycungloai);
                });
    
    
            }
        }



        
    }
    $scope.loaddata();


   


    $scope.getDetail = function () {
        if ($scope.product_id) {
            $http({
                method: 'GET',
                url: 'http://127.0.0.1:8000/api/sanphams/' + $scope.product_id,
            }).then(function (response) {
                $scope.sanpham = response.data;
                $scope.images = $scope.sanpham.image.split('#');
                console.log($scope.sanpham);
            })
        }
    }


    $scope.openDetail = function (id) {
        sessionStorage.setItem('seletedProduct', id);
    }

    
   

    $scope.getAnhphu=function(){

    }



    $scope.getSize=function(event){

        $('.size').removeClass('active');
        $scope.size=event.target.innerText;
        event.target.classList.add('active');
        
    }


    $scope.Getsptheoloai = function(id){
        $scope.id=id;
        $scope.loaddata(id);
   
    }


    $scope.modalHide = function () {
        $('#modelId').modal('hide');
    }

    
    $scope.editClick = function (id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm mới sản phẩm";

            if ($scope.sanpham) {
                delete $scope.sanpham;
                $scope.Images=[];
                console.log($scope.Image);
            }

        } else {
            $scope.modalTitle = "Sửa sản phẩm";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/sanphams/" + id
            }).success(function (response) {
                $scope.sanpham = response;
                 $scope.images = $scope.sanpham.image.split('#');
                // $scope.Image=$scope.sanphams.image.split('#');
                 console.log($scope.images);
            });
        }
        $('#modelId').modal('show');
    }


    $scope.updateData = function () {
        var mt = $scope.id == 0 ? "POST" : "PUT";
        var url1 = $scope.id == 0 ? "http://127.0.0.1:8000/api/sanphams/" : "http://127.0.0.1:8000/api/sanphams/" + $scope.id;
        alert($scope.sanpham.name);
        $http({
            method: mt,
            url: url1,
            data: $scope.sanpham,
            'Content-Type': 'application/json'
        }).success(function (response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }



    $scope.deleteClick = function (id) {
        var hoi = confirm('Bạn có muốn xóa sản phẩm này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/sanphams/" + id,
                data: $scope.sanpham,
            }).then(function (res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }




    $scope.saveData = function () {
        $scope.sanpham.image=$scope.Image.join('#');
        console.log($scope.sanpham);
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/sanphams/" : "http://127.0.0.1:8000/api/sanphams/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.sanpham,
            'content-Type': 'application/json'
        }).then(function (res) {
            $scope.sanpham == res.data;
        }, err => console.log(err));
        $('#modelId').modal('hide');
        $scope.loaddata();
    }



    $scope.Close=function(){
        $('#modelId').modal('hide');
    }


    $scope.currentPage = 1;
    $scope.pageChangeHandler = function (num) {
        $scope.currentPage = num;
    };
    $scope.pageSize = 5;




    
 const fileUpload = document.querySelector("#file-upload");
 fileUpload.addEventListener("change", (e) => {
     const files = e.target.files;
     document.getElementById('image').innerHTML = '<img src="/upload/product/' + files[0].name + '" alt="Ảnh" style="width:100px;height:100px">';
    
     for (const file of files) {
         if(!$scope.sanpham) $scope.sanpham = {};
         const { name, type, size, lastModified } = file;
         

         $scope.Image.push(file.name);
        //$scope.sanpham.image = file.name;
        //console.log(file.name);
        document.getElementById('image').innerHTML = '<img src="/upload/product/' + file.name + '" alt="Ảnh" style="width:100px;height:100px">';
     };
 });




 //add gio hang
 $scope.addToCart = function () {
        
    const quan = Number.parseInt($('#sl').val());

    let item = {};
    item.id = $scope.sanpham.id;
    item.name = $scope.sanpham.name;
    item.id_loai_sp = $scope.sanpham.id_loai_sp;
    item.id_ncc = $scope.sanpham.id_ncc;
    item.unit_price = $scope.sanpham.unit_price;
    item.gia_km = $scope.sanpham.gia_km;
    item.image = $scope.sanpham.image;
    item.color = $scope.sanpham.color;

    item.quantity= quan;
    if($scope.size!=null){
        item.size = $scope.size;
    }
    else{
        item.size="";
    }
    console.log(item.size);


    // console.log(item);
    // item.quantity = $scope.soluong;
    var list;
    if (!localStorage.getItem('cart')) {
        list = [item];
    } else {
        list = JSON.parse(localStorage.getItem('cart')) || [];
        let ok = true;
        for (let x of list) {
            if (x.id == item.id) {
                // x.quantity += item.quantity;
                x.size = item.size;
                ok = false;
                break;
            }
        }
        if (ok) {
            list.push(item);
        }
    }
    localStorage.setItem('cart', JSON.stringify(list));
    alert("Đã thêm giở hàng thành công");
}

    




    


}