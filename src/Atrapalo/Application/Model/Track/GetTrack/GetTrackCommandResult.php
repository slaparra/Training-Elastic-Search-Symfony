<?php

namespace Atrapalo\Application\Model\Track\GetTrack;

use Atrapalo\Domain\Model\Track\Entity\Track;

/**
 * Class GetTrackCommandResult
 */
class GetTrackCommandResult
{
    /** @var Track */
    private $track;

    /**
     * @param Track $track
     */
    private function __construct(Track $track)
    {
        $this->track = $track;
    }

    /**
     * @param Track $track
     *
     * @return GetTrackCommandResult
     */
    public static function instance(Track $track): GetTrackCommandResult
    {
        return new static($track);
    }

    /**
     * @return Track
     */
    public function track(): Track
    {
        return $this->track;
    }
}
