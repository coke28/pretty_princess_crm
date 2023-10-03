<x-CRM-layout :pageTitle="$pageTitle" :pageDescription="$pageDescription">

  <div class="card card-custom mt-4">
    <div class="card-body">
      <div class="row mb-12">
        <div class="col-lg-6">
          <label for="campaign_name" class="col-form-label fw-bold fs-6">Campaign
            Name</label>
          <div class="col-lg-12 fv-row" id="campaign_name">
            <select class="form-select" data-control="select2" data-placeholder="Select an option" name="location">
              {{-- @foreach ($locations as $location )
              <option value="{{ $location->id }}">{{ $location->location_name}}</option>
              @endforeach --}}
            </select>
          </div>
        </div>

        <div class="col-lg-6">
          <label for="campaign_group" class="col-form-label fw-bold fs-6">Campaign
            Grouping</label>
          <div class="col-lg-12 fv-row" id="campaign_group">
            <select class="form-select" data-control="select2" data-placeholder="Select an option" name="campaign_group">
              {{-- @foreach ($groups as $category )
              <option value="{{ $category->groupName }}">{{ $category->groupName}}</option>
              @endforeach --}}
            </select>
          </div>
        </div>
      </div>

      <div class="row mb-12">
        <div class="col-lg-6">
          <label for="location" class="col-form-label fw-bold fs-6">Location
          </label>
          <div class="col-lg-12 fv-row" id="location">
            <select class="form-select" data-control="select2" data-placeholder="Select an option" name="location">
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
            <select class="form-select" data-control="select2" data-placeholder="Select an option" name="category">
              {{-- @foreach ($categories as $category )
              <option value="{{ $category->id }}">{{ $category->category_name}}</option>
              @endforeach --}}
            </select>
          </div>
        </div>

        <div class="col-lg-6">
          <label for="email_sent" class="col-form-label fw-bold fs-6">Email Sent
          </label>
          <div class="col-lg-12 fv-row" id="email_sent">
            <select class="form-select" data-control="select2" data-placeholder="Select an option" name="email_sent">
              <option value=""></option>
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button id="filterBtn" class="btn btn-primary font-weight-bold">
            Filter Table</button>
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
          {{-- <button type="button" class="btn btn-primary" title="Add Category" data-bs-toggle="modal"
            data-bs-target="#addCategory">
            <span class="svg-icon svg-icon-2"><i class="bi bi-plus fs-2"></i></span>
            Add Category
          </button> --}}
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
  {{-- @include('tools/manageCategories/modals/addCategory')
  @include('tools/manageCategories/modals/editCategory') --}}


  <!--start::Include your scripts here-->
  @section('scripts')
  {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
  <script type="text/javascript" src="{{ "/".'custom/lead/lead_dt.js?v=' . rvndev()->getrandomstring(30)}}"></script>
        {{-- <script type="text/javascript" src="{{ "/".' custom/tools/manageCategories/addCategoryValidation.js?v='. rvndev()->getrandomstring(30) }}"></script>
        <script type="text/javascript" src="{{ "/".' custom/tools/manageCategories/editCategoryValidation.js?v='. rvndev()->getrandomstring(30) }}"></script> --}}
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