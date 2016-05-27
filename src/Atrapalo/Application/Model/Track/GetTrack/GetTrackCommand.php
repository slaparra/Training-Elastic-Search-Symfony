<?php

namespace Atrapalo\Application\Model\Track\GetTrack;

use Atrapalo\Application\Model\Command\Command;

/**
 * Class GetTrackCommand
 */
class GetTrackCommand implements Command
{
    /** @var int */
    private $trackId;

    /**
     * @param int $trackId
     */
    private function __construct(int $trackId)
    {
        $this->trackId = $trackId;
    }

    /**
     * @param int $trackId
     *
     * @return GetTrackCommand
     */
    public static function instance(int $trackId): GetTrackCommand
    {
        return new static($trackId);
    }

    /**
     * @return int
     */
    public function trackId(): int
    {
        return $this->trackId;
    }
}
