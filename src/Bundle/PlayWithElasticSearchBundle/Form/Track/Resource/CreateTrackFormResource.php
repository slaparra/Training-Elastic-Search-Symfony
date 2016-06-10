<?php

namespace Bundle\PlayWithElasticSearchBundle\Form\Track\Resource;

use Bundle\PlayWithElasticSearchBundle\Form\Album\Resource\AlbumResource;
use Bundle\PlayWithElasticSearchBundle\Form\Genre\Resource\GenreResource;
use Bundle\PlayWithElasticSearchBundle\Form\MediaType\Resource\MediaTypeResource;
use Bundle\PlayWithElasticSearchBundle\Form\PlayList\Resource\PlayListResource;

/**
 * Class CreateTrackFormResource
 */
class CreateTrackFormResource
{
    /** @var string */
    private $name;

    /** @var AlbumResource */
    private $album;

    /** @var PlayListResource */
    private $playList;

    /** @var string */
    private $composer;

    /** @var int */
    private $bytes;

    /** @var int */
    private $milliseconds;

    /** @var string */
    private $unitPrice;

    /** @var GenreResource */
    private $genre;

    /** @var MediaTypeResource */
    private $mediaType;

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
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return AlbumResource
     */
    public function album()
    {
        return $this->album;
    }

    /**
     * @param AlbumResource $album
     *
     * @return CreateTrackFormResource
     */
    public function setAlbum($album)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * @return PlayListResource
     */
    public function playList()
    {
        return $this->playList;
    }

    /**
     * @param PlayListResource $playList
     *
     * @return CreateTrackFormResource
     */
    public function setPlayList($playList)
    {
        $this->playList = $playList;

        return $this;
    }

    /**
     * @return string
     */
    public function composer()
    {
        return $this->composer;
    }

    /**
     * @param string $composer
     *
     * @return CreateTrackFormResource
     */
    public function setComposer($composer)
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * @return int
     */
    public function bytes()
    {
        return $this->bytes;
    }

    /**
     * @param int $bytes
     *
     * @return CreateTrackFormResource
     */
    public function setBytes($bytes)
    {
        $this->bytes = $bytes;

        return $this;
    }

    /**
     * @return int
     */
    public function milliseconds()
    {
        return $this->milliseconds;
    }

    /**
     * @param int $milliseconds
     *
     * @return CreateTrackFormResource
     */
    public function setMilliseconds($milliseconds)
    {
        $this->milliseconds = $milliseconds;

        return $this;
    }

    /**
     * @return string
     */
    public function unitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param string $unitPrice
     *
     * @return CreateTrackFormResource
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return GenreResource
     */
    public function genre()
    {
        return $this->genre;
    }

    /**
     * @param GenreResource $genre
     *
     * @return CreateTrackFormResource
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return MediaTypeResource
     */
    public function mediaType()
    {
        return $this->mediaType;
    }

    /**
     * @param MediaTypeResource $mediaType
     *
     * @return CreateTrackFormResource
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;

        return $this;
    }
}
