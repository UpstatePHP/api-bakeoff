<?php namespace Bakeoff\Base;

use Input;
use Bakeoff\Contracts\FinderInterface;
use Illuminate\Database\Eloquent\Model;

class BaseFinder implements FinderInterface
{
    protected $perPage = 20;

    protected $limit = null;

    public function commonQuery()
    {
        $query = $this->model->query();

        $this->perPage = Input::get('per_page', false)
            ? (int) Input::get('per_page')
            : $this->perPage;

        if (Input::get('limit', false) !== false) {
            $this->limit = Input::get('limit');
            if ($this->limit !== 0) {
                $query->take($this->limit);
            }
        }

        return $query;
    }

    public function getResults()
    {
        $query = $this->commonQuery();

        return is_null($this->limit)
            ? $query->paginate($this->perPage)
            : $query->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function getModel()
    {
        return $this->model;
    }
}