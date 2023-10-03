<?php

namespace App\Http\Controllers;

use App\Models\CampaignUploadLog;
use App\Services\CampaignUploadLogService;
use Illuminate\Http\Request;

class CampaignUploadLogController extends Controller
{
    //
    private CampaignUploadLogService $campaignUploadLogService;

    public function __construct(CampaignUploadLogService $campaignUploadLogService)
    {
        $this->campaignUploadLogService = $campaignUploadLogService;
    }

    public function campaignUploadLogTB(Request $request)
    {
        try {
            //code...
            $result = $this->campaignUploadLogService->campaignUploadLogTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function campaignUploadLogDelete(CampaignUploadLog $campaignUploadLog)
    {
        try {
            //code...
            $this->campaignUploadLogService->campaignUploadLogDelete($campaignUploadLog);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Campaign and leads under the campaign have been successfully deleted.'
        ));
    }

}
