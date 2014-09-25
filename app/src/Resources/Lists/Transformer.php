<?php namespace Bakeoff\Resources\Lists;

use League\Fractal\TransformerAbstract;
use Bakeoff\Resources\Lists\Model as ListModel;

class Transformer extends TransformerAbstract
{
    public function transform(ListModel $list)
    {
        return [
            'id' => $list->id,
            'title' => $list->title
        ];
    }
}