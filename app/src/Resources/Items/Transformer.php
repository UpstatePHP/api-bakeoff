<?php namespace Bakeoff\Resources\Items;

use League\Fractal\TransformerAbstract;
use Bakeoff\Resources\Items\Model as ItemModel;

class Transformer extends TransformerAbstract
{
    public function transform(ItemModel $item)
    {
        return [
            'id' => $item->id,
            'title' => $item->title
        ];
    }
}