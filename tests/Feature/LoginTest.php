<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
  use RefreshDatabase;
 
  /** @test */
  public function login_page_should_be_rendered(): void
  {
    $this->withoutExceptionHandling();
    $this->withoutVite();

    $successResponse = $this->get(route('auth.login.view'));
    $successResponse->assertOk();
    $successResponse->assertViewIs('auth.login');
  }

  /** @test */ 
  public function login_page_should_be_show_errors_when_credentials_are_invalid(): void
  {
    $response = $this->post(route('auth.login.post'), [
      'email' => "",
      'password' => "",
      "password_confirmation" => "",
    ]);

    $response->assertRedirect(route('auth.login.view'));
    $response->assertSessionHasErrors();
  }

  /** @test */
  public function login_page_should_be_show_errors_when_login_failed():void
  {
    $response = $this->post(route('auth.login.post'), [
      'email' => 'user@example.com',
      'password' => 'admin1234',
      'password_confirmation' => 'admin1234',
    ]);


    $response->assertRedirect(route('auth.login.view'));
    $response->assertSessionHasErrors([
      'login_failed' => 'credenciales incorrectas o usuario no existe*',
    ]);
  }

  /** @test */
  public function login_page_should_be_redirect_to_profile_when_login_success():void
  {
    User::factory()->create(
      [
        'email' => 'john@example.com',
        'role' => 'admin',
        'password' => 'admin1234',
      ]
    );


    $successResponse = $this->post(route('auth.login.post'), [
      'email' => "john@example.com",
      'password' => "admin1234",
      'password_confirmation' => 'admin1234', 
    ]);
    
    $successResponse->assertRedirect(route('dashboard.index'));
  }

}
