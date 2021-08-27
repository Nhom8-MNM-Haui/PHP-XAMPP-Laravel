@extends("backend.layout")
@section("do-du-lieu")
<h1 class="mt-4">Quản lý user</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
	<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="{{url('admin/users/create')}}" class="btn btn-primary">Add user</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List User</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th style="width:120px;"></th>
                </tr>
                @foreach ($data as $rows)
                	<tr>
                    <td>{{$rows->name}}</td>
                    <td>{{$rows->email}}</td>
                    <td style="text-align:center;">
                        <a href="{{ url('admin/users/update/'.$rows->id) }}">Update</a>&nbsp;
                        <a href="{{ url('admin/users/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
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