@php
    $breadcrumb = bootstrap()->getBreadcrumb();
@endphp

<!--begin::Page title-->
<div
    class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0"
    data-kt-swapper="true"
    data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

    <!--begin::Heading-->
    <h1 class="text-dark fw-bolder my-0 fs-2">
         {{ $pageTitle }}
        @if (isset($pageDescription))
            <small class="text-muted fs-6 fw-normal ms-1"> {{ $pageDescription }}</small>
        @endif
    </h1>
    <!--end::Heading-->
</div>
<!--end::Page title--->
