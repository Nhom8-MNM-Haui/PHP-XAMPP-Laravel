@extends("backend.layout")
@section("do-du-lieu")
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit products</div>
        <div class="panel-body">
        <!-- chu y: muon upload duoc file thi phai co thuoc tinh enctype="multipart/form-data" vao trong the form -->
        <form method="post" enctype="multipart/form-data" action="{{$action}}">
            @csrf
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="{{isset($record->name)?$record->name:""}}" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Price</div>
                <div class="col-md-10">
                    <input type="text" value="{{isset($record->price)?$record->price:""}}" name="price" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->  
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">% Discount</div>
                <div class="col-md-10">
                    <input type="number" min="0" max="100" value="{{isset($record->discount)?$record->discount:""}}" name="discount" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            @php 
                $categories = DB::select("select id,name from categories where parent_id = 0");
            @endphp
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Category</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 250px;" name="category_id">
                        @foreach($categories as $rows)
                            <option @if(isset($record->category_id)&&$record->category_id==$rows->id) selected @endif value="{{$rows->id}}">{{$rows->name}}</option>
                            @php $categoriesSub = DB::select("select id,name from categories where parent_id = $rows->id order by id desc"); @endphp
                            @foreach($categoriesSub as $rowsSub)
                                <option @if(isset($record->category_id)&&$record->category_id==$rowsSub->id) selected @endif value="{{$rowsSub->id}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$rowsSub->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- end rows -->          
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Descripition</div>
                <div class="col-md-10">
                    <textarea name="description" id="description">
                        {{isset($record->description)?$record->description:""}}
                    </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("description");
                    </script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Content</div>
                <div class="col-md-10">
                    <textarea name="content" id="content">
                        {{isset($record->content)?$record->content:""}}
                    </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("content");
                    </script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="checkbox" @if(isset($record->hot)&&$record->hot==1) checked @endif name="hot" id="hot"> <label for="hot">Hot</label>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Upload image</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <!-- end rows -->
            @if(isset($record->photo)&&file_exists('upload/products/'.$record->photo))
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <img src="{{asset('upload/products/'.$record->photo)}}" style="width: 100px;">
                </div>
            </div>
            <!-- end rows -->
            @endif
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
@endsection