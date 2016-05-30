<?php

namespace Atrapalo\Infrastructure\Model\Track\Repository;

use Atrapalo\Domain\Model\Track\Entity\Track;
use Atrapalo\Domain\Model\Track\Repository\TrackRepository;
use Atrapalo\Infrastructure\Persistence\Memory\InMemoryEntityRepository;

/**
 * Class ArtistRepositoryInMemoryImpl.
 */
class TrackRepositoryInMemoryImpl extends InMemoryEntityRepository implements TrackRepository
{
    /**
     * @return string
     */
    protected function entityClass()
    {
        return Track::class;
    }
}
