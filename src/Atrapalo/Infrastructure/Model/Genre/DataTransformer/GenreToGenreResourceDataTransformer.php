<?php

namespace Atrapalo\Infrastructure\Model\Genre\DataTransformer;

use Atrapalo\Domain\Model\Genre\DataTransformer\GenreDataTransformer;
use Atrapalo\Domain\Model\Genre\Entity\Genre;
use Atrapalo\Infrastructure\Model\Genre\Resource\GenreResource;

/**
 * Class GenreToGenreResourceDataTransformer
 */
class GenreToGenreResourceDataTransformer implements GenreDataTransformer
{
    /**
     * @param Genre $genre
     *
     * @return GenreResource
     */
    public function transform(Genre $genre)
    {
        return GenreResource::instance($genre->id(), $genre->name());
    }
}
