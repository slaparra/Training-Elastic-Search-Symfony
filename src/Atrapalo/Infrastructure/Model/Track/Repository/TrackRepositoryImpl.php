<?php

namespace Atrapalo\Infrastructure\Model\Track\Repository;

use Atrapalo\Domain\Model\Album\Entity\Album;
use Atrapalo\Domain\Model\Genre\Entity\Genre;
use Atrapalo\Domain\Model\MediaType\Entity\MediaType;
use Atrapalo\Domain\Model\PlayList\Entity\PlayList;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Atrapalo\Domain\Model\Track\Repository\TrackRepository;
use Atrapalo\Domain\Model\Track\Repository\TrackRepositoryCriteria;
use Atrapalo\Infrastructure\Persistence\Doctrine\DoctrineEntityRepository;
use Doctrine\ORM\EntityManager;
use Elastica\Result;
use Elastica\Search;

class TrackRepositoryImpl extends DoctrineEntityRepository implements TrackRepository
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
        $this->elasticaSearch->addIndex('track_index')->addType('track');
    }

    /**
     * @return string
     */
    protected function entityClass()
    {
        return Track::class;
    }

    public function findByCriteria(TrackRepositoryCriteria $criteria)
    {
        $boolQuery = new \Elastica\Query\BoolQuery();

        if ($criteria->albumId()) {
            $query = new \Elastica\Query\Term();
            $query->setParam('album.id', $criteria->albumId());

            $boolQuery->addMust($query);
        }

        if ($criteria->albumTitle()) {
            $query = new \Elastica\Query\Match();
            $query->setFieldQuery('album.title', $criteria->albumTitle());
            $query->setFieldFuzziness('album.title', 2);

            $boolQuery->addMust($query);
        }

        if ($criteria->trackName()) {
            $query = new \Elastica\Query\Match();
            $query->setFieldQuery('name', $criteria->trackName());
            $query->setFieldFuzziness('name', 2);

            $boolQuery->addMust($query);
        }

        if ($criteria->composer()) {
            $query = new \Elastica\Query\Match();
            $query->setFieldQuery('composer', $criteria->composer());
            $query->setFieldFuzziness('composer', 2);

            $boolQuery->addMust($query);
        }

        $this->elasticaSearch->setQuery($boolQuery);

        $query = $this->elasticaSearch->getQuery();

        $query->setSize($criteria->size());
        $query->setFrom(($criteria->page() - 1) * $criteria->size());
        $query->addSort(['name' => ['order' => 'asc']]);

        return $this->buildEntities(
            $this->elasticaSearch->search()->getResults()
        );
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
     * @return Track
     */
    private function buildEntity(array $data): Track
    {
        $track = Track::instance($data['name'], Album::instance($data['album']['id'], $data['album']['title']));
        $track->setId($data['id']);
        $track->setGenre(Genre::instance($data['genre']['id'], $data['genre']['name']));
        $track->setMediaType(MediaType::instance($data['mediaType']['id'], $data['mediaType']['name']));
        $track->setComposer($data['composer']);

        return $track;
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
