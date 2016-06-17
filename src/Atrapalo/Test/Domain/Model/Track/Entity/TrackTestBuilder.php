<?php

namespace Atrapalo\Test\Domain\Model\Track\Entity;

use Atrapalo\Domain\Model\Album\Entity\Album;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Atrapalo\Test\Domain\Model\Album\Entity\AlbumTestBuilder;

/**
 * Class TrackTestBuilder
 */
class TrackTestBuilder
{
    const DEFAULT_ID = 1;
    const DEFAULT_NAME = 'track name';

    public static function build(int $id = self::DEFAULT_ID, string $name = self::DEFAULT_NAME, Album $album = null)
    {
        if (null === $album) {
            $album = AlbumTestBuilder::build();
        }

        $track = Track::instance($name, $album);

        return $track->setId($id);

    }
}
