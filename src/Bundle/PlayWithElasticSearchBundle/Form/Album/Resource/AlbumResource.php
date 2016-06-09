<?php

namespace Bundle\PlayWithElasticSearchBundle\Form\Album\Resource;

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
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
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

    public function __toString()
    {
        return $this->title();
    }
}
