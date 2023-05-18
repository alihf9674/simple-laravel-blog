<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function test_input_missing_a_title_is_rejected()
    {
      $response = $this->post(route('post.store'), ['title' => 'test title']);
      $response->assertRedirect();
      $response->assertSessionHasErrors();
    }

    public function test_valid_input_should_create_a_post_in_the_database()
    {
        $this->post(route('post.store'), ['title' => 'title2', 'user_id' => 295]);
        $this->assertDatabaseHas('posts', ['title' => 'title2', 'user_id' => 295]);
    }

}
