@extends('crmlayout.base')

@section('content')

    <!--begin::Main-->
    @if (theme()->getOption('layout', 'main/type') === 'blank')
        <div class="d-flex flex-column flex-root">
            {{ $slot }}
        </div>
    @else
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
              @include('crmlayout/aside/_base')

            <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                  @include('crmlayout/header/_base')

                <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                      @include('crmlayout/_content', compact('slot'))
                    </div>
                    <!--end::Content-->
                    <!--start::order history segment Scripts here-->
                    @include('crmlayout/_footer')
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->

        <!--begin::Drawers-->
        

        <!--end::Drawers-->

        @if(theme()->getOption('layout', 'scrolltop/display') === true)
            @include('crmlayout/_scrolltop')
        @endif
    @endif
    <!--end::Main-->

@endsection
