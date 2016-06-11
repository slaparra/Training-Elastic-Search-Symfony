<?php

namespace Atrapalo\Domain\Model\Genre\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Genre
 */
class Genre implements Entity
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

    public static function instance(int $id, string $name): Genre
    {
        return new self($id, $name);
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
    public function name()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Genre
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Track $track
     *
     * @return Genre
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
