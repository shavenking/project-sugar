<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AttendeeTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreate()
    {
        $user        = factory(\App\User::class)->create();
        $anotherUser = factory(\App\User::class)->create();

        $activity    = $user->activities()->create(
            factory(\App\Entities\Activity::class)->make()->toArray(),
            [
                'is_admin' => true
            ]
        );

        $this->actingAs($anotherUser)->post(
            route('activity.attendee.store', $activity->id), []
        )->seeJson();
    }
}
