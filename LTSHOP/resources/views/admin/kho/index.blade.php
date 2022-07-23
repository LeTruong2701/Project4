@extends('layout_admin')
@section('content')


  <body class="container-fluid px-4"   ng-controller="khocontroller">
<h1 style="margin-left: 50px;margin-top:20px;">Quản lý kho</h1>
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
                <th>id_sp</th>
                <th>sl</th>
                
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "nv in khos | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{nv.id}}</td>
            <td>@{{nv.id_sp}}</td>
            <td>@{{nv.sl}}</td>
        
            <td>@{{nv.created_at}}</td>
            <td>@{{nv.updated_at}}</td>
            <td><button class="btn btn-info" ng-click="editClick(nv.id)"> Edit</button></td>
            <td><button class="btn btn-danger" ng-click= "deleteClick(nv.id)">Delete</button></td>
        </tr>
        </table>
        <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>


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
                            <div class="form-group"><label for="">id sp: </label>
                                <div><input type="text" ng-model="kho.id_id" class="form-control"></div>
                            </div>
                            <div class="form-group"><label for="">số lượng: </label>
                                <div><input type="text" ng-model="kho.sl" class="form-control"></div>
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

        <!-- <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/angular.min.js"></script>
        <script src="/js/khocontroller.js"></script>
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