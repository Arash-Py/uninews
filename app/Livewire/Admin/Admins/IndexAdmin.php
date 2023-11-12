<?php

namespace App\Livewire\Admin\Admins;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use App\Enums\Web\Admin\AdminStatus;
use App\Services\Web\Admin\AdminService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;


class IndexAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $status ;
    public $title = 'لیست مدیران';

    public $name, $phone, $national_code, $email, $adminCases, $adminId;



    public function booted()
    {
        $this->adminCases = AdminStatus::cases();
    }


    #[Computed]
    public function admins(){
        return Admin::orderByDesc('id')->paginate(20);
    }

    public function changeAdminStatusConfirm(Admin $admin)
    {
        $this->dispatch('ChangeStatusConfirm',
            title : "آیا از تغییر وضعیت ادمین {$admin->full_name} مطمئن هستید ؟",
            id : $admin->id
        );
    }

    #[On('changeAdminStatus')]
    public function changeAdminStatus(Admin $admin)
    {
        $status = $admin->status->name == AdminStatus::ACTIVE->name ? 'DEACTIVE' : 'ACTIVE';
        $admin->update(['status' => $status]);

        $this->dispatch('ChangeStatus',
            id : $admin->id,
            title : "تفییر وضعیت ادمین {$admin->full_name}",
            text : 'با موفقیت انجام شد',
            status : $admin->status->name,
            status_label : $admin->status->label()
        );
    }

    public function deleteAdminConfirm(Admin $admin)
    {
        $this->dispatch('DeleteConfirm',
            title : "آیا از حذف مدیر {$admin->full_name} مطمئن هستید ؟",
            id : $admin->id
        );
    }
    #[On('deleteAdmin')]
    public function deleteAdmin(Admin $admin)
    {
        $this->dispatch('deleted',
        title : "حذف {$admin->full_name}",
        text : 'با موفقیت انجام شد'
    );
    $admin->delete();
    }

    public function render()
    {
        return view('livewire.admin.admins.index-admin')->layout('layout.master');
    }
}
