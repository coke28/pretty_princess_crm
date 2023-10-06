<?php

namespace App\Services;

use App\Models\CampaignUploadLog;
use App\Models\Lead;
use DB;
use Illuminate\Http\Request;

class CampaignUploadLogService
{
    public function campaignUploadLogTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'campaign_upload_logs.id',
            'campaign_upload_logs.campaign_name',
            'groups.group_name',
            'campaign_uploader',
            'campaign_upload_logs.rows_uploaded',
            'campaign_upload_logs.upload_date',
        );

        // offset and limit
        $offset = 0;
        $limit = 10;
        if (isset($request->length)) {
            $offset = isset($request->start) ? $request->start : $offset;
            $limit = isset($request->length) ? $request->length : $limit;
        }

        // searchText
        $search = '';
        if (isset($request->search) && isset($request->search['value'])) {
            $search = $request->search['value'];
        }

        // ordering
        $sortIndex = 0;
        $sortOrder = 'desc';
        if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['column'])) {
            $sortIndex = $request->order[0]['column'];
        }
        if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['dir'])) {
            $sortOrder = $request->order[0]['dir'];
        }

        $campaign_upload_logs = DB::table('campaign_upload_logs')
        ->join('users', 'users.id', '=', 'campaign_upload_logs.campaign_uploader')
        ->leftjoin('groups', 'groups.id', '=', 'campaign_upload_logs.group_id')
        ->selectRaw('
            campaign_upload_logs.id,
            campaign_upload_logs.campaign_name,
            groups.group_name,
            CONCAT(users.first_name, " ", users.last_name) as campaign_uploader,
            campaign_upload_logs.rows_uploaded,
            campaign_upload_logs.created_at
        ')
        ->where('campaign_upload_logs.deleted','0');

        $campaign_upload_logs = $campaign_upload_logs->where(function ($query) use ($search) {
            return $query->where('campaign_upload_logs.id', 'like', '%' . $search . '%')
                ->orWhere('campaign_upload_logs.campaign_name', 'like', '%' . $search . '%')
                ->orWhere('campaign_uploader', 'like', '%' . $search . '%')
                ->orWhere('campaign_upload_logs.created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $campaign_upload_logsCount = $campaign_upload_logs->count();
        $campaign_upload_logs = $campaign_upload_logs->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $campaign_upload_logsCount,
            'recordsFiltered' => $campaign_upload_logsCount,
            'data'            => $campaign_upload_logs,
        ];

        return $result;
    }

    public function addCampaignUploadLog($campaign_name,$user_id,$rows_uploaded,$group_id)
    {

        $campaign_upload_log = new CampaignUploadLog();
        $campaign_upload_log->campaign_name = $campaign_name;
        $campaign_upload_log->group_id = $group_id;
        $campaign_upload_log->campaign_uploader = $user_id;
        $campaign_upload_log->rows_uploaded = $rows_uploaded;
        $campaign_upload_log->save();
    }

    public function campaignUploadLogDelete(CampaignUploadLog $campaign_upload_log)
    {
        $leads_to_delete = Lead::where('campaign_name', $campaign_upload_log->campaign_name)->where('deleted','0')->get();

        foreach($leads_to_delete as $lead){
            $lead->deleted = '1';
            $lead->save();
        }
        $campaign_upload_log->deleted = "1";
        $campaign_upload_log->save();
    }
}
