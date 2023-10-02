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

<div class="modal fade" id="addCategory" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addCategory"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Add Category
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
                <form class="form" id="add_category_form">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Category Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="category_name" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Category Name">
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Category Description</label>
                        <div class="col-lg-10 fv-row">
                            <textarea type="text" name="category_description" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Category Description"> </textarea>
                        </div>

                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-control selectpicker" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    {{-- Server Validation Errors --}}
                    <div class="error-box" style="display: none;">
                        <div id="" class="error-message">Server Validation Errors</div>
                        <div id="category_name_error" class="error-message"></div>
                        <div id="category_description_error" class="error-message"></div>
                        <div id="status_error" class="error-message"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" id="addCategorySubmitBtn" class="btn btn-primary font-weight-bold"
                    data-form-add-route="{{ route('category.add') }}">Add Category</button>
            </div>
            </form>
        </div>
    </div>
</div>