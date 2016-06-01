<?php

namespace Atrapalo\Infrastructure\Model\PlayList\CommandHandler\SearchPlayLists\DataTransformer;

use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\DataTransformer\SearchPlayListsCommandResultDataTransformer;
use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommandResult;
use Atrapalo\Infrastructure\Model\PlayList\DataTransformer\PlayListToPlayListResourceDataTransformer;

/**
 * Class SearchPlayListsCommandResultToPlayListResourceArrayDataTransformer
 */
class SearchPlayListsCommandResultToPlayListResourceArrayDataTransformer implements SearchPlayListsCommandResultDataTransformer
{
    /** @var PlayListToPlayListResourceDataTransformer */
    private $playListToPlayListResourceDataTransformer;

    /**
     * @param PlayListToPlayListResourceDataTransformer $playListToPlayListResourceDataTransformer
     */
    public function __construct(PlayListToPlayListResourceDataTransformer $playListToPlayListResourceDataTransformer)
    {
        $this->playListToPlayListResourceDataTransformer = $playListToPlayListResourceDataTransformer;
    }

    /**
     * @param SearchPlayListsCommandResult $searchPlayListsCommandResult
     *
     * @return mixed
     */
    public function transform(SearchPlayListsCommandResult $searchPlayListsCommandResult)
    {
        $playListResources = [];
        foreach ($searchPlayListsCommandResult->playLists() as $playList) {
            $playListResources[] = $this->playListToPlayListResourceDataTransformer->transform($playList);
        }

        return $playListResources;
    }
}
