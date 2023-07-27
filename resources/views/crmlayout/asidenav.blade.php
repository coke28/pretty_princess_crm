<!--begin::Wrapper-->
<div class="hover-scroll-y mb-10"
    data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}"
    data-kt-scroll-height="auto"
    data-kt-scroll-wrappers="#kt_aside_nav"
    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
    data-kt-scroll-offset="0px"
 >
    <!--begin::Nav-->
    <ul class="nav flex-column mainNav">
        <!--begin::Nav item-->
        @if(auth()->user()->userlevel->n1_crm == 1)
        <li class="nav-item mb-2 btnMenubar" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="CRM Apps">
            <!--begin::Nav link-->
            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light {{ rvndev()->getActiveNavClass('parentnav', 'crmapps')['main'] }}" data-bs-toggle="tab"  href="#crmapps">
                {!! theme()->getSvgIcon('icons/duotone/Layout/Layout-4-blocks.svg', "svg-icon-2x") !!}
            </a>
            <!--end::Nav link-->
            <br />
            <!-- <span class="sol-nav-label allCapsLabel">CRM Apps</span> -->
        </li>
        @endif
        <!--end::Nav item-->
        <!--begin::Nav item-->
        @if(auth()->user()->userlevel->n1_tools == 1)
        <li class="nav-item mb-2 btnMenubar" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Tools">
            <!--begin::Nav link-->
            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light pulse pulse-danger {{ rvndev()->getActiveNavClass('parentnav', 'tools')['main'] }}" data-bs-toggle="tab"  href="#tools">
                {!! theme()->getSvgIcon('icons/duotone/Tools/Tools.svg', "svg-icon-2x") !!}
            </a>
            <!--end::Nav link-->
            <br />
            <!-- <span class="sol-nav-label allCapsLabel">Tools</span> -->
        </li>
        @endif
        <!--end::Nav item-->

        <!--begin::Nav item-->
        <li class="nav-item mb-2 btnMenubar" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Account">
            <!--begin::Nav link-->
            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light {{ rvndev()->getActiveNavClass('parentnav', 'account')['main'] }}" data-bs-toggle="tab"  href="#account">
                {!! theme()->getSvgIcon('icons/duotone/General/User.svg', "svg-icon-2x") !!}
            </a>
            <!--end::Nav link-->
            <br />
            <!-- <span class="sol-nav-label nameParentNav">{{ auth()->user()->username }}</span> -->
        </li>
        <!--end::Nav item-->
    </ul>
    <!--end::Tabs-->
</div>
<!--end::Nav-->
