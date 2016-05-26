<?php

namespace Atrapalo\Infrastructure\Model\PlayList\Repository;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Domain\Model\PlayList\Repository\PlayListRepository;
use Atrapalo\Infrastructure\Persistence\Doctrine\DoctrineEntityRepository;

class PlayListRepositoryImpl extends DoctrineEntityRepository implements PlayListRepository
{
    /**
     * @return string
     */
    protected function entityClass()
    {
        return PlayList::class;
    }

    public function withTracks(int $id)
    {
        $queryBuilder = $this->entityRepository()->createQueryBuilder('p');

        $queryBuilder
            ->innerJoin('p.tracks', 't')
            ->where('p.id = :id')
            ->setParameter('id', $id)
        ;

        $query = $queryBuilder->getQuery();

//        $query->useQueryCache(true);
//        $query->useResultCache(true, 3600);

        return $query->getSingleResult();
    }
}
