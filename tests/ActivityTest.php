<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    public function testCreateActivity()
    {
        $activity = factory(\App\Entities\Activity::class)->make();

        $this->post('/activities', $activity->toArray())
             ->seeJson([
                'data' => [
                    'type' => 'activities',
                    'attributes' => array_only($activity->attributesToArray(), ['name'])
                ]
            ]);
    }
}
