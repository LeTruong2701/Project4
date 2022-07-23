

@extends('layout_admin')
@section('content')

  <body class="container-fluid px-4"  ng-controller="newscontroller">
<h1 style="margin-left: 50px;margin-top:20px;">Quản lý tin tức</h1>
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
                <th>ID News</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                
                <th>Created_at</th>
                <th>Updated_at</th>

                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "nv in newss | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{nv.id_new}}</td>
            <td>@{{nv.title}}</td>
            <td>@{{nv.content}}</td>
            <td><img src="/upload/images/@{{nv.image}}" style="width:100px"></td>
            <td>@{{nv.created_at}}</td>
            <td>@{{nv.updated_at}}</td>
            <td><button class="btn btn-info" ng-click="editClick(nv.id_new)"> Edit</button></td>
            <td><button class="btn btn-danger" ng-click= "deleteClick(nv.id_new)">Delete</button></td>
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
                            <div class="form-group"><label for="">Title: </label>
                                <div><input type="text" ng-model="news.title" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Content: </label>
                                <div><input type="text" ng-model="news.content" class="form-control" id="content"></div>
                            </div>
                            <div class="form-group">
                                <label for="">image: </label>
                                <div><input type="text" ng-model="news.image" class="form-control"></div>
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
        <script src="/js/newscontroller.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>-->
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> 
        <script>
            ClassicEditor.create(document.querySelector('#content'));
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
  </body>
@stop