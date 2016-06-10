<?php

namespace Atrapalo\Infrastructure\Model\Track\CommandHandler\CreateTrack\DataTransformer;

use Atrapalo\Application\Model\Track\CreateTrack\CreateTrackCommandResult;
use Atrapalo\Application\Model\Track\CreateTrack\DataTransformer\CreateTrackCommandResultDataTransformer;
use Atrapalo\Infrastructure\Model\Track\DataTransformer\TrackToTrackResourceDataTransformer;

/**
 * Class CreateTrackCommandResultToTrackResourceDataTransformer
 */
class CreateTrackCommandResultToTrackResourceDataTransformer implements CreateTrackCommandResultDataTransformer
{
    /** @var TrackToTrackResourceDataTransformer */
    private $trackToTrackResourceDataTransformer;

    /**
     * @param TrackToTrackResourceDataTransformer $trackToTrackResourceDataTransformer
     */
    public function __construct(TrackToTrackResourceDataTransformer $trackToTrackResourceDataTransformer)
    {
        $this->trackToTrackResourceDataTransformer = $trackToTrackResourceDataTransformer;
    }

    /**
     * @param CreateTrackCommandResult $createTrackCommandResult
     *
     * @return mixed
     */
    public function transform(CreateTrackCommandResult $createTrackCommandResult)
    {
        return $this->trackToTrackResourceDataTransformer->transform($createTrackCommandResult->track());
    }
}
