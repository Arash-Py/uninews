@section('title',$title)
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header" style="">
                    <div class="card-header">
                        <h3 class="card-title">{{$this->title}}</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <form wire:submit.prevent="createAdmin">
                    <div class="card-body">
                        <div class="form-group mt-3 row">
                            <label class="col-lg-2 col-form-label text-end">نام :</label>
                            <div class="col-lg-3">
                                <input type="text" wire:model.defer="first_name" class="form-control"
                                    placeholder="نام را وارد کنید" />
                                @error('first_name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label class="col-lg-2 col-form-label text-end">نام خانوادگی :</label>
                            <div class="col-lg-3">
                                <input type="text" wire:model.defer="last_name" class="form-control"
                                    placeholder="نام خانوادگی را وارد کنید " />
                                @error('last_name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3 row">
                            <label class="col-lg-2 col-form-label text-end">موبایل :</label>
                            <div class="col-lg-3">
                                <input type="text" wire:model.defer="phone" class="form-control"
                                    placeholder="موبایل را وارد کنید" />
                                @error('phone')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label class="col-lg-2 col-form-label text-end">کد ملی :</label>
                            <div class="col-lg-3">
                                <input type="text" wire:model.defer="national_code" class="form-control"
                                    placeholder="کد ملی را وارد کنید " />
                                @error('national_code')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group mt-3 row">
                            <label class="col-lg-2 col-form-label text-end">ایمیل :</label>
                            <div class="col-lg-3">
                                <input type="text" wire:model.defer="email" class="form-control"
                                    placeholder="ایمیل را وارد کنید" />
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label class="col-lg-2 col-form-label text-end">رمزعبور :</label>
                            <div class="col-lg-3">
                                <input type="password" wire:model.defer="password" class="form-control"
                                    placeholder="رمزعبور را وارد کنید " />
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3 row">
                            {{-- <label class="col-lg-2 col-form-label text-end">نقش :</label>
                            <div class="col-lg-3" wire:ignore>
                                <select class="form-select" wire:model="role_id" id="role_id">
                                    <option></option>
                                    @foreach ($this->roles as $role )
                                        <option value="{{$role->id}}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}



                            <label class="col-lg-2 col-form-label text-end">وضعیت :</label>
                            <div class="col-lg-3" wire:ignore>
                                <select class="form-select" wire:model="status" id="status">
                                    <option></option>
                                        <option value="ACTIVE">فعال</option>
                                        <option value="DEACTIVE">غیر فعال</option>
                                </select>
                            </div>
                                @error('status')
                                    <span class="invalid-feedback d-inline" style="margin-right: 20rem">
                                        {{ $message }}
                                    </span>
                                @enderror


                            <div class="col-lg-5 custom-form"></div>
                        </div>
                        <div class="card-footer mt-5">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-success mr-2">ذخیره
                                    </button>
                                    <a href="{{route('admin.admin')}}" class="btn btn-secondary">انصراف</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#status').select2({
                minimumResultsForSearch: Infinity,
                placeholder: "وضعیت"
            });
            $('#status').on('change', function (e) {
                var data = $('#status').select2("val");
            @this.set('status', data);
            });
        });
    </script>
@endsection
