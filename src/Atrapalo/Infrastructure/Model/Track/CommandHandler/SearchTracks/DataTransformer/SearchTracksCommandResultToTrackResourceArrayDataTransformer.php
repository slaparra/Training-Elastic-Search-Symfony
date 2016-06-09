<?php

namespace Atrapalo\Infrastructure\Model\Track\CommandHandler\SearchTracks\DataTransformer;

use Atrapalo\Application\Model\Track\SearchTracks\DataTransformer\SearchTracksCommandResultDataTransformer;
use Atrapalo\Application\Model\Track\SearchTracks\SearchTracksCommandResult;
use Atrapalo\Infrastructure\Model\Track\DataTransformer\TrackToTrackResourceDataTransformer;
use Atrapalo\Infrastructure\Model\Track\Resource\TrackResource;

/**
 * Class SearchTracksCommandResultToTrackResourceArrayDataTransformer
 */
class SearchTracksCommandResultToTrackResourceArrayDataTransformer implements SearchTracksCommandResultDataTransformer
{
    /** @var TrackToTrackResourceDataTransformer */
    private $trackToTrackResourceDataTransformer;

    public function __construct(TrackToTrackResourceDataTransformer $trackToTrackResourceDataTransformer)
    {
        $this->trackToTrackResourceDataTransformer = $trackToTrackResourceDataTransformer;
    }

    /**
     * @param SearchTracksCommandResult $searchTracksCommandResult
     *
     * @return TrackResource[]
     */
    public function transform(SearchTracksCommandResult $searchTracksCommandResult)
    {
        $trackResources = [];
        foreach ($searchTracksCommandResult->tracks() as $track) {
            $trackResources[] = $this->trackToTrackResourceDataTransformer->transform($track);
        }

        return $trackResources;
    }
}
