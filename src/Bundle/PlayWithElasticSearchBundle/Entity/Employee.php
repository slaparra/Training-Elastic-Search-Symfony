<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="Employee", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_Employee", columns={"EmployeeId"})}, indexes={@ORM\Index(name="IFK_EmployeeReportsTo", columns={"ReportsTo"})})
 * @ORM\Entity
 */
class Employee
{
    /**
     * @var integer
     *
     * @ORM\Column(name="EmployeeId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=20, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=20, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=30, nullable=true)
     */
    private $title;

    /**
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Employee", inversedBy="employees")
     * @ORM\JoinColumn(name="ReportsTo", referencedColumnName="EmployeeId")
     */
    private $manager;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Employee", mappedBy="manager")
     */
    private $employees;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BirthDate", type="datetime", nullable=true)
     */
    private $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HireDate", type="datetime", nullable=true)
     */
    private $hireDate;

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
     * @ORM\Column(name="Email", type="string", length=60, nullable=true)
     */
    private $email;



    /**
     * Get employeeid
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Employee
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Employee
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
     * Set title
     *
     * @param string $title
     *
     * @return Employee
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthDate
     *
     * @return Employee
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set hiredate
     *
     * @param \DateTime $hireDate
     *
     * @return Employee
     */
    public function setHireDate($hireDate)
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    /**
     * Get hiredate
     *
     * @return \DateTime
     */
    public function getHireDate()
    {
        return $this->hireDate;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * Constructor
     */
    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    /**
     * Set manager
     *
     * @param Employee $manager
     *
     * @return Employee
     */
    public function setManager(Employee $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return Employee
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Add employee
     *
     * @param Employee $employee
     *
     * @return Employee
     */
    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;

        return $this;
    }

    /**
     * Remove employee
     *
     * @param Employee $employee
     */
    public function removeEmployee(Employee $employee)
    {
        $this->employees->removeElement($employee);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployees()
    {
        return $this->employees;
    }
}
