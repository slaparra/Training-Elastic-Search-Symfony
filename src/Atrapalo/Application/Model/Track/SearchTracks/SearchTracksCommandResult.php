<?php

namespace Atrapalo\Application\Model\Track\SearchTracks;

use Atrapalo\Domain\Model\Track\Entity\Track;

/**
 * Class SearchTracksCommandResult
 */
class SearchTracksCommandResult
{
    /** @var Track[] */
    private $tracks;

    /**
     * @param Track[] $tracks
     */
    private function __construct(array $tracks)
    {
        $this->tracks = $tracks;
    }

    /**
     * @param Track[] $tracks
     *
     * @return SearchTracksCommandResult
     */
    public static function instance(array $tracks): SearchTracksCommandResult
    {
        return new static($tracks);
    }

    /**
     * @return Track[]
     */
    public function tracks(): array
    {
        return $this->tracks;
    }
}
