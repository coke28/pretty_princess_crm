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
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Campaign Name</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select" name="campaign_name" id="campaign_name">
                                <option value="">Select Campaign Name Filter</option>
                                @foreach ($campaign_names as $campaign_name )
                                <option value="{{ $campaign_name->campaign_name }}">{{ $campaign_name->campaign_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Company Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="company_name"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Company Name">
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Address<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="address" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Address Name">
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Email<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="email" name="email_address"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Email Address">
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Contact Info<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="contact_information" name="contact_information"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Contact Information">
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Website<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="website" name="website" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Website">
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Facebook<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="facebook" name="facebook"
                                class="form-control form-control-lg form-control-solid" placeholder="Enter Facebook">
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Instagram<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="instagram" name="instagram"
                                class="form-control form-control-lg form-control-solid" placeholder="Enter Instagram">
                        </div>
                    </div>


                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Email Sent?<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select" name="email_sent" id="email_sent">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>




                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Location<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select" name="location_id" id="location_id">
                                @foreach ($locations as $location )
                                <option value="{{ $location->id }}">{{ $location->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Category<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select" name="category_id" id="category_id">
                                @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Group</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select" name="group_id" id="group_id">
                                @foreach ($groups as $group )
                                <option value="{{ $group->id }}">{{ $group->group_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Server Validation Errors --}}
                    <div class="error-box" style="display: none;">
                        <div id="" class="error-message">Server Validation Errors</div>
                        <div id="category_name_error_edit" class="error-message"></div>
                        <div id="category_description_error_edit" class="error-message"></div>
                        <div id="status_error_edit" class="error-message"></div>
                    </div>

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