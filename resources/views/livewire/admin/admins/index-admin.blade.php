<div>
    @section('title', $title)
    <div class="card card-custom gutter-b example  example-compact">
        <div class="card-header" style="">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-toolbar">
            </div>
            {{-- @can('admin_create') --}}
            <a class="btn btn-success align-self-center" href="{{ route('admin.news.create') }}">ایجاد خبر جدید</a>
            {{-- @endcan --}}
        </div>
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body pt-6">
                <form wire:submit.prevent="applyFilters">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <input wire:model.defer="adminId" type="text" class="form-control"
                                placeholder="ایدی مدیر">
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <input wire:model.defer="name" type="text" class="form-control" placeholder="نام مدیر">
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <input wire:model.defer="phone" type="text" class="form-control" placeholder="موبایل">
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <input wire:model.defer="national_code" type="text" class="form-control"
                                placeholder="کد ملی">
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <input wire:model.defer="email" type="text" class="form-control" placeholder="ایمیل">
                        </div>

                    </div>
                    <button class="btn btn-sm btn-primary mt-3 mb-3" type="submit">جستجو</button>
                    <button id="clear-filter" wire:click='resetFilters' wire:loading.attr="disabled"
                        class="btn btn-sm btn-primary mt-3 mb-3" type="button">پاک کردن فیلتر</button>
                    <div wire:loading>
                        <i class="fas fa-circle-notch fa-spin text-primary"></i>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                <th>#</th>
                                <th>نام</th>
                                <th>شماره تماس</th>
                                <th>کد ملی</th>
                                <th>ایمیل</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->full_name }}</td>
                                    <td>{{ $admin->phone }}</td>
                                    <td>{{ $admin->national_code }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->status?->label() }}
                                        <abbr title="تغییر وضعیت" class="status-btn">
                                            <a class="{{ $admin->status?->name == App\Enums\Web\Admin\AdminStatus::ACTIVE->name ? 'btn btn-light-danger' : 'btn btn-light-success' }}  p-2"
                                                id="status-button-{{ $admin->id }}" {{-- @can('admin_status') --}}
                                                wire:click="changeAdminStatusConfirm({{ $admin->id }})">
                                                {{-- @endcan --}}
                                                <i class="fa-solid fa-arrows-rotate fa-1-5x " style="padding: 0"></i>
                                            </a>
                                        </abbr>
                                    </td>

                                    <td>
                                        {{-- @can('admin_edit') --}}
                                        <a class="btn btn-icon btn-light btn-sm mx-3"
                                            href="{{ route('admin.edit', $admin->id) }}"> <i
                                                class='fa-solid fa-pen fs-5 text-warning'></i> </a>
                                        {{-- @endcan --}}
                                    </td>


                                    <td>
                                        {{-- @can('admin_delete') --}}
                                        <a class="btn btn-icon btn-light"
                                            wire:click="deleteAdminConfirm({{ $admin->id }})"> <i
                                                class="fa-solid fa-trash-can fa-1-5x text-danger"></i> </a>
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $admins->links() }} --}}
                </div>
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <!--end::Card-->
    <script>
        window.addEventListener('livewire:initialized', () => {
            @this.on('ChangeStatusConfirm', (event) => {
                swal.fire({
                    title: event.title,
                    showCancelButton: true,
                    cancelButtonText: "بازگشت",
                    confirmButtonText: "تایید",
                    confirmButtonColor: '#94C973',
                }).then(function(result) {
                    if (result.value) {
                        Livewire.dispatch('changeAdminStatus', {
                            admin: event.id
                        });
                    }
                })
            })
        });

        window.addEventListener('ChangeStatus', function(event) {
            if (event.detail.status == 'ACTIVE') {
                console.log(event.detail);
                $('#status-button-' + event.detail.id).removeClass('btn btn-success');
                $('#status-button-' + event.detail.id).addClass('btn btn-light-danger');
                $('#status-button-' + event.detail.id).text(event.detail.status);
            } else {
                $('#status-button-' + event.detail.id).removeClass('btn btn-light-danger');
                $('#status-button-' + event.detail.id).addClass('btn btn-success');
                $('#status-button-' + event.detail.id).text(event.detail.status);
            }
            swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: "success",
                showCancelButton: false,
                confirmButtonText: "تمام",
            })
        });

        window.addEventListener('livewire:initialized', () => {
            @this.on('DeleteConfirm', (event) => {
                swal.fire({
                    title: event.title,
                    showCancelButton: true,
                    cancelButtonText: "بازگشت",
                    confirmButtonText: "تایید",
                    icon: "warning",
                    confirmButtonColor: '#50cd89',
                }).then(function(result) {
                    if (result.value) {
                        Livewire.dispatch('deleteAdmin', {
                            admin: event.id
                        });
                    }
                })
            })
        });

        window.addEventListener('deleted', function(event) {
            swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: "success",
                showCancelButton: false,
                confirmButtonText: "تمام",
            })
        });
    </script>

</div>
