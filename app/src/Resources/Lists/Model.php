<?php namespace Bakeoff\Resources\Lists;

use Bakeoff\Base\BaseModel;

class Model extends BaseModel
{
    protected $table = 'lists';

    protected $rules = [
        'title' => 'required'
    ];

    protected $fillable = ['title', 'owner_id'];

    public function items()
    {
        return $this->hasMany('\Bakeoff\Resources\Items\Model');
    }
}