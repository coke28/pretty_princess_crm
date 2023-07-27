<!--begin::Aside-->
<div
	id="kt_aside"
	class="aside aside-extended bg-white {{ theme()->printHtmlClasses('aside', false) }}"
	data-kt-drawer="true"
	data-kt-drawer-name="aside"
	data-kt-drawer-activate="{default: true, lg: false}"
	data-kt-drawer-overlay="true"
	data-kt-drawer-width="auto"
	data-kt-drawer-direction="start"
	data-kt-drawer-toggle="#kt_aside_toggle"
	>

	<!--begin::Primary-->
	<div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
		<!--begin::Logo-->
		<div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
			<a href="/dashboard">
				<img alt="Logo" src=" {{ asset(theme()->getMediaUrlPath() . 'logos/logo-demo-3.png') }}" class="h-30px"/>
			</a>
		</div>
		<!--end::Logo-->

		<!--begin::Nav-->
		<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
			@include('crmlayout/asidenav')
		</div>
		<!--end::Nav-->
	</div>
	<!--end::Primary-->

	@if(theme()->getOption('layout', 'aside/secondary-display') === true)
		<!--begin::Secondary-->
		<div class="aside-secondary d-flex flex-row-fluid">
			<!--begin::Workspace-->
			<div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
					@include('crmlayout/aside/__tab-contents/_base')
			</div>
			<!--end::Workspace-->
		</div>
		<!--end::Secondary-->

		<!--begin::Aside Toggle-->
		<button id="menuToggleCus" class="btn btn-sm btn-icon btn-white btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex  {{ theme()->printHtmlClasses('asideToggle', false) }}"
			data-kt-toggle="true"
			data-kt-toggle-state="active"
			data-kt-toggle-target="body"
			data-kt-toggle-name="aside-minimize"

			style="margin-bottom: 1.35rem">

			{!! theme()->getSvgIcon("icons/duotone/Navigation/Left-2.svg", "svg-icon-2 rotate-180") !!}
		</button>
		<!--end::Aside Toggle-->
	@endif
</div>
<!--end::Aside-->
