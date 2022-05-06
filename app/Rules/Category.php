<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Category implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        foreach(\App\Category::all()->pluck('id')  as $category){
            return $value == $category;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The category must match old category';
    }
}
