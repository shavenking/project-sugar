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
                    <div class="panel-heading">
                        @if (request()->has('filter.attended') && !(bool) request()->input('filter.attended'))
                            <div class="pull-right">
                                <form class="form-inline" action="{{ route('activity.attendee.store', $activity->id) }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-link btn-text-only">
                                        <i class="fa fa-plus"></i>&nbsp;Attend
                                    </button>
                                </form>
                            </div>
                        @endif

                        @if (request()->has('filter.attended') && (bool) request()->input('filter.attended'))
                            <div class="pull-right">
                                <a href="{{ route('activity.show', $activity->id) }}">
                                    View Activity&nbsp;<i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        @endif

                        {{ $activity->name }}
                    </div>

                    <div class="panel-body">
                        {{ $activity->name }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
