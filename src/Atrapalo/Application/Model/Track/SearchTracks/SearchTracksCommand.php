<?php

namespace Atrapalo\Application\Model\Track\SearchTracks;

use Atrapalo\Application\Model\Command\Command;

/**
 * Class SearchTracksCommand
 */
class SearchTracksCommand implements Command
{
    /** @var int */
    private $page;

    /** @var string */
    private $playListName;

    /** @var string */
    private $trackName;

    /** @var string */
    private $composer;

    private function __construct(
        int $page = 1,
        string $playListName = null,
        string $trackName = null,
        string $composer = null
    ) {
        $this->page = $page;
        $this->playListName = $playListName;
        $this->trackName = $trackName;
        $this->composer = $composer;
    }

    public static function instance(
        int $page = 1,
        string $playListName = null,
        string $trackName = null,
        string $composer = null
    ): SearchTracksCommand {
        return new static($page, $playListName, $trackName, $composer);
    }

    public function page(): int
    {
        return $this->page;
    }

    public function playListName(): string
    {
        return $this->playListName;
    }

    public function trackName(): string
    {
        return $this->trackName;
    }

    public function composer(): string
    {
        return $this->composer;
    }
}
