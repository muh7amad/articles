@extends('layouts.master')

@section('content')
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <ul class="nav navbar-nav">
                @foreach($categories as $cat)
                    <li><a href="{{ route('articles', ['categoryId' => $cat->id]) }}">{{$cat->name}}<span class="sr-only">(current)</span></a></li>
                @endforeach
            </ul>

        </div>

    </nav>
    <div class="event" id="event">
        <div class="container">
            <div class="default-heading">

                <!-- heading -->
                @if($categoryName == 'null')
                <h2>Latest Articles</h2>
                @else
                    <h2>{{$categoryName -> name}}</h2>
                @endif


            </div>
            @foreach($articles->chunk(3) as $items)
            <div class="row">
                @foreach( $items as $article)
                <div class="col-md-4 col-sm-4">
                    <!-- event item -->
                    <div class="event-item">
                        <!-- image -->
                        <img class="img-responsive" src="{{ URL::to('/') }}/uploads/articles_images/thumb/{{$article->thumb}}" alt="Events" />
                        <!-- heading -->
                        <h4><a href="{{ route('single', ['id' => $article->id]) }}">{{$article->title}}</a></h4>
                        <!-- sub text -->
                        <span class="sub-text">{{$article->created_at->toDateString()}}</span>
                        <!-- paragraph -->

                    </div>


                            <span>


                                  <button id="deletefavourite{{$article->id}}" onclick="deleteFromFavourites({{$article->id}})"
                                  style="{{$article->favorited() ? '':'display:none;'}}">
                                  <i  class="fa fa-heart"></i></button>



                                  <button id="addToFavourites{{$article->id}}" onclick="addToFavourites({{$article->id}})"
                                  style="{{$article->favorited() ? 'display:none;':''}}">
                                  <i  class="fa fa-heart-o"></i></button>


                            </span>
                          {{--  {{$article->favorited() ? 'true' : 'false'}}  --}}





                </div>
                @endforeach

            </div>
            @endforeach
        </div>
    </div>

@endsection
