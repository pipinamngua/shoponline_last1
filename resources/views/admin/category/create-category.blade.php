
@extends('layouts.layout-admin')
@section('main')
<div class="row mt">
  <div class="col-lg-6">
   <div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i>Create New Product </h4>

    {!!  Form::open(['method'=>'POST','url'=>'admin/category/create','class'=>'form-horizontal style-form','files'=>true])  !!}
    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        {!!  Form::text('name',null,['class'=>'form-control','placeholder'=>'Input name product ...'])  !!}
        {!! $errors->first('name','<p style="color:red">:message</p>') !!}
      </div>


    </div>
<div class="form-group">
  {!!  Form::submit('Create',['class'=>'btn btn-primary']) !!}
  {!!  Form::reset('Reset',['class'=>'btn btn-primary']) !!}
</div>


{!!  Form::close()  !!}
</div> 
</div><!-- col-lg-12-->       
</div><!-- /row -->
@endsection