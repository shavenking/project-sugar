<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreate()
    {
        $user = factory(\App\User::class)->create();
        $goal = $user->goals()->create(
            factory(\App\Entities\Goal::class)->make()->toArray(),
            [
                'is_admin' => true
            ]
        );

        $task = factory(\App\Entities\Task::class)->make();

        $this->actingAs($user)
            ->json(
                'POST',
                route('api.goals.tasks.store', $goal->id),
                [
                    'type' => $task->getType(),
                    'attributes' => [
                        'title' => $task->title
                    ]
                ]
            )->seeJsonStructure([
                'data' => [
                    'id',
                    'type',
                    'attributes' => ['title']
                ]
            ]);
    }

    public function testUserNotInGoalCanNotCreate()
    {
        $user = factory(\App\User::class)->create();
        $anotherUser = factory(\App\User::class)->create();
        $goal = $user->goals()->create(
            factory(\App\Entities\Goal::class)->make()->toArray(),
            [
                'is_admin' => true
            ]
        );

        $task = factory(\App\Entities\Task::class)->make();

        $this->actingAs($anotherUser)
            ->json(
                'POST',
                route('api.goals.tasks.store', $goal->id),
                [
                    'type' => $task->getType(),
                    'attributes' => [
                        'title' => $task->title
                    ]
                ]
            )->seeJsonStructure([
                'error'
            ]);
    }
}
