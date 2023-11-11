<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"{!! theme()->printHtmlAttributes('html') !!}
    {{ theme()->printHtmlClasses('html') }}>
{{-- begin::Head --}}

<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <meta name="description" content="{{ ucfirst(theme()->getOption('meta', 'description')) }}" />
    <meta name="keywords" content="{{ theme()->getOption('meta', 'keywords') }}" />
    <link rel="canonical" href="{{ ucfirst(theme()->getOption('meta', 'canonical')) }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('custom/logo/logo.svg') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('custom/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.rtl.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('fonts/vazir/font.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('custom/fonts/webFonts/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('custom/css/persianDatepicker-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.bundle.rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/global/plugins-custom.bundle.rtl.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <style>
        .select2-container .select2-selection--single {
            height: unset !important;
        }
    </style>
    {{-- begin::Fonts --}}
    {{ theme()->includeFonts() }}
    {{-- end::Fonts --}}

    @if (theme()->hasVendorFiles('css'))
        {{-- begin::Page Vendor Stylesheets(used by this page) --}}
        @foreach (array_unique(theme()->getVendorFiles('css')) as $file)
            @if (util()->isExternalURL($file))
                <link rel="stylesheet" href="{{ $file }}" />
            @else
                {!! preloadCss(assetCustom($file)) !!}
            @endif
        @endforeach
        {{-- end::Page Vendor Stylesheets --}}
    @endif

    @if (theme()->hasOption('page', 'assets/custom/css'))
        {{-- begin::Page Custom Stylesheets(used by this page) --}}
        @foreach (array_unique(theme()->getOption('page', 'assets/custom/css')) as $file)
            {!! preloadCss(assetCustom($file)) !!}
        @endforeach
        {{-- end::Page Custom Stylesheets --}}
    @endif

    @if (theme()->hasOption('assets', 'css'))
        {{-- begin::Global Stylesheets Bundle(used by all pages) --}}

        @foreach (array_unique(theme()->getOption('assets', 'css')) as $file)
            @if (strpos($file, 'plugins') !== false)
                {!! preloadCss(assetCustom($file)) !!} {{-- I dont know what is this shit doing but its breakes our charts --}}
            @else
                <link href="{{ assetCustom($file) }}" rel="stylesheet" type="text/css" />
            @endif
        @endforeach
        {{-- end::Global Stylesheets Bundle --}}
    @endif

    @if (theme()->getViewMode() === 'preview')
        {{ theme()->getView('partials/trackers/_ga-general') }}
        {{ theme()->getView('partials/trackers/_ga-tag-manager-for-head') }}
    @endif

    @yield('styles')
</head>
{{-- end::Head --}}

{{-- begin::Body --}}

<body {!! theme()->printHtmlAttributes('body') !!} {!! theme()->printHtmlClasses('body') !!} {!! theme()->printCssVariables('body') !!} data-kt-name="metronic">

    @include('partials/theme-mode/_init')

    @yield('content')

    {{-- begin::Javascript --}}
    @if (theme()->hasOption('assets', 'js'))
        {{-- begin::Global Javascript Bundle(used by all pages) --}}
        @foreach (array_unique(theme()->getOption('assets', 'js')) as $file)
            <script src="{{ asset($file) }}"></script>
        @endforeach
        {{-- end::Global Javascript Bundle --}}
    @endif

    @if (theme()->hasVendorFiles('js'))
        {{-- begin::Page Vendors Javascript(used by this page) --}}
        @foreach (array_unique(theme()->getVendorFiles('js')) as $file)
            @if (util()->isExternalURL($file))
                <script src="{{ $file }}"></script>
            @else
                <script src="{{ asset(theme()->getDemo() . '/' . $file) }}"></script>
            @endif
        @endforeach
        {{-- end::Page Vendors Javascript --}}
    @endif

    @if (theme()->hasOption('page', 'assets/custom/js'))
        {{-- begin::Page Custom Javascript(used by this page) --}}
        @foreach (array_unique(theme()->getOption('page', 'assets/custom/js')) as $file)
            <script src="{{ $file }}"></script>
        @endforeach
        {{-- end::Page Custom Javascript --}}
    @endif
    {{-- end::Javascript --}}

    @if (theme()->getViewMode() === 'preview')
        {{ theme()->getView('partials/trackers/_ga-tag-manager-for-body') }}
    @endif
    @yield('scripts')
    <script src="{{ asset('custom/js/jquary.min.js') }}"></script>
    <script src="{{ asset('js/sweetaler2.min.js') }}"></script>
    <script src="{{ asset('custom/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('custom/js/persianDatepicker.js') }}"></script>
    <script src="{{ asset('custom/js/leaflet.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
</body>
{{-- end::Body --}}

</html>
