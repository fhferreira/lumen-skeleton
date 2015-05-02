<?php namespace App\Http\Controllers;

use Illuminate\Validation\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {

    /**
     * Format the validation errors to be returned.
     *
     * @param  \Illuminate\Validation\Validator $validator
     * @return array
     */
    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->getMessages();
    }

}
