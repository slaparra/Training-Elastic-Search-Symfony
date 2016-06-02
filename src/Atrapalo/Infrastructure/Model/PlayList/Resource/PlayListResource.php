<?php

namespace Atrapalo\Infrastructure\Model\PlayList\Resource;

/**
 * Class PlayListResource
 */
class PlayListResource
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /**
     * @param int    $id
     * @param string $name
     */
    private function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @param int    $id
     * @param string $name
     *
     * @return PlayListResource
     */
    public static function instance(int $id, string $name): PlayListResource
    {
        return new static($id, $name);
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
