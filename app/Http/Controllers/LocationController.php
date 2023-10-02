<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    private LocationService $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function locationTB(Request $request)
    {
        try {
            //code...
            $result = $this->locationService->locationTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function locationAdd(LocationRequest $request)
    {
        try {
            //code...
            $this->locationService->locationAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }

        return json_encode(array(
            'success' => true,
            'message' => 'Location added successfully.'
        ));
    }
    //Using route model binding
    public function locationGet(Location $location)
    {
        return json_encode($location);
    }

    public function locationEdit(LocationRequest $request, Location $location)
    {
        //Get validated Data 
        try {
            //code...
            $this->locationService->locationEdit($request->validated(),$location);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
       
        return json_encode(array(
            'success' => true,
            'message' => 'Location edited successfully.'
        ));
    }

    public function locationDelete(Location $location)
    {
        try {
            //code...
            $this->locationService->locationDelete($location);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Location has been deleted.'
        ));
    }

}
