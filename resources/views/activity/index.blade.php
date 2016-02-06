@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p>
                <a href="{{ route('activity.create') }}" class="btn btn-primary">Create</a>    
            </p>
        </div>
        @foreach ($activities as $activity)
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $activity->name }}</div>

                    <div class="panel-body">
                        {{ $activity->name }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
