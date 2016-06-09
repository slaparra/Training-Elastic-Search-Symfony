<?php

namespace Atrapalo\Infrastructure\Persistence\Doctrine;

use Atrapalo\Domain\Entity\Entity;
use Atrapalo\Domain\Entity\EntityRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class DoctrineEntityRepository
 */
abstract class DoctrineEntityRepository implements EntityRepository
{
    /** @var EntityManager */
    private $entityManager;

    /** @var \Doctrine\ORM\EntityRepository  */
    private $entityRepository;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityRepository = $this->entityManager->getRepository($this->entityClass());
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function entityRepository()
    {
        return $this->entityRepository;
    }

    /**
     * @return EntityManager
     */
    protected function entityManager()
    {
        return $this->entityManager;
    }

    /**
     * @return string
     */
    abstract protected function entityClass();

    /**
     * @return Entity[]
     */
    public function findAll(): array
    {
        return $this->entityRepository()->findAll();
    }

    /**
     * @param $id
     *
     * @return null|Entity
     */
    public function find(int $id)
    {
        return $this->entityRepository()->find($id);
    }

    /**
     * @param array $criteria
     *
     * @return null|object
     */
    public function findOneBy(array $criteria)
    {
        return $this->entityRepository()->findOneBy($criteria);
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->entityRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function save(Entity $anEntity, $commit = false)
    {
        $this->entityManager->persist($anEntity);
        if ($commit) {
            $this->entityManager->flush($anEntity);
        }
    }
}
