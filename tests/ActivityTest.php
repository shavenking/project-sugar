<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateActivity()
    {
        $user     = factory(\App\User::class)->create();
        $activity = factory(\App\Entities\Activity::class)->make();

        $this->actingAs($user)
             ->post('/activity', $activity->toArray())
             ->seeJson([
                'data' => [
                    'type' => 'activity',
                    'attributes' => array_only($activity->toArray(), ['name'])
                ]
            ]);
    }
}
