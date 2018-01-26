@extends('layouts.layout-admin')
@section('main')
<div class="row mt">
  <div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">

       <h4><i class="fa fa-angle-right"></i>Review Table</h4>
       {!! Form::open(['method'=>'GET','url'=>'admin/review/show']) !!}
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
          <th><i class="fa fa-bullhorn"></i> Email</th>
          <th><i class="fa fa-bullhorn"></i> Content</th>
          <th><i class="fa fa-bullhorn"></i> Status</th>
          <th colspan="4"><i class="fa fa-bullhorn">Action</i></th>
                                                                    <!-- <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
                                  <th><i class="fa fa-bookmark"></i> Profit</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th> -->
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($review as $item)
                                <tr>
                                  <td>{{ $item->id }}</td>
                                  <td class="hidden-phone">{{ $item->name }}</td>
                                  <td class="hidden-phone">{{ $item->email }}</td>
                                  <td class="hidden-phone">{{ $item->content }}</td>
                                  @if($item->status == 0)
                                  <td class="hidden-phone"><?php echo "Chưa xử lý"; ?></td>
                                  @else if($item->status == 1)
                                  <td class="hidden-phone"><?php echo "Đã xử lý"; ?></td>
                                  @endif
                                  {!! Form::open(['method' => 'POST', 'url' => 'admin/review/daXuLy/' . $item->id]) !!}
                                  <td>
                                    {!! Form::submit('Đã xử lý', ['class' => 'btn btn-success']) !!}
                                  </td>
                                  {!! Form::close() !!}
                                  {!! Form::open(['method' => 'POST', 'url' => 'admin/review/chuaXuLy/' . $item->id]) !!}
                                  <td>
                                    {!! Form::submit('Chưa xử lý', ['class' => 'btn btn-warning']) !!}
                                  </td>
                                  {!! Form::close() !!}
                                 <td> 


                                  {!! Form::open(['method'=>'delete','url'=>['admin/review',$item->id]]) !!}
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