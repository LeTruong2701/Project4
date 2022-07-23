@extends('layout_admin')
@section('content')


<body class="container-fluid px-4" ng-controller="mycontroller">
    <h1 style="margin-left: 50px;margin-top:20px;">Quản lý sản phẩm</h1>
    <p>
        <!-- Button trigger modal -->
        <button style="margin-left: 50px;" type="button" class="btn btn-primary btn-lg" ng-click="editClick(0)">
            Create
        </button>
    </p>
    <div style="display: flex;">

        <p style="margin-left: 50px;">Search: <input type="text" ng-model='q'></p>
        <div class="col-xs-4" style="margin-left: 50px;" style="display: flex;" >
            
        <!-- <label for="search">Hiển thị sản phẩm: </label> -->
            <input type="number" min="1" max="100" class="form-control" ng-model="pageSize" style="width:200px">
            
        </div>
    </div>
    <br>
    <table class="table table-bordered table-stripper">
        <tr>

            <th>ID</th>
            <th>Tên SP</th>
            <th>Loại SP</th>
            <th>ID NCC</th>

            <th>Giá</th>
            <th>Số lượng</th>
            <th>Image</th>
            <th>Kiểu</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <tr dir-paginate="a in sanphams | filter:q | itemsPerPage: pageSize" current-page="currentPage">

            <td>@{{a.id}}</td>
            <td>@{{a.name}}</td>
            <td>@{{a.id_loai_sp}}</td>
            <td>@{{a.id_ncc}}</td>
            <td>@{{a.unit_price|number}}</td>
            <td>@{{a.so_luong}}</td>
            <td><img src="/upload/product/@{{a.image}}" style="width:100px"></td>
            <td>@{{a.don_vi_tinh}}</td>
            <td><button class="btn btn-info" ng-click="editClick(a.id)"> Edit</button></td>
            <td><button class="btn btn-danger" ng-click="deleteClick(a.id)">Delete</button></td>
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
    <!-- <dir-pagination-controls max-size='20' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls> -->


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{modaltitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" ng-click="Close()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group"><label for="">Tên SP: </label>
                            <div><input type="text" ng-model="sanpham.name" class="form-control"></div>
                        </div>
                        <div class="form-group"><label for="">ID loại SP: </label>
                            <div><input type="text" ng-model="sanpham.id_loai_sp" class="form-control"></div>
                        </div>
                        <div class="form-group"><label for="">ID NCC: </label>
                            <div><input type="text" ng-model="sanpham.id_ncc" class="form-control"></div>
                        </div>
                        <div class="form-group"><label for="">Mô tả: </label>
                            <div><textarea class="form-control" rows="8" ng-model="sanpham.mota_sp"></textarea></div>
                        </div>
                        <!-- <div class="form-group">
                                <label for="">id loai sp: </label>
                                <select ng-model="sanpham.id_loai_sp" class="form-control">
                                    <option value="Nam">Nam</option>
                                    <option value="Nu">Nu</option>
                                </select>
                            </div> -->
                        <div class="form-group">
                            <label for="">Giá: </label>
                            <div><input type="text" ng-model="sanpham.unit_price" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng: </label>
                            <div><input type="text" ng-model="sanpham.so_luong" class="form-control"></div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Image: </label>
                            <div><input type="text" ng-model="sanpham.image" class="form-control"></div>
                        </div> -->





                        <div class="form-group">

                            <label for="name">Ảnh:</label>
                            <div>
                                <input type="text" ng-model="sanpham.image" class="form-control">
                                <input type="file" class="form-control" id="file-upload" ng-model="sanpham.image">
                            </div>
                            </br>
                            <div style="height:100px;display:flex;justify-content: space-around;" id="image">
                                <div ng-repeat="a in images">
                                    <div>
                                        <img src="/upload/product/@{{a}}" alt="Ảnh" style="width:100px;height:100px" ng-model="sanpham.image">
                                    </div>
                                </div>
                            </div>

                        </div>




                        <div class="form-group">
                            <label for="">Đơn vị tính: </label>
                            <div><input type="text" ng-model="sanpham.don_vi_tinh" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Color: </label>
                            <div><input type="text" ng-model="sanpham.color" class="form-control"></div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close" ng-click="Close()">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="/js/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="/js/angular.min.js"></script>
    <script src="/js/sanphamcontroller.js"></script> -->

    <script src="/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script> -->
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>
</body>
@stop