@php
    $label = $label ?? __('Submit');
    $message = $message ?? __('صبر کنید...');
@endphp

<!--begin::Indicator-->
<div wire:loading.remove>
    {{ $label }}
</div>
<div wire:loading>
    {{-- <span class="indicator-progress"> --}}
        {{ $message }}
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    {{-- </span> --}}
</div>
<!--end::Indicator-->
