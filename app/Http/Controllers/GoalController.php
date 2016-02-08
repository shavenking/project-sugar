<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Goal;

class GoalController extends Controller
{
    public function store(Goal $goal, Request $request)
    {
        $attributes = $request->input('attributes');

        $newGoal = $goal->create($attributes);

        return response()->json([
            'data' => [
                'id' => $newGoal->id,
                'type' => $newGoal->getType(),
                'attributes' => [
                    'title' => $newGoal->title,
                    'due_at' => $newGoal->due_at
                ]
            ]
        ]);
    }
}
