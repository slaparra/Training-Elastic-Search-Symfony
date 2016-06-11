<?php

namespace Atrapalo\Application\Model\Track\SearchTracks;

use Atrapalo\Application\Model\Command\Command;

/**
 * Class SearchTracksCommand
 */
class SearchTracksCommand implements Command
{
    /** @var string */
    private $playListName;

    /** @var string */
    private $trackName;

    /** @var string */
    private $composer;

    /** @var int */
    private $page;

    private function __construct(
        string $playListName = null,
        string $trackName = null,
        string $composer = null,
        int $page = 1
    ) {
        $this->playListName = $playListName;
        $this->trackName = $trackName;
        $this->composer = $composer;
        $this->page = $page;
    }

    public static function instance(
        string $playListName = null,
        string $trackName = null,
        string $composer = null,
        int $page = 1
    ): SearchTracksCommand {
        return new static($playListName, $trackName, $composer, $page);
    }

    /**
     * @return string|null
     */
    public function playListName()
    {
        return $this->playListName;
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
