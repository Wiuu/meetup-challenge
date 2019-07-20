<?php
namespace App\MeetVonq\Domain\Group;

use App\MeetVonq\Domain\Group\Entity\Group;
use League\Fractal\TransformerAbstract;

class GroupTransformer extends TransformerAbstract
{

    public function transform(Group $gp)
    {
        return [
            'id' => $gp->getId(),
            'username' => $gp->getGroupName(),
            'email' => $gp->getMeetingId()
        ];
    }
}