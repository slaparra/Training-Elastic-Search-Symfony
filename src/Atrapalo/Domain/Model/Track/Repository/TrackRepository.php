<?php

namespace Atrapalo\Domain\Model\Track\Repository;

use Atrapalo\Domain\Entity\EntityRepository;
use Atrapalo\Domain\Model\Track\Entity\Track;

/**
 * Interface TrackRepository
 */
interface TrackRepository extends EntityRepository
{
    const SIZE = 20;

    /**
     * @param int $id
     *
     * @return Track|null
     */
    public function find(int $id);

    /**
     * @param array      $criteria
     * @param array|null $orderBy
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return Track[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);

    /**
     * @param TrackRepositoryCriteria $criteria
     *
     * @return Track[]
     */
    public function findByCriteria(TrackRepositoryCriteria $criteria);
}
