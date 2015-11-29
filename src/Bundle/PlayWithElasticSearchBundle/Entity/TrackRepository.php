<?php

namespace Bundle\PlayWithElasticSearchBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TrackRepository extends EntityRepository
{
    public function withAlbumMediaTypeAndGenre($id)
    {
        $queryBuilder = $this->createQueryBuilder('t');
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
