@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Profile Page for: {{$profileUser->name}}
                            @if(\Auth::check())
                                <following-button
                                        :is-following="{{ \Auth()->user()->isFollowing($profileUser) }}"
                                        user="{{$profileUser->username}}"
                                ></following-button>
                            @endif
                        </h2>
                        <nav>
                            <ul class="nav nav-pills nav-justified">
                                <li>
                                    <a href="{{route('tweets.index', $profileUser)}}">Tweets<br>{{$profileUser->tweets->count()}}
                                    </a></li>
                                <li><a href="#">Followers<br>Count</a></li>
                                <li><a href="#">Following<br>Count</a></li>
                            </ul>
                        </nav>
                    </div>
                    @forelse($profileUser->tweets as $tweet)
                        <div class="panel-body">
                            <a href="{{route("tweets.show", [$profileUser, $tweet])}}"> {{$tweet->body}} </a>
                        </div>
                        <hr>
                    @empty
                        <div class="panel-body">
                            <h2>Tweets: soon</h2>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection