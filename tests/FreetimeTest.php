<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FreetimeTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    public function testCreateFreetime()
    {
        $activity = factory(\App\Entities\Activity::class)->create();
        $freetime = factory(\App\Entities\Freetime::class)->make();

        $this->post("/activities/{$activity->id}/freetime", [
            'start_at' => (string) $freetime->start_at,
            'end_at' => (string) $freetime->end_at
        ])->seeJson([
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
