<?php namespace Bakeoff\Resources\Users;

use Bakeoff\Base\BaseModel;

class Model extends BaseModel
{
    protected $table = 'users';

    protected $rules = [
        'email' => 'required'
    ];

    protected $fillable = ['email', 'first_name', 'last_name', 'avatar_url'];

    public function items()
    {
        return $this->belongsTo('\Bakeoff\Resources\Items\Model', 'owner_id');
    }
}