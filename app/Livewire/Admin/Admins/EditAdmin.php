<?php

namespace App\Livewire\Admin\Admins;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Enums\Web\Admin\AdminStatus;
use Illuminate\Support\Facades\Hash;
use App\Rules\VerifyNationalcodeRule;
use Illuminate\Validation\Rules\Password;

class EditAdmin extends Component
{
    public $admin;
    public $title = 'ویرایش مدیر';
    public $password, $roles;
    public $status, $first_name, $last_name, $email, $phone, $national_code;


    public function mount(Admin $admin)
    {
        $this->admin = $admin;
        $this->fill(
            $admin->syncOriginal()
        );
    }

    public function boot()
    {

        // $this->roles = Role::select('id', 'name')->get();

    }

    protected function rules()
    {

        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => ['required', 'numeric', 'regex:/^(0)?9\d{9}$/u'],
            'national_code' => [
                'required',
                Rule::unique('admins', 'national_code')->ignore($this->admin->id),
                'min:10',
                new VerifyNationalcodeRule
            ],
            'email' => 'required|email|unique:admins,email,' . $this->admin->id,
            'password' => [ 'nullable', Password::min(6)->letters()->mixedCase()->numbers()->symbols()->uncompromised() ],
            'status' => 'required|in:' . implode(',', AdminStatus::getAllValues())
            // 'role_id' => 'required'
        ];
    }

    public function updateAdmin()
    {

        $validated = $this->validate();
        $this->validate();
        $this->admin->update($validated);
        if ($this->password != null) {
            $this->admin->update(['password' => Hash::make($this->password)]);
        }

        return to_route('admin.admin');
    }


    public function render()
    {

        return view('livewire.admin.admins.edit-admin')->layout('layout.master');
    }
}
