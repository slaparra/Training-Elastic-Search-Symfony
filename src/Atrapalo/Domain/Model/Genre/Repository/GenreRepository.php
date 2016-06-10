<?php

namespace Atrapalo\Domain\Model\Genre\Repository;

use Atrapalo\Domain\Entity\EntityRepository;
use Atrapalo\Domain\Model\Genre\Entity\Genre;

/**
 * Interface GenreRepository
 */
interface GenreRepository extends EntityRepository
{
    /**
     * @param int $id
     *
     * @return Genre
     */
    public function find(int $id);
}
