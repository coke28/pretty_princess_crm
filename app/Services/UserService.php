<?php

namespace App\Services;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserService
{
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



        return [
            'recordsTotal'    => $usersCount,
            'recordsFiltered' => $usersCount,
            'data'            => $users,
        ];
    }
    public function userAdd($validatedData): void
    {
        $checkDupliateEmailParameters = [
            "email" => $validatedData['email'],
            "user_id" => "",
            "type" => "add",
        ];
        $this->checkDuplicateEmail($checkDupliateEmailParameters);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->user_level_id = $validatedData['user_level_id'];
        $user->password = $validatedData['password'];
        $user->email = $validatedData['email'];
        $user->status = $validatedData['status'];
        $user->save();
    }
    public function userEdit($validatedData, User $user): void
    {
        $checkDupliateEmailParameters = [
            "email" => $validatedData['email'],
            "user_id" => $user->id,
            "type" => "edit",
        ];
        $this->checkDuplicateEmail($checkDupliateEmailParameters);
        //process validated data
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['email'] = trim($validatedData['email']);
        //start update
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->user_level_id = $validatedData['user_level_id'];
        if (!empty($validatedData['password'])) {
            $user->password = $validatedData['password'];
        }
        $user->email = $validatedData['email'];
        $user->status = $validatedData['status'];
        $user->save();
    }
    private function checkDuplicateEmail($paramaterArray)
    {
        switch ($paramaterArray['type']) {
            case 'add':
                # code...
                $existingUser = User::where('email', $paramaterArray['email'])->count();
                break;
            case 'edit':
                # code...
                $existingUser = User::where('email', $paramaterArray['email'])->where('id', '!=', $paramaterArray['user_id'])->count();
                break;
        }
        if ($existingUser > 0) {
            throw new \Exception("Email is already in use.");
        }
    }
}
