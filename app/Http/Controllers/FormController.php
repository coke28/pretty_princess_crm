<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\FormService;
use Illuminate\Http\Request;
use Str;

class FormController extends Controller
{
    private FormService $formService;
 
    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }

    // public function userTB(Request $request)
    // {
    //     try {
    //         //code...
    //         $result = $this->userService->userTB($request);
    //     } catch (\Exception $exception) {
    //         //throw $ex;
    //         return response()->json(['error' => $exception->getMessage()],422);
    //     }
    //     return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    // }
    // //Using backend form validation and insertion
    // public function userAdd(UserRequest $request)
    // {
    //     try {
    //         //code...
    //         $this->userService->userAdd($request->validated());
    //     } catch (\Exception $exception) {
    //         //throw $ex;
    //         return response()->json(['error' => $exception->getMessage()],422);
    //     }
    //     return json_encode(array(
    //         'success' => true,
    //         'message' => 'User added successfully.'
    //     ));
    // }
    // //Using route model binding
    // public function userGet(User $user)
    // {
    //     return json_encode($user);
    // }

    // public function userEdit(UserEditRequest $request, User $user)
    // {
       
    //     try {
    //         //code...
    //         $this->userService->userEdit($request->validated(),$user);
    //     } catch (\Exception $exception) {
    //         //throw $ex;
    //         return response()->json(['error' => $exception->getMessage()],422);
    //     }

    //     return json_encode(array(
    //         'success' => true,
    //         'message' => 'User edited successfully.'
    //     ));
    // }

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
