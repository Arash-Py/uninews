<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];



    public function login()
    {
        $this->validate();
        if(Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])){
            return to_route('admin.dashboard');
        }

        $this->dispatch('admin.alerts', 'messages', 'error', 'اطلاعات وارد شده صحیح نمیباشد.');
    }
    public function render()
    {
        return view('livewire.admin.auth.login')
            ->layout('auth.layout');
    }
}
