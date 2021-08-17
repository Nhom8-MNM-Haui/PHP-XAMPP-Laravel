@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div id="PageContainer" class="is-moved-by-drawer">
  <div class="container">
    <div class="article-img text-center">
    </div>
    <h1>@php echo $record->name; @endphp</h1>
    <div class="article-detail rte">
     <p>@php echo $record->description; @endphp</p>
     <p>@php echo $record->content; @endphp</p>
   </div>
 </div>
</div>
@endsection