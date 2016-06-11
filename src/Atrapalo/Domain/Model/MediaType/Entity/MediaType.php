<?php

namespace Atrapalo\Domain\Model\MediaType\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MediaType
 */
class MediaType implements Entity
{
    /** @var integer */
    private $id;

    /** @var string */
    private $name;

    /** @var ArrayCollection */
    private $tracks;

    /**
     * @param int    $id
     * @param string $name
     */
    private function __construct(int $id, string $name)
    {
        $this->tracks = new ArrayCollection();
        $this->id = $id;
        $this->name = $name;
    }

    public static function instance(int $id, string $name): MediaType
    {
        return new static($id, $name);
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return MediaType
     */
    public function setName(string $name): MediaType
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Track $track
     *
     * @return MediaType
     */
    public function addTrack(Track $track): MediaType
    {
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * Remove track
     *
     * @param Track $track
     */
    public function removeTrack(Track $track)
    {
        $this->tracks->removeElement($track);
    }

    /**
     * @return ArrayCollection
     */
    public function tracks(): ArrayCollection
    {
        return $this->tracks;
    }
}
