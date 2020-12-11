<?php

namespace App\Services\SocketChat;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

abstract class SocketChatAbstract implements MessageComponentInterface
{

    function onOpen(ConnectionInterface $connect)
    {
        // TODO: Implement onOpen() method.
    }

    function onClose(ConnectionInterface $connect)
    {
        // TODO: Implement onClose() method.
    }

    function onError(ConnectionInterface $connect, \Exception $error)
    {
        // TODO: Implement onError() method.
    }

    function onMessage(ConnectionInterface $from, $message)
    {
        // TODO: Implement onMessage() method.
    }
}

