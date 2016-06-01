<?php

namespace Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists;

use Atrapalo\Application\Model\Command\Command;

/**
 * Class SearchPlayListsCommand
 */
class SearchPlayListsCommand implements Command
{
    /** @var int */
    private $page;

    /**
     * @param int $page
     */
    private function __construct(int $page = 1)
    {

        $this->page = $page;
    }

    /**
     * @param int $page
     *
     * @return SearchPlayListsCommand
     */
    public static function instance(int $page = 1): SearchPlayListsCommand
    {
        return new static($page);
    }

    /**
     * @return int
     */
    public function page(): int
    {
        return $this->page;
    }
}
