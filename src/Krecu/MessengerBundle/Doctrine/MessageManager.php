<?php

namespace Krecu\MessengerBundle\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Krecu\MessengerBundle\Entity\IMessage;
use Krecu\MessengerBundle\Entity\MessageManager as DefaultMessageManager;
use Krecu\MessengerBundle\Render\IRender;
use Krecu\MessengerBundle\Sender\ISender;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class MessageManager
 * @package Krecu\MessengerBundle\Doctrine
 */
class MessageManager extends DefaultMessageManager
{

    /** @var ObjectManager $_om */
    protected $_om;

    /** @var ObjectRepository $_repository */
    protected $_repository;

    /** @var  Container $_container */
    protected $_container;

    /** @var  string $_class */
    protected $_class;

    /**
     * MessageManager constructor.
     * @param ObjectManager $om
     * @param Container $container
     * @param $class
     */
    public function __construct(ObjectManager $om, Container $container, $class)
    {
        $this->_om          = $om;
        $this->_container   = $container;
        $this->_repository  = $om->getRepository($class);
        $this->_class       = $om->getClassMetadata($class)->getName();
    }

    /**
     * @inheritdoc
     */
    public function create(IMessage $message)
    {
        $this->_om->persist($message);
        $this->_om->flush();
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        return $this->_repository->find($id);
    }

    /**
     * @inheritdoc
     */
    public function findBy(array $criteria)
    {
        return $this->_repository->findBy($criteria);
    }

    /**
     * @inheritdoc
     */
    public function remove(IMessage $message)
    {
        $this->_om->remove($message);
        $this->_om->flush();
    }

    /**
     * @inheritdoc
     */
    public function send(IMessage $message){

        /*
         * Get engine settings
         */
        $engineData = $this->_container->getParameter('messenger.engines.' . $message->getEngine());

        if (!empty($engineData)) {

            if (!class_exists($engineData['sender_class']) || !class_exists($engineData['render_class'])) {
                throw new \Exception("Sender engine (" . $engineData['sender_class'] . ") or render engine (" . $engineData['render_class'] . ") not implementation", 500);
            }

            /** @var ISender $senderInstance */
            $senderInstance = new $engineData['sender_class']($this->_container);

            /** @var IRender $renderInstance */
            $renderInstance = new $engineData['render_class']($this->_container);
            $senderInstance
                ->setRenderEngine($renderInstance)
                ->setParams($engineData['params']);

            return $senderInstance->send($message) ? 'Message complete send' : 'Message not sent';

        } else {
            throw new \Exception("Engine not configured", 500);
        }
    }
}
