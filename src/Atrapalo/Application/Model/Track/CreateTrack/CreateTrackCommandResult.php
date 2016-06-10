<?php

namespace Atrapalo\Application\Model\Track\CreateTrack;

use Atrapalo\Domain\Model\Track\Entity\Track;

/**
 * Class CreateTrackCommandResult
 */
class CreateTrackCommandResult
{
    /** @var Track */
    private $track;

    private function __construct(Track $track)
    {
        $this->track = $track;
    }

    public static function instance(Track $track): CreateTrackCommandResult
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
