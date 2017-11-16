<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * Transaction
 *
 * @ORM\Entity
 * @ORM\Table(name="transaction")
 */

class Transaction
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Partner", inversedBy="transaction")
     * @ORM\JoinColumn(name="partner_id", referencedColumnName="id")
     */
    private $partner;


    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @var float
     * @ORM\Column(name="amount", type="decimal", scale=2)
     */
    private $amount;


    /**
     * @var float
     * @ORM\Column(name="totalAmount", type="decimal", scale=2)
     */
    private $totalAmount;


    /**
     * @var \DateTime
     * @ORM\Column(name="createDate", type="datetime")
     */
    private $createDate;


    /**
     * @return mixed
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * @param mixed $partner
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }


    

}