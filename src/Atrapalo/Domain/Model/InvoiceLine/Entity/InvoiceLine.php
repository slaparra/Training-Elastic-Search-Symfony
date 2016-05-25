<?php

namespace Atrapalo\Domain\Model\InvoiceLine\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Invoice\Entity\Invoice;
use Atrapalo\Domain\Model\Track\Entity\Track;

/**
 * Class InvoiceLine
 */
class InvoiceLine implements Entity
{
    /** @var int */
    private $id;

    /** @var Invoice */
    private $invoice;

    /** @var Track */
    private $track;

    /** @var string */
    private $unitPrice;

    /** @var int */
    private $quantity;

    /**
     * @param Invoice $invoice
     * @param int     $id
     */
    public function __construct(Invoice $invoice, int $id)
    {
        $this->invoice = $invoice;
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
     * @return Invoice
     */
    public function invoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     *
     * @return InvoiceLine
     */
    public function setInvoice(Invoice $invoice): InvoiceLine
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return Track
     */
    public function track(): Track
    {
        return $this->track;
    }

    /**
     * @param Track $track
     *
     * @return InvoiceLine
     */
    public function setTrack(Track $track): InvoiceLine
    {
        $this->track = $track;

        return $this;
    }

    /**
     * @return string
     */
    public function unitPrice(): string
    {
        return $this->unitPrice;
    }

    /**
     * @param string $unitPrice
     *
     * @return InvoiceLine
     */
    public function setUnitPrice(string $unitPrice): InvoiceLine
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return int
     */
    public function quantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return InvoiceLine
     */
    public function setQuantity(int $quantity): InvoiceLine
    {
        $this->quantity = $quantity;

        return $this;
    }
}
