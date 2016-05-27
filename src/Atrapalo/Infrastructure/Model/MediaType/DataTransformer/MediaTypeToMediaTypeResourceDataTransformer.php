<?php

namespace Atrapalo\Infrastructure\Model\MediaType\DataTransformer;

use Atrapalo\Domain\Model\MediaType\DataTransformer\MediaTypeDataTransformer;
use Atrapalo\Domain\Model\MediaType\Entity\MediaType;
use Atrapalo\Infrastructure\Model\MediaType\Resource\MediaTypeResource;

/**
 * Class MediaTypeToMediaTypeResourceDataTransformer
 */
class MediaTypeToMediaTypeResourceDataTransformer implements MediaTypeDataTransformer
{
    /**
     * @param MediaType $mediaType
     *
     * @return MediaTypeResource
     */
    public function transform(MediaType $mediaType)
    {
        return MediaTypeResource::instance($mediaType->id(), $mediaType->name());
    }
}
