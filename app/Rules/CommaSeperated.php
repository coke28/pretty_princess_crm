<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CommaSeperated implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($minValues = 3)
    {
        $this->minValues = $minValues;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Ensure the value is a non-empty string
        if (!is_string($value) || empty(trim($value))) {
            return false;
        }

        // Split the value by commas
        $parts = explode(',', $value);
        if (count($parts) < $this->minValues) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The data set field must have more than 3 comma seperated values';
    }
}
