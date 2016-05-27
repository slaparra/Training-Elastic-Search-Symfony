<?php

namespace Atrapalo\Domain\Model\Genre\DataTransformer;

use Atrapalo\Domain\Model\Genre\Entity\Genre;

/**
 * Interface GenreDataTransformer
 */
interface GenreDataTransformer
{
    /**
     * @param Genre $genre
     *
     * @return mixed
     */
    public function transform(Genre $genre);
}
