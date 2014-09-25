<?php

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ResourceController extends Controller
{
    public function listAll()
    {
        $lists = $this->finder->getResults();
        $resource = new Collection($lists, $this->transformer);

        return $this->fractal->createData($resource)->toArray();;
    }

    public function show($id)
    {
        $list = $this->finder->find($id);
        $resource = new Item($list, $this->transformer);

        return $this->fractal->createData($resource)->toArray();
    }

    public function create()
    {
        $list = $this->model->create(Input::get('data'));
        $resource = new Item($list, $this->transformer);

        return $this->fractal->createData($resource)->toArray();
    }

    public function update($id)
    {
        $list = $this->finder->find($id);
        $list->update(Input::get('data'));
        $resource = new Item($list, $this->transformer);

        return $this->fractal->createData($resource)->toArray();
    }

    public function delete($id)
    {
        $list = $this->finder->find($id);
        $list->delete();

        return Response::make(null, 204);
    }
}