@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Profile Page for: {{$prfileUser->name}}</h2>
                    </div>
                    <div class="panel-body">
                        <h2>Tweets: soon</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection