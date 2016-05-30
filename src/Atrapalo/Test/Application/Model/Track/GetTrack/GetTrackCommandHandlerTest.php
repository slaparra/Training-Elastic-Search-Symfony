<?php

namespace Atrapalo\Test\Application\Model\Track\GetTrack;

use Atrapalo\Application\Model\Track\Exception\TrackNotFoundException;
use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommand;
use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommandHandler;
use Atrapalo\Application\Model\Track\GetTrack\GetTrackCommandResult;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Atrapalo\Infrastructure\Model\Track\CommandHandler\GetTrack\DataTransformer\GetTrackCommandResultNoOpDataTransformer;
use Atrapalo\Infrastructure\Model\Track\Repository\TrackRepositoryInMemoryImpl;
use Atrapalo\Test\Domain\Model\Track\Entity\TrackTestBuilder;

/**
 * Class GetTrackCommandHandlerTest
 */
class GetTrackCommandHandlerTest extends \PHPUnit_Framework_TestCase
{
    const EXISTING_TRACK_ID = 1;
    const NOT_EXISTING_TRACK_ID = 4;

    /**
     * @test
     */
    public function itShouldThrowTrackNotFoundExceptionWhenNotTrackFound()
    {
        $this->expectException(TrackNotFoundException::class);

        $commandHandler = $this->buildGetTrackCommandHandler();

        $commandHandler->handle(GetTrackCommand::instance(self::NOT_EXISTING_TRACK_ID));
    }

    /**
     * @test
     */
    public function itShouldReturnATrackWhenTrackIdExists()
    {
        $commandHandler = $this->buildGetTrackCommandHandler();

        /** @var GetTrackCommandResult $result */
        $result = $commandHandler->handle(GetTrackCommand::instance(self::EXISTING_TRACK_ID));

        $this->assertInstanceOf(Track::class, $result->track());
    }

    /**
     * @return GetTrackCommandHandler
     */
    private function buildGetTrackCommandHandler()
    {
        return new GetTrackCommandHandler(
            new GetTrackCommandResultNoOpDataTransformer(),
            new TrackRepositoryInMemoryImpl([TrackTestBuilder::build()])
        );
    }
}
