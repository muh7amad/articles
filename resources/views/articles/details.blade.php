@extends('layouts.master')

@section('content')
    <h3>{{$ppp->title}}</h3>
    <hr />
    <div class="container">


<div class="row">

        <div class="col-8" align="center">
            <img class="img-responsive" src="{{ URL::to('/') }}/uploads/articles_images/{{$ppp->photo}}" alt="Events" />
        </div>

</div>
        <div class="row">

                <div class="col-10">
                    <p style="font-size: 18px">{{$ppp->details}}</p>
                </div>


        </div>
    </div>
@endsection
