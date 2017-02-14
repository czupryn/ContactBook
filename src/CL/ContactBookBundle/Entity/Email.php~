<?php

namespace CL\ContactBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="CL\ContactBookBundle\Entity\EmailRepository")
 */
class Email
{
    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="emails")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Email
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Email
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set contact
     *
     * @param \CL\ContactBookBundle\Entity\Contact $contact
     * @return Email
     */
    public function setContact(\CL\ContactBookBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \CL\ContactBookBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
