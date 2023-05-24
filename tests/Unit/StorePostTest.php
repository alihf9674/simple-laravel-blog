<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class StorePostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_it_create_a_new_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user)->post(
            route('post.store'),
            [
                'title' => 'test100000',
                'user_id' => $user->id,
            ]
        );

        $this->assertDatabaseHas('posts', [
            'title' => 'test100000',
            'user_id' => $user->id,
        ]);
    }
}
