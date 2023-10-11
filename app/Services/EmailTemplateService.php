<?php

namespace App\Services;

use App\Models\CrmLog;
use App\Models\EmailTemplate;
use DB;
use Illuminate\Http\Request;

class EmailTemplateService
{
    private CrmLogService $crmLogService;
 
    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }
    
    public function emailTemplateTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'email_template_name',
            'email_template_description',
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

        $email_templates = DB::table('email_templates')->selectRaw('
            id,
            email_template_name,
            email_template_description,
            CASE status WHEN 0 THEN "DISABLED" WHEN 1 THEN "ACTIVE" END as status,
            created_at
        ')
        ->where('deleted','0');

        $email_templates = $email_templates->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('email_template_name', 'like', '%' . $search . '%')
                ->orWhere('email_template_description', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $emailTemplateCount = $email_templates->count();
        $email_templates = $email_templates->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $emailTemplateCount,
            'recordsFiltered' => $emailTemplateCount,
            'data'            => $email_templates,
        ];

        return $result;
    }

    public function emailTemplateAdd($validatedData): void
    {
        $email_template = new EmailTemplate();
        $email_template->email_template_name = $validatedData['email_template_name'];
        $email_template->email_template_description = $validatedData['email_template_description'];
        $email_template->head = $validatedData['head'];
        $email_template->body = $validatedData['body'];
        $email_template->status = $validatedData['status'] ?? 0;
        $email_template->save();

        $this->crmLogService->addCrmLog($email_template, "Manage Email Templates", "emailTemplateAdd");
    }
    public function emailTemplateEdit($validatedData, EmailTemplate $email_template): void
    {
        $email_template->email_template_name = $validatedData['email_template_name'];
        $email_template->email_template_description = $validatedData['email_template_description'];
        $email_template->head = $validatedData['head'];
        $email_template->body = $validatedData['body'];
        $email_template->status = $validatedData['status'] ?? 0;
        $email_template->save();

        $this->crmLogService->addCrmLog($email_template, "Manage Email Templates", "emailTemplateEdit");
    }
    public function emailTemplateDelete (EmailTemplate $email_template)
    {
        $email_template->deleted = "1";
        $email_template->save();

        $this->crmLogService->addCrmLog($email_template, "Manage Email Templates", "emailTemplateDelete");
    }
}