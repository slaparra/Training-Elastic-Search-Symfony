<?php

namespace Atrapalo\Application\Model\Track\SearchTracks;

use Atrapalo\Application\Model\Command\Command;

/**
 * Class SearchTracksCommand
 */
class SearchTracksCommand implements Command
{
    /** @var string */
    private $albumTitle;

    /** @var string */
    private $trackName;

    /** @var string */
    private $composer;

    /** @var int */
    private $albumId;

    /** @var int */
    private $page;

    private function __construct(
        string $albumTitle = null,
        string $trackName = null,
        string $composer = null,
        int $page = 1,
        int $albumId = null
    ) {
        $this->albumTitle = $albumTitle;
        $this->trackName = $trackName;
        $this->composer = $composer;
        $this->page = $page;
        $this->albumId = $albumId;
    }

    public static function instance(
        string $albumTitle = null,
        string $trackName = null,
        string $composer = null,
        int $page = 1,
        int $albumId = null
    ): SearchTracksCommand {
        return new static($albumTitle, $trackName, $composer, $page, $albumId);
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

    public function page(): int
    {
        return $this->page;
    }
}
