<?php

namespace Atrapalo\Domain\Model\PlayList\Repository;

use Atrapalo\Domain\Entity\EntityRepository;
use Atrapalo\Domain\Model\PlayList\Entity\PlayList;

/**
 * Interface PlayListRepository
 */
interface PlayListRepository extends EntityRepository
{
    /**
     * @param int $id
     *
     * @return PlayList
     */
    public function find(int $id);

    /**
     * @return PlayList[]
     */
    public function findAll(): array;
}
