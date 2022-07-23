
app.controller('cartcontroller', ['$scope', '$http', mycontrol]);
function mycontrol ($scope, $http) {
    // $scope.q="";
    // $scope.product_id = sessionStorage.getItem('seletedProduct') ?? undefined;


    $scope.quantity=1;
    


    $scope.listSP = [];
    $scope.total = 0;
    /*=================== Thao tác dữ liệu ==================================== */
    $scope.LoadCart = function () {
        $scope.listSP = JSON.parse(localStorage.getItem('cart'));
    };
    $scope.LoadCart();
    console.log($scope.listSP);



    $scope.changeQuantityUp = function(index){
       
        $scope.listSP[index].quantity++;
        localStorage.setItem('cart',JSON.stringify($scope.listSP));

        
    }
    $scope.changeQuantityDown = function(index){
        if($scope.listSP[index].quantity>=2){
            $scope.listSP[index].quantity--;
            localStorage.setItem('cart',JSON.stringify($scope.listSP));
        }
    }

   


    $scope.removeCart = (item) => {
        
        const index = $scope.listSP.findIndex(i => i.id == item.id);
        $scope.listSP.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify($scope.listSP));
    }

    $scope.getTotal = function () {
        var total = 0;
        for (var i = 0; i < $scope.listSP.length; i++) {
            var product = $scope.listSP[i];
            total += (product.unit_price * product.quantity);
        }
        return total;
    }



   
    
}