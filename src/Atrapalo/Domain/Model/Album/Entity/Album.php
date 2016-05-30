<?php

namespace Atrapalo\Domain\Model\Album\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Artist\Entity\Artist;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Album
 */
class Album implements Entity
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var Artist */
    private $artist;

    /** @var ArrayCollection */
    private $tracks;

    /**
     * Constructor
     *
     * @param int    $id
     * @param string $title
     */
    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
        $this->tracks = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @param string $title
     *
     * @return Album
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @param Artist|null $artist
     *
     * @return Album
     */
    public function setArtist(Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * @return Artist
     */
    public function artist()
    {
        return $this->artist;
    }

    /**
     * @param Track $track
     *
     * @return Album
     */
    public function addTrack(Track $track)
    {
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * @param Track $track
     */
    public function removeTrack(Track $track)
    {
        $this->tracks->removeElement($track);
    }

    /**
     * @return ArrayCollection
     */
    public function tracks()
    {
        return $this->tracks;
    }
}
