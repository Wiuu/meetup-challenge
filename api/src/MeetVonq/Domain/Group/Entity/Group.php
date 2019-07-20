<?php

namespace App\MeetVonq\Domain\Group\Entity;

class Group
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $groupName;

    /**
     * @var integer
     */
    protected $meetingId;

    /**
     * @var array
     */
    protected $roster;

    /**
     * @return array
     */
    public function getRoster(): array
    {
        return $this->roster;
    }

    /**
     * @param array $roster
     */
    public function setRoster(array $roster): void
    {
        $this->roster[] = $roster;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     */
    public function setGroupName(string $groupName): void
    {
        $this->groupName = $groupName;
    }

    /**
     * @return int
     */
    public function getMeetingId(): int
    {
        return $this->meetingId;
    }

    /**
     * @param int $meetingId
     */
    public function setMeetingId(int $meetingId): void
    {
        $this->meetingId = $meetingId;
    }


}