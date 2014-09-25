<?php namespace Bakeoff\Resources\Lists;

use League\Fractal\TransformerAbstract;
use Bakeoff\Resources\Lists\Model as ListModel;

class Transformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'items',
        'owner'
    ];

    protected $defaultIncludes = [
        'items',
        'owner'
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

    public function includeOwner(ListModel $list)
    {
        return $this->item($list->owner, new \Bakeoff\Resources\Users\Transformer);
    }
}