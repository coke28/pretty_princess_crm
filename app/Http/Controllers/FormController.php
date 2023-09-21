<?php

namespace App\Http\Controllers;

use App\Events\FormEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangayFormRequest;
use App\Models\Form;
use App\Services\FormService;
use Event;
use Illuminate\Http\Request;

class FormController extends Controller
{
    private FormService $formService;

    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function formTB(Request $request)
    {
        try {
            //code...
            $result = $this->formService->formTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    // //Using backend form validation and insertion
    public function formAdd(BarangayFormRequest $request)
    {
        try {
            //code...
            $this->formService->formAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        Event::dispatch(new FormEvent());
        return json_encode(array(
            'success' => true,
            'message' => 'Form added successfully.'
        ));
    }
    //Using route model binding
    public function formGet(Form $form)
    {
        return json_encode($form);
    }

    public function formEdit(BarangayFormRequest $request, Form $form)
    {

        try {
            //code...
            $this->formService->formEdit($request->validated(), $form);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        Event::dispatch(new FormEvent());
        return json_encode(array(
            'success' => true,
            'message' => 'Form edited successfully.'
        ));
    }
    public function formGetActiveCount()
    {
        return json_encode(array(
            'success' => true,
            'formActiveCount' => Form::where('status','1')->count()
        ));
    }


    // public function formDelete(Form $form)
    // {

    //     try {
    //         //code...
    //         $this->formService->formDelete($form);
    //     } catch (\Exception $exception) {
    //         //throw $ex;
    //         return response()->json(['error' => $exception->getMessage()], 422);
    //     }

    //     return json_encode(array(
    //         'success' => true,
    //         'message' => 'Form Deleted successfully.'
    //     ));
    // }
}
