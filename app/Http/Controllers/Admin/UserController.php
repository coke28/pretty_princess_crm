<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserLevel;
use DB;
use Hash;
use Illuminate\Http\Request;
use Str;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin.manageUsers.view', array(
            'pageTitle' => 'Manage User',
            'pageDescription' => '',
            'userRoles' => UserLevel::where('deleted', '0')->get()
        ));
    }

    public function userTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'users.id',
            'users.first_name',
            'users.last_name',
            'user_levels.name',
            'users.email',
            'users.status',
            'users.created_at'
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

        $users = DB::table('users')
            ->join('user_levels', 'users.user_level_id', '=', 'user_levels.id')
            ->selectRaw('users.id
            ,users.first_name
            ,users.last_name
            ,user_levels.name
            ,users.email
            ,CASE users.status WHEN 0 THEN "INACTIVE" WHEN 1 THEN "ACTIVE" END as status
            ,users.created_at')
            ->where('user_levels.deleted', '0');
        // ->where('username', '!=', "root")
        // ->where('users.status', '1');
        $users = $users->where(function ($query) use ($search) {
            return $query->where('users.id', 'like', '%' . $search . '%')
                ->orWhere('users.first_name', 'like', '%' . $search . '%')
                ->orWhere('users.last_name', 'like', '%' . $search . '%')
                ->orWhere('user_levels.name', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere(DB::raw('CASE users.status WHEN 0 THEN "INACTIVE" WHEN 1 THEN "ACTIVE" END'), 'like', '%' . $search . '%')
                ->orWhere('users.created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $usersCount = $users->count();
        $users = $users->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $usersCount,
            'recordsFiltered' => $usersCount,
            'data'            => $users,
        ];

        // reponse must be in  array
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function userAdd(UserRequest $request)
    {

        //Check if email is in use
        //Get validated Data 
        $validatedData = $request->validated();
        $email = trim($validatedData['email']);
        $user = User::where('email', $email)->count();
        if ($user > 0) {
            return json_encode(array(
                'success' => false,
                'message' => 'Email already in use.'
            ));
        }
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->user_level_id = $validatedData['user_level_id'];
        $user->password = $validatedData['password'];
        $user->email = $validatedData['email'];
        $user->status = $validatedData['status'];
        $user->save();

        return json_encode(array(
            'success' => true,
            'message' => 'User added successfully.'
        ));
    }
    //Using route model binding
    public function userGet(User $user)
    {
        return json_encode($user);
    }

    public function userEdit(UserEditRequest $request, User $user)
    {

        //Get validated Data 
        $validatedData = $request->validated();
        $existingUser = User::where('email', $validatedData['email'])->where('id', '!=', $user->id)->count();
        if ($existingUser > 0) {
            return json_encode(array(
                'success' => false,
                'message' => 'Email already in use.'
            ));
        }
        //process validated data
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['email'] = trim($validatedData['email']);
        //start update
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->user_level_id = $validatedData['user_level_id'];
        if(!empty($validatedData['password'])){
            $user->password = $validatedData['password'];
        }
        $user->email = $validatedData['email'];
        $user->status = $validatedData['status'];
        $user->save();

        return json_encode(array(
            'success' => true,
            'message' => 'User edited successfully.'
        ));
    }

    // public function deleteUser(Request $request)
    // {
    //   $deleteUser = User::where('id', $request->id)->first();
    //   if ($deleteUser) {

    //     if (\File::exists(public_path($deleteUser->avatar))) {
    //       \File::delete(public_path($deleteUser->avatar));
    //       $deleteUser->avatar = null;
    //       $deleteUser->deleted = 1;
    //       $deleteUser->save();

    //       $auditLog = new AuditLog();
    //       $auditLog->agent = auth()->user()->id;
    //       $auditLog->action = "Deleted ID #" . " $deleteUser->id " . "User";
    //       $auditLog->table = "users";
    //       $auditLog->nID = "Deleted =" . $deleteUser->deleted;
    //       $auditLog->ip = \Request::ip();
    //       $auditLog->save();
    //       return 'User deleted successfully.';
    //     }
    //     //create log
    //     // $savelog = new CrmLog();
    //     // $savelog->module_name = 'Special Announcements';
    //     // $savelog->action = 'Deleted an announcement. Name: '.$deleteAnnouncement->name.'';
    //     // $savelog->user_id = auth()->user()->id;
    //     // $savelog->user_name = $savelog->user_id == 0 ? 'System' : auth()->user()->first_name.' '.auth()->user()->last_name;
    //     // $savelog->affected_row_copy = json_encode($deleteAnnouncement);
    //     // $savelog->save();
    //   } else {
    //     return 'User not found.';
    //   }
    // }
}
