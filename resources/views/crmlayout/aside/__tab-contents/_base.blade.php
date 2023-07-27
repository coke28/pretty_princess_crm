<div class="d-flex h-100 flex-column">
    <!--begin::Wrapper-->
    <div class="flex-column-fluid hover-scroll-y"
        data-kt-scroll="true"
        data-kt-scroll-activate="true"
        data-kt-scroll-height="auto"
        data-kt-scroll-wrappers="#kt_aside_wordspace"
        data-kt-scroll-dependencies="#kt_aside_secondary_footer"
        data-kt-scroll-offset="0px">

        <!--begin::Tab content-->
        <div class="tab-content">

            <!--begin::Tab pane-->
            <div class="tab-pane fade {{ rvndev()->getActiveNavClass('parentnav', 'crmapps')['body'] }}" id="crmapps" role="tabpanel">
                @include('crmlayout/asidetabs/crmappstab')
            </div>
            <!--end::Tab pane-->

            <!--begin::Tab pane-->
            <div class="tab-pane fade {{ rvndev()->getActiveNavClass('parentnav', 'tools')['body'] }}" id="tools" role="tabpanel">
                @include('crmlayout/asidetabs/toolstab')
            </div>
            <!--end::Tab pane-->

            <!--begin::Tab pane-->
            <div class="tab-pane fade {{ rvndev()->getActiveNavClass('parentnav', 'crm_notifs')['body'] }}" id="crm_notifs" role="tabpanel">
                @include('crmlayout/asidetabs/crmnotifstab')
            </div>
            <!--end::Tab pane-->

            <!--begin::Tab pane-->
            <div class="tab-pane fade {{ rvndev()->getActiveNavClass('parentnav', 'account')['body'] }}" id="account" role="tabpanel">
                @include('crmlayout/asidetabs/accounttab')
            </div>
            <!--end::Tab pane-->

            <!--begin::Tab pane-->
            <div class="tab-pane fade {{ rvndev()->getActiveNavClass('parentnav', 'chattab')['body'] }}" id="chattab" role="tabpanel">
                @include('crmlayout/asidetabs/chattab')
            </div>
            <!--end::Tab pane-->

        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Wrapper-->
</div>
