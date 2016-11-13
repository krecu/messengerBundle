<?php

namespace Krecu\MessengerBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;

class DynamicRelationSubscriber implements EventSubscriber
{
    const INTERFACE_FQNS = 'Krecu\MessengerBundle\Entity\Message';

    /**
     * {@inheritDoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }


    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {

        // the $metadata is the whole mapping info for this class
        $metadata = $eventArgs->getClassMetadata();

        if ($metadata->getName() !== 'ApiBundle\Entity\MailMessage') {
            return;
        }

//
//        dump($metadata); die;
//        $namingStrategy = $eventArgs
//            ->getEntityManager()
//            ->getConfiguration()
//            ->getNamingStrategy()
//        ;
//
//        // [...]
    }
}