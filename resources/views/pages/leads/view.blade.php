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
      <div class="row mb-12">
        <div class="col-lg-6">
          <label for="campaign_name_filter" class="col-form-label fw-bold fs-6">Campaign
            Name</label>
          <div class="col-lg-12 fv-row">
            <select class="form-select" name="campaign_name_filter" id="campaign_name_filter">
              <option value="">Select Campaign Name Filter</option>
              @foreach ($campaign_names as $campaign_name )
              <option value="{{ $campaign_name->campaign_name }}">{{ $campaign_name->campaign_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-6">
          <label for="campaign_group" class="col-form-label fw-bold fs-6">Campaign
            Grouping</label>
          <div class="col-lg-12 fv-row">
            <select class="form-select" name="campaign_group_filter_filter" id="campaign_group_filter">
              <option value="0">Select Campaign Group Filter</option>
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
          <div class="col-lg-12 fv-row">
            <select class="form-select" name="location_filter" id="location_filter">
              <option value="">Select Location Filter</option>
              @foreach ($locations as $location )
              <option value="{{ $location->id }}">{{ $location->location_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-lg-6">
          <label for="category" class="col-form-label fw-bold fs-6">Category
          </label>
          <div class="col-lg-12 fv-row">
            <select class="form-select" name="category_filter" id="category_filter">
              <option value="">Select Category Filter</option>
              @foreach ($categories as $category )
              <option value="{{ $category->id }}">{{ $category->category_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row mb-12">
        <div class="col-lg-6">
          <label for="email_sent" class="col-form-label fw-bold fs-6">Email Sent
          </label>
          <div class="col-lg-12 fv-row">
            <select class="form-select" name="email_sent_filter" id="email_sent_filter">
              <option value="">Select Email Sent Filter</option>
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row mb-12">
        <div class="col-lg-6">
          <label for="email_sent" class="col-form-label fw-bold fs-6">Email Template
          </label>
          <div class="col-lg-12 fv-row">
            <select class="form-select" name="email_template" id="email_template">
              <option value="">Select Email Template to Send Emails with</option>
              @foreach ($email_templates as $email_template )
              <option value="{{ $email_template->id }}">{{ $email_template->email_template_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button id="lead_filter_btn" class="btn btn-primary font-weight-bold" disabled="true">
          <span class="svg-icon svg-icon-primary svg-icon-2x">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Text/Filter.svg--><svg
              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
              viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <path
                  d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                  fill="#000000" />
              </g>
            </svg>
            <!--end::Svg Icon-->
          </span> Filter Table</button>
      </div>
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
            <input type="text" id="leadSearch" class="form-control form-control-lg form-control-solid"
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
          <button type="button" class="btn btn-primary font-weight-bold" id="send_emails_btn" disabled="true">
            <span class="svg-icon svg-icon-primary svg-icon-2x">
              <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Sending mail.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path
                    d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M3,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L3,8 C2.44771525,8 2,7.55228475 2,7 C2,6.44771525 2.44771525,6 3,6 Z"
                    fill="#000000" opacity="0.3" />
                  <path
                    d="M10,6 L22,6 C23.1045695,6 24,6.8954305 24,8 L24,16 C24,17.1045695 23.1045695,18 22,18 L10,18 C8.8954305,18 8,17.1045695 8,16 L8,8 C8,6.8954305 8.8954305,6 10,6 Z M21.0849395,8.0718316 L16,10.7185839 L10.9150605,8.0718316 C10.6132433,7.91473331 10.2368262,8.02389331 10.0743092,8.31564728 C9.91179228,8.60740125 10.0247174,8.9712679 10.3265346,9.12836619 L15.705737,11.9282847 C15.8894428,12.0239051 16.1105572,12.0239051 16.294263,11.9282847 L21.6734654,9.12836619 C21.9752826,8.9712679 22.0882077,8.60740125 21.9256908,8.31564728 C21.7631738,8.02389331 21.3867567,7.91473331 21.0849395,8.0718316 Z"
                    fill="#000000" />
                </g>
              </svg>
              <!--end::Svg Icon-->
            </span>
            Send Emails
          </button>
          <!--end::Add special announcement-->
        </div>
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
        </tbody>
      </table>
      <!--end::Datatable-->
    </div>
  </div>

  <!--start::Include your modals here-->
  @include('pages/leads/modals/editLead')



  <!--start::Include your scripts here-->
  @section('scripts')
  {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
    <script type="text/javascript" src="{{ "/".'custom/lead/lead_dt.js?v=' . rvndev()->getrandomstring(30)}}"></script>
    <script type="text/javascript" src="{{ "/".'custom/lead/editLeadValidation.js?v='. rvndev()->getrandomstring(30) }}"></script>
    <script type="text/javascript" src="{{ "/".'custom/lead/deleteLeadValidation.js?v='. rvndev()->getrandomstring(30) }}"></script>
  @endsection  
    
      <!--start::Include your styles here-->
      @section('styles') <style>
    .dataTables_wrapper .dataTables_filter {
        display: none;
      }
      </style>
      @endsection
  </x-CRM-layout>