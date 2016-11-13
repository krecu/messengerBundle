<?php

namespace Krecu\MessengerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="message")
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class Message implements IMessage {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=false)
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="engine", type="string", length=255, nullable=false)
     */
    private $engine;

    /**
     * @var string
     *
     * @ORM\Column(name="recipient", type="string", length=255, nullable=false)
     */
    private $recipient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @inheritdoc
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @inheritdoc
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @inheritdoc
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @inheritdoc
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @inheritdoc
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function _prePersist()
    {
        if ($this->getCreated() == null) {
            $this->setCreated(new \DateTime('now'));
        }
    }

}