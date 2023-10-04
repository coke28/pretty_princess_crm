<?php

namespace App\Services;

use App\Models\CrmLog;
use App\Models\Group;
use DB;
use Illuminate\Http\Request;

class GroupService
{
    private CrmLogService $crmLogService;
 
    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }
    
    public function groupTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'group_name',
            'group_description',
            'status',
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

        $groups = DB::table('groups')->selectRaw('
            id,
            group_name,
            group_description,
            CASE status WHEN 0 THEN "DISABLED" WHEN 1 THEN "ACTIVE" END as status,
            created_at
        ')
        ->where('deleted','0');

        $groups = $groups->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('group_name', 'like', '%' . $search . '%')
                ->orWhere('group_description', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $groupCount = $groups->count();
        $groups = $groups->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $groupCount,
            'recordsFiltered' => $groupCount,
            'data'            => $groups,
        ];

        return $result;
    }

    public function groupAdd($validatedData): void
    {
        $group = new Group();
        $group->group_name = $validatedData['group_name'];
        $group->group_description = $validatedData['group_description'];
        $group->status = $validatedData['status'] ?? 0;
        $group->save();

        $this->crmLogService->addCrmLog($group, "Manage Groups", "groupAdd");
    }
    public function groupEdit($validatedData, Group $group): void
    {
        $group->group_name = $validatedData['group_name'];
        $group->group_description = $validatedData['group_description'];
        $group->status = $validatedData['status'] ?? 0;
        $group->save();

        $this->crmLogService->addCrmLog($group, "Manage Groups", "groupEdit");
    }
    public function groupDelete (Group $group)
    {
        $group->deleted = "1";
        $group->save();

        $this->crmLogService->addCrmLog($group, "Manage Groups", "groupDelete");
    }
}