<?php

namespace Atrapalo\Domain\Model\MediaType\Repository;

use Atrapalo\Domain\Entity\EntityRepository;
use Atrapalo\Domain\Model\MediaType\Entity\MediaType;

/**
 * Interface MediaTypeRepository
 */
interface MediaTypeRepository extends EntityRepository
{
    /**
     * @param int $id
     *
     * @return MediaType
     */
    public function find(int $id);
}
