<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Activity;

class ActivitiesController extends Controller
{
    public function store(Request $request, Activity $model)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $activity = $model->create($request->all());

        return response()->json([
            'data' => [
                'type' => 'activities',
                'attributes' => array_only($activity->attributesToArray(), ['name'])
            ]
        ]);
    }
}
