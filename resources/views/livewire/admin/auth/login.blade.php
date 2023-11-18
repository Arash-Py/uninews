@section('title', 'ورود')
<div>
    {{-- @include('auth.login') --}}
    <!--begin::Signin Form-->
    <form class="form w-100 " wire:submit.prevent="login">
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <a href="http://iran-park.ir" target="_blank">
{{--                <img alt="drtop" draggable="false" src="{{ asset('custom/logo/full_logo.svg') }}" class="h-100px mb-10">--}}
            </a >
            <livewire:admin.alerts />
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">ورود به پنل ادمین</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">UniNews</div>
            <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            <!--begin::Email-->
            <input wire:model="email" type="text" placeholder="ایمیل خود را وارد کنید." name="email" autocomplete="off" class="form-control bg-transparent" value="{{ old('email') }}" autofocus>
            <!--end::Email-->
            @error('email')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            <!--begin::Password-->
            <input wire:model="password" type="password" placeholder="پسورد خود را وارد کنید." name="password" autocomplete="off" class="form-control bg-transparent">
            <!--end::Password-->
            @error('password')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->

        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                @include('partials.general._button-indicator', ['label' => __('ورود')])
                <div wire:loading>
                    <i class="fas fa-circle-notch fa-spin"></i>
                </div>
            </button>
        </div>
        <!--end::Submit button-->
        <div></div>
    </form>
    <!--end::Signin Form-->
</div>
