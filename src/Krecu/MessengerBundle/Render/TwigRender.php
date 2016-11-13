<?php

namespace Krecu\MessengerBundle\Render;

/**
 * Class TwigRender
 * @package Krecu\MessengerBundle\Render
 */
class TwigRender extends ARender {

    /**
     * @inheritdoc
     */
    public function render($settings = [], $variable = []) {
        return $this->_container->get('templating')->render($settings['view'], $variable);
    }
}