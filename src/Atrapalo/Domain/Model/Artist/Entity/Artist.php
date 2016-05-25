<?php

namespace Atrapalo\Domain\Model\Artist\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Album\Entity\Album;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Artist
 */
class Artist implements Entity
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var ArrayCollection */
    private $albums;

    /**
     * @param int    $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->albums = new ArrayCollection();
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return Artist
     */
    public function setName(string $name): Artist
    {
        $this->name = $name;

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
     * @param Album $album
     *
     * @return Artist
     */
    public function addAlbum(Album $album): Artist
    {
        $this->albums->add($album);

        return $this;
    }

    /**
     * @param Album $album
     */
    public function removeAlbum(Album $album)
    {
        $this->albums->removeElement($album);
    }

    /**
     * @return ArrayCollection
     */
    public function albums(): ArrayCollection
    {
        return $this->albums;
    }
}
