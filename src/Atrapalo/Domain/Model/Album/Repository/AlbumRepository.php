<?php

namespace Atrapalo\Domain\Model\Album\Repository;

use Atrapalo\Domain\Entity\EntityRepository;
use Atrapalo\Domain\Model\Album\Entity\Album;

/**
 * Interface AlbumRepository
 */
interface AlbumRepository extends EntityRepository
{
    /**
     * @param int $id
     *
     * @return Album|null
     */
    public function find(int $id);
}
