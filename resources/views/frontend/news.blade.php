@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="page pb30">
    <div class="container">
        <div class="stores row">
            <div class="main-title2 text-center">
                <h1>Tin tức</h1>
            </div>
            <div class="stores-list clearfix">
                @foreach($data as $rows)
                    <div class="stores-item">
                        <a href="{{url('news/detail/'.$rows->id)}}" title="{{$rows->name}}">
                          <img src="{{asset('upload/news/'.$rows->photo)}}" alt="{{$rows->name}}" style="width:100%;" title="{{$rows->name}}" class="lazyload">
                          <div class="stores-info">
                            <p class="title"><a href="{{url('news/detail/'.$rows->id)}}">{{$rows->name}}</a></p>
                            </div>
                        </a>
                    </div>
                @endforeach
        </div>
        <div class="paginate text-center">
            <div id="pagination">
               {{$data->render()}} 
            </div>
        </div>
       </div>
   </div>
</div>
@endsection