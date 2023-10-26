<?php

namespace Tests\Feature\Auth;

use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('student/login');

        $response->assertStatus(200);
    }

    public function test_student_registration(): void
    {
        $response = $this->post(route('student.register'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('student.dashboard'));

        $this->assertAuthenticated('student');
    }

    public function test_student_login(): void
    {
        $user = Student::factory()->create([
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    
        $response = $this->post(route('student.login'), [
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => '123456789',
        ]);
    
        $response->assertRedirect(route('student.dashboard'));
        $this->assertAuthenticatedAs($user, 'student');
    
    }

    public function test_student_login_with_incorrect_password(): void
    {
        $user = Student::factory()->create([
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $response = $this->post(route('student.login'), [
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_student_email_verification(): void
    {
        $user = Student::factory()->create([
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $response = $this->actingAs($user)->get(route('verification.notice'));

        $response->assertStatus(200);
    }

    public function test_student_email_verification_notification(): void
    {
        $user = Student::factory()->create([
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $response = $this->actingAs($user)->post(route('student.verification.send'));

        $response->assertSessionHasNoErrors();
    }
}
