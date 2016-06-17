<?php

namespace Atrapalo\Infrastructure\Persistence\Memory;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Entity\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class InMemoryEntityRepository
 */
abstract class InMemoryEntityRepository implements EntityRepository
{
    /** @var int[] */
    private $currentIds;

    /** @var ArrayCollection */
    protected $entities;

    /**
     * @param Entity[] $entities
     * @param int|int[] $currentIds
     */
    public function __construct(array $entities = [], $currentIds = null)
    {
        $this->setEntities($entities);

        if (is_int($currentIds)) {
            $this->currentIds = [$this->entityClass() => $currentIds];
        } elseif (is_array($currentIds)) {
            $this->currentIds = $currentIds;
        } else {
            $this->currentIds = [$this->entityClass() => 0];
        }
    }

    /**
     * @param int $id
     *
     * @return null
     * @internal param Identity $identity
     *
     */
    public function find(int $id)
    {
        $results = array_filter(
            $this->entities->toArray(),
            function ($entity) use ($id) {
                /** @var Entity $entity */
                return $entity->id() === $id;
            }
        );

        return $results ? reset($results) : null;
    }

    public function findAll(): array
    {
        return $this->entities->toArray();
    }

    public function remove(Entity $anEntity, $commit = false)
    {
        $this->entities->remove($anEntity->id());
    }

    public function save(Entity $anEntity, $commit = false)
    {
        $this->entities->set($anEntity->id(), $anEntity);
    }

    public function saveCollection(ArrayCollection $entities, $commit = false)
    {
        foreach ($entities as $entity) {
            $this->save($entity);
        }
    }

    /**
     * @param array $entities
     */
    public function setEntities(array $entities)
    {
        $this->entities = new ArrayCollection();
        $this->saveCollection(new ArrayCollection($entities));
    }

    /**
     * @param array $criteria
     *
     * @param array $orderBy
     * @param null  $limit
     * @param null  $offset
     *
     * @return mixed
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return array_filter(
            $this->entities->toArray(),
            function ($entity) use ($criteria) {
                $conditions = [];
                foreach ($criteria as $key => $value) {
                        $conditions[] = $entity->$key() == $value;
                }

                return array_reduce(
                    $conditions,
                    function ($carry, $condition) {
                        return $carry && $condition;
                    },
                    true
                );
            }
        );
    }

    /**
     * @param array $criteria
     *
     * @return mixed
     */
    protected function findOneBy(array $criteria)
    {
        $results = $this->findBy($criteria);

        $result = reset($results);

        return $result ? $result : null;
    }

    /**
     * @return string
     */
    abstract protected function entityClass();
}
