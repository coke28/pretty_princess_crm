<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Mail\LeadEmail;
use App\Models\EmailTemplate;
use App\Models\Lead;
use App\Services\LeadService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            return response()->json(['error' => $exception->getMessage()], 422);
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
            $this->leadService->leadEdit($request->validated(), $lead);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()], 422);
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
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Lead has been deleted.'
        ));
    }
    public function leadSend(Request $request)
    {
        try {
            //code...
           
            // $leads = $this->leadService->leadTB($request);
            $leads = DB::table('leads')
            ->where('deleted', '0');

            if (!empty($request->campaign_name_filter)) {
                $leads = $leads->where('campaign_name', $request->campaign_name_filter);
            }
            if (!empty($request->campaign_group_filter)) {
                $leads = $leads->where('group_id', $request->campaign_group_filter);
            }
            if (!empty($request->location_filter)) {
                $leads = $leads->where('location_id', $request->location_filter);
            }
            if (!empty($request->category_filter)) {
                $leads = $leads->where('category_id', $request->category_filter);
            }
            if (!empty($request->email_sent_filter)) {
                $leads = $leads->where('email_sent', $request->email_sent_filter);
            }

            $leads = $leads->get();
            
            
            $email_template = EmailTemplate::where('id',$request->email_template)->first();
            foreach($leads as $lead){
                Mail::to($lead->email_address)->send(new LeadEmail($lead->company_name,$email_template));
            }
            
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        return response()->json([
            'success' => true,
            'message' => 'Flagged Email to be Sent.',
        ], 200);
    }
}
