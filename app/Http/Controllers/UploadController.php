<?php

namespace App\Http\Controllers;

use App\Imports\LeadImport;
use App\Models\CampaignUploadLog;
use App\Rules\UniqueExceptCurrent;
use App\Services\CampaignUploadLogService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    //
    private CampaignUploadLogService $campaignUploadLogService;

    public function __construct(CampaignUploadLogService $campaignUploadLogService)
    {
        $this->campaignUploadLogService = $campaignUploadLogService;
    }

    public function uploadFile(Request $request)
    {
        $campaignUploadCount = CampaignUploadLog::where('campaign_name', $request->campaign_name)->where('deleted', '0')->count();
        if ($campaignUploadCount > 0) {
            return response()->json([
                'error' => "Campaign Name already in-use.",
                'alert' => true,
            ], 422);
        }
        try {
            $file = $request->file('file');

            $import = new LeadImport($request->campaign_name, $request->location, $request->category);
            // $import->import($file);
            Excel::import($import, $file);
            
            
            $this->campaignUploadLogService->addCampaignUploadLog($request->campaign_name, auth()->user()->id,$import->rowCount);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return response()->json(['error' => $e->failures()], 422);
        }
       
        return json_encode(array(
            'success' => true,
            'message' => "Uploaded succesfully!"
        ));
    }
}
