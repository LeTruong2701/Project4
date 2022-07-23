


        @extends('layout_admin')
        @section('content')


    <body class="container-fluid px-4"  ng-controller="billdetailbancontroller">
<h1 style="margin-left: 50px;margin-top:20px;">Quản lý chi tiết bill bán</h1>
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
                <th>ID</th>
                <th>ID bill ban</th>
                <th>ID SP</th>
                <th>So luong</th>
                <th>Created_at</th>
                <th>Updated_at</th>

                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "nv in billdetailbans | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{nv.id}}</td>
            <td>@{{nv.id_bill_ban}}</td>
            <td>@{{nv.id_sp}}</td>
            <td>@{{nv.sl}}</td>
   
           
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
                            <div class="form-group"><label for="">id bill nhap: </label>
                                <div><input type="text" ng-model="billdetailban.id_bill_nhap" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">id sản phẩm: </label>
                                <div><input type="text" ng-model="billdetailban.id_sp" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">so lượng: </label>
                                <div><input type="text" ng-model="billdetailban.sl" class="form-control"></div>
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
        <script src="/js/billdetailbancontroller.js"></script>
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
