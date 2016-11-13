<?php

namespace Krecu\MessengerBundle\Render;

/**
 * Interface IRender
 * @package Krecu\MessengerBundle\Render
 */
interface IRender {

    /**
     * @param $settings []
     * @param $variable []
     * @return string
     */
    public function render($settings = [], $variable = []);
}