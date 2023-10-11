<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailTemplateRequest;
use App\Models\EmailTemplate;
use App\Services\EmailTemplateService;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    //
    private EmailTemplateService $emailTemplateService;

    public function __construct(EmailTemplateService $emailTemplateService)
    {
        $this->emailTemplateService = $emailTemplateService;
    }

    public function emailTemplateTB(Request $request)
    {
        try {
            //code...
            $result = $this->emailTemplateService->emailTemplateTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function emailTemplateAdd(EmailTemplateRequest $request)
    {
        try {
            //code...
            $this->emailTemplateService->emailTemplateAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }

        return json_encode(array(
            'success' => true,
            'message' => 'Email Template added successfully.'
        ));
    }
    //Using route model binding
    public function emailTemplateGet(EmailTemplate $email_template)
    {
        return json_encode($email_template);
    }

    public function emailTemplateEdit(EmailTemplateRequest $request, EmailTemplate $email_template)
    {
        //Get validated Data 
        try {
            //code...
            $this->emailTemplateService->emailTemplateEdit($request->validated(),$email_template);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
       
        return json_encode(array(
            'success' => true,
            'message' => 'Email Template edited successfully.'
        ));
    }

    public function emailTemplateDelete(EmailTemplate $email_template)
    {
        try {
            //code...
            $this->emailTemplateService->emailTemplateDelete($email_template);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Email Template has been deleted.'
        ));
    }
}
