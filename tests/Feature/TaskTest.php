<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function testTaskIndex(): void
    {
        $response = $this
            ->get('/tasks');

        $response
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @throws \JsonException
     */
    public function testTaskStore(): void
    {
        $response = $this
            ->post('/tasks', [
                'name' => 'Test',
                'priority' => 1
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/tasks');

        $task = Task::latest()->first();

        $this->assertSame('Test', $task->name);
        $this->assertSame(1, $task->priority);
    }

    public function testTaskEdit()
    {
        $task = Task::factory()->create();

        $response = $this
            ->get('/tasks/'.$task->id.'/edit', [
                $task
            ]);

        $response
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @throws \JsonException
     */
    public function testTaskUpdate(): void
    {
        $task = Task::factory()->create();

        $response = $this
            ->patch('/tasks/'.$task->id, [
                'name' => 'Edit Test',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/tasks');

        $editedTask = Task::latest()->first();

        $this->assertSame('Edit Test', $editedTask->name);
    }

    /**
     * @throws \JsonException
     */
    public function testTaskDestroy()
    {
        $task = Task::factory()->create();

        $response = $this
            ->delete('/tasks/'.$task->id, [
                $task
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/tasks/');
    }
}
