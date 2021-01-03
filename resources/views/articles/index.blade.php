@extends('layouts.master')

@section('content')
    <div class="event" id="event">
        <div class="container">
            <div class="default-heading">
                <!-- heading -->
                <h2>Latest Articles</h2>
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
                        <span class="sub-text">For details click on the link.</span>
                        <!-- paragraph -->

                    </div>
                </div>
                @endforeach

            </div>
            @endforeach
        </div>
    </div>

@endsection
