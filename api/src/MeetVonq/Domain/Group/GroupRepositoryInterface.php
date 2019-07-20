<?php
namespace  App\MeetVonq\Domain\Group;

interface GroupRepositoryInterface
{

    public function groupDetails();
    public function getGroups();
    public function joinGroup($userId, $groupId);
    public function getRoster($groupId);

}