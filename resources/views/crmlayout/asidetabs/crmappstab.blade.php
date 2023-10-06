<!--begin::Menu-->
<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
    id="kt_aside_menu"
    data-kt-menu="true">

    <div id="kt_aside_menu_wrapper" class="menu-fit">
      @if(auth()->user()->userlevel->n2_dashboard == 1)
      <!-- begin::Menu Item-->
      <div class="menu-item">
          <a class="menu-link {{ rvndev()->getActiveNavClass('page', 'user.dash')['main'] }}" href="{{ route('user.dash', [], false) }}">
            <span class="menu-icon">
              {!! theme()->getSvgIcon('icons/duotone/Design/PenAndRuller.svg', "svg-icon-2") !!}
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
      </div>
      <!--end::Menu Item-->
      @endif
    </div>

    <div id="kt_aside_menu_wrapper" class="menu-fit">
      {{-- @if(auth()->user()->userlevel->n2_dashboard == 1) --}}
      <!-- begin::Menu Item-->
      <div class="menu-item">
          <a class="menu-link {{ rvndev()->getActiveNavClass('page', 'upload.index')['main'] }}" href="{{ route('upload.index', [], false) }}">
            <span class="menu-icon">
              <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Uploaded-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path d="M8.95128003,13.8153448 L10.9077535,13.8153448 L10.9077535,15.8230161 C10.9077535,16.0991584 11.1316112,16.3230161 11.4077535,16.3230161 L12.4310522,16.3230161 C12.7071946,16.3230161 12.9310522,16.0991584 12.9310522,15.8230161 L12.9310522,13.8153448 L14.8875257,13.8153448 C15.1636681,13.8153448 15.3875257,13.5914871 15.3875257,13.3153448 C15.3875257,13.1970331 15.345572,13.0825545 15.2691225,12.9922598 L12.3009997,9.48659872 C12.1225648,9.27584861 11.8070681,9.24965194 11.596318,9.42808682 C11.5752308,9.44594059 11.5556598,9.46551156 11.5378061,9.48659872 L8.56968321,12.9922598 C8.39124833,13.2030099 8.417445,13.5185067 8.62819511,13.6969416 C8.71848979,13.773391 8.8329684,13.8153448 8.95128003,13.8153448 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
            </span>
            <span class="menu-title">Upload File</span>
          </a>
      </div>
      <!--end::Menu Item-->
      {{-- @endif --}}
    </div>

    
    <div id="kt_aside_menu_wrapper" class="menu-fit">
      {{-- @if(auth()->user()->userlevel->n2_dashboard == 1) --}}
      <!-- begin::Menu Item-->
      <div class="menu-item">
          <a class="menu-link {{ rvndev()->getActiveNavClass('page', 'lead.index')['main'] }}" href="{{ route('lead.index', [], false) }}">
            <span class="menu-icon">
              <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                </g>
            </svg><!--end::Svg Icon--></span>
            </span>
            <span class="menu-title">Manage Leads</span>
          </a>
      </div>
      <!--end::Menu Item-->
      {{-- @endif --}}
    </div>

    {{-- <div id="kt_aside_menu_wrapper" class="menu-fit">
      @if(auth()->user()->userlevel->n2_dashboard == 1)
      <!-- begin::Menu Item-->
      <div class="menu-item">
          <a class="menu-link {{ rvndev()->getActiveNavClass('page', 'export.index')['main'] }}" href="{{ route('export.index', [], false) }}">
            <span class="menu-icon">
              {!! theme()->getSvgIcon('icons/duotone/Design/PenAndRuller.svg', "svg-icon-2") !!}
            </span>
            <span class="menu-title">Export Emails</span>
          </a>
      </div>
      <!--end::Menu Item-->
      @endif
    </div> --}}


</div>
<!--end::Menu-->
