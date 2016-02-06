<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Activity;

class ActivityController extends Controller
{
    public function index(Activity $activity, Request $request)
    {
        $query = $activity->newQuery();

        if ($request->has('filter.attended')) {
            $wantAttended = (bool) $request->input('filter.attended');
            
            $query->whereHas('attendees', function ($q) use ($request, $wantAttended) {
                if ($wantAttended) {
                    $q->whereUserId($request->user()->id);    
                } else {
                    $q->where('user_id', '!=', $request->user()->id);
                }
            });
        }

        $activities = $query->get();

        return view('activity.index')->withActivities($activities);
    }

    public function create()
    {
        return view('activity.create');
    }

    public function show(Activity $activity)
    {
        return view('activity.show')->withActivity($activity);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = $request->user();
        $activity = $user->activities()->create($request->all(), [
            'is_admin' => true
        ]);

        if (!$request->wantsJson()) {
            return redirect()->route('activity.show', $activity->id);
        }

        return response()->json([
            'data' => [
                'type' => 'activity',
                'attributes' => array_only($activity->toArray(), ['name'])
            ]
        ]);
    }
}
