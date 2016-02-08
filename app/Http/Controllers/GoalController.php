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

        $user = $request->user();
        $newGoal = $user->goals()->create($attributes, [
            'is_admin' => true
        ]);

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
