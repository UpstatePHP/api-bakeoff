<?php namespace Bakeoff\Exceptions;

class ValidationFailed extends \Exception
{
    public $message = 'Validation errors occurred';

    public $errors = [];

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}