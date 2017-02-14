<?php

namespace CL\ContactBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TelephoneNumber
 *
 * @ORM\Table(name="telephoneNumber")
 * @ORM\Entity(repositoryClass="CL\ContactBookBundle\Entity\TelephoneNumberRepository")
 */
class TelephoneNumber
{
    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="telephoneNumbers")
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
     * @ORM\Column(name="number", type="string", length=50)
     */
    private $number;

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
     * Set number
     *
     * @param string $number
     * @return TelephoneNumber
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return TelephoneNumber
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
     * @return TelephoneNumber
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
