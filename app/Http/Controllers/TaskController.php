<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Goal;

class TaskController extends Controller
{
    public function store(Goal $goals, Request $request)
    {
        $attributes = $request->input('attributes');

        $user = $request->user();

        // Users not in Goal can not create task
        if (!$goals->users()->find($user->id)) {
            return response()->json([
                'error' => []
            ]);
        }

        $task = $goals->tasks()->create(array_merge($attributes, [
            'user_id' => $user->id
        ]));

        return response()->json([
            'data' => [
                'id' => $task->id,
                'type' => $task->getType(),
                'attributes' => [
                    'title' => $task->title
                ]
            ]
        ]);
    }
}
