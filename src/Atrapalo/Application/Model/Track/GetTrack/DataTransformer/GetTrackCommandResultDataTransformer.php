<?php

namespace Atrapalo\Application\Model\Track\GetTrack\DataTransformer;

use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommandResult;

/**
 * Interface GetTrackCommandResultToTrackResourceDataTransformer
 */
interface GetTrackCommandResultDataTransformer
{
    /**
     * @param GetTrackCommandResult $getTrackCommandResult
     *
     * @return mixed
     */
    public function transform(GetTrackCommandResult $getTrackCommandResult);
}
