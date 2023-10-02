<?php

namespace App\Http\Controllers;

use App\Imports\LeadImport;
use App\Rules\UniqueExceptCurrent;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UploadController extends Controller
{
    //
    public function uploadFile(Request $request)
    {
        // $campaignUpload = CampaignUpload::where('campaignID', $request->campaignID)->where('deleted', '0')->get()->count();
        // // ->where('deleted', '0')
        // if ($campaignUpload > 0) {
        //     return json_encode(array(
        //         'success' => false,
        //         'message' => 'Campaign ID already in-use.'
        //     ));
        // }

        try {
            $file = $request->file('file');
            $import = new LeadImport($request->campaign_name, $request->location, $request->category);
            $import->import($file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // return json_encode(array(
            //     'success' => false,
            //     'message' => $e->failures(),

            // ));

            return response()->json(['error' => $e->failures()],422);
        }

        return json_encode(array(
            'success' => true,
            'message' => "Uploaded succesfully!"
        ));
    }
}
  //  foreach ($failures as $failure) {
        //      $failure->row(); // row that went wrong
        //      $failure->attribute(); // either heading key (if using heading row concern) or column index
        //      $failure->errors(); // Actual error messages from Laravel validator
        //      $failure->values(); // The values of the row that has failed.
        //  }
