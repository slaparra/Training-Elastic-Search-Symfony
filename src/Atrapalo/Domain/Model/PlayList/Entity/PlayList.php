<?php

namespace Atrapalo\Domain\Model\PlayList\Entity;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class PlayList
 */
class PlayList implements Entity
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var ArrayCollection */
    private $tracks;

    /** @var \DateTime */
    private $updatedAt;

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

    /**
     * @param int    $id
     * @param string $name
     *
     * @return PlayList
     */
    public static function instance(int $id, string $name): PlayList
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
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return PlayList
     */
    public function setName(string $name): PlayList
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Track $track
     *
     * @return PlayList
     */
    public function addTrack(Track $track): PlayList
    {
        $this->tracks->add($track);

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
     * @return Collection
     */
    public function tracks(): Collection
    {
        return $this->tracks;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return PlayList
     */
    public function setUpdatedAt(\DateTime $updatedAt): PlayList
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function updatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function updatedAtAsString(): string
    {
        return $this->updatedAt->format('dmYHis');
    }

    /**
     * @return int
     */
    public function countOfTracks(): int
    {
        return $this->tracks->count();
    }
}
