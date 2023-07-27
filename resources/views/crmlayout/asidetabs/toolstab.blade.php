<!--begin::Menu-->
<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
    id="kt_aside_menu" data-kt-menu="true">

    <div id="kt_aside_menu_wrapper" class="menu-fit">
        <!--begin::Menu Item-->
        <div class="menu-item">
            <div class="menu-content pt-8 pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Tools</span>
            </div>
        </div>



        @if(auth()->user()->userlevel->n2_users == 1)
        <div class="menu-item">
            <a class="menu-link {{ rvndev()->getActiveNavClass('page', 'admin.user.index')['main'] }}"
                href="{{ route('admin.user.index', [], false) }}">
                <span class="menu-icon">
                    {!! theme()->getSvgIcon('icons/duotone/Design/PenAndRuller.svg', "svg-icon-2") !!}
                </span>
                <span class="menu-title">Manage User</span>
            </a>
        </div>
        @endif
        @if(auth()->user()->userlevel->n2_user_roles == 1)
        <div class="menu-item">
            <a class="menu-link {{ rvndev()->getActiveNavClass('page', 'admin.userRole.index')['main'] }}"
                href="{{ route('admin.userRole.index', [], false) }}">
                <span class="menu-icon">
                    {!! theme()->getSvgIcon('icons/duotone/Design/PenAndRuller.svg', "svg-icon-2") !!}
                </span>
                <span class="menu-title">Manage User Roles</span>
            </a>
        </div>
        @endif






    </div>
</div>
<!--end::Menu-->