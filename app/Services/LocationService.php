<?php

namespace App\Services;

use App\Models\CrmLog;
use App\Models\Location;
use DB;
use Illuminate\Http\Request;

class LocationService
{
    private CrmLogService $crmLogService;
 
    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }
    
    public function locationTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'location_name',
            'location_description',
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

        $locations = DB::table('locations')->selectRaw('
            id,
            location_name,
            location_description,
            CASE status WHEN 0 THEN "DISABLED" WHEN 1 THEN "ACTIVE" END as status,
            created_at
        ')
        ->where('deleted','0');

        $locations = $locations->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('location_name', 'like', '%' . $search . '%')
                ->orWhere('location_description', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $locationCount = $locations->count();
        $locations = $locations->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $locationCount,
            'recordsFiltered' => $locationCount,
            'data'            => $locations,
        ];

        return $result;
    }

    public function locationAdd($validatedData): void
    {
        $location = new Location();
        $location->location_name = $validatedData['location_name'];
        $location->location_description = $validatedData['location_description'];
        $location->status = $validatedData['status'] ?? 0;
        $location->save();

        $this->crmLogService->addCrmLog($location, "Manage Locations", "locationAdd");
    }
    public function locationEdit($validatedData, Location $location): void
    {
        $location->location_name = $validatedData['location_name'];
        $location->location_description = $validatedData['location_description'];
        $location->status = $validatedData['status'] ?? 0;
        $location->save();

        $this->crmLogService->addCrmLog($location, "Manage Locations", "locationEdit");
    }
    public function locationDelete (Location $location)
    {
        $location->deleted = "1";
        $location->save();

        $this->crmLogService->addCrmLog($location, "Manage Locations", "locationDelete");
    }
}