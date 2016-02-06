<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Activity;
use App\Entities\Freetime;

class AvailableDateController extends Controller
{
    public function index(Activity $activity)
    {
        $attendeeIds = $activity->attendees->lists('id');
        $freetimeSet = Freetime::whereIn('user_id', $attendeeIds)->get();
        
        foreach ($freetimeSet as $freetime) {
            if (!isset($startAt) || $freetime->start_at->gte($startAt)) {
                $startAt = $freetime->start_at;
            }

            if (!isset($endAt) || $freetime->end_at->lte($endAt)) {
                $endAt = $freetime->end_at;
            }
        }

        if ($endAt->lt($startAt)) {
            return response()->json([
                'data' => []
            ]);
        }

        return response()->json([
            'data' => [
                'type' => 'available_date',
                'attributes' => [
                    'start_at' => (string) $startAt,
                    'end_at' => (string) $endAt
                ]
            ]
        ]);
    }
}
