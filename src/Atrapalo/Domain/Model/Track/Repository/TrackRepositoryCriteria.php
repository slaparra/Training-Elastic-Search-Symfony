<?php

namespace Atrapalo\Domain\Model\Track\Repository;

/**
 * Class TrackRepositoryCriteria
 */
class TrackRepositoryCriteria
{
    /** @var int */
    private $page;

    /** @var string */
    private $albumTitle;

    /** @var string */
    private $trackName;

    /** @var string */
    private $composer;

    /** @var array */
    private $order;

    /** @var int */
    private $size;

    /** @var int */
    private $from;

    /** @var int */
    private $albumId;

    private function __construct(
        int $albumId = null,
        string $albumTitle = null,
        string $trackName = null,
        string $composer = null,
        int $page = 1,
        array $order = ['id' => 'asc'],
        int $size = TrackRepository::SIZE,
        int $from = 1
    ) {
        $this->albumId = $albumId;
        $this->albumTitle = $albumTitle;
        $this->trackName = $trackName;
        $this->composer = $composer;
        $this->page = $page;
        $this->order = $order;
        $this->size = $size;
        $this->from = $from;
    }

    public static function instance(
        int $albumId = null,
        string $albumTitle = null,
        string $trackName = null,
        string $composer = null,
        int $page = 1,
        array $order = ['name' => 'asc'],
        int $size = TrackRepository::SIZE,
        int $from = 1
    ): TrackRepositoryCriteria {
        return new static($albumId, $albumTitle, $trackName, $composer, $page, $order, $size, $from);
    }

    /**
     * @return int|null
     */
    public function albumId()
    {
        return $this->albumId;
    }

    /**
     * @return string|null
     */
    public function albumTitle()
    {
        return $this->albumTitle;
    }

    /**
     * @return string|null
     */
    public function trackName()
    {
        return $this->trackName;
    }

    /**
     * @return string|null
     */
    public function composer()
    {
        return $this->composer;
    }

    /**
     * @return int|null
     */
    public function page(): int
    {
        return $this->page;
    }

    /**
     * @return array
     */
    public function order(): array
    {
        return $this->order;
    }

    /**
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function from(): int
    {
        return $this->from;
    }
}
