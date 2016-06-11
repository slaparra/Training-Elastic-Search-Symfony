<?php

namespace Atrapalo\Infrastructure\Model\Track\Resource;

use Atrapalo\Infrastructure\Model\Album\Resource\AlbumResource;
use Atrapalo\Infrastructure\Model\Genre\Resource\GenreResource;
use Atrapalo\Infrastructure\Model\MediaType\Resource\MediaTypeResource;

/**
 * Class TrackResource
 */
class TrackResource
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var AlbumResource */
    private $album;

    /** @var MediaTypeResource */
    private $mediaType;

    /** @var GenreResource */
    private $genre;

    /** @var string */
    private $composer;

    /** @var int */
    private $milliseconds;

    /** @var int */
    private $bytes;

    /** @var string */
    private $unitPrice;

    /**
     * @param int               $id
     * @param string            $name
     * @param AlbumResource     $album
     * @param MediaTypeResource $mediaType
     * @param GenreResource     $genre
     */
    private function __construct(
        int $id,
        string $name,
        AlbumResource $album,
        MediaTypeResource $mediaType,
        GenreResource $genre
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->album = $album;
        $this->mediaType = $mediaType;
        $this->genre = $genre;
    }

    /**
     * @param int               $id
     * @param string            $name
     * @param AlbumResource     $album
     * @param MediaTypeResource $mediaType
     * @param GenreResource     $genre
     *
     * @return TrackResource
     */
    public static function instance(
        int $id,
        string $name,
        AlbumResource $album,
        MediaTypeResource $mediaType,
        GenreResource $genre
    ): TrackResource {
        return new static($id, $name, $album, $mediaType, $genre);
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

    /**
     * @return AlbumResource
     */
    public function album(): AlbumResource
    {
        return $this->album;
    }

    /**
     * @return MediaTypeResource
     */
    public function mediaType(): MediaTypeResource
    {
        return $this->mediaType;
    }

    /**
     * @return GenreResource
     */
    public function genre(): GenreResource
    {
        return $this->genre;
    }

    /**
     * @return int
     */
    public function bytes(): int
    {
        return $this->bytes;
    }

    /**
     * @param int $bytes
     *
     * @return TrackResource
     */
    public function setBytes(int $bytes = null): TrackResource
    {
        $this->bytes = $bytes;

        return $this;
    }

    /**
     * @return string|null
     */
    public function composer()
    {
        return $this->composer;
    }

    /**
     * @param string $composer
     *
     * @return TrackResource
     */
    public function setComposer(string $composer = null): TrackResource
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * @return int
     */
    public function milliseconds(): int
    {
        return $this->milliseconds;
    }

    /**
     * @param int $milliseconds
     *
     * @return TrackResource
     */
    public function setMilliseconds(int $milliseconds = null): TrackResource
    {
        $this->milliseconds = $milliseconds;

        return $this;
    }

    /**
     * @return string
     */
    public function unitPrice(): string
    {
        return $this->unitPrice;
    }

    /**
     * @param string $unitPrice
     *
     * @return TrackResource
     */
    public function setUnitPrice(string $unitPrice = null): TrackResource
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }
}
