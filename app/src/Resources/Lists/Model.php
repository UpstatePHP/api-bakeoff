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
        return $this->hasMany('\Bakeoff\Resources\Items\Model', 'list_id');
    }

    public function owner()
    {
        return $this->belongsTo('\Bakeoff\Resources\Users\Model', 'owner_id');
    }
}