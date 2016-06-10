<?php

namespace Atrapalo\Application\Model\Track\CreateTrack\DataTransformer;

use Atrapalo\Application\Model\Track\CreateTrack\CreateTrackCommandResult;

/**
 * Interface CreateTrackCommandResultDataTransformer
 */
interface CreateTrackCommandResultDataTransformer
{
    /**
     * @param CreateTrackCommandResult $createTrackCommandResult
     *
     * @return mixed
     */
    public function transform(CreateTrackCommandResult $createTrackCommandResult);
}
