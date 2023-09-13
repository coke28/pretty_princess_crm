<x-CRM-layout :pageTitle="$pageTitle" :pageDescription="$pageDescription">
    {{-- <h1>Manage Product Names</h1> --}}
    <div class="card card-custom">
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-end mb-5" style="position: relative; z-index:10;">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-absolute my-1 mb-md-0">
                    <div class="input-group input-group-solid">
                        <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" id="crmLogSearch" class="form-control form-control-lg form-control-solid"
                            placeholder="Search">
                        <button class="input-group-text clearInp">
                            <i class="fas fa-times fs-4"></i>
                        </button>
                    </div>
                </div>
                <!--end::Search-->

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <!--begin::Add special announcement-->

                    <!--end::Add special announcement-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Datatable-->
            <div style="overflow-x: auto;">
                <table id="crm_log_dt" data-table-route="{{ route('crmLog.table') }}" class="table table-rounded table-striped border gy-7 gs-7"
                    style="width:100% !important;">
                    <thead>
                        <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200 align-items-center">
                            <th>ID</th>
                            <th>Module Name</th>
                            <th>Action</th>
                            <th>Username</th>
                            <th>affected_row_copy</th>
                            <th>Created At</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody class="text-black-600 fw-bold">
                    </tbody>
                </table>
            </div>
            <!--end::Datatable-->
        </div>
    </div>

    <!--start::Include your modals here-->


    <!--start::Include your scripts here-->
    @section('scripts')
    {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
    <script type="text/javascript" src="{{ "/".'custom/tools/manageCrmLogs/crm_log_dt.js?v=' . rvndev()->getrandomstring(30)}}"></script>
    <script type="text/javascript" src="{{ "/".'custom/tools/manageCrmLogs/deleteCrmLogValidation.js?v=' . rvndev()->getrandomstring(30)}}"></script>
    @endsection  
      <!--start::Include your styles here-->
      @section(' styles') <style>
        .dataTables_wrapper .dataTables_filter {
        display: none;
      }
      </style>
      @endsection
    
   
    
  </x-CRM-layout>