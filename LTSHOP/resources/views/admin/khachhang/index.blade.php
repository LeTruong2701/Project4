@extends('layout_admin')
@section('content')



  <body class="container-fluid px-4"  ng-controller="khachhangcontroller">
<h1 style="margin-left: 50px;margin-top:20px;">Quản lý khách hàng</h1>
<p>
        <!-- Button trigger modal -->
        <button style="margin-left: 50px;" type="button" class="btn btn-primary btn-lg" ng-click="editClick(0)">
            Create
        </button>
    </p>
    <p style="margin-left: 50px;">Search: <input type="text" ng-model='q'></p>
        <table class="table table-bordered table-stripper">
            <tr>
                <th>TT</th>
                <th>id</th>
                <th>Tên kh</th>
                <th>email</th>
                <th>Địa chỉ</th>
                <th>sdt</th>
                <th>note</th>
                <th>Tài khoản</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr dir-paginate = "nv in khachhangs | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{nv.id}}</td>
            <td>@{{nv.ten_kh}}</td>
            <td>@{{nv.email}}</td>
            <td>@{{nv.dia_chi}}</td>
            <td>@{{nv.sdt}}</td>
            <td>@{{nv.note}}</td>
            <td>@{{nv.taikhoan}}</td>
            <td>@{{nv.created_at|date}}</td>
            <td>@{{nv.updated_at|date}}</td>
            <td><button class="btn btn-info" ng-click="editClick(nv.id)"> Edit</button></td>
            <td><button class="btn btn-danger" ng-click= "deleteClick(nv.id)">Delete</button></td>
        </tr>
        </table>
        
        <ul class="wn__pagination">
        <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
        <!-- <li class="active"><a href="#">1</a></li>
        					<li><a href="#">2</a></li>
        					<li><a href="#">3</a></li>
        					<li><a href="#">4</a></li>
        					<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> -->
    </ul>
        <!-- <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls> -->


        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">@{{modaltitle}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group"><label for="">Tên KH: </label>
                                <div><input type="text" ng-model="khachhang.ten_kh" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Email: </label>
                                <div><input type="text" ng-model="khachhang.email" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ: </label>
                                <div><input type="text" ng-model="khachhang.dia_chi" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">SDT: </label>
                                <div><input type="text" ng-model="khachhang.sdt" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Note: </label>
                                <div><input type="text" ng-model="khachhang.note" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click = "saveData()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="/js/jquery-3.3.1.min.js"></script>
        <!-- <script src="/js/angular.min.js"></script>
        <script src="/js/khachhangcontroller.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script> -->
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
  </body>
@stop