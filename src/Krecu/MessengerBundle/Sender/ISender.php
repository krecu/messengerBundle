<?php

namespace Krecu\MessengerBundle\Sender;

use Krecu\MessengerBundle\Entity\IMessage;
use Krecu\MessengerBundle\Render\IRender;

/**
 * Interface ISender
 * @package Krecu\MessengerBundle\Sender
 */
interface ISender {

    /**
     * Inject params
     *
     * @param array $params
     * @return self
     */
    public function setParams(array $params);

    /**
     * Inject sender engine
     *
     * @param IRender $renderEngine
     * @return self
     */
    public function setRenderEngine(IRender $renderEngine);

    /**
     * Execute send message
     *
     * @param IMessage $message
     * @return boolean
     */
    public function send(IMessage $message);
}