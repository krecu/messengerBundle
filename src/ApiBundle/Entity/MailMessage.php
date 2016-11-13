<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Krecu\MessengerBundle\Entity\Message;

/**
 * MailMessage
 * @ORM\Table(name="mail_message")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\RuleRepository")
 */
class MailMessage extends Message
{

    /**
     * @ORM\ManyToOne(targetEntity="Rule")
     * @ORM\JoinColumn(name="rule_id", referencedColumnName="id")
     */
    private $rule;


    /**
     * Set rule
     *
     * @param \ApiBundle\Entity\Rule $rule
     *
     * @return MailMessage
     */
    public function setRule(\ApiBundle\Entity\Rule $rule = null)
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * Get rule
     *
     * @return \ApiBundle\Entity\Rule
     */
    public function getRule()
    {
        return $this->rule;
    }

}
