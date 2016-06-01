<?php

namespace Atrapalo\Infrastructure\Model\PlayList\CommandHandler\SearchPlayLists\DataTransformer;

use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\DataTransformer\SearchPlayListsCommandResultDataTransformer;
use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommandResult;

/**
 * Class SearchPlayListsCommandResultNoOpDataTransformer
 */
class SearchPlayListsCommandResultNoOpDataTransformer implements SearchPlayListsCommandResultDataTransformer
{
    /**
     * @param SearchPlayListsCommandResult $searchPlayListsCommandResult
     *
     * @return SearchPlayListsCommandResult
     */
    public function transform(SearchPlayListsCommandResult $searchPlayListsCommandResult): SearchPlayListsCommandResult
    {
        return $searchPlayListsCommandResult;
    }
}
