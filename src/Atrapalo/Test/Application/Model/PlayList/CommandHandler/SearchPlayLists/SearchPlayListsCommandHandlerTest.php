<?php

namespace Atrapalo\Test\Application\Model\PlayList\CommandHandler\SearchPlayLists;

use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommand;
use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommandHandler;
use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommandResult;
use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Infrastructure\Model\PlayList\CommandHandler\SearchPlayLists\DataTransformer\SearchPlayListsCommandResultNoOpDataTransformer;
use Atrapalo\Infrastructure\Model\PlayList\Repository\PlayListRepositoryInMemoryImpl;
use Atrapalo\Test\Domain\Model\PlayList\Entity\PlayListTestBuilder;

/**
 * Class SearchPlayListsCommandHandlerTest
 */
class SearchPlayListsCommandHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldReturnPlayLists()
    {
        $commandResult = $this->handle(SearchPlayListsCommand::instance());

        $this->assertInstanceOf(PlayList::class, $this->getFirstPlayList($commandResult));
    }

    /**
     * @return SearchPlayListsCommandHandler
     */
    private function buildCommandHandler()
    {
        return new SearchPlayListsCommandHandler(
            new SearchPlayListsCommandResultNoOpDataTransformer(),
            new PlayListRepositoryInMemoryImpl([PlayListTestBuilder::build()])
        );
    }

    /**
     * @param SearchPlayListsCommand $searchPlayListsCommand
     *
     * @return SearchPlayListsCommandResult
     */
    private function handle(SearchPlayListsCommand $searchPlayListsCommand)
    {
        return $this->buildCommandHandler()->handle($searchPlayListsCommand);
    }

    /**
     * @param SearchPlayListsCommandResult $commandResult
     *
     * @return PlayList
     */
    private function getFirstPlayList(SearchPlayListsCommandResult $commandResult)
    {
        $playLists = $commandResult->playLists();
        $playList = reset($playLists);

        return $playList;
    }
}
