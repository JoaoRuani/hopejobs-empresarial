<?php

namespace App\Http\Livewire\Auth;

use App\Models\Company;
use App\Models\User;
use App\Services\User\UserServiceContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $cpf = '';

    /**
     * Representa o cnpj da empresa
     */
    public string $cnpj = '';

    public string $password = '';
    public string $passwordConfirmation = '';

    protected $rules = [
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required', 'email', 'unique:'.User::class],
        'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        'cpf' => ['required', 'cpf', 'unique:'.User::class],
        'cnpj' => ['required', 'cnpj', 'unique:'.Company::class]
    ]; 
    public function register(UserServiceContract $userService)
    {
        $this->validate();
        try {
            $user = $userService->create(new User([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'cpf' => $this->cpf
            ]), $this->cnpj);
                 
            event(new Registered($user));

            Auth::login($user, true);
            session()->flash('message', 'Sua conta foi criada com sucesso!');
            return redirect()->intended(route('home'));
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
