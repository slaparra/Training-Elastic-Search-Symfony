<?php

namespace Atrapalo\Domain\Model\Invoice\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Customer\Entity\Customer;
use Atrapalo\Domain\Model\InvoiceLine\Entity\InvoiceLine;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Invoice
 */
class Invoice implements Entity
{
    /** @var int */
    private $id;

    /** @var Customer */
    private $customer;

    /** @var \DateTime */
    private $invoiceDate;

    /** @var string */
    private $billingAddress;

    /** @var string */
    private $billingCity;

    /** @var string */
    private $billingState;

    /** @var string */
    private $billingCountry;

    /** @var string */
    private $billingPostalCode;

    /** @var string */
    private $total;

    /** @var ArrayCollection */
    private $invoiceLines;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->invoiceLines = new ArrayCollection();
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return Customer
     */
    public function customer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Invoice
     */
    public function setCustomer(Customer $customer): Invoice
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function invoiceDate(): \DateTime
    {
        return $this->invoiceDate;
    }

    /**
     * @param \DateTime $invoiceDate
     *
     * @return Invoice
     */
    public function setInvoiceDate(\DateTime $invoiceDate): Invoice
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * @return string
     */
    public function billingAddress(): string
    {
        return $this->billingAddress;
    }

    /**
     * @param string $billingAddress
     *
     * @return Invoice
     */
    public function setBillingAddress(string $billingAddress): Invoice
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function billingCity(): string
    {
        return $this->billingCity;
    }

    /**
     * @param string $billingCity
     *
     * @return Invoice
     */
    public function setBillingCity(string $billingCity): Invoice
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * @return string
     */
    public function billingState(): string
    {
        return $this->billingState;
    }

    /**
     * @param string $billingState
     *
     * @return Invoice
     */
    public function setBillingState(string $billingState): Invoice
    {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * @return string
     */
    public function billingCountry(): string
    {
        return $this->billingCountry;
    }

    /**
     * @param string $billingCountry
     *
     * @return Invoice
     */
    public function setBillingCountry(string $billingCountry): Invoice
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * @return string
     */
    public function billingPostalCode(): string
    {
        return $this->billingPostalCode;
    }

    /**
     * @param string $billingPostalCode
     *
     * @return Invoice
     */
    public function setBillingPostalCode(string $billingPostalCode): Invoice
    {
        $this->billingPostalCode = $billingPostalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function total(): string
    {
        return $this->total;
    }

    /**
     * @param string $total
     *
     * @return Invoice
     */
    public function setTotal(string $total): Invoice
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @param InvoiceLine $invoiceLine
     *
     * @return Invoice
     */
    public function addInvoiceLine(InvoiceLine $invoiceLine): Invoice
    {
        $this->invoiceLines->add($invoiceLine);

        return $this;
    }

    /**
     * @param InvoiceLine $invoiceLine
     */
    public function removeInvoiceLine(InvoiceLine $invoiceLine)
    {
        $this->invoiceLines->removeElement($invoiceLine);
    }

    /**
     * @return ArrayCollection
     */
    public function invoiceLines(): ArrayCollection
    {
        return $this->invoiceLines;
    }
}
