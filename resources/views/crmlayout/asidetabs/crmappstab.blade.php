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
</div>
<!--end::Menu-->
