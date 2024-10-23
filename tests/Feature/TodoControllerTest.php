<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Todo;

class TodoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_all_todos()
    {
        //create some todo items
        Todo::factory()->count(3)->create();

        //send get request to index route
        $response = $this->getJson('/api/todos');

        //check response
        $response->assertStatus(200)
                ->assertJsonCount(3)
                ->assertJsonStructure([
                    '*' => ['id', 'title', 'completed', 'created_at', 'updated_at']
                ]);
    }

    /** @test */
    public function it_can_create_a_todo()
    {
        // Send POST request to store route
        $response = $this->postJson('api/todos', [
           'title' => 'New Todo',
        ]);

        //check the reponse and database
        $response->assertStatus(201)
                 ->assertJson(['title' => 'New Todo']);

        $this->assertDatabaseHas('todos', ['title' => 'New Todo']);

    }

    /** @test */
    public function it_can_update_a_todo()
    {
        //create a todo
        $todo = Todo::factory()->create(['title' => 'Old title']);

        //send put request to update route
        $response = $this->putJson("/api/todos/{$todo->id}",[
            'title' => 'Updated title',
            'completed' => true,
        ]);

        //check the response and database
        $response->assertStatus(200)
                 ->assertJson(['title' => 'Updated title', 'completed' => true]);

        $this->assertDatabaseHas('todos', [
            'title' => 'Updated title',
            'completed' => true,
        ]);

    }

    /** @test */
    public function it_can_delete_a_todo()
    {
        //create a todo
        $todo = Todo::factory()->create();

        //send delete request to destroy route
        $response = $this->deleteJson("/api/todos/{$todo->id}");

        //check the response and database
        $response->assertStatus(200);

        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }
}
