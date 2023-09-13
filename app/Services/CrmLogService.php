<?php

namespace App\Services;

use App\Models\CrmLog;
use DB;
use Illuminate\Http\Request;

class CrmLogService
{
    public function crm_logTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'module_name',
            'action',
            'user_name',
            'affected_row_copy',
            'created_at',
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

        $crm_logs = DB::table('crm_logs')->selectRaw('
            id,
            module_name,
            action,
            user_name,
            affected_row_copy,
            created_at,
        ');

        $crm_logs = $crm_logs->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('module_name', 'like', '%' . $search . '%')
                ->orWhere('action', 'like', '%' . $search . '%')
                ->orWhere('user_name', 'like', '%' . $search . '%')
                ->orWhere('affected_row_copy', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $crm_logsCount = $crm_logs->count();
        $crm_logs = $crm_logs->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $crm_logsCount,
            'recordsFiltered' => $crm_logsCount,
            'data'            => $crm_logs,
        ];

        return $result;
    }

    public function addCrmLog($model,$module_name,$action)
    {

        $crm_log = new CrmLog();
        $crm_log->module_name = $module_name;
        $crm_log->action = $action;
        $crm_log->user_id = auth()->user()->id;
        $crm_log->user_name = auth()->user()->first_name." ".auth()->user()->last_name;
        $crm_log->affected_row_copy = json_encode($model);
        $crm_log->save();
    }

    public function crmLogDelete(CrmLog $crm_log)
    {
        $crm_log->deleted = "1";
        $crm_log->save();
    }
}
