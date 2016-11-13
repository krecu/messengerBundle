<?php

namespace Krecu\MessengerBundle\Entity;

/**
 * Interface IMessage
 * @package Krecu\MessengerBundle\Entity
 */
interface IMessage {

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @inheritdoc
     */
    public function getTitle();

    /**
     * @inheritdoc
     */
    public function setTitle($title);

    /**
     * @inheritdoc
     */
    public function getBody();

    /**
     * @inheritdoc
     */
    public function setBody($body);

    /**
     * @inheritdoc
     */
    public function getEngine();

    /**
     * @inheritdoc
     */
    public function setEngine($engine);

    /**
     * @inheritdoc
     */
    public function getRecipient();

    /**
     * @inheritdoc
     */
    public function setRecipient($recipient);

    /**
     * @inheritdoc
     */
    public function getCreated();

    /**
     * @inheritdoc
     */
    public function setCreated($created);

}