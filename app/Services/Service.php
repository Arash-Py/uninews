<?php

namespace App\Services;

use App\Traits\ApiResponser;


abstract class Service
{
    use ApiResponser;

    protected mixed $model;

    public function __construct()
    {
        $this->model();
    }

    abstract public function model();

    public function guessExceptionCode($exception)
    {
        return ($code = $exception->getCode()) == 0
            ? 422
            : ($code > 499 ? 500 : $code);
    }
}
