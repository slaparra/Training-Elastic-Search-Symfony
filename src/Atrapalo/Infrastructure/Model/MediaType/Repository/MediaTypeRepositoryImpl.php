<?php

namespace Atrapalo\Infrastructure\Model\MediaType\Repository;

use Atrapalo\Domain\Model\MediaType\Entity\MediaType;
use Atrapalo\Domain\Model\MediaType\Repository\MediaTypeRepository;
use Atrapalo\Infrastructure\Persistence\Doctrine\DoctrineEntityRepository;

class MediaTypeRepositoryImpl extends DoctrineEntityRepository implements MediaTypeRepository
{
    /**
     * @return string
     */
    protected function entityClass()
    {
        return MediaType::class;
    }
}
