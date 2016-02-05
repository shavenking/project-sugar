<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Activity;

class AttendeeController extends Controller
{
    public function store(Activity $activity, Request $request)
    {
        $user = $request->user();

        $user->activities()->sync([
            "{$activity->id}" => ['is_admin' => false]
        ]);

        return response()->json();
    }
}
