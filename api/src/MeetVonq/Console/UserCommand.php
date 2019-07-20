<?php
/**
 * Created by PhpStorm.
 * User: wiuu
 * Date: 16/07/19
 * Time: 16:10
 */

namespace App\MeetVonq\Console;

use Symfony\Component\Messenger\MessageBusInterface;
use App\Shared\Domain\Bus\Command\Command;

class UserCommand extends Command
{

    private $repository;

    public function __construct(MessageBusInterface $messageBus, UserRepositoryInterface $repository)
    {
        parent::__construct($messageBus);
        $this->repository = $repository;
    }

    public function create(string $name, string $email, string $password)
    {
        $user = User::create($name, $email, $password);

        $events = $user->pullDomainEvents();
        array_walk($events, [$this->messageBus, 'dispatch']);
    }

}