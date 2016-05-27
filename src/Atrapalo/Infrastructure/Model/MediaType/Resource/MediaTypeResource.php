<?php

namespace Atrapalo\Infrastructure\Model\MediaType\Resource;

/**
 * Class MediaTypeResource
 */
class MediaTypeResource
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
     * @return MediaTypeResource
     */
    public static function instance(int $id, string $name): MediaTypeResource
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
