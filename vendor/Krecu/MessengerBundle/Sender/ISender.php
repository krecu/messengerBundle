<?php

namespace Krecu\MessengerBundle\Sender;

interface ISender {
    public function send($message, $from, $to);
}