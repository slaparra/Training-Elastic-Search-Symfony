<?php

namespace Atrapalo\Test\Domain\Model\PlayList\Entity;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Test\Domain\Model\Track\Entity\TrackTestBuilder;

/**
 * Class PlayListTestBuilder
 */
class PlayListTestBuilder
{
    const DEFAULT_ID = 1;
    const DEFAULT_NAME = 'default playlist name';

    /**
     * @param int    $id
     * @param string $name
     *
     * @return PlayList
     */
    public static function build(int $id = self::DEFAULT_ID, string $name = self::DEFAULT_NAME): PlayList
    {
        return PlayList::instance($id, $name)
            ->addTrack(TrackTestBuilder::build());
    }
}
