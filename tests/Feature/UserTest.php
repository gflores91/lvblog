<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use lvblog\Models\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;
    //use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function test_user_visualiza_login_form()
    // {
    //     $response = $this->get('/login');
    //     $response->assertSuccessful();
    //     $response->assertViewIs('auth.login');
    // }

    // public function test_user_cannot_view_a_login_form_when_authenticated()
    // {
    //     $user = factory(User::class)->make();
    //     $response = $this->actingAs($user)->get('/login');
    //     $response->assertRedirect('/');
    // }

    // public function test_user_can_login_with_correct_credentials()
    // {
    //     $user = factory(User::class)->create([
    //         'password' => bcrypt($password = 'i-love-laravel'),
    //     ]);
    //     $response = $this->post('/login', [
    //         'email' => $user->email,
    //         'password' => $password,
    //     ]);
    //     //$this->withoutMiddleware();
    //     //$response->assertRedirect('/');
    //     $this->assertAuthenticatedAs($user);
    // }

    // public function test_user_puede_hacer_login()
    // {
    //     //Preparación
    //     $user = factory(User::class)->create();
    //     //Acción
    //     $response = $this->post('/login', [
    //             'email' => $user->email,
    //             'password' => 'secret',
    //         ]);
    //     //$response->assertRedirect('/');
    //     //$this->assertRedirectedToRoute('home.index');
    //     $response->assertRedirectedTo('/');
    //     //Validación
    //     $this->assertAuthenticatedAs($user);
    // }

    // public function testVisualizaUsername()
    // {
    //     //Preparación
    //     $user = factory(User::class)->create();
    //     //Acción
    //     $respuesta = $this->get($user->username);
    //     //Validación
    //     $respuesta->assertSee($user->name);
    //     //$this->assertTrue(true);
    // }
}
