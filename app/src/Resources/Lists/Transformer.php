<?php namespace Bakeoff\Resources\Lists;

use League\Fractal\TransformerAbstract;
use Bakeoff\Resources\Lists\Model as ListModel;

class Transformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'items'
    ];

    protected $defaultIncludes = [
        'items'
    ];

    public function transform(ListModel $list)
    {
        return [
            'id' => $list->id,
            'title' => $list->title
        ];
    }

    public function includeItems(ListModel $list)
    {
        $items = $list->items;

        return $this->collection($items, new \Bakeoff\Resources\Items\Transformer);
    }
}