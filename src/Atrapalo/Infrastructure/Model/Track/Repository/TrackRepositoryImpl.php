<?php

namespace Atrapalo\Infrastructure\Model\Track\Repository;

use Atrapalo\Domain\Model\Track\Entity\Track;
use Atrapalo\Domain\Model\Track\Repository\TrackRepository;
use Atrapalo\Infrastructure\Persistence\Doctrine\DoctrineEntityRepository;

class TrackRepositoryImpl extends DoctrineEntityRepository implements TrackRepository
{
    /**
     * @return string
     */
    protected function entityClass()
    {
        return Track::class;
    }

    public function withAlbumMediaTypeAndGenre(int $id)
    {
        $queryBuilder = $this->entityRepository()->createQueryBuilder('t');
        $queryBuilder
            ->select('t', 'a', 'm', 'g')
            ->leftJoin('t.album', 'a')
            ->leftJoin('t.mediaType', 'm')
            ->leftJoin('t.genre', 'g')
            ->where('t.id = :id')
            ->setParameter('id', $id)
        ;

        $query = $queryBuilder->getQuery();

        $query->useQueryCache(true);
        $query->useResultCache(true, 3600);

        return $query->getSingleResult();
    }
}
