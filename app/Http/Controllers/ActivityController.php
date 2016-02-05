<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = $request->user();
        $activity = $user->activities()->create($request->all(), [
            'is_admin' => true
        ]);

        return response()->json([
            'data' => [
                'type' => 'activity',
                'attributes' => array_only($activity->toArray(), ['name'])
            ]
        ]);
    }
}
