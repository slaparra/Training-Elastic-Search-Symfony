<?php

namespace Atrapalo\Domain\Model\Album\DataTransformer;

use Atrapalo\Domain\Model\Album\Entity\Album;

/**
 * Interface AlbumDataTransformer
 */
interface AlbumDataTransformer
{
    /**
     * @param Album $album
     *
     * @return mixed
     */
    public function transform(Album $album);
}
