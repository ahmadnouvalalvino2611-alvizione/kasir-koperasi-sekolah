<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
<<<<<<< HEAD
    public function test_root_redirects_to_dashboard(): void
    {
        $this->get('/')->assertRedirect('/dashboard');
    }

    public function test_dashboard_returns_a_successful_response(): void
    {
        $this->get('/dashboard')->assertStatus(200);
=======
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
    }
}
