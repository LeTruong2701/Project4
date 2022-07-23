@extends('layout_admin')
@section('content')



  <body class="container-fluid px-4"  ng-controller="nhacungcapcontroller">
<h1 style="margin-left: 50px;margin-top:20px;">Quản lý nhà cung cấp</h1>
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
                <th>Tên NCC</th>
                <th>Địa chỉ NCC</th>
                <th>email</th>
                <th>SDT</th>
                <th>Delet</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "nv in nhacungcaps | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{nv.ten_ncc}}</td>
            <td>@{{nv.diachi_ncc}}</td>
            <td>@{{nv.email}}</td>
            <td>@{{nv.sdt}}</td>
            <td>@{{nv.Delet}}</td>
            <td>@{{nv.created_at}}</td>
            <td>@{{nv.updated_at}}</td>
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
                            <div class="form-group"><label for="">Tên NCC: </label>
                                <div><input type="text" ng-model="nhacungcap.ten_ncc" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Địa chỉ: </label>
                                <div><input type="text" ng-model="nhacungcap.diachi_ncc" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Email: </label>
                                <div><input type="text" ng-model="nhacungcap.email" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Phone: </label>
                                <div><input type="text" ng-model="nhacungcap.sdt" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Delet: </label>
                                <div><input type="text" ng-model="nhacungcap.Delet" class="form-control"></div>
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
        <script src="/js/nhacungcapcontroller.js"></script>
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