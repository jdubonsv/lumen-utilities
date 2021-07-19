<?php

namespace Jdubon\Lumen\Http\Validator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RequestValidator implements RequestValidatorInterface
{
    /**
     * ID to update
     *
     * @var mixed
     */
    protected $id;

    /**
     * Creating the instance and validating the request
     */
    public function __construct()
    {
        $this->validate();
    }

    /**
     * Rules to be applied to validate the request
     *
     * @return array
     */
    protected function rules()
    {
        return [];
    }

    /**
     * Rules messages
     *
     * @return array
     */
    protected function messages()
    {
        return [];
    }

    /**
     * Builds the validator and run it against the request params
     *
     * @return void
     */
    public function validate()
    {
        $rules = $this->rules();

        if(count($rules) == 0)
            return; // nothing to validate

        $this->findIdParam(); // This is useful in updates to validates unique values

        $params   = request()->all();
        $messages = $this->messages();

        $validator = Validator::make($params, $rules, $messages);

        if($validator->fails())
            throw new ValidationException($validator);
    }

    /**
     * Returns all the validated values
     *
     * @return array
     */
    public function getParams()
    {
        return request()->all();
    }

    /**
     * Looking if there is an ID value in the route
     * Usefull to validate unique colums when update records
     *
     * @return void
     */
    private function findIdParam()
    {
        $this->id = request()->route('id', null);
    }
}
