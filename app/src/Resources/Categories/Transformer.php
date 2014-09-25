<?php namespace Bakeoff\Resources\Categories;

use League\Fractal\TransformerAbstract;
use Bakeoff\Resources\Categories\Model as CategoryModel;

class Transformer extends TransformerAbstract
{
    public function transform(CategoryModel $category)
    {
        return [
            'id' => $category->id,
            'title' => $category->title
        ];
    }
}