<?php
namespace App\MeetVonq\Infrastructure\Group;

use App\MeetVonq\App\Support\AppEntityRepository;
use App\MeetVonq\Domain\Group\GroupRepositoryInterface;

class GroupRepository extends AppEntityRepository implements GroupRepositoryInterface
{

    public function groupDetails()
    {
        // TODO: Implement groupDetails() method.
    }

    public function getGroups()
    {
        // TODO: Implement getGroups() method.
    }

    public function joinGroup($userId, $groupId)
    {
        // TODO: Implement joinGroup() method.
    }

    public function getRoster($groupId)
    {
        // TODO: Implement getRoster() method.
    }
}