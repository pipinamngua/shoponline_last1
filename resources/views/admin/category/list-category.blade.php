@extends('layouts.layout-admin')
@section('main')
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            
	                  	  	  <h4><i class="fa fa-angle-right"></i>Category Table</h4>
                            {!! Form::open(['method'=>'GET','url'=>'admin/category']) !!}
                                {!! Form::text('keyword',null,['placeholder'=>'Search name ....','class'=>'form-control']) !!}
                                {!! Form::submit('Search',['class'=>'btn btn-primary']) !!}
                            {!! Form::close()!!}
                            @if(Session::has('sucess'))
                            <div class="alert alert-success">
                                <i><p>{{ Session::get('sucess')}}</p></i>
                            </div>
                            @endif
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID</th>
                                  <th><i class="fa fa-bullhorn"></i> Name</th>
                                  <th colspan="2"><i class="fa fa-bullhorn">Action</i></th>
                                                                    <!-- <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
                                  <th><i class="fa fa-bookmark"></i> Profit</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th> -->
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($category as $item)
                              <tr>
                                  <td>{{ $item->id }}</td>
                                  <td class="hidden-phone">{{ $item->name }}</td>
                                  <td>
                                      <button class="btn btn-primary btn-xs">
                                         <a href="{{ url('admin/category/'.$item->id.'/edit') }}" style="color:white" class="fa fa-pencil"></a>
                                      </button>
                                   </td>
                                   <td> 
                                      
                                  
                                      {!! Form::open(['method'=>'delete','url'=>['admin/category',$item->id]]) !!}
                                      <button class="btn btn-danger btn-xs" onclick="return confirm('Bạn chắc chắn xóa không?')" href="{{ url('admin/product') }}" >
                                          <i class="fa fa-trash-o"></i>
                                      </button>
                                      {!! Form::close() !!}
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
@endsection