<?php

namespace App\Services;

use App\Models\Form;
use DB;
use Hash;
use Illuminate\Http\Request;

class FormService
{
    public function formTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'form_name',
            'file_template_url',
            'data_set',
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

        $forms = DB::table('forms')->selectRaw('
            id,
            form_name,
            file_template_url,
            data_set,
            CASE status WHEN 0 THEN "DISABLED" WHEN 1 THEN "ACTIVE" END as status,
            created_at
        ');

        $forms = $forms->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('form_name', 'like', '%' . $search . '%')
                ->orWhere('file_template_url', 'like', '%' . $search . '%')
                ->orWhere('data_set', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $formCount = $forms->count();
        $forms = $forms->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $formCount,
            'recordsFiltered' => $formCount,
            'data'            => $forms,
        ];

        return $result;
    }
    public function formAdd($validatedData): void
    {

        //Check if email is in use
        // $name = trim($validatedData['name']);
        // $checkDupliateNameParameters = [
        //     "name" => $validatedData['name'],
        //     "user_level_id" => "",
        //     "type" => "add",
        // ];
        // $this->checkDuplicateName($checkDupliateNameParameters);
        $form = new Form();
        $form->form_name = $validatedData['form_name'];
        $form->file_template_url = $validatedData['file_template_url'];
        $form->data_set = $validatedData['data_set'];
        $form->status = $validatedData['status'];
        $form->save();
    }
    public function formEdit($validatedData, Form $form): void
    {
        // $checkDupliateNameParameters = [
        //     "name" => $validatedData['name'],
        //     "user_level_id" => $form->id,
        //     "type" => "edit",
        // ];

        // $this->checkDuplicateName($checkDupliateNameParameters);
        $form->form_name = $validatedData['form_name'];
        $form->file_template_url = $validatedData['file_template_url'];
        $form->data_set = $validatedData['data_set'];
        $form->status = $validatedData['status'];
        $form->save();
    }
    public function formDelete(Form $form)
    {
        $form->deleted = "1";
        $form->save();
    }
    // private function checkDuplicateName($paramaterArray)
    // {
    //     switch ($paramaterArray['type']) {
    //         case 'add':
    //             # code...
    //             $existingUserLevel = UserLevel::where('name', $paramaterArray['name'])->where('deleted', '0')->count();
    //             break;
    //         case 'edit':
    //             # code...
    //             $existingUserLevel = UserLevel::where('name', $paramaterArray['name'])->where('id', '!=', $paramaterArray['user_level_id'])->where('deleted', '0')->count();
    //             break;
    //     }
    //     if ($existingUserLevel > 0) {
    //         throw new \Exception('User Level already in use.');
    //     }
    // }
}
