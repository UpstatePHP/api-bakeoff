<?php namespace Bakeoff\Resources\Users;

use League\Fractal\TransformerAbstract;
use Bakeoff\Resources\Users\Model as Users;

class Transformer extends TransformerAbstract
{
    public function transform(Users $user)
    {
        return [
            'id' => $user->id,
            'email' => $user->email,
            'givenName' => $user->first_name,
            'familyName' => $user->last_name,
            'avatarUrl' => $user->avatar_url,
            'dateCreated' => (string) $user->created_at,
            'dateUpdated' => (string) $user->updated_at
        ];
    }
}