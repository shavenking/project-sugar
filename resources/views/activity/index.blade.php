@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (!count($activities))
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-info">
                    Oops! There is no matched activity.
                </div>
            </div>
        @endif

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
