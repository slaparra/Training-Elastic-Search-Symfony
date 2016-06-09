<?php

namespace Atrapalo\Infrastructure\Model\PlayList\Repository;

use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Domain\Model\PlayList\Repository\PlayListRepository;
use Atrapalo\Infrastructure\Persistence\Doctrine\DoctrineEntityRepository;
use Doctrine\ORM\EntityManager;
use Elastica\Result;
use Elastica\Search;

class PlayListRepositoryImpl extends DoctrineEntityRepository implements PlayListRepository
{
    /** @var \Elastica\Search */
    private $elasticaSearch;

    /**
     * @param EntityManager $entityManager
     * @param Search        $elasticaSearch
     */
    public function __construct(EntityManager $entityManager, Search $elasticaSearch)
    {
        parent::__construct($entityManager);

        $this->elasticaSearch = $elasticaSearch;
        $this->elasticaSearch->addIndex('playlist')->addType('track');
    }

    /**
     * @return string
     */
    protected function entityClass()
    {
        return PlayList::class;
    }

    public function findAllWithTracks(): array
    {

        $query = new \Elastica\Query(
//            new \Elastica\Query\MatchAll()
            new \Elastica\Aggregation\Range('playList.name')
        );

        $this->elasticaSearch->setQuery($query);

        return $this->buildEntities(
            $this->elasticaSearch->search()->getResults()
        );
    }

    /**
     * @param Result[] $results
     *
     * @return PlayList[]
     */
    private function buildEntities(array $results): array
    {
        $entities = [];
        foreach ($results as $result) {
            $entities[] = $this->buildEntity($result->getData());
        }

        return $entities;
    }

    /**
     * @param array $data
     *
     * @return PlayList
     */
    private function buildEntity(array $data): PlayList
    {
        return PlayList::instance($data['playList']['id'], $data['playList']['name']);
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

        return $query->getOneOrNullResult();
    }
}
