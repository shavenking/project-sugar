<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AvailableDateTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $user = $this->createUserWithFreetime();
        $anotherUser = $this->createUserWithFreetime();

        $activity = $this->startAnActivity($user);

        $this->addAttendee($activity, [$anotherUser]);

        $this->actingAs($user)->json(
            'GET',
            route('api.activity.available-date.index', $activity->id)
        )->seeJsonStructure([
            'data' => [
                'type', 
                'attributes' => ['start_at', 'end_at']
            ]
        ]);
    }

    private function createUserWithFreetime($times = 2)
    {
        $user = factory(\App\User::class)->create();

        $user->freetimeSet()->createMany(
            factory(\App\Entities\Freetime::class)->times($times)->make()->toArray()
        );

        return $user;
    }

    private function startAnActivity(\App\User $user)
    {
        return $user->activities()->create(
            factory(\App\Entities\Activity::class)->make()->toArray(),
            [
                'is_admin' => true
            ]
        );
    }

    private function addAttendee(\App\Entities\Activity $activity, array $attendees)
    {
        $list = [];

        foreach ($attendees as $attendee) {
            $activity->attendees()->attach($attendee->id, ['is_admin' => false]);
        }
    }
}
