
app.controller('checkoutcontroller', ['$scope', '$http', mycontrol]);
function mycontrol ($scope, $http) {

    $scope.LoadCart = function () {
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
    };
    $scope.LoadCart();
    console.log($scope.listSP);



    $scope.getTotal = function () {
        var total = 0;
        for (var i = 0; i < $scope.listSP.length; i++) {
            var product = $scope.listSP[i];
            total += (product.unit_price * product.quantity);
        }
        return total;
    }


    $scope.CreateHoaDon = function () {
       

        console.log($scope.listSP);
        
      
        $scope.item.billdetailban = [];
      
        $scope.item.tong_tien = $scope.getTotal();
        $scope.listSP.forEach(function (item, i) {
            
            $scope.item.billdetailban.push({ id_sp: item.id, size: item.size, color: item.color,sl:item.quantity,unit_price:item.unit_price });
        });
        
        console.log($scope.item);
       
        $http({
            method: 'POST',
            url: "http://127.0.0.1:8000/api/billsbans/",
            datatype: 'json',
            data: $scope.item
        }).then(function (response) {  
                alert('Đơn hàng của bạn đã được tiếp nhận');
        },error=>console.log(error));
        
    };




}