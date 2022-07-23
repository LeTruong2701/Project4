


@extends('layout_admin')
@section('content')


  <body class="container-fluid px-4"  ng-app="myapp" ng-controller="mycontroller">
<h1 style="margin-left: 50px;margin-top:20px;">Quản lý slide</h1>
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
                <th>ID Slide</th>
                <th>Link</th>
                <th>Image</th>
                

                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "nv in slides | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{nv.id_slide}}</td>
            <td>@{{nv.link}}</td>
            <td>@{{nv.image}}</td>
        
            <td>@{{nv.created_at}}</td>
            <td>@{{nv.updated_at}}</td>
            <td><button class="btn btn-info" ng-click="editClick(nv.id_slide)"> Edit</button></td>
            <td><button class="btn btn-danger" ng-click= "deleteClick(nv.id_slide)">Delete</button></td>
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
                            <div class="form-group"><label for="">link: </label>
                                <div><input type="text" ng-model="slide.link" class="form-control"></div>
                            </div>
                            <div class="form-group"><label for="">image: </label>
                                <div><input type="text" ng-model="slide.image" class="form-control"></div>
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

        <script src="/js/angular.min.js"></script>
        <script src="/js/slidecontroller.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
  </body>
@stop