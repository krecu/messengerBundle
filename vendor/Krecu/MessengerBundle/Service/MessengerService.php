<?php

namespace Krecu\MessengerBundle\Service;
use Krecu\MessengerBundle\Sender\ISender;

/**
 * Implementation symfony service for send message to
 * sms/email and etc
 *
 * Class Messenger
 * @package Krecu\MessengerBundle\Service
 */
class Messenger {

    /** @var ISender The interface implements the method of sending messages  */
    private $_senderEngine;

    /**
     * Setter sending method
     *
     * @param ISender $sender
     */
    public function setSenderEngine(ISender $sender){
        $this->_senderEngine = $sender;
    }

}