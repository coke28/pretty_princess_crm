<?php

namespace App\Imports;

use App\Models\Lead;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;

class LeadImport implements ToModel, WithValidation, WithHeadingRow, ShouldAutoSize,OnEachRow
{
    use Importable;

    private $campaign_name;
    private $location_id;
    private $category_id;
    private $group_id;
    public $rowCount = 0;

    public function onRow(Row $row)
    {
        $this->rowCount++;
    }

    public function __construct($campaign_name, $location_id, $category_id,$group_id)
    {
        $this->campaign_name = $campaign_name;
        $this->location_id = $location_id;
        $this->category_id = $category_id;
        $this->group_id = $group_id;
    }

    public function model(array $row)
    {
        return new Lead([
            'campaign_name'     => $this->campaign_name,
            'company_name'    => $row['company_name'],
            'address'    => $row['address'],
            'email_address'    => $row['email_address'],
            'contact_information'    => $row['contact_information'],
            'category_id'    =>  $this->category_id,
            'location_id'    =>  $this->location_id,
            'group_id'    => $this->group_id,
            'website'    => $row['website'],
            'facebook'    => $row['facebook'],
            'instagram'    => $row['instagram'],
        ]);
    }


    public function rules(): array
    {
        return [
            'company_name' => 'required|string',
            'address' => 'required|string',
            'email_address' => 'required|email',
            'contact_information' => 'string',
            'website' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
        ];
    }
    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row) {
    //         Validator::make($row->toArray(), [
    //             'company_name' => 'required|string',
    //             'address' => 'required|string',
    //             'email_address' => 'email',
    //             'contact_information' => 'string',
    //             'website' => 'required|string',
    //             'facebook' => 'required|string',
    //             'instagram' => 'required|string',
    //         ])->validate();



    //         $lead = new Lead();
    //         $lead->campaign_name =  $this->campaign_name;
    //         $lead->company_name = $row['company_name'];
    //         $lead->address = $row['address'];
    //         $lead->email_address = $row['email_address'];
    //         $lead->contact_information = $row['contact_information'];
    //         $lead->category_id =  $this->category_id;
    //         $lead->location_id =  $this->location_id;
    //         $lead->group_id =  "0";
    //         $lead->website = $row['website'];
    //         $lead->facebook = $row['facebook'];
    //         $lead->instagram = $row['instagram'];
    //         $lead->save();
    //     }
    // }
}
