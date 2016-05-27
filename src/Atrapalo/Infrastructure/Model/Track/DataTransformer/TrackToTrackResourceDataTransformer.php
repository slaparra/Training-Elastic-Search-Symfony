<?php

namespace Atrapalo\Infrastructure\Model\Track\DataTransformer;

use Atrapalo\Domain\Model\Track\DataTransformer\TrackDataTransformer;
use Atrapalo\Domain\Model\Track\Entity\Track;
use Atrapalo\Infrastructure\Model\Album\DataTransformer\AlbumToAlbumResourceDataTransformer;
use Atrapalo\Infrastructure\Model\Genre\DataTransformer\GenreToGenreResourceDataTransformer;
use Atrapalo\Infrastructure\Model\MediaType\DataTransformer\MediaTypeToMediaTypeResourceDataTransformer;
use Atrapalo\Infrastructure\Model\Track\Resource\TrackResource;

/**
 * Class TrackToTrackResourceDataTransformer
 */
class TrackToTrackResourceDataTransformer implements TrackDataTransformer
{
    /** @var AlbumToAlbumResourceDataTransformer */
    private $albumToAlbumResourceDataTransformer;

    /** @var MediaTypeToMediaTypeResourceDataTransformer */
    private $mediaTypeToMediaTypeResourceDataTransformer;

    /** @var GenreToGenreResourceDataTransformer */
    private $genreToGenreResourceDataTransformer;

    /**
     * @param AlbumToAlbumResourceDataTransformer         $albumToAlbumResourceDataTransformer
     * @param MediaTypeToMediaTypeResourceDataTransformer $mediaTypeToMediaTypeResourceDataTransformer
     * @param GenreToGenreResourceDataTransformer         $genreToGenreResourceDataTransformer
     */
    public function __construct(
        AlbumToAlbumResourceDataTransformer $albumToAlbumResourceDataTransformer,
        MediaTypeToMediaTypeResourceDataTransformer $mediaTypeToMediaTypeResourceDataTransformer,
        GenreToGenreResourceDataTransformer $genreToGenreResourceDataTransformer
    ) {
        $this->albumToAlbumResourceDataTransformer = $albumToAlbumResourceDataTransformer;
        $this->mediaTypeToMediaTypeResourceDataTransformer = $mediaTypeToMediaTypeResourceDataTransformer;
        $this->genreToGenreResourceDataTransformer = $genreToGenreResourceDataTransformer;
    }

    /**
     * @param Track $track
     *
     * @return TrackResource
     */
    public function transform(Track $track)
    {
        $trackResource = TrackResource::instance(
            $track->id(),
            $track->name(),
            $this->albumToAlbumResourceDataTransformer->transform($track->album()),
            $this->mediaTypeToMediaTypeResourceDataTransformer->transform($track->mediaType()),
            $this->genreToGenreResourceDataTransformer->transform($track->genre())
        );

        $trackResource->setComposer($track->composer())
            ->setMilliseconds($track->milliseconds())
            ->setBytes($track->bytes())
            ->setUnitPrice($track->unitPrice());


        return $trackResource;
    }
}
