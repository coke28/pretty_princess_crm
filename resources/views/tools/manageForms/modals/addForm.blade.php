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

<div class="modal fade" id="addForm" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addForm"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Add Form
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
                <form class="form" id="add_form_form">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="form_name" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Form Name">
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
                        <label class="col-lg-2 col-form-label fw-bold fs-6">File Template URL<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="file_template_url"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter File Template URL">
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
                        <div id="form_name_error" class="error-message"></div>
                        <div id="data_set_error" class="error-message"></div>
                        <div id="status_error" class="error-message"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" id="addFormSubmitBtn" class="btn btn-primary font-weight-bold"
                    data-form-add-route="{{ route('form.add') }}">Add Form</button>
            </div>
            </form>
        </div>
    </div>
</div>