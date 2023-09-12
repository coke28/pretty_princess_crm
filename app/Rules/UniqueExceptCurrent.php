<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueExceptCurrent implements Rule
{
    protected $table;
    protected $column;
    protected $id;

    public function __construct($table, $column, $model)
    {
        $this->table = $table;
        $this->column = $column;
        $this->model = $model;
    }

    public function passes($attribute, $value)
    {
        $query = "";
      
        if (!empty($this->model)) {
            // For edit case
            $query = DB::table($this->table)
                ->where($this->column, $value)
                ->where('id', '!=', $this->model->id)
                ->count();
        } else {
            // For add case
            $query = DB::table($this->table)
                ->where($this->column, $value)
                ->count();
        }

        if ($query > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function message()
    {
        return 'The :attribute is already in use.';
    }
}
