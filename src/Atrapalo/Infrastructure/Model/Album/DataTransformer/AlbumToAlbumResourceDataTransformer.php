<?php

namespace Atrapalo\Infrastructure\Model\Album\DataTransformer;

use Atrapalo\Domain\Model\Album\DataTransformer\AlbumDataTransformer;
use Atrapalo\Domain\Model\Album\Entity\Album;
use Atrapalo\Infrastructure\Model\Album\Resource\AlbumResource;

/**
 * Class AlbumToAlbumResourceDataTransformer
 */
class AlbumToAlbumResourceDataTransformer implements AlbumDataTransformer
{
    /**
     * @param Album $album
     *
     * @return AlbumResource
     */
    public function transform(Album $album)
    {
        return AlbumResource::instance($album->id(), $album->title());
    }
}
