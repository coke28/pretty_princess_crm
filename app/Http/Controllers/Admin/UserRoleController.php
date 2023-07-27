<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoleEditRequest;
use App\Http\Requests\UserRoleRequest;
use App\Models\UserLevel;
use DB;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    //
    public function index()
    {
        return view('admin.manageUserRoles.view', array(
            'pageTitle' => 'Manage User Role',
            'pageDescription' => ''
          ));
        // return view('admin.manageUserRoles.view');

    }

    public function userRoleTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'name',
            'created_at',
            'updated_at',
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

        $userRoles = DB::table('user_levels')
            ->selectRaw('*')
            ->where('deleted', '0');
        // ->where('username', '!=', "root")
        // ->where('users.status', '1');
        $userRoles = $userRoles->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%')
                ->orWhere('updated_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $userRoleCount = $userRoles->count();
        $userRoles = $userRoles->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $userRoleCount,
            'recordsFiltered' => $userRoleCount,
            'data'            => $userRoles,
        ];

        // reponse must be in  array
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function userRoleAdd(UserRoleRequest $request)
    {
        //Get validated Data 
        $validatedData = $request->validated();
        //Check if email is in use
        $name = trim($validatedData['name']);
        $existingUserLevel = UserLevel::where('name', $name)->where('deleted','0')->count();
        if ($existingUserLevel > 0) {
            return json_encode(array(
                'success' => false,
                'message' => 'User Level Name already in use.'
            ));
        }
        $userRole = new UserLevel();
        $userRole->name = $validatedData['name'];
        $userRole->n1_crm = $validatedData['n1_crm'] ?? 0;
        $userRole->n1_tools = $validatedData['n1_tools'] ?? 0;
        $userRole->n2_users = $validatedData['n2_users'] ?? 0;
        $userRole->n2_user_roles = $validatedData['n2_user_roles'] ?? 0;
        $userRole->n2_dashboard = $validatedData['n2_dashboard'] ?? 0;
        $userRole->save();

        return json_encode(array(
            'success' => true,
            'message' => 'User level added successfully.'
        ));
    }
    //Using route model binding
    public function userRoleGet(UserLevel $userRole)
    {
        return json_encode($userRole);
    }

    public function userRoleEdit(UserRoleEditRequest $request, UserLevel $userRole)
    {

        //Get validated Data 
        $validatedData = $request->validated();
        $existingUserLevel = UserLevel::where('name', $validatedData['name'])->where('id', '!=', $userRole->id)->where('deleted','0')->count();
        if ($existingUserLevel > 0) {
            return json_encode(array(
                'success' => false,
                'message' => 'User Level already in use.'
            ));
        }
        $userRole->name = $validatedData['name'];
        $userRole->n1_crm = $validatedData['n1_crm'] ?? 0;
        $userRole->n1_tools = $validatedData['n1_tools'] ?? 0;
        $userRole->n2_users = $validatedData['n2_users'] ?? 0;
        $userRole->n2_user_roles = $validatedData['n2_user_roles'] ?? 0;
        $userRole->n2_dashboard = $validatedData['n2_dashboard'] ?? 0;
        $userRole->save();
       
        return json_encode(array(
            'success' => true,
            'message' => 'User level edited successfully.'
        ));
    }

    public function userRoleDelete(UserLevel $userRole)
    {
        $userRole->deleted = "1";
        $userRole->save();
        return json_encode(array(
            'success' => true,
            'message' => 'User level has been deleted.'
        ));
    }
}
