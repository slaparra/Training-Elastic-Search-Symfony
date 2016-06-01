<?php

namespace Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists;

use Atrapalo\Application\Model\Command\Command;
use Atrapalo\Application\Model\Command\CommandHandler;
use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\DataTransformer\SearchPlayListsCommandResultDataTransformer;
use Atrapalo\Domain\Model\PlayList\Repository\PlayListRepository;

/**
 * Class SearchPlayListsCommandHandler
 */
class SearchPlayListsCommandHandler implements CommandHandler
{
    /** @var SearchPlayListsCommandResultDataTransformer */
    private $searchPlayListsCommandResultDataTransformer;

    /** @var PlayListRepository */
    private $playListRepository;

    /**
     * @param SearchPlayListsCommandResultDataTransformer $searchPlayListsCommandResultDataTransformer
     * @param PlayListRepository                          $playListRepository
     */
    public function __construct(
        SearchPlayListsCommandResultDataTransformer $searchPlayListsCommandResultDataTransformer,
        PlayListRepository $playListRepository
    ) {
        $this->searchPlayListsCommandResultDataTransformer = $searchPlayListsCommandResultDataTransformer;
        $this->playListRepository = $playListRepository;
    }

    /**
     * @param Command|SearchPlayListsCommand $command
     *
     * @return mixed
     */
    public function handle(Command $command)
    {
        $playLists = $this->playListRepository->findAll();

        return $this->searchPlayListsCommandResultDataTransformer->transform(
            SearchPlayListsCommandResult::instance($playLists)
        );
    }
}
