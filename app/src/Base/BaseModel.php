<?php namespace Bakeoff\Base;

use Illuminate\Database\Eloquent\Model;
use Bakeoff\Traits\UniqueID;
use Bakeoff\Exceptions\ValidationFailed;
use Validator;

class BaseModel extends Model
{
    use UniqueID;

    public $incrementing = false;

    protected $rules = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            if (! $model->incrementing) {
                $model->id = static::generateID();
            }
        });

        static::saving(function($model)
        {
            $rules = $model->getRules();
            if (! empty($rules)
                && ! $model->validate($model->getAttributes())
            ) {
                return false;
            }
        });
    }

    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);

        if ($v->fails()) {
            throw with(new ValidationFailed)->setErrors($v->errors()->all());
        }

        return true;
    }

    public function getRules()
    {
        return $this->rules;
    }
}