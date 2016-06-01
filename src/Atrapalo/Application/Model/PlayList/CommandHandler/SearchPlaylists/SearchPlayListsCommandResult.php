<?php

namespace Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;

/**
 * Class SearchPlayListsCommandResult
 */
class SearchPlayListsCommandResult
{
    /** @var PlayList[] */
    private $playLists;

    /**
     * @param PlayList[] $playLists
     */
    private function __construct(array $playLists)
    {
        $this->playLists = $playLists;
    }

    /**
     * @param PlayList[] $playLists
     *
     * @return SearchPlayListsCommandResult
     */
    public static function instance(array $playLists): SearchPlayListsCommandResult
    {
        return new static($playLists);
    }

    /**
     * @return PlayList[]
     */
    public function playLists(): array
    {
        return $this->playLists;
    }
}
