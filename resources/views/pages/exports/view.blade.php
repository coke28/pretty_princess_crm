<x-CRM-layout :pageTitle="$pageTitle" :pageDescription="$pageDescription">
    <style type="text/css">
        .error-box {
            border: 1px solid red;
            /* Add a red border around the error messages */
            background-color: #fdd;
            /* Set a background color for the error messages box */
            padding: 10px;
            /* Add some padding to create space around the error messages */
            margin-bottom: 10px;
            /* Optional: Add some space between the error box and the form fields */
        }

        .error-message {
            color: red;
            /* Set the text color to red */
            font-size: 14px;
            /* Optional: Adjust the font size */
        }
    </style>

    <div class="card card-custom mt-4">
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-5">

                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                </div>

            </div>

            <form action="{{ route('upload.file') }}" class="form" id="upload_form" enctype="multipart/form-data">
                <div class="row mb-12">
                    <div class="col-lg-6">
                        <label for="campaign_name" class="col-form-label fw-bold fs-6">Campaign
                            Name</label>
                        <div class="col-lg-12 fv-row" id="campaign_name">
                            <input type="text" name="campaign_name"
                                class="form-control form-control-sm form-control-solid"
                                placeholder="Enter Campaign Name..">
                        </div>
                    </div>

                    {{-- <div class="col-lg-6">
                        <label for="campaignGrouping" class="col-form-label fw-bold fs-6">Campaign
                            Grouping</label>
                        <div class="col-lg-12 fv-row" id="campaign_group">
                            <select class="form-select form-select-sm form-select-solid" name="campaign_group">
                                @foreach ($groups as $category )
                                <option value="{{ $category->groupName }}">{{ $category->groupName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div>

                <div class="row mb-12">
                    <div class="col-lg-6">
                        <label for="location" class="col-form-label fw-bold fs-6">Location
                        </label>
                        <div class="col-lg-12 fv-row" id="location">
                            <select class="form-select" data-control="select2" data-placeholder="Select an option"
                                name="location">
                                {{-- @foreach ($locations as $location )
                                <option value="{{ $location->id }}">{{ $location->location_name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="category" class="col-form-label fw-bold fs-6">Category
                        </label>
                        <div class="col-lg-12 fv-row" id="category">
                            <select class="form-select" data-control="select2" data-placeholder="Select an option"
                                name="category">
                                {{-- @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" id="exportSubmitBtn" class="btn btn-primary font-weight-bold" disabled="true">
                        Preview Leads To Export</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-custom mt-4">
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    <div class="input-group input-group-solid">
                        <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" id="campaignUploadLogSearch"
                            class="form-control form-control-lg form-control-solid" placeholder="Search">
                        <button class="input-group-text clearInp">
                            <i class="fas fa-times fs-4"></i>
                        </button>
                    </div>
                </div>
                <!--end::Search-->

                <!--begin::Toolbar-->
                {{-- <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                </div> --}}
                <!--end::Toolbar-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Datatable-->
            {{-- data-table-route is used to pass the name of the route to the seperate javascript file --}}
            <table id="lead_dt" data-table-route="{{ route('lead.table') }}"
                class="table table-rounded table-striped border gy-7 gs-7">
                <thead>
                    <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                        <th>Campaign Name</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact Info</th>
                        <th>Website</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody class="text-black-600 fw-bold">
            </table>
            <!--end::Datatable-->
        </div>
    </div>

    @section('scripts')
    {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
    {{-- <script type="text/javascript" src="{{ " /".'custom/upload/upload_file.js?v=' . rvndev()->getrandomstring(30)}}"></script>
    <script type="text/javascript" src="{{ "/".' custom/upload/deleteCampaignUploadLogValidation.js?v=' . rvndev()->getrandomstring(30)}}"></script> --}}
    @endsection  

   
    <!--start::Include your styles here-->
    @section(' styles') <style>
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
    </style>
    @endsection



</x-CRM-layout>