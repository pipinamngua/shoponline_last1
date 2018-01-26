
@extends('layouts.layout-admin')
@section('main')
<div class="row mt">
  <div class="col-lg-6">
   <div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i>Create New Product </h4>

    {!!  Form::open(['method'=>'POST','url'=>'admin/product/create','class'=>'form-horizontal style-form','files'=>true])  !!}
    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        {!!  Form::text('name',null,['class'=>'form-control','placeholder'=>'Input name product ...'])  !!}
        {!! $errors->first('name','<p style="color:red">:message</p>') !!}
      </div>


    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Price</label>
      <div class="col-sm-10">
        {!!  Form::text('price',null,['class'=>'form-control','placeholder'=>'Input price product ...'])  !!}
      </div>
      {!!  $errors->first('price','<p style="color:red">:message</p>') !!}
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Discount</label>
      <div class="col-sm-10">
        {!!  Form::text('discount','0',['class'=>'form-control','placeholder'=>'Input discount product ...'])  !!}
      </div>
      {!!  $errors->first('discount','<p style="color:red">:message</p>') !!}
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Count</label>
      <div class="col-sm-10">
        {!!  Form::text('count',null,['class'=>'form-control','placeholder'=>'Input count product ...'])  !!}
      </div>
      {!!  $errors->first('count','<p style="color:red">:message</p>') !!}
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        {!!  Form::textarea('description',null,['class'=>'form-control','style'=>'height:100px'])  !!}
      </div>
      {!!  $errors->first('description','<p style="color:red">:message</p>') !!}
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Thumbnail</label>
      <div class="col-sm-10">
        {!!  Form::file('thumbnail',['class'=>'form-control'])  !!}
      </div>
      {!!  $errors->first('thumbnail','<p style="color:red">:message</p>') !!}
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Category</label>
      <div class="col-sm-10">
        <select name="categoryId" id="categoryId" required>
          <option value="" disabled selected>Pick a category...</option>
          <option value="1">Phone</option>
          <option value="2">Laptop</option>
          <option value="3">TV</option>
        </select>
      </div>
      {!!  $errors->first('categoryId','<p style="color:red">:message</p>') !!}
    </div>


    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Category</label>
      <div class="col-sm-10">
        <select name="supplierId" id="supplierId" required>
          <option value="" disabled selected>Pick a supplier...</option>
          <option value="1">Công ty HHP</option>
          <option value="2">Công ty MAM</option>
          <option value="3">Công ty LAP</option>
          <option value="4">Công ty PNG</option>
        </select>
      </div>
      {!!  $errors->first('supplierId','<p style="color:red">:message</p>') !!}
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