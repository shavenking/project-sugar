<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FreetimeTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreateFreetime()
    {
        $user = factory(\App\User::class)->create();
        $freetime = factory(\App\Entities\Freetime::class)->make();

        $this->actingAs($user)
            ->post(
                route('freetime.store'), 
                [
                    'start_at' => (string) $freetime->start_at,
                    'end_at' => (string) $freetime->end_at
                ]
            )->seeJson([
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
