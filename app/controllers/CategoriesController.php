<?php

use Bakeoff\Contracts\ResourceControllerInterface;
use Bakeoff\Resources\Categories\Finder;
use Bakeoff\Resources\Categories\Transformer;
use League\Fractal\Manager;

class CategoriesController extends ResourceController implements ResourceControllerInterface
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