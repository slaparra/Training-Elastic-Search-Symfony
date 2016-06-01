<?php

namespace Atrapalo\Infrastructure\Model\PlayList\Repository;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Domain\Model\PlayList\Repository\PlayListRepository;
use Atrapalo\Infrastructure\Persistence\Memory\InMemoryEntityRepository;

/**
 * Class PlayListRepositoryInMemoryImpl
 */
class PlayListRepositoryInMemoryImpl extends InMemoryEntityRepository implements PlayListRepository
{
    /**
     * @return string
     */
    protected function entityClass()
    {
        return PlayList::class;
    }
}
