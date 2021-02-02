@extends('layouts.master')

@section('content')
    <nav class="navbar navbar-default">



        <div class="container col-md-12">
            <div class="col-md-4 pull-right" style="padding-top: 10px;">

                <form action="{{route('index')}}" method="GET" role="search">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search articles" style="background-color: #E47133">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search articles" id="term">

                    </div>
                </form>

            </div>
            <div class="col-md-8 pull-left">
            <div class="navbar-header ">
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
                        <div class="col-md-12" style="padding: 0px;">
                        <span class="sub-text col-md-4 pull-left">{{$article->created_at->toDateString()}}</span>
                            <span class="sub-text col-md-4 pull-right">{{$article->category[0]->name}}</span>
                        <!-- paragraph -->
                        </div>
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
    <br/>
    <br/>
    <div class="d-flex justify-content-center" style="text-align: center">
        {!! $articles->links() !!}
    </div>
@endsection
