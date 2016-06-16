<?php

namespace Atrapalo\Domain\Model\Track\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Album\Entity\Album;
use Atrapalo\Domain\Model\Genre\Entity\Genre;
use Atrapalo\Domain\Model\InvoiceLine\Entity\InvoiceLine;
use Atrapalo\Domain\Model\MediaType\Entity\MediaType;
use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Track
 */
class Track implements Entity
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Album */
    private $album;

    /** @var MediaType */
    private $mediaType;

    /** @var Genre */
    private $genre;

    /** @var string */
    private $composer;

    /** @var int */
    private $milliseconds;

    /** @var int */
    private $bytes;

    /** @var float */
    private $unitPrice;

    /** @var ArrayCollection */
    private $invoiceLines;

    /** @var ArrayCollection */
    private $playLists;
    /**
     * @param string $name
     * @param Album  $album
     */
    private function __construct(string $name, Album $album)
    {
        $this->invoiceLines = new ArrayCollection();
        $this->playLists = new ArrayCollection();
        $this->id = null;
        $this->name = $name;
        $this->album = $album;
    }

    public static function instance(string $name, Album $album): Track
    {
        return new static($name, $album);
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Track
     */
    public function setId(int $id): Track
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Track
     */
    public function setName(string $name): Track
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Album
     */
    public function album(): Album
    {
        return $this->album;
    }

    /**
     * @param Album $album
     *
     * @return Track
     */
    public function setAlbum(Album $album): Track
    {
        $this->album = $album;

        return $this;
    }

    /**
     * @return MediaType
     */
    public function mediaType(): MediaType
    {
        return $this->mediaType;
    }

    /**
     * @param MediaType $mediaType
     *
     * @return Track
     */
    public function setMediaType(MediaType $mediaType = null): Track
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * @return Genre
     */
    public function genre(): Genre
    {
        return $this->genre;
    }

    /**
     * @param Genre $genre
     *
     * @return Track
     */
    public function setGenre(Genre $genre = null): Track
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return string|null
     */
    public function composer()
    {
        return $this->composer;
    }

    /**
     * @param string $composer
     *
     * @return Track
     */
    public function setComposer(string $composer = null): Track
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * @return int|null
     */
    public function milliseconds()
    {
        return $this->milliseconds;
    }

    /**
     * @param int $milliseconds
     *
     * @return Track
     */
    public function setMilliseconds(int $milliseconds): Track
    {
        $this->milliseconds = $milliseconds;

        return $this;
    }

    /**
     * @return int|null
     */
    public function bytes()
    {
        return $this->bytes;
    }

    /**
     * @param int $bytes
     *
     * @return Track
     */
    public function setBytes(int $bytes): Track
    {
        $this->bytes = $bytes;

        return $this;
    }

    /**
     * @return float|null
     */
    public function unitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     *
     * @return Track
     */
    public function setUnitPrice(float $unitPrice): Track
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function invoiceLines(): ArrayCollection
    {
        return $this->invoiceLines;
    }

    /**
     * @param InvoiceLine $invoiceLine
     *
     * @return Track
     */
    public function addInvoiceLine(InvoiceLine $invoiceLine): Track
    {
        $this->invoiceLines->add($invoiceLine);

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
     * @return Collection
     */
    public function playLists(): Collection
    {
        return $this->playLists;
    }

    /**
     * @param PlayList $playList
     *
     * @return Track
     */
    public function addPlayList(PlayList $playList): Track
    {
        $this->playLists->add($playList);

        return $this;
    }

    /**
     * @param PlayList $playList
     */
    public function removePlayList(PlayList $playList)
    {
        $this->playLists->removeElement($playList);
    }
}
