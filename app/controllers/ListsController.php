<?php

use Bakeoff\Contracts\ResourceControllerInterface;
use Bakeoff\Resources\Lists\Finder;
use Bakeoff\Resources\Lists\Transformer;
use League\Fractal\Manager;

class ListsController extends ResourceController implements ResourceControllerInterface
{
    protected $finder;

    protected $model;

    protected $transformer;

    protected $fractal;

    public function __construct(
        Manager $fractal,
        Finder $finder,
        Transformer $transformer
    ) {
        $this->fractal = $fractal;
        $this->finder = $finder;
        $this->model = $this->finder->getModel();
        $this->transformer = $transformer;
    }
}