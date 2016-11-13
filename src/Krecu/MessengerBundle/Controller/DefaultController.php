<?php

namespace Krecu\MessengerBundle\Controller;

use ApiBundle\Entity\MailMessage;
use Krecu\MessengerBundle\Doctrine\MessageManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Krecu\MessengerBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/messenger/send", name="messenger_send")
     */
    public function indexAction(Request $request)
    {
        $message = (new MailMessage())
            ->setTitle('test')
            ->setEngine('mail')
            ->setBody(json_encode([
                'header' => 'Title',
                'content' => 'Hello World'
            ]))
            ->setRecipient('krecu.me@ya.ru');

        /** @var MessageManager $mm */
        $mm = $this->container->get('messenger.message_manager.default');

        $mm->create($message);

        return new JsonResponse($mm->send($message));
    }
}
