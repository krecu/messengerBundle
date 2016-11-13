<?php

namespace Krecu\MessengerBundle\Sender;

use Krecu\MessengerBundle\Entity\IMessage;
use Krecu\MessengerBundle\Render\IRender;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class ASender
 * @package Krecu\MessengerBundle\Sender
 */
abstract class ASender implements ISender  {

    /** @var  Container $_container */
    protected $_container;

    /** @var IRender $_renderEngine */
    protected $_renderEngine;

    /** @var  array $_params */
    protected $_params;

    /**
     * ARender constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->_container = $container;
    }

    /**
     * @inheritdoc
     */
    public function setParams(array $params){
        $this->_params = $params;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setRenderEngine(IRender $renderEngine){
        $this->_renderEngine = $renderEngine;

        return $this;
    }

    /**
     * @inheritdoc
     */
    abstract public function send(IMessage $message);
}