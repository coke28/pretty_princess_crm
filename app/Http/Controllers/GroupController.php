<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //
    private GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function groupTB(Request $request)
    {
        try {
            //code...
            $result = $this->groupService->groupTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function groupAdd(GroupRequest $request)
    {
        try {
            //code...
            $this->groupService->groupAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }

        return json_encode(array(
            'success' => true,
            'message' => 'Group added successfully.'
        ));
    }
    //Using route model binding
    public function groupGet(Group $group)
    {
        return json_encode($group);
    }

    public function groupEdit(GroupRequest $request, Group $group)
    {
        //Get validated Data 
        try {
            //code...
            $this->groupService->groupEdit($request->validated(),$group);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
       
        return json_encode(array(
            'success' => true,
            'message' => 'Group edited successfully.'
        ));
    }

    public function groupDelete(Group $group)
    {
        try {
            //code...
            $this->groupService->groupDelete($group);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Group has been deleted.'
        ));
    }
}
