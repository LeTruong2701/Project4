


@extends('layout_admin')
@section('content')
<body  ng-app="myapp" ng-controller="mycontrol">
<h1 style="margin-left: 50px;margin-top:20px;">Quản lý phản hồi</h1>
        <p><button style="margin-left: 50px;" class="btn btn-primary" ng-click="showModal(0)"> Create</button></p>
        <table class="table table-bordered table-stripper">
            <tr>
            <th>TT</th>
                <th>ID Phan hoi</th>
                <th>ID Tai khoan</th>
                <th>ID SP</th>
                <th>Level</th>
                <th>Note</th>
                
                

                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr ng-repeat = "nv in phanhois">
                <td>@{{$index+1}}</td>
                <td>@{{nv.id_phan_hoi}}</td>
                <td>@{{nv.id_tk}}</td>
                <td>@{{nv.id_sp}}</td>
                <td>@{{nv.level}}</td>
                <td>@{{nv.note}}</td>
                
                <td><button class="btn btn-info" ng-click="showModal(nv.id)"> Edit</button></td>
                <td><button class="btn btn-danger" ng-click = "deleteClick(nv.id)"> Delete</button></td>
            </tr>
        </table>
        


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
                            <div class="form-group"><label for="">id_tk: </label>
                                <div><input type="text" ng-model="phanhoi.id_tk" class="form-control"></div>
                            </div>
                          
                            <div class="form-group">
                                <label for="">id sp: </label>
                                <div><input type="text" ng-model="phanhoi.id_sp" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">level: </label>
                                <div><input type="text" ng-model="phanhoi.level" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">note: </label>
                                <div><input type="text" ng-model="phanhoi.note" class="form-control"></div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha512-Cy3gSrKCS8aJ7AIaammc0wLXyKRmTa8ntgHvU01Tuz4EdsqVgk/lKzFm/b/8RxOWBaoHI2uGLLU6rXMbqKcGHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/js/angular.min.js"></script>
        <script src="/js/phanhoicontroller.js"></script>
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
  </body>
@stop