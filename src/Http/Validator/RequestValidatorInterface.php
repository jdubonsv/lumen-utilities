<?php

namespace Jdubon\Lumen\Http\Validator;

interface RequestValidatorInterface
{
    /**
     * Builds the validator and run it against the request params
     *
     * @return void
     */
    function validate();

    /**
     * Returns all the validated values
     *
     * @return array
     */
    function getParams();
}
