<?php

namespace Bundle\PlayWithElasticSearchBundle\Form\PlayList\Resource;

/**
 * Class PlayListResource
 */
class PlayListResource
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name();
    }
}
