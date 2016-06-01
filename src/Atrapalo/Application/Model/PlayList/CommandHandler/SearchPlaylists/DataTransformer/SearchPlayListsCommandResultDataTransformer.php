<?php

namespace Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\DataTransformer;

use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommandResult;

/**
 * Interface SearchPlayListsCommandResultDataTransformer
 */
interface SearchPlayListsCommandResultDataTransformer
{
    /**
     * @param SearchPlayListsCommandResult $searchPlayListsCommandResult
     *
     * @return mixed
     */
    public function transform(SearchPlayListsCommandResult $searchPlayListsCommandResult);
}
