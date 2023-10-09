<div class="modal fade" id="editForm" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editForm"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="formModalContent">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Edit Form Modal
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
                <form class="form" id="edit_form_form">
                    <input type="hidden" name="id">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="form_name" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Form Name">
                        </div>

                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">File Template URL<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="file_template_url"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter File Template URL">
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Data Set<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="data_set" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Comma Seperated Dataset">
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select" data-placeholder="Select an option" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    {{-- Server Validation Errors --}}
                    <div class="error-box" style="display: none;">
                        <div id="" class="error-message">Server Validation Errors</div>
                        <div id="form_name_error_edit" class="error-message"></div>
                        <div id="data_set_error_edit" class="error-message"></div>
                        <div id="status_error_edit" class="error-message"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger font-weight-bold"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="editFormSubmitBtn" class="btn btn-primary font-weight-bold">Edit
                            Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>