@extends('layouts.master')

@section('content')

<form action="{{route('save-article')}}" method="post" enctype="multipart/form-data">
<div class="form-horizontal">
    <h3>Create New Article</h3>
    <hr />
<div class="form-group">
    <label class="control-label col-md-2">Tilte</label>
<div class="col-md-4">
    <input class="form-control" type="text" placeholder="Article Title" name="title">
</div>
</div>

<div class="form-group">
        <label class="control-label col-md-2">Details</label>
    <div class="col-md-4">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="12" placeholder="Article Details" name="details"></textarea>
    </div>
</div>

    <div class="form-group">
        <label class="control-label col-md-2">Category</label>
        <div class="col-md-4">
            <select class="form-control" id="exampleFormControlTextarea1"  name="category">
                <option value=""> Select a Category </option>
                @foreach($categories as $cat)
                    <option value="{{$cat -> id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
<div class="form-group">
    <div class="col-md-4">
        <input type="file" name="photo" class="form-control">
    </div>

</div>

    <div class="col-md-2">
        <input type="submit" value="Create" class="btn btn-sm btn-success"  />
    </div>
    @csrf
</div>
</form>
@endsection
