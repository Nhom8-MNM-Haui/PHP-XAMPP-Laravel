@extends("backend.layout")
@section("do-du-lieu")
	<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="{{url('admin/products/create')}}" class="btn btn-primary">Add products</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List Products</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">photo</th>
                    <th>Name</th>
                    <th style="width:150px;">Category</th>
                    <th style="width: 70px;">Price</th>
                    <th style="width: 70px;">Discount</th>
                    <th style="width:70px;">Hot</th>
                    <th style="width:120px;"></th>
                </tr>
                @foreach($data as $rows)
                <tr>
                    <td style="text-align: center;">
                        @if(file_exists('upload/products/'.$rows->photo))
                        <img src="{{asset('upload/products/'.$rows->photo)}}" style="width: 100px;">
                        @endif
                    </td>
                    <td>{{$rows->name}}</td>
                    @php 
                        	$categories = DB::select("select * from categories where id =$rows->category_id");
                    @endphp
                    <td>{{$categories[0]->name}}</td>
                    <td style="text-align: center;">{{number_format($rows->price)}}</td>
                    <td style="text-align: center;">{{$rows->discount}}</td>
                   <td style="text-align: center;">@if($rows->hot==1)<span class="fa fa-check"></span>@endif</td>
                    <td style="text-align:center;">
                        <a href="{{ url('admin/products/update/'.$rows->id) }}">Update</a>&nbsp;
                        <a href="{{ url('admin/products/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            	@endforeach
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            {{$data->render()}}
        </div>
    </div>
</div>
@endsection