<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoiceline
 *
 * @ORM\Table(name="InvoiceLine", uniqueConstraints={@ORM\UniqueConstraint(name="IPK_InvoiceLine", columns={"InvoiceLineId"})}, indexes={@ORM\Index(name="IFK_InvoiceLineTrackId", columns={"TrackId"}), @ORM\Index(name="IFK_InvoiceLineInvoiceId", columns={"InvoiceId"})})
 * @ORM\Entity
 */
class InvoiceLine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="InvoiceLineId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Invoice
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Invoice", inversedBy="invoiceLines")
     * @ORM\JoinColumn(name="InvoiceId", referencedColumnName="InvoiceId")
     */
    private $invoice;

    /**
     * @var Track
     *
     * @ORM\ManyToOne(targetEntity="Bundle\PlayWithElasticSearchBundle\Entity\Track", inversedBy="invoiceLines")
     * @ORM\JoinColumn(name="TrackId", referencedColumnName="TrackId")
     */
    private $track;

    /**
     * @var string
     *
     * @ORM\Column(name="UnitPrice", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $unitPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity", type="integer", nullable=false)
     */
    private $quantity;



    /**
     * Get invoicelineid
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set unitprice
     *
     * @param string $unitPrice
     *
     * @return InvoiceLine
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get unitprice
     *
     * @return string
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return InvoiceLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set invoice
     *
     * @param Invoice $invoice
     *
     * @return InvoiceLine
     */
    public function setInvoice(Invoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set track
     *
     * @param Track $track
     *
     * @return InvoiceLine
     */
    public function setTrack(Track $track = null)
    {
        $this->track = $track;

        return $this;
    }

    /**
     * Get track
     *
     * @return Track
     */
    public function getTrack()
    {
        return $this->track;
    }
}
