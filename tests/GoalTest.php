<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GoalTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreate()
    {
        $user = factory(\App\User::class)->create();
        $goal = factory(\App\Entities\Goal::class)->make();

        $this->actingAs($user)
            ->json(
                'POST',
                route('api.goals.store'),
                [
                    'type' => 'goals',
                    'attributes' => [
                        'title' => $goal->title,
                        'due_at' => (string) $goal->due_at
                    ]
                ]
            )->seeJsonStructure([
                'data' => [
                    'id',
                    'type',
                    'attributes' => ['title', 'due_at']
                ]
            ])->seeJsonContains([
                'type' => 'goals'
            ]);
    }
}
