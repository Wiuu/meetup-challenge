<?php

namespace App\MeetVonq\Domain\User;

use App\MeetVonq\Domain\User\Entity\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $user)
    {
        return [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail()
        ];
    }
}