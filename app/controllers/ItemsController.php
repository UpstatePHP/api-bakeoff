<?php

use Bakeoff\Contracts\ResourceControllerInterface;
use Bakeoff\Resources\Items\Finder;
use Bakeoff\Resources\Items\Transformer;
use League\Fractal\Manager;
use Bakeoff\Resources\Lists\Model as ListModel;

class ItemsController extends ResourceController implements ResourceControllerInterface
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

    public function create($listId)
    {
        $list = ListModel::find($listId);

        $item = $this->model->create(Input::get('data'));
        $item->list_id = $list->id;
        $item->save();
        $resource = new Item($item, $this->transformer);

        return $this->fractal->createData($resource)->toArray();
    }
}