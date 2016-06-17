<?php

namespace Atrapalo\Application\Model\Track\SearchTracks;

use Atrapalo\Application\Model\Command\Command;
use Atrapalo\Application\Model\Command\CommandHandler;
use Atrapalo\Application\Model\Track\Exception\TrackNotFoundException;
use Atrapalo\Application\Model\Track\SearchTracks\DataTransformer\SearchTracksCommandResultDataTransformer;
use Atrapalo\Domain\Model\Track\Repository\TrackRepository;
use Atrapalo\Domain\Model\Track\Repository\TrackRepositoryCriteria;

/**
 * Class SearchTracksCommandHandler
 */
class SearchTracksCommandHandler implements CommandHandler
{
    /** @var SearchTracksCommandResultDataTransformer */
    private $searchTracksCommandResultDataTransformer;

    /** @var TrackRepository */
    private $trackRepository;

    /**
     * @param SearchTracksCommandResultDataTransformer $getTrackCommandResultDataTransformer
     * @param TrackRepository                          $trackRepository
     */
    public function __construct(
        SearchTracksCommandResultDataTransformer $getTrackCommandResultDataTransformer,
        TrackRepository $trackRepository
    ) {
        $this->searchTracksCommandResultDataTransformer = $getTrackCommandResultDataTransformer;
        $this->trackRepository = $trackRepository;
    }

    /**
     * @param Command|SearchTracksCommand $command
     *
     * @return mixed
     * @throws TrackNotFoundException
     */
    public function handle(Command $command)
    {
        $from = ($command->page() - 1) * TrackRepository::SIZE;

        $tracks = $this->trackRepository->findByCriteria(
            TrackRepositoryCriteria::instance(
                $command->albumId(),
                $command->albumTitle(),
                $command->trackName(),
                $command->composer(),
                $command->page(),
                ['id' => 'asc'],
                TrackRepository::SIZE,
                $from
            )
        );

        return $this->searchTracksCommandResultDataTransformer->transform(
            SearchTracksCommandResult::instance($tracks)
        );
    }
}
