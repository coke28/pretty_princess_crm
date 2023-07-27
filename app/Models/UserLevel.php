<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    // protected $fillable = [
    //     'name',
    //     'n1_crm' ,
    //     'n1_tools',
    //     'n2_users',
    //     'n2_user_roles',
    //     'n2_dashboard',
    // ];
    /**
     * @return mixed
     */
    public function softDelete()
    {
        $this->deleted = !$this->deleted;
        return $this;
    }
}
