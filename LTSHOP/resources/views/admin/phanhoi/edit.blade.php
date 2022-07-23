@extends('_admin_layout')
@section('content')
	<div class="card">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Sua san pham
        </div>
        <div class="card-body">
            <form class="form" role="form" method="post" action="/admincp/sanpham/update">
            	 @csrf
            	<input type="hidden" name="id" id="id" value="{{$sanpham->id}}">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label form-control-label">Ten SP</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" id="name" value="{{$sanpham->name}}"  />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Mo ta</label>
                    <div class="col-lg-9">
                        <textarea name="mota_sp" id="mota_sp" class="form-control">
                        	{{$sanpham->mota_sp}}
                        </textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="reset" class="btn btn-secondary" value="Cancel">
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace( 'mota_sp' );
                </script>
@stop