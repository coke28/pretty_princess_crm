<?php

namespace Database\Seeders;

use App\Models\UserLevel;
use Illuminate\Database\Seeder;

class UserLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserLevel::create([
            'name' => "admin",
            'n1_crm' => 1,
            'n1_tools' => 1,
            'n2_users' => 1,
            'n2_user_roles' => 1,
            'n2_dashboard' => 1,
            'n2_forms' => 1,
            'n2_crm_logs' => 1,
        ]);
    }
}
