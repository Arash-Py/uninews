<?php

namespace App\Livewire\Admin\Admins;

use Livewire\Component;
use App\Enums\Web\Admin\AdminStatus;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Rules\VerifyNationalcodeRule;
use Illuminate\Validation\Rules\Password;

class CreateAdmin extends Component
{
    public $title = 'افزودن مدیر';

    public $first_name, $last_name, $phone, $national_code, $email, $password , $role_id , $status;
    public  $roles ;

    public function boot()
    {

        // $this->roles = Role::select('id', 'name')->get();

    }

    protected function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => [ 'required', Password::min(6)->letters()->mixedCase()->numbers()->symbols()->uncompromised() ],
            'phone' => ['required', 'numeric', 'regex:/^(0)?9\d{9}$/u'],
            'national_code' =>  [
                'required',
                'unique:admins,national_code',
                'numeric',
                'min:10',
                new VerifyNationalcodeRule
            ],
            'email' => ['required', 'email', 'unique:admins,email'],
            'status' => 'required|in:'.implode(',', AdminStatus::getAllValues())
            // 'role_id' => 'required'
        ];
    }

    public function createAdmin()
    {
        $this->validate();
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'national_code' => $this->national_code,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'status' => $this->status,
            // 'role_id' => $this->role_id
        ];

        Admin::create($data);

        return to_route('admin.admin');
    }

    public function render()
    {
        return view('livewire.admin.admins.create-admin')->layout('layout.master');
    }
}
