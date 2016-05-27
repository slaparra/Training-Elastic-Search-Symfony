<?php

namespace Atrapalo\Infrastructure\Model\Genre\Resource;

/**
 * Class GenreResource
 */
class GenreResource
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
     * @return GenreResource
     */
    public static function instance(int $id, string $name): GenreResource
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
