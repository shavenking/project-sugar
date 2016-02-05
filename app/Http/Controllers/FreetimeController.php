<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FreetimeController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_at' => 'required|date',
            'end_at' => 'required|date'
        ]);

        $user = $request->user();
        $freetime = $user->freetimeSet()->create($request->all());

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
