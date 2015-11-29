<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="Customer", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_Customer", columns={"CustomerId"})}, indexes={@ORM\Index(name="IFK_CustomerSupportRepId", columns={"SupportRepId"})})
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CustomerId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=40, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=20, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Company", type="string", length=80, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=70, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=40, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="State", type="string", length=40, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="Country", type="string", length=40, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="PostalCode", type="string", length=10, nullable=true)
     */
    private $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=24, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="Fax", type="string", length=24, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=60, nullable=false)
     */
    private $email;

    /**
     * @var Employee
     *
     * @ORM\OneToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Employee")
     * @ORM\JoinColumn(name="SupportRepId", referencedColumnName="EmployeeId")
     */
    private $supporter;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Invoice", mappedBy="customer")
     */
    private $invoices;

    /**
     * Get customerid
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Customer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Customer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Customer
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Customer
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
     * Set city
     *
     * @param string $city
     *
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Customer
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Customer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     *
     * @return Customer
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Customer
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set supporter
     *
     * @param Employee $supporter
     *
     * @return Customer
     */
    public function setSupporter(Employee $supporter = null)
    {
        $this->supporter = $supporter;

        return $this;
    }

    /**
     * Get supporter
     *
     * @return Employee
     */
    public function getSupporter()
    {
        return $this->supporter;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add invoice
     *
     * @param \Bundle\PlayWithElasticSearchBundle\Entity\Invoice $invoice
     *
     * @return Customer
     */
    public function addInvoice(\Bundle\PlayWithElasticSearchBundle\Entity\Invoice $invoice)
    {
        $this->invoices[] = $invoice;

        return $this;
    }

    /**
     * Remove invoice
     *
     * @param \Bundle\PlayWithElasticSearchBundle\Entity\Invoice $invoice
     */
    public function removeInvoice(\Bundle\PlayWithElasticSearchBundle\Entity\Invoice $invoice)
    {
        $this->invoices->removeElement($invoice);
    }

    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
}
