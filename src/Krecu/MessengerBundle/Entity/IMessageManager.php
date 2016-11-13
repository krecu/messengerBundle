<?php

namespace Krecu\MessengerBundle\Entity;

/**
 * Interface IMessageManager
 * @package Krecu\MessengerBundle\Entity
 */
interface IMessageManager {

    /**
     * Create new message
     *
     * @param IMessage $message
     * @return self
     */
    public function create(IMessage $message);

    /**
     * Remove message
     *
     * @param IMessage $message
     * @return mixed
     */
    public function remove(IMessage $message);

    /**
     * Find message by id
     *
     * @param $id
     * @return IMessage|null
     */
    public function find($id);

    /**
     * Find messages by criteria
     *
     * @param array $criteria
     *
     * @return IMessage[]
     */
    public function findBy(array $criteria);

}