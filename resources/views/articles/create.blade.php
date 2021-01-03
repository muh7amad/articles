<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Article Details" name="details"></textarea>
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
