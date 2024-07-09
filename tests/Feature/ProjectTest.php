<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function testProjectIndex(): void
    {
        $response = $this
            ->get('/projects');

        $response
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @throws \JsonException
     */
    public function testProjectStore(): void
    {
        $response = $this
            ->post('/projects', [
                'name' => 'Test',
                'color' => '#FFFFFF'
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/projects');

        $project = Project::latest()->first();

        $this->assertSame('Test', $project->name);
        $this->assertSame('#FFFFFF', $project->color);
    }

    public function testProjectEdit()
    {
        $project = Project::factory()->create();

        $response = $this
            ->get('/projects/'.$project->id.'/edit', [
                $project
            ]);

        $response
            ->assertStatus(200)
            ->assertOk();
    }

    /**
     * @throws \JsonException
     */
    public function testProjectUpdate(): void
    {
        $project = Project::factory()->create();

        $response = $this
            ->patch('/projects/'.$project->id, [
                'name' => 'Edit Test',
                'color' => '#FFFFFF',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/projects');

        $editedProject = Project::latest()->first();

        $this->assertSame('Edit Test', $editedProject->name);
        $this->assertSame('#FFFFFF', $editedProject->color);
    }

    /**
     * @throws \JsonException
     */
    public function testProjectDestroy()
    {
        $project = Project::factory()->create();

        $response = $this
            ->delete('/projects/'.$project->id, [
                $project
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/projects/');
    }
}
