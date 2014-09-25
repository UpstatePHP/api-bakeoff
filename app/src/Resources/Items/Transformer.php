<?php namespace Bakeoff\Resources\Items;

use League\Fractal\TransformerAbstract;
use Bakeoff\Resources\Items\Model as ItemModel;

class Transformer extends TransformerAbstract
{
    public function transform(ItemModel $item)
    {
        return [
            'id' => $item->id,
            'title' => $item->title,
            'completed' => (bool) $item->completed,
            'dueDate' => (string) $item->due_date,
            'dateCreated' => (string) $item->created_at,
            'dateUpdated' => (string) $item->updated_at
        ];
    }
}