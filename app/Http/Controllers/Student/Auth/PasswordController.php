<?php

namespace App\Http\Controllers\Student\Auth;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('alert', ['type' => 'success', 'message' => 'Password Updated Successfully.']);
    }
}
