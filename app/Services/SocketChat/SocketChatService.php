<?php

namespace App\Services\SocketChat;

use Ratchet\ConnectionInterface;
use SplObjectStorage;

class SocketChatService extends SocketChatAbstract
{
    protected $users;

    public function __construct()
    {
        $this->users = new SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connect)
    {
        parent::onOpen($connect);

        $this->users->attach($connect);

        echo "New user " . $connect->resourceId . " connected\n";
    }

    public function onClose(ConnectionInterface $connect)
    {
        parent::onClose($connect);

        $this->users->detach($connect);

        echo "User " . $connect->resourceId . " disconnected\n";
    }

    public function onMessage(ConnectionInterface $from, $message)
    {
        parent::onMessage($from, $message);

        $userRequestMessage = count($this->users) - 1;

        echo $from->resourceId . ' ' . $message . ' ' . $userRequestMessage;

        foreach ($this->users as $user) {
            if ($from != $user) {
                $user->send($message);
            }
        }
    }

    public function onError(ConnectionInterface $connect, \Exception $error)
    {
        parent::onError($connect, $error);

        echo 'Error ' . $error->getMessage();

        $connect->close();
    }
}
