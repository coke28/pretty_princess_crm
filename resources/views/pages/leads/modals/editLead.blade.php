<div class="modal fade" id="editLead" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLead"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="leadModalContent">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Edit Lead Modal
                </h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i aria-hidden="true" class="bi bi-x fs-2x"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="formAlertDiv">

                </div>
                <form class="form" id="edit_lead_form">
                    <input type="hidden" name="id">
                    <div class="row mb-3">

                    </div>
                    <div class="col mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Company Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="company_name"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Company Name">
                        </div>

                    </div>

                    <!-- Website and Facebook -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Campaign Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10 fv-row">
                                <select id="campaign_name" class="form-select">
                                    @foreach ($campaign_names as $campaign_name )
                                    <option value="{{ $campaign_name->campaign_name }}">{{ $campaign_name->campaign_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Category Description</label>
                            <div class="col-lg-10 fv-row">
                                <textarea type="text" name="category_description"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Enter Category Description"></textarea>
                            </div>

                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>
                            <div class="col-lg-10 fv-row">
                                <select class="form-select" data-control="select2" data-placeholder="Select an option"
                                    name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- Server Validation Errors --}}
                        {{-- <div class="error-box" style="display: none;">
                            <div id="" class="error-message">Server Validation Errors</div>
                            <div id="category_name_error_edit" class="error-message"></div>
                            <div id="category_description_error_edit" class="error-message"></div>
                            <div id="status_error_edit" class="error-message"></div>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger font-weight-bold"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="editLeadSubmitBtn" class="btn btn-primary font-weight-bold">Edit
                                Lead</button>
                        </div>
                </form>
            </div>
        </div>
    </div>