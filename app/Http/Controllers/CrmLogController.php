<?php

namespace App\Http\Controllers;

use App\Models\CrmLog;
use App\Services\CrmLogService;
use Illuminate\Http\Request;

class CrmLogController extends Controller
{
    //
    private CrmLogService $crmLogService;
 
    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }

    public function crmLogTB(Request $request)
    {
        try {
            //code...
            $result = $this->crmLogService->crmLogTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function crmLogDelete(CrmLog $crmLog)
    {
        try {
            //code...
            $this->crmLogService->crmLogDelete($crmLog);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'CRM Log has been deleted.'
        ));
    }

}
