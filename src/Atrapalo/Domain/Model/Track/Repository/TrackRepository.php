<?php

namespace Atrapalo\Domain\Model\Track\Repository;

use Atrapalo\Domain\Entity\EntityRepository;
use Atrapalo\Domain\Model\Track\Entity\Track;

/**
 * Interface TrackRepository
 */
interface TrackRepository extends EntityRepository
{
    /**
     * @param int $id
     *
     * @return Track[]
     */
    public function withAlbumMediaTypeAndGenre(int $id);
}
