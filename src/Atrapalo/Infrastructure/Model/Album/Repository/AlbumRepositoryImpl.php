<?php

namespace Atrapalo\Infrastructure\Model\Album\Repository;

use Atrapalo\Domain\Model\Album\Entity\Album;
use Atrapalo\Domain\Model\Album\Repository\AlbumRepository;
use Atrapalo\Infrastructure\Persistence\Doctrine\DoctrineEntityRepository;

class AlbumRepositoryImpl extends DoctrineEntityRepository implements AlbumRepository
{
    /**
     * @return string
     */
    protected function entityClass()
    {
        return Album::class;
    }
}
