<?php

namespace Atrapalo\Infrastructure\Model\Track\CommandHandler\GetTrack\DataTransformer;

use Atrapalo\Application\Model\Track\GetTrack\DataTransformer\GetTrackCommandResultDataTransformer;
use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommandResult;
use Atrapalo\Infrastructure\Model\Track\Resource\TrackResource;

/**
 * Class GetTrackCommandResultToTrackResourceDataTransformer
 */
class GetTrackCommandResultNoOpDataTransformer implements GetTrackCommandResultDataTransformer
{
    /**
     * @param GetTrackCommandResult $getTrackCommandResult
     *
     * @return TrackResource
     */
    public function transform(GetTrackCommandResult $getTrackCommandResult)
    {
        return $getTrackCommandResult;
    }
}
