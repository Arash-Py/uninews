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
{{--                <form wire:submit.prevent="applyFilters">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-2 col-md-12">--}}
{{--                            <input wire:model.defer="adminId" type="text" class="form-control"--}}
{{--                                   placeholder="ایدی مدیر">--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-2 col-md-12">--}}
{{--                            <input wire:model.defer="name" type="text" class="form-control" placeholder="نام مدیر">--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-2 col-md-12">--}}
{{--                            <input wire:model.defer="phone" type="text" class="form-control" placeholder="موبایل">--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-2 col-md-12">--}}
{{--                            <input wire:model.defer="national_code" type="text" class="form-control"--}}
{{--                                   placeholder="کد ملی">--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-2 col-md-12">--}}
{{--                            <input wire:model.defer="email" type="text" class="form-control" placeholder="ایمیل">--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <button class="btn btn-sm btn-primary mt-3 mb-3" type="submit">جستجو</button>--}}
{{--                    <button id="clear-filter" wire:click='resetFilters' wire:loading.attr="disabled"--}}
{{--                            class="btn btn-sm btn-primary mt-3 mb-3" type="button">پاک کردن فیلتر</button>--}}
{{--                    <div wire:loading>--}}
{{--                        <i class="fas fa-circle-notch fa-spin text-primary"></i>--}}
{{--                    </div>--}}
{{--                </form>--}}

                <div class="table-responsive">
                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                        <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th>#</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>بدنه</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($this->news as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td><img src="{{ $news->pic }}"></td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->body }}</td>

                                <td>
                                    {{-- @can('admin_edit') --}}
                                    <a class="btn btn-icon btn-light btn-sm mx-3"
                                       href="{{ route('admin.news.edit', $news->id) }}"> <i
                                            class='fa-solid fa-pen fs-5 text-warning'></i> </a>
                                    {{-- @endcan --}}
                                </td>


                                <td>
                                    {{-- @can('admin_delete') --}}
                                    <a class="btn btn-icon btn-light"
                                       wire:click="deleteNewsConfirm({{ $news->id }})"> <i
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
                        Livewire.dispatch('deleteNews', {
                            news: event.id
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
