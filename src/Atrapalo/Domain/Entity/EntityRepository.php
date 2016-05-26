<?php

namespace Atrapalo\Domain\Entity;

/**
 * Interface EntityRepository
 */
interface EntityRepository
{
    /**
     * @param int $id
     *
     * @return Entity|null
     */
    public function find(int $id);

    /**
     * @return Entity[]
     */
    public function findAll(): array;

    /**
     * @param Entity $anEntity
     * @param bool   $commit
     */
    public function save(Entity $anEntity, $commit = false);
}
