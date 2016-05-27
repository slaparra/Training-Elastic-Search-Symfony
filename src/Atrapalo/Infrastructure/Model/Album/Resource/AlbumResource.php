<?php

namespace Atrapalo\Infrastructure\Model\Album\Resource;

/**
 * Class AlbumResource
 */
class AlbumResource
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /**
     * @param int    $id
     * @param string $title
     */
    private function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @param int    $id
     * @param string $title
     *
     * @return AlbumResource
     */
    public static function instance(int $id, string $title): AlbumResource
    {
        return new static($id, $title);
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
    public function title(): string
    {
        return $this->title;
    }
}
