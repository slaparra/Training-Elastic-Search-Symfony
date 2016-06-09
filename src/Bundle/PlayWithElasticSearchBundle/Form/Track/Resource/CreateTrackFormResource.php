<?php

namespace Bundle\PlayWithElasticSearchBundle\Form\Track\Resource;

use Bundle\PlayWithElasticSearchBundle\Form\Album\Resource\AlbumResource;

/**
 * Class CreateTrackFormResource
 */
class CreateTrackFormResource
{
    /** @var string */
    private $name;

    /** @var AlbumResource */
    private $album;

    /**
     * @return AlbumResource
     */
    public function album(): AlbumResource
    {
        return $this->album;
    }

    /**
     * @param AlbumResource $album
     *
     * @return CreateTrackFormResource
     */
    public function setAlbum(AlbumResource $album): CreateTrackFormResource
    {
        $this->album = $album;

        return $this;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return CreateTrackFormResource
     */
    public function setName(string $name): CreateTrackFormResource
    {
        $this->name = $name;

        return $this;
    }
}
