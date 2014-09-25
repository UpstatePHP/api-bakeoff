<?php namespace Bakeoff\Resources\Items;

use Bakeoff\Base\BaseModel;

class Model extends BaseModel
{
    protected $table = 'items';

    protected $rules = [
        'title' => 'required'
    ];

    protected $fillable = ['title', 'owner_id'];
}