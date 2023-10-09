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

    <div class="col-md-6">
        <div class="card card-custom mt-4">
            <div class="card-body">
                <ul class="nav nav-tabs nav-pills flex-row border-0 me-5 mb-3 fs-6">
                    <li class="nav-item me-2 mb-2">
                        <a class="nav-link active btn btn-flex btn-active-light-success" data-bs-toggle="tab"
                            href="#kt_tab_pane_4">
                            <span class="svg-icon fs-2"><span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Uploaded-file.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M8.95128003,13.8153448 L10.9077535,13.8153448 L10.9077535,15.8230161 C10.9077535,16.0991584 11.1316112,16.3230161 11.4077535,16.3230161 L12.4310522,16.3230161 C12.7071946,16.3230161 12.9310522,16.0991584 12.9310522,15.8230161 L12.9310522,13.8153448 L14.8875257,13.8153448 C15.1636681,13.8153448 15.3875257,13.5914871 15.3875257,13.3153448 C15.3875257,13.1970331 15.345572,13.0825545 15.2691225,12.9922598 L12.3009997,9.48659872 C12.1225648,9.27584861 11.8070681,9.24965194 11.596318,9.42808682 C11.5752308,9.44594059 11.5556598,9.46551156 11.5378061,9.48659872 L8.56968321,12.9922598 C8.39124833,13.2030099 8.417445,13.5185067 8.62819511,13.6969416 C8.71848979,13.773391 8.8329684,13.8153448 8.95128003,13.8153448 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></span>
                            <span class="d-flex flex-column align-items-start ms-2">
                                <span class="fs-4 fw-bold">Upload</span>
                                <span class="fs-7">Upload CSV/Excel File</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item me-2 mb-2">
                        <a class="nav-link btn btn-flex btn-active-light-info" data-bs-toggle="tab"
                            href="#kt_tab_pane_5">
                            <span class="svg-icon fs-2"><span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                fill="#000000" opacity="0.3" />
                                            <path
                                                d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                fill="#000000" />
                                            <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2"
                                                rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2"
                                                rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2"
                                                rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2"
                                                rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2"
                                                rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2"
                                                rx="1" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></span>
                            <span class="d-flex flex-column align-items-start ms-2">
                                <span class="fs-4 fw-bold">Campaign Upload Log</span>
                                <span class="fs-7">View Campaign Upload Log</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link btn btn-flex btn-active-light-danger" data-bs-toggle="tab"
                            href="#kt_tab_pane_6">
                            <span class="svg-icon fs-2"><span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Loading.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g>
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                            </g>
                                            <path
                                                d="M12,4 L12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,10.9603196 17.7360885,9.96126435 17.2402578,9.07513926 L18.9856052,8.09853149 C19.6473536,9.28117708 20,10.6161442 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                transform="translate(12.000000, 12.000000) scale(-1, 1) translate(-12.000000, -12.000000) " />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span></span>
                            <span class="d-flex flex-column align-items-start ms-2">
                                <span class="fs-4 fw-bold">Sample File Format</span>
                                <span class="fs-7">View Format of Import File</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
            <div class="card card-custom mt-4">
                <div class="card-body">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">

                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                        </div>

                    </div>

                    <form action="{{ route('upload.file') }}" class="form" id="upload_form"
                        enctype="multipart/form-data">
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

                            <div class="col-lg-6">
                                <label for="campaignGrouping" class="col-form-label fw-bold fs-6">Campaign
                                    Group</label>
                                <div class="col-lg-12 fv-row" id="group">
                                    <select class="form-select" data-placeholder="Select an option" name="group">
                                        <option value="0">Select Campaign Group</option>
                                        @foreach ($groups as $group )
                                        <option value="{{ $group->id }}">{{ $group->group_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-12">
                            <div class="col-lg-6">
                                <label for="location" class="col-form-label fw-bold fs-6">Location
                                </label>
                                <div class="col-lg-12 fv-row" id="location">
                                    <select class="form-select" data-placeholder="Select an option" name="location">
                                        @foreach ($locations as $location )
                                        <option value="{{ $location->id }}">{{ $location->location_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label for="category" class="col-form-label fw-bold fs-6">Category
                                </label>
                                <div class="col-lg-12 fv-row" id="category">
                                    <select class="form-select" data-placeholder="Select an option" name="category">
                                        @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label for="remarkStatus" class="col-form-label fw-bold fs-6">Upload File</label>
                            <div class="col-lg-12 fv-row">
                                <input type="file" name="file" placeholder="Leave blank"
                                    class="form-control form-control-lg form-control-solid" accept=".csv, .xlsx" />
                            </div>
                        </div>
                        <br>

                        <div class="error-box" style="display: none;">
                            <div id="" class="error-message">Incorrect File format</div>
                            <div id="error-message" class="error-message"></div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" id="uploadSubmitBtn" class="btn btn-primary font-weight-bold"
                                disabled="true">
                                Upload File</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
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
                    <table id="campaign_upload_log_dt" data-table-route="{{ route('campaignUploadLog.table') }}"
                        class="table table-rounded table-striped border gy-7 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                                <th>ID</th>
                                <th>Campaign Name</th>
                                <th>Campaign Group</th>
                                <th>Campaign_uploader</th>
                                <th># of Leads Uploaded</th>
                                <th>Upload Date</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody class="text-black-600 fw-bold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
            <div class="card card-custom mt-4">
                <div class="card-body">
                    <table id=""
                    class="table table-rounded table-striped border gy-7 gs-7">
                    <thead>
                        <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Contact Info</th>
                            <th>Website</th>
                            <th>Instagram</th>
                            <th>Facebook</th>
                        </tr>
                    </thead>
                    <tbody class="text-black-600 fw-bold">
                        <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                            <th>required and a string</th>
                            <th>required and a string</th>
                            <th>required and is a valid email address</th>
                            <th>required and is a contact number</th>
                            <th>required and a string</th>
                            <th>required and a string</th>
                            <th>required and a string</th>
                        </tr>
                        <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                            <th>My Salon Suite
                            </th>
                            <th>2833 Bartlett Blvd Bartlett Tennessee 38134
                            </th>
                            <th>info.bartlett@mysalonsuite.com
                            </th>
                            <th>901-463-8284
                            </th>
                            <th>https://www.mysalonsuite.com/</th>
                            <th>https://www.facebook.com/mysalonsuitebartlett/</th>
                            <th>https://www.instagram.com/mysalonsuite_bartlett/</th>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>



    @section('scripts')
    {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
    <script type="text/javascript" src="{{ "/".'custom/upload/upload_file.js?v=' . rvndev()->getrandomstring(30)}}"></script>
    <script type="text/javascript" src="{{ "/".'custom/upload/deleteCampaignUploadLogValidation.js?v=' . rvndev()->getrandomstring(30)}}"></script>
    @endsection  

   
    <!--start::Include your styles here-->
    @section(' styles') <style>
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
    </style>
    @endsection



</x-CRM-layout>