<?php

namespace Atrapalo\Application\Model\Track\SearchTracks\DataTransformer;

use Atrapalo\Application\Model\Track\SearchTracks\SearchTracksCommandResult;

/**
 * Interface GetTrackCommandResultToTrackResourceDataTransformer
 */
interface SearchTracksCommandResultDataTransformer
{
    /**
     * @param SearchTracksCommandResult $searchTracksCommandResult
     *
     * @return mixed
     */
    public function transform(SearchTracksCommandResult $searchTracksCommandResult);
}
