<!--begin::Menu-->
<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
    id="kt_aside_menu"
    data-kt-menu="true">

    <div id="kt_aside_menu_wrapper" class="menu-fit">
      <!--begin::Menu item-->
      <div class="menu-item px-3">
          <div class="menu-content d-flex align-items-center px-3">
              <!--begin::Avatar-->
              <!-- <div class="symbol symbol-50px me-5">
                  <img alt="Logo" src="{{ srcasset('demo7/media/avatars/blank.png') }}"/>
              </div> -->
              <!--end::Avatar-->

              <!--begin::Username-->
              <div class="d-flex flex-column">
                  <div class="fw-bolder d-flex align-items-center fs-5">
                      {{ auth()->user()->name }}
                  </div>
                  <span class="fw-bolder text-primary text-hover-primary fs-7 mb-0">{{ auth()->user()->userlevel->name }}</span>
                  <a href="#" class="fw-bold text-muted text-hover-primary fs-7 mb-0">{{ auth()->user()->email }}</a>
              </div>
              <!--end::Username-->
          </div>
      </div>
      <!--end::Menu item-->

      <!--begin::Menu separator-->
      <div class="separator my-2"></div>
      <!--end::Menu separator-->

      <!--begin::Menu item-->
      <div class="menu-item px-5">
          <a href="#" data-action="/logout" data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true" class="button-ajax menu-link px-5">
              {{ __('Sign Out') }}
          </a>
      </div>
      <!--end::Menu item-->
    </div>


</div>
<!--end::Menu-->
