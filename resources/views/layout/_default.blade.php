<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
    {{ theme()->getView('layout/_header') }}
    <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        {{ theme()->getView('layout/_sidebar') }}
        <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    {{-- {{ theme()->getView('layout/_toolbar') }} --}}
                    <br>
                    {{ theme()->getView('layout/_content', compact('slot')) }}
                </div>
                <!--end::Content wrapper-->
                {{ theme()->getView('layout/_footer') }}
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->
{{ theme()->getView('partials/layout-builder/drawer/_main') }}
{{ theme()->getView('partials/_drawers') }}
