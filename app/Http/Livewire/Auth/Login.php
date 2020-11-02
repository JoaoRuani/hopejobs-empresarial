<?php

namespace App\Http\Livewire\Auth;

use App\Enums\UserRoles;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }
        $redirectTo = Auth::user()->role == UserRoles::ADMIN ? 'admin.dashboard' : 'home';
        return redirect()->intended(route($redirectTo));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}