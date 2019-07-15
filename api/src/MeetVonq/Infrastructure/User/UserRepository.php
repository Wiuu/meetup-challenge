<?php

namespace App\MeetVonq\Infrastructure\User;

use App\MeetVonq\Domain\User\Contract\UserRepositoryInterface;
use App\MeetVonq\App\Support\AppEntityRepository;

class UserRepository extends AppEntityRepository implements UserRepositoryInterface
{

    public function userDetails()
    {
        // TODO: Implement userDetails() method.
    }

    public function getUsers()
    {
        return $this->createQueryBuilder('u')->getQuery();
    }
}