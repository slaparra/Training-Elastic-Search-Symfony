<?php

namespace Atrapalo\Test\Domain\Model\Album\Entity;

use Atrapalo\Domain\Model\Album\Entity\Album;

/**
 * Class AlbumTestBuilder
 */
class AlbumTestBuilder
{
    const DEFAULT_ID = 1;
    const DEFAULT_TITLE = 'default title';

    public static function build(int $id = self::DEFAULT_ID, string $title = self::DEFAULT_TITLE)
    {
        return Album::instance($id, $title);
    }
}
