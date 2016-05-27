<?php

namespace Atrapalo\Domain\Model\MediaType\DataTransformer;

use Atrapalo\Domain\Model\MediaType\Entity\MediaType;

/**
 * Interface MediaTypeDataTransformer
 */
interface MediaTypeDataTransformer
{
    /**
     * @param MediaType $mediaType
     *
     * @return mixed
     */
    public function transform(MediaType $mediaType);
}
