<?php

namespace App\Services;

use App\Models\Lead;
use DB;
use Illuminate\Http\Request;

class LeadService
{
    private CrmLogService $crmLogService;

    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }

    public function leadTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');



        $tableColumns = array(
            'id',
            'campaign_name',
            'company_name',
            'address',
            'email_address',
            'contact_information',
            'website',
            'facebook',
            'instagram',
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

        $leads = DB::table('leads')
            ->where('deleted', '0');

        if (!empty($request->campaign_name_filter)) {
            $leads = $leads->where('campaign_name', $request->campaign_name_filter);
        }
        if (!empty($request->campaign_group_filter)) {
            $leads = $leads->where('group_id', $request->campaign_group_filter);
        }
        if (!empty($request->location_filter)) {
            $leads = $leads->where('location_id', $request->location_filter);
        }
        if (!empty($request->category_filter)) {
            $leads = $leads->where('category_id', $request->category_filter);
        }
        if (!empty($request->email_sent_filter)) {
            $leads = $leads->where('email_sent', $request->email_sent_filter);
        }

        $leads = $leads->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('campaign_name', 'like', '%' . $search . '%')
                ->orWhere('company_name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('email_address', 'like', '%' . $search . '%')
                ->orWhere('contact_information', 'like', '%' . $search . '%')
                ->orWhere('website', 'like', '%' . $search . '%')
                ->orWhere('facebook', 'like', '%' . $search . '%')
                ->orWhere('instagram', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $leadCount = $leads->count();
        $leads = $leads->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $leadCount,
            'recordsFiltered' => $leadCount,
            'data'            => $leads,
        ];

        return $result;
    }

    // public function locationAdd($validatedData): void
    // {
    //     $lead = new Lead();
    //     $lead->location_name = $validatedData['location_name'];
    //     $lead->location_description = $validatedData['location_description'];
    //     $lead->status = $validatedData['status'] ?? 0;
    //     $lead->save();

    //     $this->crmLogService->addCrmLog($lead, "Manage Leads", "locationAdd");
    // }
    public function leadEdit($validatedData, Lead $lead): void
    {
        $lead->campaign_name = $validatedData['campaign_name'];
        $lead->company_name = $validatedData['company_name'];
        $lead->address = $validatedData['address'];
        $lead->email_address = $validatedData['email_address'];
        $lead->contact_information = $validatedData['contact_information'];
        $lead->website = $validatedData['website'];
        $lead->facebook = $validatedData['facebook'];
        $lead->instagram = $validatedData['instagram'];
        $lead->email_sent = $validatedData['email_sent'];
        $lead->category_id  = $validatedData['category_id'];
        $lead->location_id  = $validatedData['location_id'];
        $lead->group_id  = $validatedData['group_id'];
        $lead->save();

        $this->crmLogService->addCrmLog($lead, "Manage Leads", "leadEdit");
    }
    public function leadDelete(Lead $lead)
    {
        $lead->deleted = "1";
        $lead->save();

        $this->crmLogService->addCrmLog($lead, "Manage Leads", "leadDelete");
    }
}
