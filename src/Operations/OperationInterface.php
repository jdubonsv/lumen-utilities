<?php

namespace Jdubon\Lumen\Operations;

interface OperationInterface
{
    /**
     * Main entry point of an Operation
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function perform(...$args);
}