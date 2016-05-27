<?php

namespace Atrapalo\Infrastructure\Model\Track\CommandHandler\GetTrack\DataTransformer;

use Atrapalo\Application\Model\Track\GetTrack\DataTransformer\GetTrackCommandResultDataTransformer;
use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommandResult;
use Atrapalo\Infrastructure\Model\Track\DataTransformer\TrackToTrackResourceDataTransformer;
use Atrapalo\Infrastructure\Model\Track\Resource\TrackResource;

/**
 * Class GetTrackCommandResultToTrackResourceDataTransformer
 */
class GetTrackCommandResultToTrackResourceDataTransformer implements GetTrackCommandResultDataTransformer
{
    /** @var TrackToTrackResourceDataTransformer */
    private $trackToResourceDataTransformer;

    /**
     * @param TrackToTrackResourceDataTransformer $trackToResourceDataTransformer
     */
    public function __construct(TrackToTrackResourceDataTransformer $trackToResourceDataTransformer)
    {
        $this->trackToResourceDataTransformer = $trackToResourceDataTransformer;
    }

    /**
     * @param GetTrackCommandResult $getTrackCommandResult
     *
     * @return TrackResource
     */
    public function transform(GetTrackCommandResult $getTrackCommandResult)
    {
        return $this->trackToResourceDataTransformer->transform(
            $getTrackCommandResult->track()
        );
    }
}
