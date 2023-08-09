<?php

namespace App\Http\Livewire\Backend\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminLogin extends Component
{   
    public $email;
    public $password;
    public $rememberMe = false;

    public function resetinput()
    {
        $this->email = null;
        $this->password = null;
        $this->rememberMe = null;
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], $this->rememberMe)) {

            return redirect()->route('admin.dashboard');
            $this->resetinput();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'info',
                'message'=>"Welcome To Admin Dashboard !!"
            ]);   
        } 
        else 
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Invalid credentials. Please try again !!"
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();   
        return redirect()->route('admin.login');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'info',
            'message'=>"Admin Logout Successfully!!"
        ]);
    }
    
    public function render()
    {
        return view('livewire.backend.admin.admin-login')->extends('layouts.guest')->section('guest');
    }
}
