<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Activity;
use App\Entities\Freetime;

class FreetimeController extends Controller
{
    public function store(Activity $activities, Request $request, Freetime $model)
    {
        $this->validate($request, [
            'start_at' => 'required|date',
            'end_at' => 'required|date'
        ]);

        $freetime = $activities->freetime()->create($request->all());

        return response()->json([
            'data' => [
                'type' => 'freetime',
                'attributes' => [
                    'start_at' => (string) $freetime->start_at,
                    'end_at' => (string) $freetime->end_at
                ]
            ]
        ]);
    }
}
