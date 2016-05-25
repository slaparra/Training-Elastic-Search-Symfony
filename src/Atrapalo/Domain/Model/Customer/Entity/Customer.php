<?php

namespace Atrapalo\Domain\Model\Customer\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Employee\Entity\Employee;
use Atrapalo\Domain\Model\Invoice\Entity\Invoice;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Customer
 */
class Customer implements Entity
{
    /** @var int */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $company;

    /** @var string */
    private $address;

    /** @var string */
    private $city;

    /** @var string */
    private $state;

    /** @var string */
    private $country;

    /** @var string */
    private $postalCode;

    /** @var string */
    private $phone;

    /** @var string */
    private $fax;

    /** @var string */
    private $email;

    /** @var Employee */
    private $supporter;

    /** @var ArrayCollection */
    private $invoices;

    /**
     * @param int    $id
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(int $id, string $firstName, string $lastName)
    {
        $this->invoices = new ArrayCollection();
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Customer
     */
    public function setFirstName(string $firstName): Customer
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Customer
     */
    public function setLastName(string $lastName): Customer
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function company(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     *
     * @return Customer
     */
    public function setCompany(string $company): Customer
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function address(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return Customer
     */
    public function setAddress(string $address): Customer
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function city(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Customer
     */
    public function setCity(string $city): Customer
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function state(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return Customer
     */
    public function setState(string $state): Customer
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function country(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return Customer
     */
    public function setCountry(string $country): Customer
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function postalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     *
     * @return Customer
     */
    public function setPostalCode(string $postalCode): Customer
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function phone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Customer
     */
    public function setPhone(string $phone): Customer
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function fax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     *
     * @return Customer
     */
    public function setFax(string $fax): Customer
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail(string $email): Customer
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Employee
     */
    public function supporter(): Employee
    {
        return $this->supporter;
    }

    /**
     * @param Employee|null $supporter
     *
     * @return Customer
     */
    public function setSupporter(Employee $supporter = null): Customer
    {
        $this->supporter = $supporter;

        return $this;
    }

    /**
     * @param Invoice $invoice
     *
     * @return Customer
     */
    public function addInvoice(Invoice $invoice): Customer
    {
        $this->invoices[] = $invoice;

        return $this;
    }

    /**
     * @param Invoice $invoice
     */
    public function removeInvoice(Invoice $invoice)
    {
        $this->invoices->removeElement($invoice);
    }
}
