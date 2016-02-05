<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivitiesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = $request->user();
        $activity = $user->activities()->create($request->all());

        return response()->json([
            'data' => [
                'type' => 'activities',
                'attributes' => array_only($activity->toArray(), ['name'])
            ]
        ]);
    }
}
