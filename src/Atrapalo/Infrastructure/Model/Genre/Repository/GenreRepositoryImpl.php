<?php

namespace Atrapalo\Infrastructure\Model\Genre\Repository;

use Atrapalo\Domain\Model\Genre\Entity\Genre;
use Atrapalo\Domain\Model\Genre\Repository\GenreRepository;
use Atrapalo\Infrastructure\Persistence\Doctrine\DoctrineEntityRepository;

class GenreRepositoryImpl extends DoctrineEntityRepository implements GenreRepository
{
    /**
     * @return string
     */
    protected function entityClass()
    {
        return Genre::class;
    }
}
