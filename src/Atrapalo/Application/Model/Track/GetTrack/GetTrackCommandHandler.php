<?php

namespace Atrapalo\Application\Model\Track\GetTrack;

use Atrapalo\Application\Model\Command\Command;
use Atrapalo\Application\Model\Command\CommandHandler;
use Atrapalo\Application\Model\Track\Exception\TrackNotFoundException;
use Atrapalo\Application\Model\Track\GetTrack\DataTransformer\GetTrackCommandResultDataTransformer;
use Atrapalo\Domain\Model\Track\Repository\TrackRepository;

/**
 * Class GetTrackCommandHandler
 */
class GetTrackCommandHandler implements CommandHandler
{
    /** @var GetTrackCommandResultDataTransformer */
    private $getTrackCommandResultDataTransformer;

    /** @var TrackRepository */
    private $trackRepository;

    /**
     * @param GetTrackCommandResultDataTransformer $getTrackCommandResultDataTransformer
     * @param TrackRepository                      $trackRepository
     */
    public function __construct(
        GetTrackCommandResultDataTransformer $getTrackCommandResultDataTransformer,
        TrackRepository $trackRepository
    ) {
        $this->getTrackCommandResultDataTransformer = $getTrackCommandResultDataTransformer;
        $this->trackRepository = $trackRepository;
    }

    /**
     * @param Command|GetTrackCommand $command
     *
     * @return mixed
     * @throws TrackNotFoundException
     */
    public function handle(Command $command)
    {
        $track = $this->trackRepository->find($command->trackId());

        if (!$track) {
            throw new TrackNotFoundException($command->trackId());
        }

        return $this->getTrackCommandResultDataTransformer->transform(
            GetTrackCommandResult::instance($track)
        );
    }
}
