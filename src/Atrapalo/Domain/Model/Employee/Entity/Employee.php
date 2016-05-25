<?php

namespace Atrapalo\Domain\Model\Employee\Entity;

use Atrapalo\Domain\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Employee
 */
class Employee implements Entity
{
    /** @var integer */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $title;

    /** @var Employee */
    private $manager;

    /** @var ArrayCollection */
    private $employees;

    /** @var \DateTime */
    private $birthDate;

    /** @var \DateTime */
    private $hireDate;

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

    /**
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(int $id, string $firstName, string $lastName)
    {
        $this->employees = new ArrayCollection();
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
     * @return Employee
     */
    public function setFirstName(string $firstName): Employee
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
     * @return Employee
     */
    public function setLastName(string $lastName): Employee
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Employee
     */
    public function setTitle(string $title): Employee
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Employee
     */
    public function manager(): Employee
    {
        return $this->manager;
    }

    /**
     * @param Employee|null $manager
     *
     * @return Employee
     */
    public function setManager(Employee $manager = null): Employee
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function employees(): ArrayCollection
    {
        return $this->employees;
    }

    /**
     * @param Employee $employee
     *
     * @return Employee
     */
    public function addEmployee(Employee $employee): Employee
    {
        $this->employees->add($employee);

        return $this;
    }

    /**
     * @param Employee $employee
     */
    public function removeEmployee(Employee $employee)
    {
        $this->employees->removeElement($employee);
    }

    /**
     * @return \DateTime
     */
    public function birthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     *
     * @return Employee
     */
    public function setBirthDate(\DateTime $birthDate): Employee
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function hireDate(): \DateTime
    {
        return $this->hireDate;
    }

    /**
     * @param \DateTime $hireDate
     *
     * @return Employee
     */
    public function setHireDate(\DateTime $hireDate): Employee
    {
        $this->hireDate = $hireDate;

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
     * @return Employee
     */
    public function setAddress(string $address): Employee
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
     * @return Employee
     */
    public function setCity(string $city): Employee
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
     * @return Employee
     */
    public function setState(string $state): Employee
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
     * @return Employee
     */
    public function setCountry(string $country): Employee
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
     * @return Employee
     */
    public function setPostalCode(string $postalCode): Employee
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
     * @return Employee
     */
    public function setPhone(string $phone): Employee
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
     * @return Employee
     */
    public function setFax(string $fax): Employee
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
     * @return Employee
     */
    public function setEmail(string $email): Employee
    {
        $this->email = $email;

        return $this;
    }
}
