<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Services\LeadService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    //
    private LeadService $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    public function leadTB(Request $request)
    {
        try {
            //code...
            $result = $this->leadService->leadTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    // public function locationAdd(LeadRequest $request)
    // {
    //     try {
    //         //code...
    //         $this->leadService->locationAdd($request->validated());
    //     } catch (\Exception $exception) {
    //         //throw $ex;
    //         return response()->json(['error' => $exception->getMessage()],422);
    //     }

    //     return json_encode(array(
    //         'success' => true,
    //         'message' => 'Lead added successfully.'
    //     ));
    // }
    //Using route model binding
    public function leadGet(Lead $lead)
    {
        return json_encode($lead);
    }

    public function leadEdit(LeadRequest $request, Lead $lead)
    {
        //Get validated Data 
        try {
            //code...
            $this->leadService->leadEdit($request->validated(),$lead);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
       
        return json_encode(array(
            'success' => true,
            'message' => 'Lead edited successfully.'
        ));
    }

    public function leadDelete(Lead $lead)
    {
        try {
            //code...
            $this->leadService->leadDelete($lead);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Lead has been deleted.'
        ));
    }
}
