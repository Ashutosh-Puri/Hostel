<?php

namespace Tests\Feature\Auth;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    // public function test_password_can_be_updated(): void
    // {
    //     $Student = Student::factory()->create();

    //     $response = $this
    //         ->actingAs($Student)->put('student/password/update', [
    //             'current_password' => 'password',
    //             'password' => 'new-password',
    //             'password_confirmation' => 'new-password',
    //         ]);

    //     $response
    //         ->assertSessionHasNoErrors()
    //         ->assertRedirect('/profile');

    //     $this->assertTrue(Hash::check('new-password', $Student->refresh()->password));
    // }

    // public function test_correct_password_must_be_provided_to_update_password(): void
    // {
    //     $Student = Student::factory()->create();

    //     $response = $this
    //         ->actingAs($Student)
    //         ->from('/profile')
    //         ->put('/password', [
    //             'current_password' => 'wrong-password',
    //             'password' => 'new-password',
    //             'password_confirmation' => 'new-password',
    //         ]);

    //     $response
    //         ->assertSessionHasErrorsIn('updatePassword', 'current_password')
    //         ->assertRedirect('/profile');
    // }
}
