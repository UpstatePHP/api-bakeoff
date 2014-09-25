<?php namespace Bakeoff\Resources\Lists;

use Bakeoff\Base\BaseFinder;
use Bakeoff\Contracts\FinderInterface;

class Finder extends BaseFinder implements FinderInterface
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}