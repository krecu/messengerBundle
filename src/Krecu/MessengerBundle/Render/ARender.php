<?php

namespace Krecu\MessengerBundle\Render;
use Symfony\Component\DependencyInjection\Container;

/**
 * Interface IRender
 * @package Krecu\MessengerBundle\Render
 */
abstract class ARender implements IRender {

    /** @var  Container $_container */
    protected $_container;

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
    abstract public function render($settings = [], $variable = []);
}