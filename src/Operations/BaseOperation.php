<?php

namespace Jdubon\Lumen\Operations;

use Jdubon\Lumen\Http\Validator\RequestValidator;
use Jdubon\Lumen\Repositories\RepositoryInterface;

class BaseOperation
{
    /**
     * Contains all the params from the request
     *
     * @var array
     */
    protected $params;

    /**
     * Operation Repository
     *
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * Setting up the operation
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RequestValidator $validator, RepositoryInterface $repository) 
    {
        $this->repository = $repository;
        $this->params = $validator->getParams();
    }
}
