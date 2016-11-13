<?php

namespace Krecu\MessengerBundle\Sender;

use Krecu\MessengerBundle\Entity\IMessage;

/**
 * Simple email sender implementation
 *
 * Class MailSender
 * @package Krecu\MessengerBundle\Sender
 */
class MailSender extends ASender  {

    /**
     * @inheritdoc
     */
    public function send(IMessage $message)
    {
        $content = $this->_renderEngine->render([
            'view' => "@Messenger/Mail/mail.html.twig"
        ], json_decode($message->getBody(), 1));

        $message = \Swift_Message::newInstance()
            ->setSubject($message->getTitle())
            ->setFrom($this->_params['from'])
            ->setTo($message->getRecipient())
            ->setBody($content, 'text/html');

        return $this->_container->get('mailer')->send($message);
    }
}