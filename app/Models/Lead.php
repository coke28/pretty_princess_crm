<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    protected $fillable = [
        'campaign_name',
        'company_name',
        'address',
        'email_address',
        'contact_information',
        'category_id',
        'location_id',
        'group_id',
        'website',
        'facebook',
        'instagram',
    ];

}
