<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="Invoice", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_Invoice", columns={"InvoiceId"})}, indexes={@ORM\Index(name="IFK_InvoiceCustomerId", columns={"CustomerId"})})
 * @ORM\Entity
 */
class Invoice
{
    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Customer", inversedBy="invoices")
     * @ORM\JoinColumn(name="CustomerId", referencedColumnName="CustomerId")
     */
    private $customer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InvoiceDate", type="datetime", nullable=false)
     */
    private $invoiceDate;

    /**
     * @var string
     *
     * @ORM\Column(name="BillingAddress", type="string", length=70, nullable=true)
     */
    private $billingAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="BillingCity", type="string", length=40, nullable=true)
     */
    private $billingCity;

    /**
     * @var string
     *
     * @ORM\Column(name="BillingState", type="string", length=40, nullable=true)
     */
    private $billingState;

    /**
     * @var string
     *
     * @ORM\Column(name="BillingCountry", type="string", length=40, nullable=true)
     */
    private $billingCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="BillingPostalCode", type="string", length=10, nullable=true)
     */
    private $billingPostalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="Total", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $total;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\InvoiceLine", mappedBy="invoice")
     */
    private $invoiceLines;

    /**
     * Get invoiceid
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set invoicedate
     *
     * @param \DateTime $invoiceDate
     *
     * @return Invoice
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * Get invoicedate
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Set billingaddress
     *
     * @param string $billingAddress
     *
     * @return Invoice
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * Get billingaddress
     *
     * @return string
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * Set billingcity
     *
     * @param string $billingCity
     *
     * @return Invoice
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * Get billingcity
     *
     * @return string
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * Set billingstate
     *
     * @param string $billingState
     *
     * @return Invoice
     */
    public function setBillingState($billingState)
    {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * Get billingstate
     *
     * @return string
     */
    public function getBillingState()
    {
        return $this->billingState;
    }

    /**
     * Set billingcountry
     *
     * @param string $billingCountry
     *
     * @return Invoice
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * Get billingcountry
     *
     * @return string
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * Set billingpostalcode
     *
     * @param string $billingPostalCode
     *
     * @return Invoice
     */
    public function setBillingPostalCode($billingPostalCode)
    {
        $this->billingPostalCode = $billingPostalCode;

        return $this;
    }

    /**
     * Get billingpostalcode
     *
     * @return string
     */
    public function getBillingPostalCode()
    {
        return $this->billingPostalCode;
    }

    /**
     * Set total
     *
     * @param string $total
     *
     * @return Invoice
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoiceLines = new ArrayCollection();
    }

    /**
     * Set customer
     *
     * @param Customer $customer
     *
     * @return Invoice
     */
    public function setCustomer(Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Add invoiceLine
     *
     * @param InvoiceLine $invoiceLine
     *
     * @return Invoice
     */
    public function addInvoiceLine(InvoiceLine $invoiceLine)
    {
        $this->invoiceLines[] = $invoiceLine;

        return $this;
    }

    /**
     * Remove invoiceLine
     *
     * @param InvoiceLine $invoiceLine
     */
    public function removeInvoiceLine(InvoiceLine $invoiceLine)
    {
        $this->invoiceLines->removeElement($invoiceLine);
    }

    /**
     * Get invoiceLines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoiceLines()
    {
        return $this->invoiceLines;
    }
}
