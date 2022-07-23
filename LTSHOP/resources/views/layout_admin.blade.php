<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ADMIN - LTSHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="/admin/css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" ng-app="myapp">

    @include('includes.header')
    <div id="layoutSidenav">
        {{-- Day la phan sidebar --}}
        @include('includes.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            {{-- day la phan footer --}}
            @include('includes.footer')
        </div>
    </div>

  
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/admin/js/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/admin/js/scripts.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> -->

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/angular.min.js"></script>

    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
 
   

    <!-- <script>
            var app=angular.module 'myapp',[];
        </script> -->


        <script>

            var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
        </script>
     
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
        <script src="/js/sanphamcontroller.js"></script> 
        <script src="/js/loaispcontroller.js"></script>
        <script src="/js/khachhangcontroller.js"></script>
        <script src="/js/nhanviencontroller.js"></script>
        <script src="/js/billsbancontroller.js"></script>
        <script src="/js/billdetailbancontroller.js"></script>
        <script src="/js/billsnhapcontroller.js"></script>
        <script src="/js/khocontroller.js"></script>
        <script src="/js/billdetailnhapcontroller.js"></script>
        <script src="/js/newscontroller.js"></script>
        <script src="/js/nhacungcapcontroller.js"></script>
        <script src="/js/nhanviencontroller.js"></script>
        <script src="/js/userscontroller.js"></script>
    
</body>

</html>